<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\DeclareDeclare;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

use function dirname;
use function file_put_contents;
use function is_dir;
use function mkdir;
use function array_chunk;
use function ceil;
use function count;
use function str_starts_with;
use function strcmp;
use function usort;

class ExtractAndChunkProjectedConstantsVisitor extends NodeVisitorAbstract
{
    private string $sourceDir;

    private int $chunkCount;

    public function __construct(string $sourceDir, int $chunkCount = 4)
    {
        $this->sourceDir = $sourceDir;
        $this->chunkCount = $chunkCount;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof Class_ && $node->name->name === 'Projected') {
            $allConstants = $this->extractAllEpsgConstants($node);

            if (!empty($allConstants)) {
                $chunks = $this->partitionConstants($allConstants);

                $this->writeChunkFiles($chunks);

                // Remove all the inlined EPSG_ constants from Projected, leaving only the uses
                $this->removeInlinedConstants($node);
            }

            return NodeTraverser::STOP_TRAVERSAL;
        }

        return null;
    }

    /**
     * @return ClassConst[]
     */
    private function extractAllEpsgConstants(Class_ $projectedClass): array
    {
        $constants = [];

        foreach ($projectedClass->stmts as $stmt) {
            if ($stmt instanceof ClassConst) {
                if (isset($stmt->consts[0]) && str_starts_with($stmt->consts[0]->name->name, 'EPSG')) {
                    $constants[] = $stmt;
                }
            }
        }

        return $constants;
    }

    /**
     * @param  ClassConst[]             $constants
     * @return array<int, ClassConst[]>
     */
    private function partitionConstants(array $constants): array
    {
        // Sort by constant name so we get contiguous alphabetical ranges,
        // matching the previous behaviour (array_chunk on data sorted by name).
        // This makes diffs of the generated chunk files much easier to review.
        usort($constants, static fn (ClassConst $a, ClassConst $b): int => strcmp(
            $a->consts[0]->name->name,
            $b->consts[0]->name->name
        ));

        $chunkSize = (int) ceil(count($constants) / $this->chunkCount);

        return array_chunk($constants, $chunkSize);
    }

    /**
     * @param array<int, ClassConst[]> $chunks
     */
    private function writeChunkFiles(array $chunks): void
    {
        $baseDir = dirname($this->sourceDir . '/CoordinateReferenceSystem/Projected.php');

        if (!is_dir($baseDir)) {
            mkdir($baseDir, 0o777, true);
        }

        $prettyPrinter = new ASTPrettyPrinter();

        foreach ($chunks as $index => $chunkConstants) {
            if (empty($chunkConstants)) {
                continue;
            }

            $chunkNumber = $index + 1;
            $traitName = 'ProjectedConstantsChunk' . $chunkNumber;
            $filename = $baseDir . '/' . $traitName . '.php';

            $trait = new Trait_($traitName);

            // Clone constants with their doc comments
            foreach ($chunkConstants as $constStmt) {
                $trait->stmts[] = $this->cloneConstWithDoc($constStmt);
            }

            $namespace = new Namespace_(
                new Node\Name('PHPCoord\\CoordinateReferenceSystem'),
                [$trait]
            );

            $declare = new Declare_([new DeclareDeclare('strict_types', new Node\Scalar\LNumber(1))]);
            $declare->setDocComment(new Doc("/**\n * PHPCoord.\n *\n * @author Doug Wright\n */"));

            $fileStmts = [
                $declare,
                $namespace,
            ];

            // Use prettyPrintFile() directly — it produces a complete valid PHP file
            // including the opening <?php tag. Do not manually prefix another one.
            $code = $prettyPrinter->prettyPrintFile($fileStmts);

            file_put_contents($filename, $code);
        }
    }

    private function cloneConstWithDoc(ClassConst $original): ClassConst
    {
        $cloned = clone $original;
        if ($original->getDocComment()) {
            $cloned->setDocComment(clone $original->getDocComment());
        }

        return $cloned;
    }

    private function removeInlinedConstants(Class_ $projectedClass): void
    {
        $newStmts = [];

        foreach ($projectedClass->stmts as $stmt) {
            if ($stmt instanceof ClassConst) {
                if (isset($stmt->consts[0]) && str_starts_with($stmt->consts[0]->name->name, 'EPSG')) {
                    // Skip - these will be in the chunk files now
                    continue;
                }
            }
            $newStmts[] = $stmt;
        }

        $projectedClass->stmts = $newStmts;
    }
}

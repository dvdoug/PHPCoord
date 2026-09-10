<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\NodeVisitorAbstract;
use PhpParser\ParserFactory;

use function dirname;
use function file_get_contents;
use function array_map;
use function array_merge;
use function array_splice;
use function count;
use function file_exists;
use function str_starts_with;

/**
 * Pre-processing visitor for Projected.
 *
 * Finds the `use ProjectedConstantsChunkN` trait uses inside the Projected class,
 * parses the corresponding trait files, collects all EPSG_* constants, and inlines
 * copies of them directly into the Projected class body to temporarily undo the effect
 * of the chunking
 */
class InlineProjectedConstantsVisitor extends NodeVisitorAbstract
{
    private string $sourceDir;

    public function __construct(string $sourceDir)
    {
        $this->sourceDir = $sourceDir;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof Class_ && $node->name->name === 'Projected') {
            $inlinedConstants = $this->collectAllChunkConstants($node);

            if (!empty($inlinedConstants)) {
                // Clone again on insertion to be completely safe from shared node mutation
                $clonedForInsertion = array_map(static fn (ClassConst $c) => clone $c, $inlinedConstants);

                // Insert the inlined constants right after the trait uses, before other members
                $insertPosition = $this->findInsertionPoint($node);
                array_splice($node->stmts, $insertPosition, 0, $clonedForInsertion);
            }

            // We only care about the Projected class
            return NodeTraverser::STOP_TRAVERSAL;
        }

        return null;
    }

    /**
     * @return ClassConst[]
     */
    private function collectAllChunkConstants(Class_ $projectedClass): array
    {
        $collected = [];

        foreach ($projectedClass->stmts as $stmt) {
            if ($stmt instanceof TraitUse) {
                foreach ($stmt->traits as $traitName) {
                    $traitShortName = $traitName->getLast();
                    if (str_starts_with($traitShortName, 'ProjectedConstantsChunk')) {
                        $chunkFile = $this->resolveChunkFilePath($traitShortName);
                        if ($chunkFile && file_exists($chunkFile)) {
                            $collected = array_merge($collected, $this->parseConstantsFromChunkFile($chunkFile));
                        }
                    }
                }
            }
        }

        return $collected;
    }

    private function resolveChunkFilePath(string $traitShortName): ?string
    {
        // The chunk traits live in the same directory as Projected.php
        $projectedPath = $this->sourceDir . '/CoordinateReferenceSystem/Projected.php';
        $dir = dirname($projectedPath);

        return $dir . '/' . $traitShortName . '.php';
    }

    /**
     * @return ClassConst[]
     */
    private function parseConstantsFromChunkFile(string $filePath): array
    {
        $parser = (new ParserFactory())->createForNewestSupportedVersion();
        $oldStmts = $parser->parse(file_get_contents($filePath));

        // Clone the AST so we have independent nodes to insert elsewhere
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new CloningVisitor());
        $stmts = $traverser->traverse($oldStmts);

        $constants = [];

        foreach ($stmts as $stmt) {
            if ($stmt instanceof Namespace_) {
                foreach ($stmt->stmts as $nsStmt) {
                    if ($nsStmt instanceof Trait_) {
                        foreach ($nsStmt->stmts as $traitStmt) {
                            if ($traitStmt instanceof ClassConst) {
                                // Only take EPSG_ constants
                                if (isset($traitStmt->consts[0])
                                    && str_starts_with($traitStmt->consts[0]->name->name, 'EPSG')) {
                                    $constants[] = $traitStmt;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $constants;
    }

    private function findInsertionPoint(Class_ $class): int
    {
        // Insert after all trait uses, before properties/methods
        foreach ($class->stmts as $i => $stmt) {
            if (!$stmt instanceof TraitUse) {
                return $i;
            }
        }

        return count($class->stmts);
    }
}

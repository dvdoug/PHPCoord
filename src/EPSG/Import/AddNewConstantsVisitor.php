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
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

use function explode;
use function str_replace;
use function trim;
use function wordwrap;
use function ucfirst;
use function array_unique;
use function array_map;
use function rtrim;
use function implode;
use function preg_match;
use function array_splice;
use function count;
use function ltrim;
use function str_starts_with;

class AddNewConstantsVisitor extends NodeVisitorAbstract
{
    private array $constants;

    private string $visibility;

    private array $aliases;

    private array $canonicalNames;

    public function __construct(array $constants, string $visibility, array $canonicalNames, array $aliases)
    {
        $this->constants = $constants;
        $this->visibility = $visibility;
        $this->aliases = $aliases;
        $this->canonicalNames = $canonicalNames;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof ClassLike) {
            $commentNodes = [];

            foreach ($this->constants as $urn => $data) {
                $constName = $this->canonicalNames[$urn];
                $name = str_replace(
                    [
                        'UoM: degree',
                        'UoM: grads',
                        'UoM: ft(Br36)',
                        'UoM: ftSe',
                        'UoM: ftGC',
                        'UoM: ftCla',
                        'UoM: ftUS',
                        'UoM: ft',
                        'UoM: km',
                        'UoM: m.',
                        'UoM: chBnB',
                        'UoM: chSe(T)',
                        'UoM: chSe',
                        'UoM: lkCla',
                        'UoM: lk',
                        'UoM: ydCl',
                        'UoM: ydInd',
                        'UoM: ydSe',
                        'UoM: GLM',
                        '_LOWERCASE',
                    ],
                    [
                        'Units: degree',
                        'Units: grads',
                        'Units: British foot (1936)',
                        'Units: British foot (Sears 1922)',
                        'Units: Gold Coast foot',
                        'Units: Clarke\'s foot',
                        'Units: foot (US)',
                        'Units: foot',
                        'Units: kilometre',
                        'Units: metre',
                        'Units: British chain (Benoit 1895 B)',
                        'Units: British chain (Sears 1922 truncated)',
                        'Units: British chain (Sears 1922)',
                        'Units: Clarke\'s link',
                        'Units: link',
                        'Units: Clarke\'s yard',
                        'Units: Indian yard',
                        'Units: British yard (Sears 1922)',
                        'Units: German legal metre',
                        '',
                    ],
                    $data['name']
                );

                $comment = '';
                $data['constant_help'] = str_replace(
                    [
                        'See information source for formula and example.',
                        'This is a parameter-less conversion.',
                        "\r\n",
                    ],
                    [
                        '',
                        '',
                        "\n",
                    ],
                    $data['constant_help']
                );

                $helpLines = $this->parseHelpLines($data['constant_help']);

                $bodyLines = [ucfirst(trim($name))];
                if (isset($data['type']) && $data['type']) {
                    $bodyLines[] = 'Type: ' . ucfirst(trim($data['type']));
                }
                if (isset($data['extent_description']) && $data['extent_description']) {
                    $data['extent_description'] = array_unique(explode('|', $data['extent_description']));
                    $data['extent_description'] = array_map(static fn (string $extentDescription) => rtrim($extentDescription, '.'), $data['extent_description']);
                    $data['extent_description'] = implode(', ', $data['extent_description']);
                    $extentLines = explode("\n", wordwrap('Extent: ' . $data['extent_description'], 112));
                    foreach ($extentLines as $extentLine) {
                        $bodyLines[] = trim($extentLine);
                    }
                }
                foreach ($helpLines as $helpLine) {
                    $bodyLines[] = $helpLine;
                }

                $comment .= "/**\n";
                $lastBodyLineIndex = $this->findLastNonEmptyBodyLineIndex($bodyLines);
                foreach ($bodyLines as $bodyLineIndex => $bodyLine) {
                    if ($bodyLine === '') {
                        $comment .= " *\n";
                        continue;
                    }

                    $comment .= ' * ' . $this->formatPhpDocSummaryLine(
                        $bodyLine,
                        $bodyLineIndex === $lastBodyLineIndex
                    ) . "\n";
                }
                if ($data['deprecated']) {
                    if ($lastBodyLineIndex !== null && $helpLines === []) {
                        $comment .= " *\n";
                    }
                    $comment .= " * @deprecated\n";
                }
                $comment .= ' */';

                $constValue = new Node\Scalar\String_($urn);
                $constComment = new Doc($comment);
                $const = new Node\Const_($constName, $constValue);

                $flags = Class_::MODIFIER_PUBLIC;
                if ($this->visibility === 'protected') {
                    $flags = Class_::MODIFIER_PROTECTED;
                }

                $constStmt = new ClassConst([$const], $flags);
                $constStmt->setDocComment($constComment);
                $commentNodes[] = $constStmt;
            }

            foreach ($this->aliases as $urn => $oldConstNames) {
                if (!isset($this->constants[$urn]['name'])) {
                    continue;
                }
                $canonicalConstName = $this->canonicalNames[$urn];

                foreach ($oldConstNames as $oldConstName) {
                    // Skip if this would duplicate the canonical
                    if ($oldConstName === $canonicalConstName) {
                        continue;
                    }

                    $comment = "/**\n";
                    $comment .= ' * @deprecated use ' . $canonicalConstName . " instead\n";
                    $comment .= ' */';

                    $constValue = new Node\Scalar\String_($urn);
                    $constComment = new Doc($comment);
                    $const = new Node\Const_($oldConstName, $constValue);

                    $flags = Class_::MODIFIER_PUBLIC;
                    if ($this->visibility === 'protected') {
                        $flags = Class_::MODIFIER_PROTECTED;
                    }

                    $constStmt = new ClassConst([$const], $flags);
                    $constStmt->setDocComment($constComment);
                    $commentNodes[] = $constStmt;
                }
            }

            $insertAt = $this->findInsertionPoint($node);
            array_splice($node->stmts, $insertAt, 0, $commentNodes);

            return NodeTraverser::STOP_TRAVERSAL;
        }

        return null;
    }

    private function findInsertionPoint(ClassLike $class): int
    {
        foreach ($class->stmts as $i => $stmt) {
            if (!$stmt instanceof TraitUse) {
                return $i;
            }
        }

        return count($class->stmts);
    }

    /**
     * @return string[]
     */
    private function parseHelpLines(string $help): array
    {
        $help = str_replace("\r\n", "\n", trim($help));
        if ($help === '') {
            return [];
        }

        $lines = [];
        foreach (explode("\n", $help) as $line) {
            if (trim($line) === '') {
                $lines[] = '';
                continue;
            }

            foreach (explode("\n", wordwrap(trim($line), 112)) as $wrappedLine) {
                $lines[] = str_replace("\u{00A0}", ' ', rtrim($wrappedLine));
            }
        }

        for ($i = 0, $lineCount = count($lines); $i < $lineCount - 1; ++$i) {
            if ($lines[$i] === '' || $lines[$i + 1] === '') {
                continue;
            }

            if (str_starts_with(ltrim($lines[$i + 1]), '@') && !preg_match('/[.!?]$/', $lines[$i])) {
                $lines[$i] .= '.';
            }
        }

        return $lines;
    }

    /**
     * @param string[] $bodyLines
     */
    private function findLastNonEmptyBodyLineIndex(array $bodyLines): ?int
    {
        for ($i = count($bodyLines) - 1; $i >= 0; --$i) {
            if ($bodyLines[$i] !== '') {
                return $i;
            }
        }

        return null;
    }

    private function formatPhpDocSummaryLine(string $line, bool $ensurePeriod): string
    {
        if (!$ensurePeriod || preg_match('/[.!?]$/', $line)) {
            return $line;
        }

        return $line . '.';
    }
}

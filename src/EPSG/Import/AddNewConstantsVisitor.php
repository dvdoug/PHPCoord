<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use Composer\Pcre\Preg;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

use function array_unshift;
use function explode;
use function str_replace;
use function strtoupper;
use function trim;
use function wordwrap;
use function ucfirst;

class AddNewConstantsVisitor extends NodeVisitorAbstract
{
    private array $constants;

    private string $visibility;

    private array $aliases;

    public function __construct(array $constants, string $visibility, array $aliases)
    {
        $this->constants = $constants;
        $this->visibility = $visibility;
        $this->aliases = $aliases;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof ClassLike) {
            $commentNodes = [];

            foreach ($this->constants as $urn => $data) {
                $constantName = str_replace(
                    [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                    ['_', '_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                    $data['name']
                );
                $constantName = Preg::replace('/_+/', '_', $constantName);
                $constantName = trim($constantName, '_');
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

                $comment .= "/**\n";
                $comment .= '* ' . ucfirst(trim($name)) . "\n";
                if (isset($data['type']) && $data['type']) {
                    $comment .= '* Type: ' . ucfirst(trim($data['type'])) . "\n";
                }
                if (isset($data['extent_description']) && $data['extent_description']) {
                    $extentLines = explode("\n", wordwrap('Extent: ' . $data['extent_description'], 112));
                    foreach ($extentLines as $extentLine) {
                        $comment .= '* ' . trim($extentLine) . "\n";
                    }
                }
                $helpLines = explode("\n", wordwrap(trim($data['constant_help']), 112));
                foreach ($helpLines as $helpLine) {
                    $comment .= '* ' . trim($helpLine) . "\n";
                }
                if ($data['deprecated']) {
                    $comment .= "* @deprecated\n";
                }
                $comment .= " */\n";

                $constName = strtoupper('EPSG_' . $constantName);
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

            foreach ($this->aliases as $urn => $aliases) {
                foreach ($aliases as $alias) {
                    $canonicalName = str_replace(
                        [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                        ['_', '_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                        $this->constants[$urn]['name']
                    );
                    $canonicalName = Preg::replace('/_+/', '_', $canonicalName);
                    $canonicalName = trim($canonicalName, '_');
                    $name = str_replace(
                        [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                        ['_', '_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                        $alias
                    );
                    $name = Preg::replace('/_+/', '_', $name);
                    $name = trim($name, '_');

                    $comment = "/**\n";
                    $comment .= '* @deprecated use ' . strtoupper('EPSG_' . $canonicalName) . " instead\n";
                    $comment .= " */\n";

                    $constName = strtoupper('EPSG_' . $name);
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
            }

            array_unshift($node->stmts, ...$commentNodes);

            return NodeTraverser::STOP_TRAVERSAL;
        }

        return null;
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_unshift;
use function explode;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use function preg_replace;
use function str_replace;
use function strtoupper;
use function trim;
use function wordwrap;

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
                $name = str_replace(
                    [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                    ['_', '_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                    $data['name']
                );
                $name = preg_replace('/_+/', '_', $name);
                $name = trim($name, '_');

                $comment = '';
                if ($data['constant_help'] || $data['deprecated']) {
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
                    $helpLines = explode("\n", wordwrap($data['constant_help'], 112));
                    foreach ($helpLines as $helpLine) {
                        $comment .= '* ' . trim($helpLine) . "\n";
                    }
                    if ($data['deprecated']) {
                        $comment .= "* @deprecated\n";
                    }
                    $comment .= " */\n";
                }

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

            foreach ($this->aliases as $urn => $aliases) {
                foreach ($aliases as $alias) {
                    $canonicalName = str_replace(
                        [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                        ['_', '_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                        $this->constants[$urn]['name']
                    );
                    $canonicalName = preg_replace('/_+/', '_', $canonicalName);
                    $canonicalName = trim($canonicalName, '_');
                    $name = str_replace(
                        [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                        ['_', '_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                        $alias
                    );
                    $name = preg_replace('/_+/', '_', $name);
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

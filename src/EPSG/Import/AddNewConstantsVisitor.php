<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_merge;
use function explode;
use function is_string;
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

    public function __construct(array $constants, string $visibility)
    {
        $this->constants = $constants;
        $this->visibility = $visibility;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof ClassLike) {
            $commentNodes = [];

            foreach ($this->constants as $row) {
                $name = str_replace(
                    [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                    ['_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                    $row['constant_name']
                );
                $name = preg_replace('/_+/', '_', $name);
                $name = trim($name, '_');

                $comment = '';
                if ($row['constant_help'] || $row['deprecated']) {
                    $row['constant_help'] = str_replace(
                        [
                            'See information source for formula and example.',
                            'This is a parameter-less conversion.',
                        ],
                        [
                            '',
                            '',
                        ],
                        $row['constant_help']
                    );

                    $comment .= "/**\n";
                    $helpLines = explode("\n", wordwrap($row['constant_help'], 112));
                    foreach ($helpLines as $helpLine) {
                        $comment .= '* ' . trim($helpLine) . "\n";
                    }
                    if ($row['deprecated']) {
                        $comment .= "* @deprecated\n";
                    }
                    $comment .= " */\n";
                }

                $constName = strtoupper('EPSG_' . $name);
                $constValue = is_string($row['constant_value']) ? new Node\Scalar\String_($row['constant_value']) : new Node\Scalar\LNumber($row['constant_value']);
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

            $node->stmts = array_merge($commentNodes, $node->stmts);

            return NodeTraverser::STOP_TRAVERSAL;
        }

        return null;
    }
}

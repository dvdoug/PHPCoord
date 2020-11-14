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
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use SQLite3Result;

class AddNewConstantsVisitor extends NodeVisitorAbstract
{
    /**
     * @var SQLite3Result
     */
    private $constants;

    public function __construct(SQLite3Result $constants)
    {
        $this->constants = $constants;
    }

    public function enterNode(Node $node)
    {
        if ($node instanceof ClassLike) {
            $commentNodes = [];

            while ($row = $this->constants->fetchArray(SQLITE3_ASSOC)) {
                $name = str_replace(
                    [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&', '<>'],
                    ['_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_', '_TO_'],
                    $row['constant_name']
                );
                $name = preg_replace('/_+/', '_', $name);
                $name = trim($name, '_');

                $comment = '';
                if ($row['constant_help'] || $row['deprecated']) {
                    $comment .= "/**\n";
                    $helpLines = explode("\n", trim(wordwrap($row['constant_help'], 112)));
                    foreach ($helpLines as $helpLine) {
                        $comment .= '* ' . $helpLine . "\n";
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

                $constStmt = new ClassConst([$const], Class_::MODIFIER_PUBLIC);
                $constStmt->setDocComment($constComment);
                $commentNodes[] = $constStmt;
            }

            $node->stmts = array_merge($commentNodes, $node->stmts);

            return NodeTraverser::STOP_TRAVERSAL;
        }

        return null;
    }
}

<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use PhpParser\PrettyPrinter\Standard;

class ASTPrettyPrinter extends Standard
{
    protected function pExpr_Array(Array_ $node): string
    {
        if ($node->getAttribute('printMultiline', true)) {
            return '[' . $this->pCommaSeparatedMultiline($node->items, true) . $this->nl . ']';
        }

        return '[' . $this->pCommaSeparated($node->items) . ']';
    }

    protected function pStmt_ClassConst(ClassConst $node): string
    {
        return parent::pStmt_ClassConst($node) . "\n";
    }

    protected function pStmt_Property(Property $node): string
    {
        return parent::pStmt_Property($node) . "\n";
    }

    protected function pStmt_ClassMethod(ClassMethod $node): string
    {
        return parent::pStmt_ClassMethod($node) . "\n";
    }
}

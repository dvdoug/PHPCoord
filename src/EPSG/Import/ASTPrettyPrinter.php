<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Nop;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\PrettyPrinter\Standard;

use function addcslashes;
use function explode;
use function implode;
use function rtrim;
use function str_contains;
use function str_repeat;
use function str_replace;

class ASTPrettyPrinter extends Standard
{
    protected function pExpr_Array(Array_ $node): string
    {
        if ($node->getAttribute('printMultiline', true)) {
            return '[' . $this->pCommaSeparatedMultiline($node->items, true) . $this->nl . ']';
        }

        return '[' . $this->pCommaSeparated($node->items) . ']';
    }

    protected function pStmt_Declare(Declare_ $node): string
    {
        return 'declare(' . $this->pCommaSeparated($node->declares) . ')'
            . (null !== $node->stmts ? ' {' . $this->pStmts($node->stmts) . $this->nl . '}' : ';');
    }

    protected function pExpr_ArrowFunction(ArrowFunction $node, int $precedence, int $lhsPrecedence): string
    {
        return $this->pPrefixOp(
            ArrowFunction::class,
            $this->pAttrGroups($node->attrGroups, true)
            . $this->pStatic($node->static)
            . 'fn' . ($node->byRef ? '&' : '') . ' '
            . '(' . $this->pParams($node->params) . ')'
            . ($node->returnType ? ': ' . $this->p($node->returnType) : '')
            . ' => ',
            $node->expr,
            $precedence,
            $lhsPrecedence
        );
    }

    protected function pComments(array $comments): string
    {
        $formattedComments = [];

        foreach ($comments as $comment) {
            $text = rtrim(str_replace("\r\n", "\n", $comment->getReformattedText()), "\n");
            $formattedComments[] = str_replace("\n", $this->nl, $text);
        }

        return implode($this->nl, $formattedComments);
    }

    protected function pStmts(array $nodes, bool $indent = true): string
    {
        if ($indent) {
            $this->indent();
        }

        $result = '';
        $previousNode = null;

        foreach ($nodes as $node) {
            $extraBlankLines = $this->getExtraBlankLinesBefore($previousNode, $node);

            if ($extraBlankLines > 0) {
                $result .= str_repeat($this->newline, $extraBlankLines);
            }

            $comments = $node->getComments();
            if ($comments) {
                $result .= $this->nl . $this->pComments($comments);
                if ($node instanceof Nop) {
                    $previousNode = $node;
                    continue;
                }

                $result .= $this->nl . $this->p($node);
            } else {
                $result .= $this->nl . $this->p($node);
            }

            $previousNode = $node;
        }

        if ($indent) {
            $this->outdent();
        }

        return $result;
    }

    public function prettyPrintFile(array $stmts): string
    {
        return rtrim(parent::prettyPrintFile($stmts), "\r\n") . "\n";
    }

    protected function pScalar_String(String_ $node): string
    {
        if (!str_contains($node->value, "\u{00A0}")) {
            return parent::pScalar_String($node);
        }

        $placeholder = "\x00";
        $normalized = str_replace("\u{00A0}", $placeholder, $node->value);

        if (str_contains($normalized, "\n")) {
            $result = '"';
            foreach (explode("\n", $normalized) as $lineIndex => $line) {
                if ($lineIndex > 0) {
                    $result .= $this->newline;
                }
                $escaped = addcslashes($line, "\r\t\f\v\$\"" . '\\');
                $result .= str_replace($placeholder, '\\u{a0}', $escaped);
            }

            return $result . '"';
        }

        $escaped = addcslashes($normalized, "\n\r\t\f\v\$\"" . '\\');
        $escaped = str_replace($placeholder, '\\u{a0}', $escaped);

        return '"' . $escaped . '"';
    }

    private function getExtraBlankLinesBefore(?Node $previousNode, Node $node): int
    {
        if (!$previousNode) {
            return 0;
        }

        $extra = 0;

        if ($previousNode instanceof Declare_ && $node instanceof Stmt\Namespace_) {
            ++$extra;
        }

        if ($previousNode instanceof Use_ && $node instanceof Use_) {
            if ($this->getUseImportKind($previousNode) !== $this->getUseImportKind($node)) {
                ++$extra;
            }
        }

        if ($previousNode instanceof Use_ && ($node instanceof Class_ || $node instanceof Trait_ || $node instanceof Interface_)) {
            ++$extra;
        }

        if ($this->needsSeparatedClassMemberBlankLine($previousNode, $node)) {
            ++$extra;
        }

        if ($node instanceof Return_ && $previousNode instanceof Stmt && !$previousNode instanceof Return_) {
            ++$extra;
        }

        return $extra;
    }

    private function isSeparatedClassMember(Node $node): bool
    {
        return $node instanceof ClassConst
            || $node instanceof Property
            || $node instanceof ClassMethod;
    }

    private function needsSeparatedClassMemberBlankLine(Node $previousNode, Node $node): bool
    {
        if (!$this->isSeparatedClassMember($previousNode) || !$this->isSeparatedClassMember($node)) {
            return false;
        }

        if ($previousNode::class === $node::class) {
            return true;
        }

        if ($previousNode instanceof ClassConst && $node instanceof Property) {
            if ($this->getPropertyName($node) === 'sridData') {
                return true;
            }

            return !$this->isDeprecatedAliasConst($previousNode);
        }

        if ($previousNode instanceof Property && $node instanceof ClassConst) {
            return true;
        }

        if ($previousNode instanceof Property && $node instanceof ClassMethod) {
            return true;
        }

        if ($previousNode instanceof ClassConst && $node instanceof ClassMethod) {
            return true;
        }

        return false;
    }

    private function getPropertyName(Property $property): string
    {
        return $property->props[0]->name->name ?? '';
    }

    private function isDeprecatedAliasConst(ClassConst $const): bool
    {
        $doc = $const->getDocComment()?->getText() ?? '';

        return str_contains($doc, '@deprecated') && !str_contains($doc, 'Extent:') && !str_contains($doc, 'Type:');
    }

    private function getUseImportKind(Use_ $use): string
    {
        return match ($use->type) {
            Use_::TYPE_FUNCTION => 'function',
            Use_::TYPE_CONSTANT => 'const',
            default => 'class',
        };
    }
}

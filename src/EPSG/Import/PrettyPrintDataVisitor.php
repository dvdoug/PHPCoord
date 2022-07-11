<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function in_array;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class PrettyPrintDataVisitor extends NodeVisitorAbstract
{
    protected $multiLine = true;

    protected $singleLineKeys = ['extent_code'];

    public function enterNode(Node $node)
    {
        if ($node instanceof Node\Expr\ArrayItem) {
            if ($node->key && in_array($node->key->value, $this->singleLineKeys, true)) {
                $this->multiLine = false;
            }
        }
        $node->setAttribute('printMultiline', $this->multiLine);

        return null;
    }

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Expr\ArrayItem) {
            if ($node->key && in_array($node->key->value, $this->singleLineKeys, true)) {
                $this->multiLine = true;
            }
        }

        return null;
    }
}

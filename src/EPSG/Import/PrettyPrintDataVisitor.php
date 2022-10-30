<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

use function in_array;

class PrettyPrintDataVisitor extends NodeVisitorAbstract
{
    protected $multiLine = true;

    protected $singleLineKeys = ['extent'];

    public function enterNode(Node $node)
    {
        if ($node instanceof Node\Expr\ArrayItem) {
            if ($node->key && isset($node->key->value) && in_array($node->key->value, $this->singleLineKeys, true)) {
                $this->multiLine = false;
            }
        }
        $node->setAttribute('printMultiline', $this->multiLine);

        return null;
    }

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Expr\ArrayItem) {
            if ($node->key && isset($node->key->value) && in_array($node->key->value, $this->singleLineKeys, true)) {
                $this->multiLine = true;
            }
        }

        return null;
    }
}

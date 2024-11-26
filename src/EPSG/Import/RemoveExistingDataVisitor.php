<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use PhpParser\NodeVisitorAbstract;

class RemoveExistingDataVisitor extends NodeVisitorAbstract
{
    private bool $hasSeenExistingData = false;

    public function leaveNode(Node $node)
    {
        if ($node instanceof Property) {
            if ($node->props[0]->name->name === 'sridData') {
                $this->hasSeenExistingData = true;
                $node->props[0]->default = new Node\Expr\Array_();
            }
        }

        return null;
    }

    public function hasSeenExistingData(): bool
    {
        return $this->hasSeenExistingData;
    }
}

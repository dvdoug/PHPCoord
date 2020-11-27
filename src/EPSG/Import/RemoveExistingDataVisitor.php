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
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

class RemoveExistingDataVisitor extends NodeVisitorAbstract
{
    public function leaveNode(Node $node)
    {
        if ($node instanceof Property) {
            if ($node->props[0]->name->name === 'sridData') {
                return NodeTraverser::REMOVE_NODE;
            }
        }

        return null;
    }
}

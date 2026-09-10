<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\Node;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

use function str_starts_with;

class RemoveExistingConstantsVisitor extends NodeVisitorAbstract
{
    /**
     * @var array<string, string> constantName => urn
     */
    private array $collectedConstants = [];

    public function leaveNode(Node $node)
    {
        if ($node instanceof ClassConst) {
            if (str_starts_with($node->consts[0]->name->name, 'EPSG')) {
                $this->collectedConstants[$node->consts[0]->name->name] = $node->consts[0]->value->value;

                return NodeTraverser::REMOVE_NODE;
            }
        }

        return null;
    }

    /**
     * @return array<string, string>
     */
    public function getCollectedConstants(): array
    {
        return $this->collectedConstants;
    }
}

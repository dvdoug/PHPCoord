<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PhpParser\BuilderFactory;
use PhpParser\BuilderHelpers;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Property;
use PhpParser\NodeVisitorAbstract;

use function array_unshift;
use function ksort;
use function str_replace;
use function array_unique;
use function explode;
use function array_map;
use function rtrim;
use function implode;

use const SORT_NATURAL;

class AddNewDataVisitor extends NodeVisitorAbstract
{
    private bool $hasExistingData;

    private array $data;

    public function __construct(bool $hasExistingData, array $data)
    {
        $this->hasExistingData = $hasExistingData;
        $this->data = $data;
        foreach ($this->data as &$dataRow) {
            if (isset($dataRow['constant_help'])) {
                $dataRow['help'] = $dataRow['constant_help'];
            }
            unset($dataRow['constant_help']);
            unset($dataRow['deprecated']);
            unset($dataRow['doc_help']);
            unset($dataRow['method_name']);
            unset($dataRow['extent_description']);
            if (isset($dataRow['name'])) {
                $dataRow['name'] = str_replace('_LOWERCASE', '', $dataRow['name']);
            }
            if (isset($dataRow['extent_name'])) {
                $dataRow['extent_name'] = array_unique(explode('|', $dataRow['extent_name']));
                $dataRow['extent_name'] = array_map(fn (string $extentName) => rtrim($extentName, '.'), $dataRow['extent_name']);
                $dataRow['extent_name'] = implode(', ', $dataRow['extent_name']);
            }
        }
        ksort($this->data, SORT_NATURAL);
    }

    public function enterNode(Node $node)
    {
        if ($this->hasExistingData) {
            if ($node instanceof Property) {
                if ($node->props[0]->name->name === 'sridData') {
                    $node->props[0]->default = BuilderHelpers::normalizeValue($this->data);
                }
            }
        } else {
            $factory = new BuilderFactory();
            if ($node instanceof ClassLike) {
                $property = $factory->property('sridData')->makeProtected()->makeStatic()->setType('array')->setDefault($this->data)->setDocComment('/** @var array<string, mixed[]> */');
                $propertyNode = $property->getNode();
                array_unshift($node->stmts, $propertyNode);
            }
        }

        return null;
    }
}

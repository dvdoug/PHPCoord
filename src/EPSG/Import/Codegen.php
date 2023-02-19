<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateOperation\CoordinateOperations;
use PHPCoord\CoordinateOperation\CRSTransformationsAfrica;
use PHPCoord\CoordinateOperation\CRSTransformationsAntarctic;
use PHPCoord\CoordinateOperation\CRSTransformationsArctic;
use PHPCoord\CoordinateOperation\CRSTransformationsAsia;
use PHPCoord\CoordinateOperation\CRSTransformationsEurope;
use PHPCoord\CoordinateOperation\CRSTransformationsGlobal;
use PHPCoord\CoordinateOperation\CRSTransformationsNorthAmerica;
use PHPCoord\CoordinateOperation\CRSTransformationsOceania;
use PHPCoord\CoordinateOperation\CRSTransformationsSouthAmerica;
use PHPCoord\CoordinateOperation\GridProvider;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\Geometry\Extents\ExtentMap;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;
use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Config;
use PhpCsFixer\Console\ConfigurationResolver;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\ToolInfo;
use PhpParser\Lexer\Emulative;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\Parser\Php7;
use ReflectionClass;
use SplFileInfo;
use ReflectionClassConstant;

use function array_flip;
use function array_reverse;
use function dirname;
use function fclose;
use function file_get_contents;
use function file_put_contents;
use function fopen;
use function fwrite;
use function str_repeat;
use function str_replace;
use function strlen;
use function strtolower;
use function trim;
use function ucfirst;
use function uasort;
use function implode;
use function asort;
use function array_map;
use function class_exists;
use function str_ends_with;

use const PHP_EOL;

class Codegen
{
    private string $sourceDir;

    public function __construct()
    {
        $this->sourceDir = dirname(__DIR__, 2);
    }

    public function updateFileConstants(string $fileName, array $data, string $visibility, array $aliases): void
    {
        echo "Updating constants in {$fileName}...";

        $lexer = new Emulative(
            [
                'usedAttributes' => [
                    'comments',
                    'startLine', 'endLine',
                    'startTokenPos', 'endTokenPos',
                ],
            ]
        );
        $parser = new Php7($lexer);

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new CloningVisitor());

        $oldStmts = $parser->parse(file_get_contents($fileName));
        $oldTokens = $lexer->getTokens();

        $newStmts = $traverser->traverse($oldStmts);

        /*
         * First remove all existing EPSG consts
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new RemoveExistingConstantsVisitor());
        $newStmts = $traverser->traverse($newStmts);

        /*
         * Then add the ones wanted
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new AddNewConstantsVisitor($data, $visibility, $aliases));
        $newStmts = $traverser->traverse($newStmts);

        $prettyPrinter = new ASTPrettyPrinter();
        file_put_contents($fileName, $prettyPrinter->printFormatPreserving($newStmts, $oldStmts, $oldTokens));
        $this->csFixFile($fileName);
        echo 'done' . PHP_EOL;
    }

    public function updateFileData(string $fileName, array $data): void
    {
        echo "Updating data in {$fileName}...";

        $lexer = new Emulative(
            [
                'usedAttributes' => [
                    'comments',
                    'startLine', 'endLine',
                    'startTokenPos', 'endTokenPos',
                ],
            ]
        );
        $parser = new Php7($lexer);

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new CloningVisitor());

        $oldStmts = $parser->parse(file_get_contents($fileName));
        $oldTokens = $lexer->getTokens();

        $newStmts = $traverser->traverse($oldStmts);

        /*
         * First remove all existing EPSG consts
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new RemoveExistingDataVisitor());
        $newStmts = $traverser->traverse($newStmts);

        /*
         * Then add the ones wanted
         */
        if ($data) {
            $traverser = new NodeTraverser();
            $traverser->addVisitor(new AddNewDataVisitor($data));
            $traverser->addVisitor(new PrettyPrintDataVisitor());
            $newStmts = $traverser->traverse($newStmts);
        }

        $prettyPrinter = new ASTPrettyPrinter();
        file_put_contents($fileName, $prettyPrinter->printFormatPreserving($newStmts, $oldStmts, $oldTokens));
        $this->csFixFile($fileName);
        echo 'done' . PHP_EOL;
    }

    public function csFixFile(string $fileName): void
    {
        /** @var Config $config */
        $config = require __DIR__ . '/../../../.php-cs-fixer.dist.php';

        $resolver = new ConfigurationResolver(
            $config,
            [],
            dirname($this->sourceDir),
            new ToolInfo()
        );

        $file = new SplFileInfo($fileName);
        $old = file_get_contents($fileName);
        $fixers = $resolver->getFixers();

        $tokens = Tokens::fromCode($old);

        foreach ($fixers as $fixer) {
            if (
                !$fixer instanceof AbstractFixer &&
                (!$fixer->supports($file) || !$fixer->isCandidate($tokens))
            ) {
                continue;
            }

            $fixer->fix($file, $tokens);

            if ($tokens->isChanged()) {
                $tokens->clearEmptyTokens();
                $tokens->clearChanged();
            }
        }

        $new = $tokens->generateCode();

        if ($old !== $new) {
            file_put_contents($fileName, $new);
        }
    }

    public function updateDocs(string $class, array $data): void
    {
        echo "Updating docs for {$class}...";

        $file = fopen($this->sourceDir . '/../docs/reflection/' . str_replace('phpcoord/', '', str_replace('\\', '/', strtolower($class))) . '.txt', 'wb');
        $reflectionClass = new ReflectionClass($class);
        $constants = array_flip(array_reverse($reflectionClass->getConstants(ReflectionClassConstant::IS_PUBLIC))); // make sure aliases are overridden with current

        uasort($data, fn ($a, $b) => $a['name'] <=> $b['name']);

        foreach ($data as $urn => $row) {
            $name = ucfirst(trim($row['name']));
            $name = str_replace('_LOWERCASE', '', $name);
            $name = str_replace(
                [
                    'UoM: degree',
                    'UoM: grads',
                    'UoM: ft(Br36)',
                    'UoM: ftSe',
                    'UoM: ftGC',
                    'UoM: ftCla',
                    'UoM: ftUS',
                    'UoM: ft',
                    'UoM: km',
                    'UoM: m.',
                    'UoM: chBnB',
                    'UoM: chSe(T)',
                    'UoM: chSe',
                    'UoM: lkCla',
                    'UoM: lk',
                    'UoM: ydCl',
                    'UoM: ydInd',
                    'UoM: ydSe',
                    'UoM: GLM',
                ],
                [
                    'Units: degree',
                    'Units: grads',
                    'Units: British foot (1936)',
                    'Units: British foot (Sears 1922)',
                    'Units: Gold Coast foot',
                    'Units: Clarke\'s foot',
                    'Units: foot (US)',
                    'Units: foot',
                    'Units: kilometre',
                    'Units: metre',
                    'Units: British chain (Benoit 1895 B)',
                    'Units: British chain (Sears 1922 truncated)',
                    'Units: British chain (Sears 1922)',
                    'Units: Clarke\'s link',
                    'Units: link',
                    'Units: Clarke\'s yard',
                    'Units: Indian yard',
                    'Units: British yard (Sears 1922)',
                    'Units: German legal metre',
                ],
                $name
            );

            fwrite($file, $name . "\n");
            fwrite($file, str_repeat('-', strlen($name)) . "\n");

            $subhead = '';
            if (isset($row['type']) && $row['type']) {
                $subhead .= '| Type: ' . ucfirst(trim($row['type'])) . "\n";
            }
            if (isset($row['method_name']) && $row['method_name']) {
                $subhead .= '| Method: ' . ucfirst(trim($row['method_name'])) . "\n";
            }
            if (isset($row['extent_description']) && $row['extent_description']) {
                $subhead .= '| Extent: ' . trim($row['extent_description']) . "\n";
            }
            if ($subhead) {
                fwrite($file, $subhead . "\n");
            }

            $invokeClass = $reflectionClass;
            if ($invokeClass->hasMethod('fromSRID') || $invokeClass->hasMethod('makeUnit')) {
                fwrite($file, ".. code-block:: php\n\n");
                do {
                    if ($invokeClass->hasMethod('fromSRID')) {
                        fwrite($file, "    {$invokeClass->getShortName()}::fromSRID({$reflectionClass->getShortName()}::{$constants[$urn]})\n");
                        fwrite($file, "    {$invokeClass->getShortName()}::fromSRID('{$urn}')\n");
                    } elseif ($invokeClass->hasMethod('makeUnit')) {
                        fwrite($file, "    {$invokeClass->getShortName()}::makeUnit(\$measurement, {$reflectionClass->getShortName()}::{$constants[$urn]})\n");
                        fwrite($file, "    {$invokeClass->getShortName()}::makeUnit(\$measurement, '{$urn}')\n");
                    }
                } while ($invokeClass = $invokeClass->getParentClass());
                fwrite($file, "\n");
            } elseif (isset($constants[$urn])) {
                fwrite($file, ".. code-block:: php\n\n");
                fwrite($file, "    {$reflectionClass->getShortName()}::{$constants[$urn]}\n");
                fwrite($file, "    '{$urn}'\n");
                fwrite($file, "\n");
            } elseif ($invokeClass->hasMethod('getOperationData')) {
                fwrite($file, ".. code-block:: php\n\n");
                fwrite($file, "    '{$urn}'\n");
                fwrite($file, "\n");
            }

            if (trim($row['doc_help'])) {
                $help = str_replace("\r\n", "\n", trim($row['doc_help']));
                $help = str_replace("\n", "\n\n", trim($help));
                $help = str_replace('Convert to degrees using algorithm.', '', $help);
                $help = str_replace('Convert to deg using algorithm.', '', $help);
                fwrite($file, "{$help}\n");
            }
            fwrite($file, "\n");
        }

        fclose($file);
        echo 'done' . PHP_EOL;
    }

    public function generateSupportedOperations(): void
    {
        echo 'Updating coordinate conversion list...';

        $extentMap = (new ExtentMap())();
        $transformations = [
            ...CRSTransformationsGlobal::getSupportedTransformations(),
            ...CRSTransformationsAfrica::getSupportedTransformations(),
            ...CRSTransformationsAntarctic::getSupportedTransformations(),
            ...CRSTransformationsArctic::getSupportedTransformations(),
            ...CRSTransformationsAsia::getSupportedTransformations(),
            ...CRSTransformationsEurope::getSupportedTransformations(),
            ...CRSTransformationsNorthAmerica::getSupportedTransformations(),
            ...CRSTransformationsOceania::getSupportedTransformations(),
            ...CRSTransformationsSouthAmerica::getSupportedTransformations(),
        ];

        $docs = [];
        foreach ($transformations as $transformation) {
            $source = CoordinateReferenceSystem::fromSRID($transformation['source_crs']);
            $target = CoordinateReferenceSystem::fromSRID($transformation['target_crs']);
            $operation = CoordinateOperations::getOperationData($transformation['operation']);
            $method = CoordinateOperationMethods::getMethodData($operation['method']);

            $docs[$source::class][$source->getSRID()][$target->getSRID()][] = [$transformation['operation'], false];
            if ($method['reversible']) {
                $docs[$target::class][$target->getSRID()][$source->getSRID()][] = [$transformation['operation'], true];
            }
        }

        foreach ($docs as $sourceCRSType => $crsList) {
            $file = fopen($this->sourceDir . '/../docs/reflection/coordinateoperation/' . str_replace('phpcoord/coordinatereferencesystem/', '', str_replace('\\', '/', strtolower($sourceCRSType))) . '.txt', 'wb');
            $toWriteSourceList = [];
            foreach ($crsList as $sourceCRSSrid => $targetCRSSrids) {
                $sourceCRS = CoordinateReferenceSystem::fromSRID($sourceCRSSrid);
                $sourceCRSReflection = new ReflectionClass($sourceCRS);
                $sourceCRSConstants = array_flip(array_reverse($sourceCRSReflection->getConstants(ReflectionClassConstant::IS_PUBLIC)));
                $toWriteSourceList[$sourceCRS->getName()] = $sourceCRS->getName() . "\n";
                $toWriteSourceList[$sourceCRS->getName()] .= str_repeat('-', strlen($sourceCRS->getName())) . "\n";
                $toWriteSourceList[$sourceCRS->getName()] .= '``' . "{$sourceCRSReflection->getShortName()}::fromSRID({$sourceCRSReflection->getShortName()}::{$sourceCRSConstants[$sourceCRSSrid]})" . '``' . "\n\n";

                $toWriteTargetList = [];
                foreach ($targetCRSSrids as $targetCRSSrid => $operations) {
                    $targetCRS = CoordinateReferenceSystem::fromSRID($targetCRSSrid);
                    $targetCRSReflection = new ReflectionClass($targetCRS);
                    $targetCRSConstants = array_flip(array_reverse($targetCRSReflection->getConstants(ReflectionClassConstant::IS_PUBLIC)));
                    $subHead = 'to ' . $targetCRS->getName() . ' (' . $targetCRSReflection->getShortName() . ')';
                    $toWriteTargetList[$targetCRS->getName()] = $subHead . "\n";
                    $toWriteTargetList[$targetCRS->getName()] .= str_repeat('^', strlen($subHead)) . "\n";

                    $opTable = '.. csv-table::' . "\n";
                    $opTable .= '    :header: "EPSG", "PHPCoord"' . "\n";
                    $opTable .= '    :widths: 40, 60' . "\n\n";
                    foreach ($operations as $operation) {
                        [$operationSrid, $reverse] = $operation;
                        $operation = CoordinateOperations::getOperationData($operationSrid);
                        if ($operation['method'] == CoordinateOperationMethods::EPSG_ALIAS) {
                            continue;
                        }
                        $methodData = CoordinateOperationMethods::getMethodData($operation['method']);
                        $methodName = CoordinateOperationMethods::getFunctionName($operation['method']);
                        $params = CoordinateOperations::getParamData($operationSrid);
                        $extentName = str_replace('"', '″', implode(', ', array_map(fn ($extent) => $extentMap[$extent]['name'], $operation['extent'])));
                        $opTable .= '    "| Name: ' . $operation['name'] . "\n    | Code: ``{$operationSrid}``\n    | Extent: {$extentName}\",";
                        $opTable .= "\".. code-block:: php\n\n        \$point->" . $methodName . '(' . "\n";
                        $docParams = [
                            "to: {$targetCRSReflection->getShortName()}::fromSRID({$targetCRSReflection->getShortName()}::{$targetCRSConstants[$targetCRSSrid]})",
                        ];
                        foreach ($params as $name => $value) {
                            if (str_ends_with($name, 'File') && $value !== null && class_exists($value) && new $value() instanceof GridProvider) {
                                $provider = new ReflectionClass($value);
                                $docParams[] = "{$name}: {$provider->getShortName()}->provideGrid()";
                            } else {
                                if ($reverse && isset($methodData['paramData'][$name]) && $methodData['paramData'][$name]['reverses'] && $value instanceof UnitOfMeasure) {
                                    $value = $value->multiply(-1);
                                }
                                if ($value instanceof Rate) {
                                    $unitClass = new ReflectionClass($value->getChange());
                                    $docParams[] = "{$name}: new Rate(new " . $unitClass->getShortName() . '(' . $value->getValue() . '), new Year(1))';
                                } elseif ($value instanceof UnitOfMeasure) {
                                    $unitClass = new ReflectionClass($value);
                                    $docParams[] = "{$name}: new " . $unitClass->getShortName() . '(' . $value->getValue() . ')';
                                } else {
                                    $docParams[] = "{$name}: '{$value}'";
                                }
                            }
                        }
                        $opTable .= '            ' . implode(",\n            ", $docParams);
                        $opTable .= "\n        )\n\n    \"\n";
                    }
                    $toWriteTargetList[$targetCRS->getName()] .= $opTable . "\n";
                }
                asort($toWriteTargetList);
                $toWriteSourceList[$sourceCRS->getName()] .= implode("\n", $toWriteTargetList);
            }

            asort($toWriteSourceList);
            foreach ($toWriteSourceList as $toWrite) {
                fwrite($file, $toWrite);
            }

            fclose($file);
        }

        echo 'done' . PHP_EOL;
    }
}

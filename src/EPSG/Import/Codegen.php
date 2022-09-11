<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

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
        $constants = array_flip(array_reverse($reflectionClass->getConstants())); // make sure aliases are overridden with current

        foreach ($data as $urn => $row) {
            $name = ucfirst(trim($row['name']));
            $name = str_replace('_LOWERCASE', '', $name);
            fwrite($file, $name . "\n");
            fwrite($file, str_repeat('-', strlen($name)) . "\n\n");

            if (isset($row['type']) && $row['type']) {
                fwrite($file, '| Type: ' . ucfirst($row['type']) . "\n");
            }
            if (isset($row['extent_description']) && $row['extent_description']) {
                fwrite($file, "| Used: {$row['extent_description']}" . "\n");
            }

            fwrite($file, "\n.. code-block:: php\n\n");
            $invokeClass = $reflectionClass;
            do {
                if ($invokeClass->hasMethod('fromSRID')) {
                    fwrite($file, "    {$invokeClass->getShortName()}::fromSRID({$reflectionClass->getShortName()}::{$constants[$urn]})" . "\n");
                    fwrite($file, "    {$invokeClass->getShortName()}::fromSRID('{$urn}')" . "\n");
                } elseif ($invokeClass->hasMethod('makeUnit')) {
                    fwrite($file, "    {$invokeClass->getShortName()}::makeUnit(\$measurement, {$reflectionClass->getShortName()}::{$constants[$urn]})" . "\n");
                    fwrite($file, "    {$invokeClass->getShortName()}::makeUnit(\$measurement, '{$urn}')" . "\n");
                }
            } while ($invokeClass = $invokeClass->getParentClass());
            fwrite($file, "\n");

            if (trim($row['doc_help'])) {
                $help = str_replace("\n", "\n\n", trim($row['doc_help']));
                $help = str_replace('Convert to degrees using algorithm.', '', $help);
                $help = str_replace('Convert to deg using algorithm.', '', $help);
                fwrite($file, "{$help}" . "\n");
            }
            fwrite($file, "\n");
        }

        fclose($file);
        echo 'done' . PHP_EOL;
    }
}

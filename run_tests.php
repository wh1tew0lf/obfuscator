<?php

if (!isset($argv)) {
    echo '<pre>';
}

$test = isset($_GET['test']) ? $_GET['test'] : false;

$testsDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR;

require_once 'obfuscator.class.php';
if (is_dir($testsDir)) {
    if (false !== ($files = scandir($testsDir))) {
        foreach ($files as &$file) {
            if (preg_match('/^test_([0-9]+)\.php$/', $file, $matches) && (!is_numeric($test) || strstr($file, (string)$test))) {
                echo "Run test file '{$file}'\n";
                $resultFile = "{$testsDir}result_{$matches[1]}.php";

                //ob_start();
                obfuscator::clearState();
                obfuscator::loadCode(file_get_contents($testsDir . $file));
                obfuscator::anylize();
                obfuscator::obfuscate();
                //ob_end_clean();

                file_put_contents($resultFile, obfuscator::save());

                if (obfuscator::hasErrors()) {
                    var_dump(obfuscator::$errors);
                }

                ob_start();
                passthru("php -f {$testsDir}{$file}", $originalRet);
                $originalOut = ob_get_clean();

                ob_start();
                passthru("php -f {$resultFile}", $obfuscatedRet);
                $obfuscatedOut = ob_get_clean();

                $testPassed = false;
                if ($originalRet != $obfuscatedRet) {
                    echo "Return values mismatch: {$originalRet} != {$obfuscatedRet}\n";
                } elseif ($originalOut != $obfuscatedOut) {
                    echo "Out mismatch:\nORIGINAL:\n{$originalOut}\n\nOBFUSCATED:\n{$obfuscatedOut}\n";
                } else {
                    $testPassed = true;
                }

                echo $testPassed ? "Test Passed\n" : "\nTest Failed\n";
            }
        }
    } else {
        echo "Can not get files from tests folder\n";
    }
} else {
    echo "Folder with tests can not be open\n";
}
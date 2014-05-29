<?php

$test = isset($_GET['test']) ? (int)$_GET['test'] : false;

$testsDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR;

if (is_dir($testsDir)) {
    if (false !== ($files = scandir($testsDir))) {
        foreach ($files as &$file) {
            if (strstr($file, 'test') && (!is_int($test) || strstr($file, $test))) {
                echo "Run test file '{$file}'\n";
            }
        }
    } else {
        echo "Can not get files from tests folder\n";
    }
} else {
    echo "Folder with tests can not be open\n";
}
<pre><?php

$loader = require_once __DIR__ . "/vendor/autoload.php";

wh1tew0lf\obfuscator\Obfuscator::loadCode('test/sources/test_06.php');
wh1tew0lf\obfuscator\Obfuscator::analyze();
wh1tew0lf\obfuscator\Obfuscator::obfuscate();

echo "ERRORS:\n";
var_dump(wh1tew0lf\obfuscator\Obfuscator::getErrors());

echo nl2br(htmlentities(wh1tew0lf\obfuscator\Obfuscator::getCode()));
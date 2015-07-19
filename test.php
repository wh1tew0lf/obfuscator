<pre><?php

require_once 'obfuscator.class.php';

obfuscator::loadCode('tests/test_06.php');
obfuscator::analyze();
obfuscator::obfuscate();

echo "ERRORS:\n";
var_dump(obfuscator::getErrors());

echo nl2br(htmlentities(obfuscator::getCode()));
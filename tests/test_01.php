<?php
/**
 * Test for variable-names replacement
 */
$variable1 = 'Variable1';

$variable2 = "$variable1 ++";

$variable3 = '$variable1 ++';

for($i = 0; $i < 5; ++$i) {
    echo '.';
}

echo $variable1 . $variable2 . "\n";
echo "{$variable1} and $variable2\n";

$array = array(
    'var1' => $variable1,
    'var2' => $variable2,
    'var3' => $variable3,
);

foreach ($array as $key => $value) {
    echo "[$key] => {{$value}}\n";
}


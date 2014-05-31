<?php

$string1 = 'Test String';

$string2 = "This\tis text\n";

$string3 = "{$string1} AND {$string2}";

$string4 = <<<EOL
    Heredoc text
    $string1
EOL;


$string5 = <<<'EOT'
    Nowdoc text
    $string1
EOT;

$string6 = encode('Encoded string');

$string7 = 'Test' . ' concat';

$string8 = '!!!!' . $string7 . encode('!!!!');

function show($var = 'some text') {
    echo "$var\n";
    $array = array(0 => 'text');
    return isset($array[1]) ? base64_decode($array[1]) : '';
}

function encode($str) {
    return $str;
}

class TheTest {
    public $field1 = 'field1';
    public static $field2 = 'field2';


    public function show($var = 'some text2') {
        echo "$var\n";
    }

    public static function staticShow($var = 'some text3') {
        echo "$var\n";
    }
}

$test = new TheTest();
$test->show($string1);
$test->show($string2);
TheTest::staticShow($string3);
show($string4);
show($string5);
show($string6);
show($string7);
show($string8);

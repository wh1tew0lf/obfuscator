<?php

$var = 0;

function function1() {
    echo "Function1\n";
}

function function2($var) {
    return ++$var;
}

function1();

echo function2(function2($var)) . "\n";


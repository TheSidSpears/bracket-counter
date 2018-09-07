#!/usr/bin/env php
<?php

include_once ('src/BracketCounter.php');

$attributes = getopt('s:');
$expression = array_shift($attributes);

$counter = new BracketCounter();
$result = $counter->validateExpression($expression);
var_dump($result);
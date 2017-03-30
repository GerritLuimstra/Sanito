<?php

require "src/Validator.php";

$passed = \Sanito\Validator::validate([
    'username' => ['teststring' , 'required|bogus'],
    'password' => ['password' , 'required|maxLength:20']
]);

echo $passed;


<?php

require "src/Validator.php";

$passed = \Sanito\Validator::validate([
    'username' => ['teststring' , 'required'],
    'password' => ['password' , 'required|maxLength:32'],
    'email' => ['email@example.com', 'email|required']
]);

echo $passed;


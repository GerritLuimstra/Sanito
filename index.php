<?php

require "src/Validator.php";

$passed = \Sanito\Validator::validate([
    'username' => ['teststring' , 'required'],
    'password' => ['password' , 'string|required|maxLength:32|minLength:8'],
    'email' => ['testerino@mail.com', 'string|email|required']
]);

echo $passed;


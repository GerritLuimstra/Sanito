# Sanito
The lightweight Validator / Sanitizer built using PHP

Usage:

```php
$passed = \Sanito\Validator::validate([
    'username' => ['teststring' , 'required|bogus'],
    'password' => ['password' , 'required|maxLength:20']
]);

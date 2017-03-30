# Sanito
The lightweight Validator / Sanitizer built using PHP

Usage:

```php
$passed = \Sanito\Validator::validate([
    'username' => ['teststring' , 'required'],
    'password' => ['password' , 'required|maxLength:32'],
    'email' => ['email@example.com', 'email|required']
]);

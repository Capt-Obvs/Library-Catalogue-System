<?php
$pass = 'admin';
$password = password_hash($pass, PASSWORD_DEFAULT);
echo $password;
?>
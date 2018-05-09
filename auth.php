<?php
require_once('./user_data.php');

$username = $_POST['username'];
$password = $_POST['password'];


if(isset($user_data[$username]) && $user_data[$username]['password'] === $password){
    echo '<h1>User is Authorized</h1>';
} else {
    echo '<h1>Access Denied</h1>';
}
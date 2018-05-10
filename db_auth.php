<?php
session_start();


require_once('./db_connect.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT `username`, `name`, `user_level` FROM `users` WHERE `username`= '$username' AND `password`= '$password'";

$result = mysqli_query($db, $query);

if(mysqli_num_rows($result)){
    $user = mysqli_fetch_assoc($result);
    echo '<h1>User found</h1>';

    $_SESSION['user'] = $user;

    header('location: /profile.php');
    exit();

    echo '<pre>';
    print_r($user);
    echo '</pre>';

} else {
    header('location: /?auth_error=true');
}

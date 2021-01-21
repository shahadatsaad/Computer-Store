<?php
require_once 'connect.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $login_query = "SELECT concat(fname,' ',lname) as name FROM `user` Where username='$username' AND password='$password'";

    $result = mysqli_query($conn, $login_query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
    } else {
        echo "Your Username or Password is invalid";
    }
} else {
    echo "Please insert Username and Password";
}

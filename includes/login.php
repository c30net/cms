<?php
session_start();
include_once 'db.php';

if (!empty($_POST['username']) && !empty($_POST['password']) && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM `users` WHERE `username` =  '$username'";
    $queryMatch = mysqli_query($connection, $query);
    if (!$queryMatch) {
        die('Query Failed' . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($queryMatch)) {
        $id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
    }

    if ($password !== $user_password) {
        header("Location: ../index.php");
    } elseif ($password === $user_password) {
        $_SESSION['username'] = $username;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['password'] = $user_password;
        $_SESSION['user_id'] = $id;
        header("Location: ../admin/index.php");
    }
}

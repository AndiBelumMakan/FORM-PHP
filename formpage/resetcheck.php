<?php
session_start();
if (isset($_POST['submit'])) {
    include "database/database.php";
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];

    if (empty($password) && empty($re_password)) {
        header("Location: resetpass.php?error=Form must be filled");
        exit();
    } elseif (empty($password)) {
        header("Location: resetpass.php?error_pass=Password is required");
        exit();
    } elseif (empty($re_password)) {
        header("Location: resetpass.php?error_re_pass=Must confirm the password");
        exit();
    } elseif (strlen($password) >= 16 || strlen($re_password) >= 16) {
        header("Location: loginpage.php?error_pass=Password character is not more than 16");
        exit();
    } else {
        $email = $_SESSION['email'];
        $sql = "SELECT *FROM data WHERE email = '$email'";
        $query = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($query)['email'];
        if ($password == $re_password) {
            $password = md5($password);
            $sql2 = "UPDATE data SET password = '$password' WHERE email = '$email'";
            $query2 = mysqli_query($db, $sql2);
            if ($query2) {
                header("Location: loginpage.php");
                exit();
            }
        } else {
            header("Location: error.php?error_pass=Password is not the same");
            exit();
        }
    }
}
?>
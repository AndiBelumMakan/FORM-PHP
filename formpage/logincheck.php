<?php
session_start();
include_once "database\database.php";
if (isset($_POST['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);

    if (empty($username) && empty($email) && empty($password)) {
        header("Location: loginpage.php?error=Form must be filled");
        exit();
    } elseif (empty($username)) {
        header("Location: loginpage.php?error_name=Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: loginpage.php?error_pass=Password is required");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z _]*$/", $username)) {
            header("Location: loginpage.php?error_name=Username cant have a symbol");
            exit();
        } elseif (strlen($password) >= 16) {
            header("Location: loginpage.php?error_pass=Password character is not more than 16");
            exit();
        } else {
            $password = md5($password);
            $sql = "SELECT * FROM data WHERE username = '$username' AND password = '$password'";
            $query = mysqli_query($db, $sql);

            if (mysqli_num_rows($query) === 1) {
                $data = mysqli_fetch_assoc($query);
                if ($data['username'] === $username && $data['password'] === $password) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['password'] = $data['password'];
                    header("Location: home.php");
                    exit();
                }
            } else {
                header("Location: loginpage.php?error=Invalid username or password");
                exit();
            }
        }
    }
}
?>
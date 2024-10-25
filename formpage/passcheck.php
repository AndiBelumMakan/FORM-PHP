<?php
session_start();
if (isset($_POST['submit'])) {
    include "database/database.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST["username"]);
    $email = validate($_POST["email"]);

    if (empty($username) && empty($email)) {
        header("Location: recoveracc.php?error=Form must be filled");
        exit();
    } elseif (empty($username)) {
        header("Location: recoveracc.php?error_name=Username is required");
        exit();
    } elseif (empty($email)) {
        header("Location: recoveracc.php?error_email=Email is required");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z _]*$/", $username)) {
            header("Location: recoveracc.php?error_name=Username cant have a symbol");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: recoveracc.php?error_email=Invalid email character");
            exit();
        } else {
            $sql = "SELECT *FROM data WHERE username = '$username' AND email = '$email'";
            $query = mysqli_query($db, $sql);

            if (mysqli_num_rows($query) === 1) {
                $data = mysqli_fetch_assoc($query);
                $_SESSION['email'] = $data['email'];
                header("Location: resetpass.php");
                exit();
            } else {
                header("Location: recoveracc.php?error=User dont exist");
                exit();
            }
        }
    }
}
?>
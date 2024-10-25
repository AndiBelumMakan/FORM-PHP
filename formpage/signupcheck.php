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
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);

    if (empty($username) && empty($email) && empty($password)) {
        header("Location: signuppage.php?error=Form must be filled");
        exit();
    } else {
        if (empty($username)) {
            header("Location: signuppage.php?error_name=Username is required");
            exit();
        } elseif (empty($email)) {
            header("Location: signuppage.php?error_email=Email is required");
            exit();
        } elseif (empty($password)) {
            header("Location: signuppage.php?error_pass=Password is required");
            exit();
        } else {
            if (!preg_match("/^[a-zA-Z _]*$/", $username)) {
                header("Location: signuppage.php?error_name=Username cant have a symbol");
                exit();
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: signuppage.php?error_email=Invalid email character");
                exit();
            } elseif(strlen($password) >= 16){
                header("Location: loginpage.php?error_pass=Password character is not more than 16");
                exit();    
            } else {
                $password = md5($password);
                $sql = "SELECT *FROM data WHERE username = '$username' AND email = '$email' AND password = '$password'";
                $query = mysqli_query($db, $sql);

                if (mysqli_num_rows($query) > 0) {
                    header("Location: signuppage.php?error=User has existed");
                    exit();
                } else {
                    $sql2 = "INSERT INTO data(username, email, password)
                            VALUES ('$username', '$email', '$password')";
                    $query2 = mysqli_query($db, $sql2);

                    $sql3 = "SELECT *FROM data WHERE email = '$email'";
                    $query3 = mysqli_query($db, $sql3);

                    $data = mysqli_fetch_assoc($query3);
                    $_SESSION['username'] = $data['username'];
                    if ($query2) {
                        header("Location: home.php");
                        exit();
                    } else {
                        header("Location: signuppage.php?error=Unknown error please refresh the page");
                        exit();
                    }
                }

            }
        }
    }
}



?>

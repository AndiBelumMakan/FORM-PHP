<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/form.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <main class="main">
        <h1>Login </h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="logincheck.php" method="post">
            <label for="username">Username</label>
            <?php if (isset($_GET['error_name'])) { ?>
                <p class="error"><?php echo $_GET['error_name']; ?></p>
            <?php } ?>
            <input type="text" placeholder="Enter your name" name="username"> <br>

            <label for="password">Password</label>
            <?php if (isset($_GET['error_pass'])) { ?>
                <p class="error"><?php echo $_GET['error_pass']; ?></p>
            <?php } ?>
            <input type="password" placeholder="Enter your password" name="password">

            <a href="recoveracc.php" class="fpassword">
                <p>Forgot your password?</p>
            </a>

            <div class="wrap">
                <button type="submit" name="submit">
                    Enter
                </button>
            </div>
        </form>
        <p>Not registered?
            <a href="signuppage.php" style="text-decoration: none;">
                Create an account
            </a>
        </p>
    </main>
</body>

</html>
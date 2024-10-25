
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovery</title>
    <link rel="stylesheet" href="css/form.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <main class="main">
        <h3>Recover Your Account</h3>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="passcheck.php" method="post">
            <label for="username">Username</label>
            <?php if (isset($_GET['error_name'])) { ?>
                <p class="error"><?php echo $_GET['error_name']; ?></p>
            <?php } ?>
            <input type="text" placeholder="Enter your name" name="username"> <br>

            <label for="email">Email</label> 
            <?php if (isset($_GET['error_email'])) { ?>
                <p class="error"><?php echo $_GET['error_email']; ?></p>    
            <?php } ?>
            <input type="email" placeholder="Enter your email" name="email" ><br>

            <p id="rpassword">We will reset your password</p>

            <div class="wrap">
                <button type="submit" name="submit">
                    Enter
                </button>
            </div>
        </form>
    </main>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/form.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <main class="main">
        <h3>Reset Your Password</h3>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="resetcheck.php" method="post">
            <label for="password">Password</label>
            <?php if (isset($_GET['error_pass'])) { ?>
                <p class="error"><?php echo $_GET['error_pass']; ?></p>
            <?php } ?>
            <input type="password" placeholder="Enter the password" name="password"> <br>

            <label for="password">Confirm Password</label> 
            <?php if (isset($_GET['error_re_pass'])) { ?>
                <p class="error"><?php echo $_GET['error_re_pass']; ?></p>    
            <?php } ?>
            <input type="password" placeholder="Confirm your password" name="re_password" ><br>

            <div class="wrap">
                <button type="submit" name="submit">
                    Enter
                </button>
            </div>
        </form>
    </main>
</body>

</html>
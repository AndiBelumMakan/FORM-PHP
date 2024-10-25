
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
<h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <a href="logout.php" style="text-decoration: none;"><b>Logout</b></a>
</body>
</body>
</html>
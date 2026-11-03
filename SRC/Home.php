<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: signin.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="Logout.php">Sign Out</a>
    UserName : <?php echo $_SESSION['Fname'] . ' ' . $_SESSION['Lname']; ?>
</body>
</html>
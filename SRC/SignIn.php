<?php
require('../Config/database.php');

session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: signin.html");
}
$email = $_POST['email'];
$password = $_POST['password'];
$pass_enc = md5($password);

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass_enc'";
$res = pg_query($supabase_conn, $sql);
if (pg_num_rows($res) > 0) {
    $row = pg_fetch_assoc($res);
    $_SESSION['userId'] = $row['id'];
    $_SESSION['Fname'] = $row['firstname'];
    $_SESSION['Lname'] = $row['lastname'];
    echo "<script>alert('Login successful.')</script>";
    header ("refresh: 0; url=home.php");
} else {
    echo "<script>alert('Invalid email or password.')</script>";
    header ("refresh: 0; url=signin.html");
}

?>
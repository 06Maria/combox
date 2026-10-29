<?php
//get database conecction 
require('../Config/database.php');

//get data from html form
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$p_mobile = $_POST['mobile'];
$p_email = $_POST['email'];
$p_password = $_POST['password'];
$enc_pass = md5($p_password);

//sql to validate if user already exists
$sql_validation = 
    "SELECT email FROM users WHERE email = '$p_email'";

//$local_res = pg_query($local_conn, $sql_validation);
$supabase_res = pg_query($supabase_conn, $sql_validation);
$total = pg_fetch_result($supabase_res, 0, 0);

if ($total > 0) {
    echo "<script>alert('User already exists ::: ')</script>";
    header ("refresh: 0; url=signin.html");
} else {
    //prepare query
    $sql = "
    INSERT INTO users (
        firstname, lastname, mobile_phone, email, password)
    VALUES (
        '$f_name', '$l_name', '$p_mobile', '$p_email', '$enc_pass'
    )";

    $supabase_res = pg_query($supabase_conn, $sql);
    if ($supabase_res ) {
        echo "<script>alert('Data inserted successfully into database.')</script>";
        header ("refresh: 0; url=signin.html");
    } else {
        echo "<script>alert('Error inserting data.')</script>";
        header ("refresh: 0; url=signup.html");
    }
}

/*if ($local_res ) {
    echo "<br>Data inserted successfully into database.";
} else {
    echo "<br>Error inserting data " ;
}*/
?>
<?php //get data from html form
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$p_mobile = $_POST['mobile'];
$p_email = $_POST['email'];
$p_password = $_POST['password'];
echo "First Name is: " . $f_name;
echo "Last Name is: " . $l_name;
echo "Mobile Number is: " . $p_mobile;
echo "Email is: " . $p_email;
echo "Password is: " . $p_password;
?>
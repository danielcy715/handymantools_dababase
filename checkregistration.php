<?php
include_once 'utils.php';

session_start();

//echo "Start";


// get all related infomations from signup.php
$username=$_POST['login'];
$password=$_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
if ($password != $confirmpassword) {
  header('Location: register.php?msg=Password do not match!');
}
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$homephoneareacode=$_POST['homephoneareacode'];
$homephonelocalcode=$_POST['homephonelocalcode'];
$workphoneareacode=$_POST['workphoneareacode'];
$workphonelocalcode=$_POST['workphonelocalcode'];
$address=$_POST['address'];

/*
echo $username."<br>";
echo $password."<br>";
echo $confirmpassword."<br>";
echo $firstname."<br>";
echo $lastname."<br>";
echo $homephoneareacode."<br>";
echo $homephonelocalcode."<br>";
echo $workphoneareacode."<br>";
echo $workphonelocalcode."<br>";
exit("Error");
*/

$result = process_registration($conn, $username, $password, $firstname, $lastname, $homephoneareacode, $homephonelocalcode, $workphoneareacode, $workphonelocalcode, $address);


if ($result == 0) {
  $_SESSION["userid"] = $username;
  header('Location: custmainmenu.php');
} elseif ($result == 1) {
  header('Location: register.php?msg=User already exists!');
} elseif ($result == 2) {
  header('Location: register.php?msg=Failed to create user!');
}



?>

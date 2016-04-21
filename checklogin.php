<?php
include_once 'utils.php';

session_start();

$email = $_POST['login'];
$password = $_POST['password'];
$type = $_POST['userid'];


echo $email;
echo $password;
echo $type;


if (process_login($conn, $email, $password, $type) == true) {
  // Success
  if ($type == 'clerk') {
	$_SESSION['clerkid']=$email;
	$_SESSION['toolidset']='0';
    header('Location: clerkmainmenu.php');
	
  } elseif ($type == 'customer') {
    $_SESSION["userid"] = $email;
    header('Location: custmainmenu.php');
  }
} else {
  // Failed
  header("Location: login.php?msg=Login Error!");
}

?>

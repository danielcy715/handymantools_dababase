<?php
session_start();
ob_start();
$_SESSION['errormessage']=NULL;

//connect to database server
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="123456"; // Mysql password
$db_name="handymantools";
$tbl_name="customer";

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// get all related infomations from signup.php
$userloginname=$_GET['login'];
$userloginpassword=$_GET['password'];
$userfirstname=$_GET['firstname'];
$userlastname=$_GET['lastname'];
$homephoneareacode=$_GET['homephoneareacode'];
$homephonelocalcode=$_GET['homephonelocalcode'];
$workphoneareacode=$_GET['workphoneareacode'];
$workphonelocalcode=$_GET['workphonelocalcode'];



//print("user: ".$userloginname);
//print("<br>");
//print("password: ".$userloginpassword);
// To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);
//print("<br>");
//print("table_name: ".$tbl_name);
//INSERT INTO table_name (column1,column2,column3,...)
//VALUES (value1,value2,value3,...);
//$sql="SELECT credits FROM $tbl_name WHERE userfirstname='$myusername' and password='$mypassword'";
$sql="INSERT INTO $tbl_name (login,password,firstname,lastname,homephoneareacode,homephonelocalcode,workphoneareacode,workphonelocalcode)VALUES ('$userloginname','$userloginpassword','$userfirstname','$userlastname','$homephoneareacode','$homephonelocalcode','$workphoneareacode','$workphonelocalcode')";
//print($sql);
$result=mysql_query($sql);
//print($result);
if(!$result){
	//print("failed to insert");
	print("User already exists, please sign up with another username.");
    print("<br><br><br>");
//	$_SESSION['errormessage']="User already exists, Please Sign Up with a new username";

//	header("location:http://localhost/login.php");
}
else{
	//print("<br>");
	print("sucess. result: ".$result);
	
	$_SESSION['errormessage']="success";
	header("location:http://localhost/custmainmenu.php");
}



ob_end_flush();
?>
<html>
<head>
</head>
<body>
<input  name="newuser" value="Create New User"  onclick="window.location.href='newuser.php'"   type="button">
</body>
</html>


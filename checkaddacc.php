<?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */ // remove all session variables, in case it is from logout session_start(); session_unset();// destroy the sessionsession_destroy(); 
 session_start(); 
 ob_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="123456"; // Mysql password
$db_name="handymantools"; // Database name
$tbl_name="reservation"; // Table name
$pickupdate=date("Ymd");
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// receive parameters
$toolid=$_SESSION['toolid'];
echo "$toolid";
foreach($_GET as $acc => $value) {
       //echo "$acc";
	   //echo "$value";
	
 	if($value!=''){ 
		
		$sql="INSERT INTO powertoolaccessories(ToolID, Accessories) VALUES ('$toolid','$value')";
		echo "$sql";
		$result=mysql_query($sql);
	}  

}

if($result){
	header('Location: clerkmainmenu.php?msg=Success');
}

else{
	header('Location: clerkmainmenu.php?msg=Failed');
} 

 ?>



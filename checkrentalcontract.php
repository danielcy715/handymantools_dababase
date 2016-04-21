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
$creditcardnumber=$_SESSION['creditcardnumber'];
$expirationdate=$_SESSION['expirationdate'];
//echo "$expirationdate";
$reservationnumber=$_SESSION['reservationnumber'];
$clerkid=$_SESSION['clerkid'];
//$sql="SELECT * FROM $tbl_name WHERE usernativelanguage=*";//'$vlanguage' ";

$sql="UPDATE reservation
      SET  PickupClerkLogin = '$clerkid', PickupDate = '$pickupdate', CreditCardNumber = '$creditcardnumber', CreditCardExpirationDate = '$expirationdate' 
	  WHERE ReservationNumber='$reservationnumber'"; 
//echo "$sql";
$result=mysql_query($sql);
//print($result);

if(!$result){
	header('Location: clerkmainmenu.php');
}

else{
	header('Location: clerkmainmenu.php');
}

 ?>



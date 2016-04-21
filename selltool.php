<?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */ // remove all session variables, in case it is from logout session_start(); session_unset();// destroy the sessionsession_destroy(); 
//session_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "handymantools";
$saleclerklogin=$_SESSION['clerkid'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//$username = $_SESSION["userid"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tooid=$_POST['toolid'];
    $saledate = $_POST['saledate'];
    $saleprice = $_POST['saleprice'];
    $query = "UPDATE tool SET SaleDate='$saledate', SalePrice='$saleprice', SaleClerkLogin='$saleclerklogin' WHERE ID='$tooid'";
    if ($conn->query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

}





?>
<html>
<head>
    <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
    <title> Login </title>
</head>
<body>
<div><br>
</div>
<br>
<form  name="Form"  method="post"  action="selltool.php">
    <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"

            cellspacing="1">
        <tbody>
        <tr>
            <td width="500">
                <h2>Sell Tool</h2>
            </td>
        </tr>

        <tr>
            <td>
                Tool ID To Be Sold<input  name="toolid"

                                type="text">

            </td>
        </tr>

        <tr>
            <td>Sale Date<input  name="saledate"

                                 type="date"></td>
        </tr>

        <tr>
            <td>Sale Price $<input  name="saleprice"

                                    type="text"></td>
        </tr>


        <tr>
            <td><input  name="submit"
                        value="submit" type="submit" >

            </td>
            <td><input  name="exit" value="Back"  onclick="window.location.href='clerkmainmenu.php'" type="button">
            </td>
        </tr>
<?php
//include_once 'utils.php';

session_start();
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "handymantools";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_SESSION["userid"];
$sql = "SELECT * FROM customer WHERE Login = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
//    $confirmpassword = $_POST['confirmpassword'];
//    if ($password != $confirmpassword) {
 //       print("Password do not match!");
 //   }
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $homephoneareacode = $_POST['homephoneareacode'];
    $homephonelocalcode = $_POST['homephonelocalcode'];
    $workphoneareacode = $_POST['workphoneareacode'];
    $workphonelocalcode = $_POST['workphonelocalcode'];
    $address = $_POST['address'];

    $query = "UPDATE customer SET FirstName='$firstname',LastName='$lastname', Password='$password', HomephoneAreacode='$homephoneareacode', HomephoneLocalcode='$homephonelocalcode',
 WorkphoneAreacode='$workphoneareacode', WorkphoneLocalcode='$workphonelocalcode', Address='$address' WHERE Login='$username'";
    if ($conn->query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

}
$username = $_SESSION["userid"];
$sql = "SELECT * FROM customer WHERE Login = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>





<html>
<head>
    <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
    <title> Login </title>
</head>
<body>
<div  style="text-align: center;"><br>
</div>
<br>
<form  name="Form"  action="editprofile.php" method="post"  >
    <table  style="width: 500px; height: 440px;"  align="center"
            bgcolor="#FFFFFF"  border="0"  cellpadding="5"  cellspacing="1">
        <tbody>
        <tr>
            <td style="text-align: left;"  width="300">
                <h1>Edit Profile</h1>
                <?php
                echo "Current Username: $username"."<br>";
                ?>
            </td>
        </tr>
        <tr>
            <td  width="200">New Password</td>
            <td><input  name="password"  type="password" value="<?php print $row['Password']; ?>" required></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input  name="firstname"  type="text" value="<?php print $row['FirstName']; ?>" required></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input  name="lastname"  type="text" value="<?php print $row['LastName']; ?>" required></td>
        </tr>
        <tr>
            <td>Home Phone Area Code</td>
            <td><input  name="homephoneareacode" maxlength="3" value="<?php print $row['HomephoneAreacode']; ?>" type="text"></td>
        </tr>
        <tr>
            <td>Home Phone Local Code</td>
            <td><input  name="homephonelocalcode"  maxlength="7" value="<?php print $row['HomephoneLocalcode']; ?>" type="text"></td>
        </tr>
        <tr>
            <td>Work Phone Area Code</td>
            <td><input  name="workphoneareacode"  maxlength="3" value="<?php print $row['WorkphoneAreacode']; ?>" type="text"></td>
        </tr>
        <tr>
            <td>Work Phone Local Code</td>
            <td><input  name="workphonelocalcode"  maxlength="7" value="<?php print $row['WorkphoneLocalcode']; ?>" type="text"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input  name="address"  value="<?php print $row['Address']; ?>" type="text"></td>
        </tr>
        <tr>
            <td>
                <input  value="Save"  name="Submit" type="submit">
            </td>
            <td><input  name="exit" value="Back"  onclick="window.location.href='custmainmenu.php'" type="button"></td>
            <td><br>
            </td>
        </tr>
        </tbody>
    </table>
</form>
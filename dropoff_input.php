<html>
<?php
session_start();

ob_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="123456"; // Mysql password
$db_name="handymantools"; // Database name
$tbl_name="reservation"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// receive parameters


//$sql="SELECT * FROM $tbl_name WHERE usernativelanguage=*";//'$vlanguage' ";

$sql="SELECT * FROM $tbl_name WHERE isNULL(DropoffDate) AND (NOT isNULL(PickupDate)) AND CURDATE()>PickupDate"; 
//echo "$sql";
$result=mysql_query($sql);
//print($result);
?>


<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <style>
        #section {
            padding:100px;
        }
    </style>
</head>
<body>

<div id="section">

							<form  name="Form"  method="get"  action="dropoff.php"  onsubmit="return validateForm()">
                  
							Select Reservation to Drop Off <select  name="reservationnumber" id="reservationnumber" class="c-select">
                                    <option selected>Reservation#</option>
											<?php
												
												while($row=mysql_fetch_assoc($result)){
												
												echo "<option  value=\"".$row['ReservationNumber']."\">".$row['ReservationNumber']."</option>";
												
												}
											
												
											?>
										</select>
							   
							   
							   <input  name="viewdetail"  value="OK" type="submit" ><input  name="back"  
                     value="Back" onclick="history.go(-1);" type="button" >
							</form>   
</div>

</body>
</html>



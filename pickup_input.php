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

$sql="SELECT * FROM $tbl_name WHERE isNULL(PickupDate)"; 
//echo "$sql";
$result=mysql_query($sql);
//print($result);

while ($cdrow=mysql_fetch_array($cdresult)) {
    $cdTitle=$cdrow["cdTitle"];
    echo "<option>
                    $cdTitle
                </option>";

}
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

							<form  name="Form"  method="get"  action="pickup.php"  onsubmit="return validateForm()">
                                <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
                                        cellspacing="1">
                                    <tbody>
                                    <tr>
                                    <td>Select Reservation To Pick Up
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <select  name="reservationnumber" id="reservationnumber" class="c-select">
                                             <option selected>Reservation#</option>
											<?php
												
												while($row=mysql_fetch_assoc($result)){
												
												echo "<option  value=\"".$row['ReservationNumber']."\">".$row['ReservationNumber']."</option>";
												
												}


											?>
										</select>
                                        </td>
                                    </tr>
							        <tr>
                                        <td>
							   <input  name="viewdetail"  value="Submit" type="submit" ><input  name="back"  
                     value="Back" onclick="history.go(-1);" type="button" >
                                        </td>
                                    </tr>
							</form>   
							
</div>
</body>
</html>



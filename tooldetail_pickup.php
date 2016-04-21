<?php

session_start();
ob_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="123456"; // Mysql password
$db_name="handymantools"; // Database name
$tbl_name="tool"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// receive parameters
$toolid=$_GET['toolid'];
//print($toolid);
/*
$_SESSION['teacherloginname']=$vteacherloginname;
echo "profile: ".$vteacherloginname;
//design sql statement
if($vteacherloginname!="ALL") {	$sql_a1="userloginname='$vteacherloginname'";} else {	$sql_a1="1=1";} */

//table attributes list:

//$sql="SELECT * FROM $tbl_name WHERE usernativelanguage=*";//'$vlanguage' ";

$sql="SELECT * FROM $tbl_name WHERE ID='$toolid'"; //.$sql_a1." and ".$sql_a2." and ".$sql_a3." and ".$sql_a4.$sql_order;
//echo "$sql";
$result=mysql_query($sql);

$row=mysql_fetch_assoc($result);
$id=$row['ID'];
$purchaseprice=$row['PurchasePrice'];
$abbrdescription=$row['AbbreviatedDescription'];
$fulldescription=$row['FullDescription'];
$deposit=$row['Deposit'];
$priceperday=$row['PricePerDay'];
$tooltype=$row['ToolType'];

?>

<table  style="width: 100%; vertical-align: top;"

										 border="1">
										 
										<tbody>
											 <?php 
											 /* $x=0;
											 while($row=mysql_fetch_assoc($result)){
												$x=$x+1;
												echo "<tr> <td style=\"width: 20%; \" >"."userloginname"."<td><button onclick=\"window.location.href = 'videochat.php'\" ()\">Start Chating</button></td> </tr>
												<tr> <td style=\"width: 20%; \" >"."userloginname"."</td><td style=\"width: 20%; \" >".$row['userloginname']."</td> </tr>
												<tr><td style=\"width: 20%; \">".$row['ID']."</td> </tr>
												<tr><td style=\"width: 20%; \">".$row['PurchasePrice']."</td> </tr>
												<tr><td style=\"width: 20%; \">".$row['PurchasePrice']."</td> </tr>
												<tr><td style=\"width: 20%; \">".$row['PurchasePrice']."</td></tr>
												<tr><td><button onclick=\"window.location.href = 'PayCredits.php'\" ()\">Pay to</button></td>
												<td><button onclick=\"window.location.href = 'RateReview.php'\" ()\">Review</button></td></tr>";
											}              */                 
											?>
										</tbody>
									  </table>
<html>
   <head>
      <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
      <title> Login </title>
   </head>
   <body>
      <div  style="text-align: center;color:blue">
      <?php
        if (isset($_GET['msg'])) {
          echo $_GET['msg'];
        } else {
          echo "<br>";
        }
      ?>
      </div>
      <br>
      <form  name="Form"  method="POST"  action=""  onsubmit="return validateForm()">
         <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
            cellspacing="1">
            <tbody>
               <tr>
                  <td style="text-align: left;"  width="500">
                     <h2>Tool Detail Information</h2>
                  </td>
               </tr>
               <tr>
                  <td>
                     Abbreviated Description : <?php echo $abbrdescription;?>
                  </td>
               </tr>
               <tr>
                  <td   style="text-align: left;">Purchase Price: $<?php echo $purchaseprice;?></td>
               </tr>
               <tr>
                  <td style="text-align: left;">  Rental Price (per day): $<?php echo $priceperday;?></td>
               </tr>
               <tr>
                  <td style="text-align: left;">  Deposit Amount $<?php echo $deposit;?></td>
               </tr>
               <tr>
                  <td style="text-align: left;">  Full Description</td>
               </tr>
			   <tr>
				<td><?php echo $fulldescription;?>
				</td>
			   </tr>
               <tr>
                  <td>
                     Tool ID: <?php echo $id;?>
                  </td>
               </tr>
			   <tr>
                  <td>
                     Tool Type: <?php echo $tooltype;?>
                  </td>
               </tr>
               
               <tr>
                  <td style="text-align: left;"> If item is a Power Tool, then include accessories. 
                     
                  </td>
               </tr>
               
               <tr>
                  <td  style="text-align: left;"  width="300"><input  name="back"  
                     value="Back" onclick="window.location.href='.php'" type="button" >
                  </td>
               </tr>
            </tbody>
         </table>
      </form>
   </body>
</html>


<?php session_start();
$_SESSION['errormessage']=NULL;
?>



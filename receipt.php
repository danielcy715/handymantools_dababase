              <?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */ // remove all session variables, in case it is from logout session_start(); session_unset();// destroy the sessionsession_destroy(); 
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
//$creditcardnumber=$_GET['creditcardnumber'];
//$expirationdate=$_GET['expirationdate'];
$reservationnumber=$_SESSION['reservationnumber'];

$clerkid=$_SESSION['clerkid'];
//$sql="SELECT * FROM $tbl_name WHERE usernativelanguage=*";//'$vlanguage' ";

$sql="SELECT * FROM tool
WHERE ID in (SELECT ToolId
			FROM reservationtooldetails
			WHERE ReservationNumber='$reservationnumber')"; 
//echo "$sql";
$result=mysql_query($sql);
//print($result);

$sql2="SELECT StartDate,EndDate,CustomerLogin,CreditCardNumber 
	   FROM reservation
	   WHERE ReservationNumber='$reservationnumber'"; 
//echo "$sql2";
$result2=mysql_query($sql2);

$row2=mysql_fetch_assoc($result2);
$startdate=$row2['StartDate'];
$enddate=$row2['EndDate'];
$customerid=$row2['CustomerLogin'];
$creditcardnumber=$row2['CreditCardNumber'];
 // calculate date difference
              $dStart = new DateTime($row2['StartDate']);
              $dEnd  = new DateTime($row2['EndDate']);
              $dDiff = $dStart->diff($dEnd);
 //             echo $dDiff->format('%R'); // use for point out relation: smaller/greater
 //             echo $dDiff->days;
                $numberofdays=$dDiff->days;
 //             echo "$numberofdays";
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
                  
				  <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"

                       cellspacing="1">
                      <tbody>
                        
						<tr><td style="text-align: center;"  width="600"><h2>HANDYMAN TOOLS RECEIPT </h2></td>
						</tr>
					</tbody>
				</table>
				  
                  <form  name="Form"  method="get"  action="checkreceipt.php"  onsubmit="return validateForm()">
                    <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"

                       cellspacing="1">
                      <tbody>
                        
						
						<tr>
                          <td style="text-align: left;"  width="300">
                            Reservation Number: <?php echo $reservationnumber; ?>
                          </td>
						  <td>
							Clerk on Duty: <?php echo $clerkid; ?>
						  </td>
                        </tr>
						<tr>
                          <td style="text-align: left;"  width="300">
                            Customer Name: <?php echo $customerid; ?>
                          </td>
						  <td>
							Credit Card #: <?php echo $creditcardnumber; ?>
						  </td>
                        </tr>
						<tr>
                          <td style="text-align: left;"  width="300">
                            Start Date: <?php echo $startdate; ?>
                          </td>
						  <td>
							End Date: <?php echo $enddate; ?>
						  </td>
                        </tr>
                        <tr>
                            <td>
                                Drop Off Date: <?php echo date("Y-m-d"); ?>
                            </td>
                        </tr>
						
												
						
						<?php
												$item=0;
												$totaldeposit=0;
												$totalcost=0;
												while($row=mysql_fetch_assoc($result)){
												$item=$item+1;
												
												$totaldeposit=$totaldeposit+$row['Deposit'];
												$totalcost=$totalcost+$row['PricePerDay']*$numberofdays;
												}
											
												
											?>
											
						
						<tr>
							<td>Rental Price: $<?php echo "$totalcost"; ?>
							</td>
						</tr>
						
						<tr>
							<td>Deposit Held: $<?php echo "$totaldeposit"; ?>
							</td>
						</tr>
						
						<tr>
							<td>Total Due: $<?php $total=$totalcost-$totaldeposit; echo "$total"; ?>
							</td>
						</tr>
						
						
	
                        <tr>
                          <td  style="text-align: left;"  width="300"><input  name="clerkmainmenu"

 value="Submit and Return to Main Menu"  onclick="window.location.href=''"  type="submit"><input  name="back"  
                     value="Back" onclick="history.go(-1);" type="button" >

                          </td>
                        </tr>
						
						
                        
	
	
	
	</tbody></table>
</form>
</body></html>
<?php session_start();
$_SESSION['errormessage']=NULL;
?>
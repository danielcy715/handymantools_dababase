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

$reservationnumber=$_GET['reservationnumber'];
$_SESSION['reservationnumber']=$reservationnumber;
//$sql="SELECT * FROM $tbl_name WHERE usernativelanguage=*";//'$vlanguage' ";

$sql="SELECT * FROM tool
WHERE ID in (SELECT ToolId
			FROM reservationtooldetails
			WHERE ReservationNumber='$reservationnumber')"; 
//echo "$sql";
$result=mysql_query($sql);
//print($result);

$sql2="SELECT * 
	   FROM reservation
	   WHERE ReservationNumber='$reservationnumber'"; 
//echo "$sql2";
$result2=mysql_query($sql2);

$row2=mysql_fetch_assoc($result2);
$startdate=$row2['StartDate'];
$enddate=$row2['EndDate'];
$customerid=$row2['CustomerLogin'];
              
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
                        <tr>
                          <td style="text-align: left;"  width="300">
                            <h2>Reservation Number: <?php echo $reservationnumber; ?></h2> 
                          </td>
                        </tr>
						
						<tr>
                          <td style="text-align: left;"  width="300">
                            <h2>Tools Required</h2>
                          </td>
                        </tr>
						<?php
												$item=0;
												$totaldeposit=0;
												$totalcost=0;
												while($row=mysql_fetch_assoc($result)){
												$item=$item+1;
												echo "<tr><td>".$item.".".$row['ID'].":".$row['AbbreviatedDescription']."</td></tr>";
												$totaldeposit=$totaldeposit+$row['Deposit'];
												$totalcost=$totalcost+$row['PricePerDay']*$numberofdays;
												}
												$_SESSION['totalcost']=$totalcost;
												
											?>
						
						
						<tr>
							<td>Deposit Required: $<?php echo "$totaldeposit"; ?>
							</td>
						</tr>
						
						<tr>
							<td>Estimated Cost: $<?php echo "$totalcost"; ?>
							</td>
						</tr>
						
						<tr><td><hr></td></tr>
						
						<tr>
							<td>
							<form  name="Form1"  method="get"  action="tooldetail.php"  onsubmit="return validateForm()">
                  
							Tool ID <input  name="toolid"  

                               type="text"><input  name="viewdetail"  value="View Detail"

 type="submit" onclick="window.location.href=''" >
							</form>    
							</td>
						</tr>
						
						<tr><td><hr></td></tr>
						
						</tbody></table>
						
						<form  name="Form"  method="get"  action="rentalcontract.php"  onsubmit="return validateForm()">
                    <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"

                       cellspacing="1">
					   <tbody>
						<tr>
							<td>Credit Card Number <input  name="creditcardnumber"  

                               type="text" maxlength="16" size="16">
							</td>
						</tr>
						
						<tr>
							<td>Expiration Date: <input  name="expirationdate"  

                               type="date"> 

							</td>
						</tr>
	
                        <tr>
                          <td  style="text-align: left;"  width="300"><input  name="completepickup"

 value="Complete Pick-Up and View Summary"  onclick="window.location.href=''"  type="submit"><input  name="cancel"  
                     value="Cancel" onclick="window.location.href='clerkmainmenu.php'" type="button" >

                          </td>
                        </tr>

	
	</tbody></table>
</form>
</body></html>
<?php session_start();
$_SESSION['errormessage']=NULL;
?>
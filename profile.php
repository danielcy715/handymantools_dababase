<?php
include_once 'utils.php';

session_start();

$username = $_SESSION["userid"];
$sql = "SELECT * FROM customer WHERE Login = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$sql2 ="SELECT *		   
		FROM tool, reservation, reservationtooldetails
		WHERE tool.ID IN	(	   
				   SELECT ToolId 
				  FROM reservationtooldetails AS RTD
				  WHERE reservationNumber IN (SELECT reservationNumber 
										   FROM reservation AS R
										   WHERE CustomerLogin='$username'
										   )
					   )
			AND tool.ID=reservationtooldetails.ToolId AND reservation.reservationnumber=reservationtooldetails.reservationnumber";
$result2 = $conn->query($sql2);



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
      <form  name="Form"  method="get"  action=""  onsubmit="return validateForm()">
         <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
            cellspacing="1">
            <tbody>
               <tr>
                  <td style="text-align: left;"  width="300">
                     <h1>Profile</h1>
                     <?php
                     echo $username."<br>";
                     ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <hr>
                  </td>
               <tr>
                  <td>Email Address: 
                     <?php print $row['Login']; ?>
                  </td>
               </tr>
               <tr>
                  <td>First Name:
                     <?php print $row['FirstName']; ?>
                  </td>
               </tr>
               <tr>
                  <td>Last Name:
                     <?php print $row['LastName']; ?>
                  </td>
               </tr>
               <tr>
                  <td>Home Phone:
                     <?php print "{$row['HomephoneAreacode']}-{$row['HomephoneLocalcode']}"; ?>
                  </td>
               </tr>
               <tr>
                  <td>Work Phone: 
                     <?php print "{$row['WorkphoneAreacode']}-{$row['WorkphoneLocalcode']}"; ?>
                  </td>
               </tr>
               <tr>
                  <td>Address: 
                     <?php print $row['Address']; ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <hr>
                  </td>
               <tr>
                  <td>
                     <h1>Reservation Histroy</h1>
                  </td>
               </tr>
               <tr>
                  <td><hr></td>
               <tr>
                  <td>
                     <table  align="center"  bgcolor="#FFFFFF"  border="1"  cellpadding="5"
                        cellspacing="1">
                        <thead>
                           <tr>
                              <th style="width: 12.5%; " >Res#</th>
                              <th style="width: 12.5%; " >Tools</th>
                              <th style="width: 12.5%; " >Start</th>
                              <th style="width: 12.5%; " >End</th>
                              <th style="width: 12.5%; " >Rental Price</th>
                              <th style="width: 12.5%; " >Deposit</th>
                              <th style="width: 12.5%; " >Pick-Up Clerk</th>
                              <th style="width: 12.5%; " >Drop-Off Clerk</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php while($row2 = $result2->fetch_assoc()){ ?>
							<tr>
                              <td><?php print $row2['ReservationNumber']; ?>
                              </td>
                              <td><?php print $row2['ID']; ?>
                              </td>
                              <td><?php print $row2['StartDate']; ?>
                              </td>
                              <td><?php print $row2['EndDate']; ?>
                              </td>
                              <td><?php 
							  $dStart = new DateTime($row2['StartDate']);
								$dEnd  = new DateTime($row2['EndDate']);
								$dDiff = $dStart->diff($dEnd);
								$numberofdays=$dDiff->days;
							  print $row2['PricePerDay']*$numberofdays; ?>
                              </td>
                              <td><?php print $row2['Deposit']; ?>
                              </td>
                              <td><?php print $row2['PickupClerkLogin']; ?>
                              </td>
                              <td><?php print $row2['DropoffClerkLogin']; ?>
                              </td>
                           </tr>
						<?php } ?>
                        <tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
            <tr>
               <td><input  align="center" name="exit" value="Back"  onclick="window.location.href='custmainmenu.php'"   type="button"></td>
            </tr>
         </table>
      </form>
   </body>
</html>


<?php //session_start();
$_SESSION['errormessage']=NULL;
?>

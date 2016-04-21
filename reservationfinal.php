<?php

include_once 'utils.php';

session_start(); 

$reservation_num = date("YmdHis");

$from = $_SESSION['from'];
$to = $_SESSION['to'];


$dStart = new DateTime($from);
$dEnd  = new DateTime($to);
$dDiff = $dStart->diff($dEnd);
$numberofdays=$dDiff->days;

$rental_price = 0;
$deposit_price = 0;

$user_id = $_SESSION["userid"];



$con = new mysqli(HOST, USER, PASSWORD, DATABASE);
$sql = "INSERT INTO reservation (ReservationNumber, StartDate, EndDate, CustomerLogin) VALUES ('$reservation_num', '$from', '$to', '$user_id')";
//$con->query($sql); 
if ($con->query($sql) === TRUE) {
                      echo "Record updated successfully";
                  } else {
                      echo "Error updating record: " . $conn->error;
                  }


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
    <form  name="Form"  method="POST"  action=""  onsubmit="return validateForm()">
      <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
        cellspacing="1">
        <tbody>
          <tr>
            <td style="text-align: left;"  width="300">
              <h2>Your Reservation Number is</h2>
            </td>
          </tr>
          <tr>
            <td>
              <?php echo $reservation_num; ?>
            </td>
          </tr>
          <tr>
            <td style="text-align: left;"  width="300">
              <h2>Tools Rented</h2>
            </td>
          </tr>
          <tr>
            <td>
              <?php
              echo $user_id;
                $selected = $_SESSION['selected'];
                $result = "<table>
                        <tr>
                        <th>Tool Id</th>
                        <th>Description</th>
                        <th>Price Per Day</th>
                        <th>Deposit</th>
                        </tr>";
                foreach($selected as $tool) {
                  $info = explode("_*_", $tool);
                  $result .= "<tr>";
                  $result .= "<td>" . $info[0] . "</td>";
                  $result .= "<td>" . $info[1] . "</td>";
                  $result .= "<td>$" . $info[2] . "</td>";
                  $result .= "<td>$" . $info[3] . "</td>";
                  $result .= "</tr>";
                  
                  $insert = "INSERT INTO reservationtooldetails (ReservationNumber, ToolId) VALUES ('$reservation_num', '$info[0]')";
                  $con = new mysqli(HOST, USER, PASSWORD, DATABASE);
                  $con->query($insert);
                  
                  $rental_price += floatval($info[2]);
                  $deposit_price += floatval($info[3]);
                }
                echo $result;
              ?>
            </td>
          </tr>
          <tr>
            <td>Start Date: <?php echo $from; ?>
            </td>
          </tr>
          <tr>
            <td>End Date: <?php echo $to; ?>
            </td>
          </tr>
          <tr>
            <td>
              Total Rental Price: $<?php echo $rental_price * $numberofdays; ?>
            </td>
          </tr>
          <tr>
            <td>
              Total Deposit Required: $<?php echo $deposit_price; ?>
            </td>
          </tr>
          <tr>
            <td  style="text-align: left;"  width="300"><input  name="back"
              value="Back to Main Menu"  onclick="window.location.href='custmainmenu.php'"  type="button">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </body>
</html>


<?php 
$_SESSION['errormessage']=NULL;
?>

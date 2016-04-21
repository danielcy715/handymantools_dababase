<?php
include_once 'utils.php';

session_start(); 


$from = $_POST['startingdate'];
$to = $_POST['endingdate'];

$dStart = new DateTime($from);
$dEnd  = new DateTime($to);
$dDiff = $dStart->diff($dEnd);
$numberofdays=$dDiff->days;
$_SESSION['from'] = $from;
$_SESSION['to'] = $to;

$rental_price = 0;
$deposit_price = 0;

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
    <form  name="Form"  method="POST"  action="reservationfinal.php"  onsubmit="return validateForm()">
      <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
        cellspacing="1">
        <tbody>
          <tr>
            <td style="text-align: left;"  width="300">
              <h2>Reservation Summary</h2>
            </td>
          </tr>
          <tr>
            <td style="text-align: left;"  width="300">
              <h2>Tools Desired</h2>
            </td>
          </tr>
          <tr>
            <td>
              <?php
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
            <td name="rentalprice">
              Total Rental Price: $<?php echo $rental_price*$numberofdays; ?>
            </td>
          </tr>
          <tr>
            <td name="depositprice">
              Total Deposit Required: $<?php echo $deposit_price; ?>
            </td>
          </tr>
          <tr>
            <td  style="text-align: left;"  width="300"><input  name="viewprofile"
              value="Submit" onclick="window.location.href='reservationfinal.php'" type="button">
              <input  name="checktoolavailability"
                value="Reset"  onclick="window.location.href='makereservation.php'"  type="button">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </body>
</html>


<?php 
$_SESSION['errormessage']=NULL;
$_SESSION['startingdate']=$startingdate;
$_SESSION['endingdate']=$endingdate;
$_SESSION['tooltype']=$tooltype;
$_SESSION['toolname']=$toolname;
$_SESSION['rentalprice']=$rentalprice;
$_SESSION['depositprice']=$depositprice;

?>

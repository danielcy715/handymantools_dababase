<?php
include_once 'db_connect.php';

session_start();

$tooltype = $_GET['tooltype'];

$from = $_GET['from'];
$to = $_GET['to'];
$_SESSION['from'] = $from;
$_SESSION['to'] = $to;


$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
//$sql = "select * from tool where ToolType = '$tooltype' and isnull(SaleDate)";
        
$sql = "SELECT * FROM tool WHERE ToolType = '$tooltype' AND isNULL(SaleDate) 
        AND ID NOT IN (SELECT ToolId FROM servicerequest where NOT ('$from' > EndDate or '$to' < StartDate))
        AND ID NOT IN (SELECT ToolId FROM reservationtooldetails WHERE reservationNumber IN 
        (SELECT ReservationNumber FROM reservation WHERE NOT ('$from' > EndDate or '$to' < StartDate))
        )";
$result = $conn->query($sql);
$rtn = "<select id='tools'>";
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $val = $row["ID"] . "_*_" . $row["AbbreviatedDescription"] . "_*_" . $row["PricePerDay"] . "_*_" . $row["Deposit"];
    $tool = $row["AbbreviatedDescription"] . " - $" . $row["PricePerDay"];
    $rtn .= "<option value='" . $val . "'>" . $tool . "</option>";
  }
}
$rtn .= "</select>";
echo $rtn;

?>



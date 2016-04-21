<?php

include_once 'db_connect.php';

session_start();

$from = $_GET['from'];
$to = $_GET['to'];
$_SESSION['from'] = $from;
$_SESSION['to'] = $to;

$tool = $_GET['tool'];

if(isset($_SESSION["selected"])) {
  array_push($_SESSION["selected"], $tool);
} else {
  $_SESSION["selected"] = array($tool);
}

$selected = $_SESSION["selected"];

$rtn = "<table>
<tr>
<th>Tool Id</th>
<th>Description</th>
<th>Price Per Day</th>
</tr>";
foreach($selected as $atool) {
  $info = explode("_*_", $atool);
  
  $rtn .= "<tr>";
  $rtn .= "<td>" . $info[0] . "</td>";
  $rtn .= "<td>" . $info[1] . "</td>";
  $rtn .= "<td>" . $info[2] . "</td>";
  $rtn .= "</tr>";
}
$rtn .= "</table>";

echo $rtn;

?>



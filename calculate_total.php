<?php

include_once 'db_connect.php';

session_start();

$from = $_SESSION['from'];
$to = $_SESSION['to'];
$dStart = new DateTime($from);
$dEnd  = new DateTime($to);
$dDiff = $dStart->diff($dEnd);
$numberofdays=$dDiff->days;

$selected = $_SESSION["selected"];

$total = 0.0;
foreach($selected as $atool) {
  $info = explode("_*_", $atool);
  $total += floatval($info[2]);
}
$total = $total * $numberofdays;
echo $total;

?>



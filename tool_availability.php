<?php
include_once 'utils.php';

session_start();
?>


<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$tool_type = $_POST['tooltype'];
$start_date = $_POST['startdate'];
$end_date = $_POST['enddate'];

/*
echo $tool_type."<br>";
echo $start_date."<br>";
echo $end_date."<br>";
*/

echo "<h2 style=text-align:center;>Tool Availability</h2>";

echo "<table>
<tr>
<th>Tool Id</th>
<th>Abbr. Description</th>
<th>Deposit ($)</th>
<th>Price/Day ($)</th>
</tr>";

$result = get_available_tools($conn, $tool_type, $start_date, $end_date);
echo $result;

echo "</table>";


?>


<br/><br/>
<div style="text-align: center;"><input  name="Back"  value="Back" onclick="window.location.href='checktoolavailability.php'" type="button" ></div>
</body>
</html>



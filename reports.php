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

/*
echo $tool_type."<br>";
echo $start_date."<br>";
echo $end_date."<br>";
*/

echo "<h2 style=text-align:center;>Report 1(Tool In Inventory)</h2>";

echo "<table>
<tr>
<th>ToolId</th>
<th>AbbreviatedDescription</th>
<th>Rental Profit</th>
<th>Tool Costs</th>
<th>Total Profit</th>
</tr>";

$result = get_report1($conn);
echo $result;

echo "</table>";


echo "<h2 style=text-align:center;>Report 2(Rental Customers History In Past Month)</h2>";

echo "<table>
<tr>
<th>Customer Name</th>
<th>Email</th>
<th>Number of Rentals</th>
</tr>";

$result = get_report2($conn);
echo $result;

echo "</table>";


echo "<h2 style=text-align:center;>Report 3(Clerk Processing History In Past Month)</h2>";



echo "<table>
<tr>
<th>Clerk Email</th>
<th>Number of Pick-ups</th>
<th>Number of Drop-offs</th>
<th>Sum</th>
</tr>";

$result = get_report3($conn);
echo $result;

echo "</table>";


?>


<br/><br/>
<div style="text-align: center;"><input  name="Back"  value="Back" onclick="window.location.href='clerkmainmenu.php'" type="button" ></div>
</body>
</html>



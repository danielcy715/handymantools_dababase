<?php
include_once 'db_connect.php';

function process_login($conn, $email, $password, $type) {
  if ($type == 'clerk') {
    $sql = "SELECT Login, Password FROM clerk WHERE Login = ? LIMIT 1";
  } elseif ($type == 'customer') {
    $sql = "SELECT Login, Password FROM customer WHERE Login = ? LIMIT 1";
  } else {
    return false;
  }
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($username, $pwd);
  $stmt->fetch();
  
  if ($stmt->num_rows == 1) {
    if ($pwd == $password) {
      return true;
	  
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function process_registration($conn, $user, $pwd, $fname, $lname, $hpac, $hplc, $wpac, $wplc, $addr) {
  $sql = "SELECT Login FROM customer where Login = ? LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $user);
  $stmt->execute();
  $stmt->store_result();
  
  if($stmt->num_rows == 1) {
    $stmt->close();
    return 1;
  } else {
    $insert_sql = "INSERT INTO customer (login,password,firstname,lastname,homephoneareacode,homephonelocalcode,workphoneareacode,workphonelocalcode, address) VALUES (?,?,?,?,?,?,?,?,?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param('sssssssss', $user, $pwd, $fname, $lname, $hpac, $hplc, $wpac, $wplc, $addr);
    if (! $insert_stmt->execute()) {
      return 2;
    } else {
      return 0;
    }
  }
}


function process_addnewtool($conn, $id, $purchase_price, $abbrv_desc, $full_desc, $deposit, $price_per_day, $tool_type) {
  $insert_sql = "INSERT INTO tool (id, purchaseprice, abbreviateddescription, fulldescription, deposit, priceperday, ToolType) VALUES (?,?,?,?,?,?,?)";
  $insert_stmt = $conn->prepare($insert_sql);
  
  /*
  echo $id."<br>";
  echo $purchase_price."<br>";
  echo $tool_type."<br>";
  exit("Error");
  */
  
  $insert_stmt->bind_param('sssssss', $id, $purchase_price, $abbrv_desc, $full_desc, $deposit, $price_per_day, $tool_type);
  if (! $insert_stmt->execute()) {
    return 1;
  } else {
    return 0;
  }
}


function get_available_tools($conn, $tool_type, $start_date, $end_date) {
  //$sql = "SELECT * from tool where ToolType = '$tool_type'";
  $sql =   "SELECT *		   
			FROM tool
			WHERE Tooltype='$tool_type' AND isNULL(SaleDate) AND
			  ID NOT IN	(	   
					   SELECT ToolId 
					  FROM reservationtooldetails
					  WHERE reservationNumber IN (SELECT ReservationNumber 
											   FROM reservation AS R
											   WHERE NOT ('$start_date'>R.EndDate or '$end_date'<R.StartDate)
											   )
						   )
				AND ID NOT IN (SELECT ToolId 
					  FROM servicerequest AS S
					  WHERE NOT ('$start_date'>S.EndDate or '$end_date'<S.StartDate))
				";
  $rtn = "";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $rtn .= "<tr>";
    $rtn .= "<td>".$row['ID']."</td>";
    $rtn .= "<td>" . $row['AbbreviatedDescription'] . "</td>";
    $rtn .= "<td>" . $row['Deposit'] . "</td>";
    $rtn .= "<td>" . $row['PricePerDay'] . "</td>";
    $rtn .= "</tr>";
  }
  return $rtn;
}

function _post($str){
    $val = !empty($_POST[$str]) ? $_POST[$str] : null;
    return $val;
}




function get_toolname($conn)
{
  $sql = "SELECT name from tool";
  $result = $conn->query($sql);
                    
  $res = "";
  $res .= "<select name=" . "'toolname'" . "id='toolname'>";
  while ($row = $result->fetch_assoc()) {
   
    $res .= "<option  value=" . $row['name'] . ">" . $row['name'] . "</option>"; 
  }
  $res .= "</select>";

  return $res;
}



function get_tooldeposit($conn, $name)
{
  $sql = "SELECT Deposit from tool where name = '$name'";
  $result = $conn->query($sql);
                    
  $row = $result->fetch_assoc();

  return $row['Deposit'];
}


function get_toolrentalprice($conn, $name, $start_date, $end_date)
{
  $sql = "SELECT Deposit from tool where name = '$name'";
  $result = $conn->query($sql);
                    
  $row = $result->fetch_assoc();

return $row['Deposit']* abs((strtotime($end_date))-strtotime($start_date))/86400;
  #return date_diff($start_date, $end_date);
}

function sortByOrder($a, $b) {
  return $b[4] - $a[4];
}



function get_report1($conn)
{

  $sql1 = "SELECT ReservationNumber, StartDate, EndDate from reservation";
  $result1 = $conn->query($sql1);
  $rtn = "";
  $arr = array();
  while($row1 = $result1->fetch_assoc())
  {
      $ReservationNumber = $row1['ReservationNumber'];
      $sql2 = "SELECT ToolId from reservationtooldetails where ReservationNumber = $ReservationNumber";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();

      $ToolId = $row2['ToolId'];
      $sql3 = "SELECT * from tool where ID = $ToolId";
      $result3 = $conn->query($sql3);
      $row3 = $result3->fetch_assoc();

      $rtn .= "<tr>";
      $rtn .= "<td>" . $row2['ToolId'] . "</td>";
      $rtn .= "<td>" . $row3['AbbreviatedDescription'] . "</td>";
      
      $rentalprofit = intval($row3['PurchasePrice']) * (abs((strtotime($row1['EndDate']))-
        strtotime($row1['StartDate']))/86400);
      $rtn .= "<td>" . $rentalprofit . "</td>";


      $sql4 = "SELECT EstimatedCost from servicerequest where ToolId = $ToolId";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_assoc();

      $toolcosts = intval($row3['PurchasePrice']) + intval($row4['EstimatedCost']);
      $rtn .= "<td>" . $toolcosts . "</td>";
      
      $totalprofit = intval($rentalprofit) - intval($toolcosts);
      $rtn .= "<td>" . $totalprofit . "</td>";
      $rtn .= "</tr>";

      $arr1 = array($ToolId, $row3['AbbreviatedDescription'], $rentalprofit, 
        $toolcosts, $totalprofit);
      //puts into array for sorting
      array_push($arr, $arr1);
      
  }

  $rtn1 = "";
  usort($arr, 'sortByOrder');
  foreach ($arr as $i => $value) 
  {
    $rtn1 .= "<tr>";
    $rtn1 .= "<td>" . $value[0] . "</td>";
    $rtn1 .= "<td>" . $value[1] . "</td>";
    $rtn1 .= "<td>" . $value[2] . "</td>";
    $rtn1 .= "<td>" . $value[3] . "</td>";
    $rtn1 .= "<td>" . $value[4] . "</td>";

    $rtn1 .= "</tr>";

  }
  
    
  //print_r($arr);

  return $rtn1;
}


function get_report2($conn)
{

  $lastmonth = date("Y-m-d",strtotime("last month"));
  $sql = "SELECT CustomerLogin, count(CustomerLogin) AS Count from reservation where StartDate >= '$lastmonth' group by CustomerLogin order by Count";
  $result = $conn->query($sql);
                
  $rtn = "";
  while ($row = $result->fetch_assoc()) {

    $email = $row['CustomerLogin'];
    #echo $email;
    $sql2 = "SELECT FirstName, LastName from customer where Login = '$email'";
    $res2 = $conn->query($sql2);
    $row2 = $res2->fetch_assoc();

    $rtn .= "<tr>";
    $rtn .= "<td>".$row2['FirstName']. $row2['LastName'] . "</td>";

    $rtn .= "<td>" . $row['CustomerLogin'] . "</td>";
    $rtn .= "<td>" . $row['Count'] . "</td>";
    $rtn .= "</tr>";
  }
  return $rtn;
}

function get_report3($conn)
{

  $lastmonth = date("Y-m-d",strtotime("last month"));
  
  $sql1 = "SELECT PickupClerkLogin, count(PickupClerkLogin) AS Count1 from reservation where PickupDate >= '$lastmonth' group by PickupClerkLogin order by Count1";
  $sql2 = "SELECT DropoffClerkLogin, count(DropoffClerkLogin) AS Count2 from reservation where DropoffDate >= '$lastmonth' group by DropoffClerkLogin order by Count2";
  $result = $conn->query($sql1);
  $res2 = $conn->query($sql2);
                
  $rtn = "";
  while ($row1 = $result->fetch_assoc()) {
    
    while($row2 = $res2->fetch_assoc())
    {

        if($row1['PickupClerkLogin'] = $row2['DropoffClerkLogin'])
        {  
          $rtn .= "<tr>";
          $rtn .= "<td>" . $row1['PickupClerkLogin'] . "</td>";
          $rtn .= "<td>" . $row1['Count1'] . "</td>";
          $sum = intval($row1['Count1']) + intval($row2['Count2']);
          $rtn .= "<td>" . $row2['Count2'] . "</td>";
          $rtn .= "<td>" . $sum . "</td>";
          $rtn .= "</tr>";
          
        }
      }
  }
  return $rtn;
}

?>









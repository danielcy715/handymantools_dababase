              <?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */ // remove all session variables, in case it is from logout session_start(); session_unset();// destroy the sessionsession_destroy(); 
 //session_start();
              session_start();
              $servername = "localhost";
              $username = "root";
              $password = "123456";
              $dbname = "handymantools";
              // Create connection
              $conn = mysqli_connect($servername, $username, $password, $dbname);
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
              $username = $_SESSION["clerkid"];
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $tooid=$_POST['toolid'];
                  $startdate = $_POST['startingdate'];
                  $enddate = $_POST['endingdate'];
                  if ($enddate>0 and $startdate > $enddate ){
                     // die("End Date Must Either Be 0 Or After Start Date");
                      echo("End Date Must Either Be 0 Or After Start Date. Please go back.");
                      exit;
                  }
                  $cost = $_POST['cost'];
                  $query = "INSERT INTO servicerequest (ToolID,StartDate,EndDate,EstimatedCost,FilloutClerkLogin) VALUES ('$tooid', '$startdate', '$enddate','$cost','$username')";
                  if ($conn->query($query) === TRUE) {
                      echo "Record updated successfully";
                  } else {
                      echo "Error updating record: " . $conn->error;
                  }
              }
              ?>
              <html>
                <head>
                  <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
                  <title> Login </title>
                </head>
                <body>
                  <div><br>
                  </div>
                  <br>
                  <form  name="Form"  method="post"  action="serviceorder.php">
                    <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"

                       cellspacing="1">
                      <tbody>
                        <tr>
                          <td width="500">
                            <h2>New Service Order Request</h2>
                          </td>
                        </tr>
						
						<tr>
							<td>
							Tool ID <input  name="toolid"  

                               type="text">
							 
							</td>
						</tr>
						
						<tr>
                          <td>Start Date<input  name="startingdate"

                               type="date"></td>
                        </tr>
						<tr>
                          <td>End Date<input  name="endingdate"

                               type="date"></td>
                        </tr>
						
						<tr>
                          <td>Estimated Cost of Repair $<input  name="cost"

                               type="text"></td>
                        </tr>
						
	
                        <tr>
                          <td><input  name="submit"
						  value="submit" type="submit" >

                          </td>
                            <td><input  name="exit" value="Back"  onclick="window.location.href='clerkmainmenu.php'" type="button">
                            </td>
                        </tr>

						
						
                        
	
	
	
	</tbody></table>
</form>
</body></html>
<?php session_start();
$_SESSION['errormessage']=NULL;
?>
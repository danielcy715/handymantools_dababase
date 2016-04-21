              <?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */ // remove all session variables, in case it is from logout session_start(); session_unset();// destroy the sessionsession_destroy(); 
 //session_start(); ?>
              <html>
                <head>
                  <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
                  <title> Login </title>
                </head>
                <body>
                  <div  style="text-align: center;"><br>
                  </div>
                  <br>
                    <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"

                       cellspacing="1">
                      <tbody>
                        <tr>
                          <td style="text-align: left;"  width="300">
                            <h1>Tool Availability</h1>
                          </td>
                        </tr>
						<tr>
							<td>
								<table  align="center"  bgcolor="#FFFFFF"  border="1"  cellpadding="5"

                       cellspacing="1">
							<thead>
								<tr>
									<th style="width: 25%; " >Tool ID</th>
									<th style="width: 25%; " >Abbr. Description.</th>
									<th style="width: 25%; " >Deposit($)</th>
									<th style="width: 25%; " >Price/Day($)</th>
									
									
								</tr>
							</thead>
							<tbody>
							<tr>
								<td><?php echo "xxxxxx"; ?>
								</td>
								<td><?php echo "xxxxxx"; ?>
								</td>
								<td><?php echo "xxxxxx"; ?>
								</td>
								<td><?php echo "xxxxxx"; ?>
								</td>
								
			
							</tr>
							
							
							
							
							<tbody>
							</table>
						
						
							</td>
						
												
						<tr><td><hr></td>
						
						
						
						<tr>
							<td>
							<form  name="Form"  method="get"  action="tooldetail.php"  onsubmit="return validateForm()">
                  
							Part# <input  name="partnumber"  

                               type="text"><input  name="viewdetail"  value="View Detail"

 type="submit" >
							</form>   
							</td>
						</tr>
						
						
						
						<tr>
						<td>
							
						<input  name="exit"

 value="Back to Main"  onclick="window.location.href='login.php'"   type="button">
						</td>
						</tr>
						
						
                        
	
	
	
	</tbody></table>

</body></html>
<?php session_start();
$_SESSION['errormessage']=NULL;
?>
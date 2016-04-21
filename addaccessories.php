              <?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */
				session_start();
				if($_SESSION['errormessage']!=NULL) echo "<script>alert (\"".$_SESSION['errormessage']."\")</script>";
				$_SESSION['errormessage']=NULL;
				$toolid=$_SESSION['toolid'];
				//echo "$toolid";
				$_SESSION['toolidset']=1; //tell addnewtool.php that it is from addacc.php
				?>
                
			  
			  
			  <html>
                <head>
					<script type="text/javascript">
						function validateForm()
						{
						var a=document.forms["Form"]["userloginname"].value;
						var b=document.forms["Form"]["userloginpassword"].value;
						var c=document.forms["Form"]["userfirstname"].value;
						var d=document.forms["Form"]["userlastname"].value;
						if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="")
						  {
						  alert("Please Fill All Field");
						  return false;
						  }
						}
					</script>
                    <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
                    <style>
                    table {

                        border: 1px solid black;
                        width: 360px;
                        height: 160px;
                        text-align: center;
                    }
									</style>
                    <title> NewUser</title>
                </head>
                <body> <br>
                  <br>

                  <table  style="text-align: Center; margin-left: auto; margin-right: auto; width: 500px; height: 43px;"

                     border="0">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><h1>Add Accessories</h1></td>
                      </tr>
					 
                    </tbody>
                  </table>
                  <br>
                  <form  name="Form"  action="checkaddacc.php" method="get" onsubmit="return validateForm()" >
					
                    <table  style="width: 500px; height: 440px;"  align="center"

                       bgcolor="#FFFFFF"  border="0"  cellpadding="5"  cellspacing="1">
                      <tbody>
					  
						<?php for($x=1;$x<=10;$x++) 
						{							
							echo "<tr>
							  <td>".$x."
							  </td>
							  <td><input  name='acc".$x."' 

								   type='text'>
							  </td>
							</tr>";
						}
                        ?>
						
                        <tr>
							<td>
								<input  value="Submit"  name="Submit" type="submit">
							</td>
                            
						  <td><br>
						  </td>
                         </tr>
		</tbody>
	</table>
</form>
</body></html>




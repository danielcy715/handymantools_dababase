              <?php /*
 * Created on Mar 21, 2010 * * To change the template for this generated file go to * Window - Preferences - PHPeclipse - PHP - Code Templates */
				session_start();
				if($_SESSION['errormessage']!=NULL) echo "<script>alert (\"".$_SESSION['errormessage']."\")</script>";
				$_SESSION['errormessage']=NULL;
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

                  <table  style="text-align: left; margin-left: auto; margin-right: auto; width: 500px; height: 43px;"

                     border="0">
                    <tbody>
                      <tr>
                        <td><h1>Create New Profile</h1></td>
                      </tr>
					  <tr>
						  <td>
							Handyman tools Rntal requires a valid profile for every user before they can make reservations.
						  </td>
					  </tr>
                    </tbody>
                  </table>
                  <br>
                  <form  name="Form"  action="checknewuser.php" method="get" onsubmit="return validateForm()" >
                    <table  style="width: 500px; height: 440px;"  align="center"

                       bgcolor="#FFFFFF"  border="0"  cellpadding="5"  cellspacing="1">
                      <tbody>
                        <tr>
                          <td>Email Address(Login)<br>
                          </td>
                          <td><input  name="login"   type="text" required>
                          </td>
                        </tr>
                        
                        <tr>
                          <td  width="200">Password</td>
                          <td><input  name="password"  

                               type="text" required></td>
                        </tr>
						<tr>
                          <td>Confirm Password</td>
                          <td><input  name="confirmpassword"  

                               type="text" required></td>
                        </tr>
                        <tr>
                          <td>First Name</td>
                          <td><input  name="firstname"  

                               type="text" required></td>
                        </tr>
                        <tr>
                          <td>Last Name</td>
                          <td><input  name="lastname"  

                               type="text" required></td>
                        </tr>
                        <tr>
                          <td>Home Phone Area Code</td>
                          <td><input  name="homephoneareacode"  

                               type="text"></td>
                        </tr>
						<tr>
                          <td>Home Phone Local Code</td>
                          <td><input  name="homephonelocalcode"  

                               type="text"></td>
                        </tr>
                        <tr>
                          <td>Work Phone Area Code</td>
                          <td><input  name="workphoneareacode"  

                               type="text"></td>
                        </tr>
						<tr>
                          <td>Work Phone Local Code</td>
                          <td><input  name="workphonelocalcode"  

                               type="text"></td>
                        </tr>
                        <tr>
							<td>
								<input  value="Submit"  name="Submit" type="submit">
							</td>
                            <td><input  name="exit" value="Back"  onclick="window.location.href='login.php'" type="button"></td>
						  <td><br>
						  </td>
                         </tr>
		</tbody>
	</table>
</form>
</body></html>




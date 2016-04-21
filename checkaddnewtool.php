<?php
include_once 'utils.php';

session_start();

// get all related infomations from signup.php
$id=$_POST['toolid'];
$purchase_price=$_POST['purchaseprice'];
$abbreviation_description=$_POST['abbrdescription'];
$full_description=$_POST['fulldescription'];
$deposit=$_POST['depositamount'];
$price_per_day=$_POST['rentalprice'];
$tool_type=$_POST['tooltype'];

/*
echo $id,"<br>";
echo $purchase_price."<br>";
echo $abbreviation_description."<br>";
echo $full_description."<br>";
echo $deposit."<br>";
echo $price_per_day."<br>";
echo $tool_type."<br>";
exit("checkaddnewtool.php");
*/

$result = process_addnewtool($conn, $id, $purchase_price, $abbreviation_description, $full_description, $deposit, $price_per_day, $tool_type);

if($tool_type!="PowerTool"){
	

	if ($result == 0) {
	  header('Location: clerkmainmenu.php?msg=Success');
	} elseif ($result == 1) {
	  header('Location: clerkmainmenu.php?msg=Failed');
	}

}

else{
	
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

								   type='text' value=''>
							  </td>
							</tr>";
						}
                        ?>
						
                        <tr>
							<td>
								<input  type="submit">
							</td>
                            
						  <td><br>
						  </td>
                         </tr>
		</tbody>
	</table>
</form>
</body></html>






<?php } ?>

<?php
session_start(); 

?>

<html>
   <head>
      <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
      <title> Login </title>
   </head>
   <body>
      <div  style="text-align: center;color:blue">
      <?php
        if (isset($_GET['msg'])) {
          echo $_GET['msg'];
        } else {
          echo "<br>";
        }
      ?>
      </div>
      <br>
      <form  name="Form"  method="POST"  action="checkaddnewtool.php"  onsubmit="return validateForm()">
         <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
            cellspacing="1">
            <tbody>
               <tr>
                  <td style="text-align: left;"  width="500">
                     <h2>Add New Tool</h2>
                  </td>
               </tr>
               <tr>
                  <td>
                     Abbreviated Description  <input  name="abbrdescription"  type="text">
                  </td>
               </tr>
               <tr>
                  <td   style="text-align: left;">Purchase Price: $<input  name="purchaseprice"  type="float"></td>
               </tr>
               <tr>
                  <td style="text-align: left;">  Rental Price (per day): $<input  name="rentalprice"  type="float"></td>
               </tr>
               <tr>
                  <td style="text-align: left;">  Deposit Amount $<input  name="depositamount"  type="float"></td>
               </tr>
               <tr>
                  <td rows="5" valign="top">  Full Description<textarea name="fulldescription" id="fulldescription" placeholder="full description" rows="5" cols="50"></textarea>
                  </td>
               </tr>
               <tr>
                  <td>
                    
					 Tool ID: <input name="toolid" value="<?php $toolidset=$_SESSION['toolidset'];/* print($toolidset);  */
					 if($toolidset=='1'){
							$toolid=$_SESSION['toolid'];
							print "$toolid";
							$_SESSION['toolidset']=0;
							// print(" it is 1");
						 }
						 else{
							$toolid=date('YmdHis');
							print "$toolid";
							$_SESSION['toolid']=$toolid;
							// print(" it is 0");
						 }
					  
						?>">
                  </td>
               </tr>
               <tr>
                  <td style="text-align: left;">
                     Tool Type:  
                     <select  name="tooltype" id="tooltype">
                        <option  value="PowerTool">Power Tools</option>
                        <option  value="HandyTool">Hand Tools</option>
                        <option  value="ConstructionEquipment">Construction Tools</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td style="text-align: left;"> If new item is a Power Tool, you are going to input accessories in next step. 
                     
                  </td>
               </tr>
               <tr>
                  <td  style="text-align: left;"  width="300"><input  name="submit"  
                     value="Submit New Tool" type="submit" >
                  </td>
               </tr>
               <tr>
                  <td  style="text-align: left;"  width="300"><input  name="cancel"  
                     value="Cancel" onclick="window.location.href='clerkmainmenu.php'" type="button" >
                  </td>
               </tr>
            </tbody>
         </table>
      </form>
   </body>
</html>


<?php session_start();
$_SESSION['errormessage']=NULL;
?>



<?php
session_start(); 
?>


<html>
   <head>
      <meta  content="text/html; charset=utf-8"  http-equiv="content-type">
      <title> Login </title>
   </head>
   <body>
      <div  style="text-align: center;"><br>
      </div>
      <br>
      <form  name="Form"  method="get"  action=""  onsubmit="return validateForm()">
         <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
            cellspacing="1">
            <tbody>
               <tr>
                  <td style="text-align: center;"  width="300">
                     <h1>Main Menu</h1>
                  </td>
               </tr>
               <tr>
                  <td  style="text-align: center;"  width="300"><input  name="pickup"
                     value="Pick-Up Reservation"  onclick="window.location.href='pickup_input.php'"  type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;"><input  name="dropoff"
                     value="Drop-off Reservation"  onclick="window.location.href='dropoff_input.php'"  type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;"><input  name="serviceorder.php"
                     value="Service Order"  onclick="window.location.href='serviceorder.php'"  type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;"><input  name="addnewtool"
                     value="Add New Tool"  onclick="window.location.href='addnewtool.php'"   type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;"><input  name="selltool"
                     value="Sell Tool"  onclick="window.location.href='selltool.php'"   type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;"><input  name="generatereports"
                     value="Generate Reports"  onclick="window.location.href='reports.php'"   type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;"><input  name="exit"
                     value="Exit"  onclick="window.location.href='logout.php'"   type="button"></td>
               </tr>
            </tbody>
         </table>
      </form>
   </body>
</html>


<?php session_start();
$_SESSION['errormessage']=NULL;
?>


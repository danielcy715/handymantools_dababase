<?php
session_start();
if(isset($_SESSION["selected"])) {
  unset($_SESSION["selected"]);
  $_SESSION["selected"] = array();
}

if (! isset($_SESSION["userid"])) {
  header("Location: login.php?msg=Please login first!");
}
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
      <form  name="Form"  method="POST"  action=""  onsubmit="return validateForm()">
         <table  align="center"  bgcolor="#FFFFFF"  border="0"  cellpadding="5"
            cellspacing="1">
            <tbody>
               <tr>
                  <td style="text-align: center;"  width="300">
                     <h1>Main Menu</h1>
                  </td>
               </tr>
               <tr>
                  <td  style="text-align: center;"  width="300">
                  <input  name="viewprofile" value="View Profile"  
                      onclick="window.location.href='profile.php'"  type="button"></td>
               </tr>
               <tr>
                   <td  style="text-align: center;"><input  name="editprofile"
                                                            value="Edit Profile"  onclick="window.location.href='editprofile.php'"   type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;">
                  <input  name="checktoolavailability" value="Check Tool Availability"  
                      onclick="window.location.href='checktoolavailability.php'"  type="button"></td>
               </tr>
               <tr>
                  <td  style="text-align: center;">
                  <input  name="makereservation" value="Make Reservation"  
                      onclick="window.location.href='makereservation.php'"  type="button"></td>
               </tr>
               <td  style="text-align: center;"><input  name="exit"
                  value="Logout"  onclick="window.location.href='logout.php'"   type="button"></td>
               </tr>
            </tbody>
         </table>
      </form>
   </body>
</html>


<?php session_start();
$_SESSION['errormessage']=NULL;
?>

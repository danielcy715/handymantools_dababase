<?php
  session_start();
  if($_SESSION['errormessage']!=NULL) echo "<script>alert (\"".$_SESSION['errormessage']."\")</script>";
  $_SESSION['errormessage']=NULL;
?>

<html>
  <head>
    <script type="text/javascript">
      function validateForm()
      {
        var a=document.forms["Form"]["tooltype"].value;
        var b=document.forms["Form"]["startdate"].value;
        var c=document.forms["Form"]["enddate"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="") {
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
  <body>
    <br>
    <br>
    <form  name="Form"  action="tool_availability.php" method="POST" onsubmit="return validateForm()" >
      <table  style="width: 500px; height: 50px;"  align="center"
        bgcolor="#FFFFFF"  border="0"  cellpadding="5"  cellspacing="1">
        <tbody>
          <tr>
            <td>
              <h2>Check Tool Availability</h2>
            </td>
          </tr>
          <tr>
            <td>
              <hr>
            </td>
          </tr>
          <td style="text-align: left;"><b>Tool type: </b></td>
          <tr>
            <td style="text-align: left;"><input  value="PowerTool"  name="tooltype"  type="radio">Power Tools</td>
          </tr>
          <tr>
            <td style="text-align: left;"><input  value="HandyTool"  name="tooltype"  type="radio">Handy Tools</td>
          </tr>
          <tr>
            <td style="text-align: left;"><input  value="ConstructionEquipment"  name="tooltype"  type="radio">Construction Equipment</td>
          </tr>
          <tr>
            <td>
              <hr>
            </td>
          </tr>
            <td   style="text-align: left;">Starting Date: <input  name="startdate"  type="date" min="<?php echo date('Y-m-d'); ?>"></td>
          </tr>
          <tr>
            <td style="text-align: left;">Ending Date: <input  name="enddate"  type="date" min="<?php echo date('Y-m-d'); ?>"></td>
          </tr>
          <tr>
            <td style="text-align: left;"><input  name="submit"  value="Submit" type="submit"></td>
          </tr>
          <tr>
            <td style="text-align: left;"><input  name="cancel"  value="Cancel" onclick="window.location.href='custmainmenu.php'" type="button"></td>
          </tr>
        </tbody>
        <br>
        <br>
      </table>
    </form>
    </table>
    </form>
  </body>
</html>







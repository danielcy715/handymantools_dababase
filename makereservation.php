<?php

include_once 'utils.php';

session_start();

if($_SESSION['errormessage']!=NULL) echo "<script>alert (\"".$_SESSION['errormessage']."\")</script>";
$_SESSION['errormessage']=NULL;
?>



<html>
  <head>
    <script type="text/javascript">
      function validateForm()
      {
      var a=document.forms["Form"]["startingdate"].value;
      var b=document.forms["Form"]["endingdate"].value;
      var c=document.forms["Form"]["tooltype"].value;
      var d=document.forms["Form"]["toolname"].value;
      if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="")
        {
        alert("Please Fill All Field");
        return false;
        }
      }
    </script>
    
    <script>
      function showAvailableTools() {
        from = document.getElementById("from").value;
        to = document.getElementById("to").value;
        tooltype = document.getElementById("tooltype").value;
        if (tooltype == "") {
          document.getElementById("available_tools").innerHTML = "";
          return;
        } else {
          if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
          } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("available_tools").innerHTML = xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET","find_available_tools.php?from=" + from + "&to=" + to + "&tooltype=" + tooltype,true);
          xmlhttp.send();
        }
      }
    </script>
    
    <script>
      function addTool() {
        str = document.getElementById("tools").value;
        from = document.getElementById("from").value;
        to = document.getElementById("to").value;
        //document.getElementById("selectedtools").innerHTML = str;
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("selectedtools").innerHTML = xmlhttp.responseText;
          }
        };
        xmlhttp.open("GET","add_selected_tool.php?from=" + from + "&to=" + to + "&tool=" + str, true);
        xmlhttp.send();
      }
    </script>
    
    <script>
      function removeTool() {
        //document.getElementById("selectedtools").innerHTML = "";
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("selectedtools").innerHTML = xmlhttp.responseText;
          }
        };
        xmlhttp.open("GET","remove_selected_tool.php", true);
        xmlhttp.send();
      }
    </script>
    
    
    <script>
      function calTotal() {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("total").innerHTML = xmlhttp.responseText;
          }
        };
        xmlhttp.open("GET","calculate_total.php?", true);
        xmlhttp.send();
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
    <form name="Form" action="ressummary.php" method="POST" onsubmit="return validateForm()" >
      <table  style="width: 500px; height: 50px;"  align="center"
        bgcolor="#FFFFFF"  border="0"  cellpadding="5"  cellspacing="1">
        <tbody>
          <tr>
            <td>
              <h1>Make Reservation</h1>
            </td>
          </tr>
          <tr>
            <td   width="250">Starting Date</td>
            <td><input  name="startingdate" id="from" type="date" min="<?php echo date('Y-m-d'); ?>" required>     </td>
          </tr>
          <tr>
            <td>Ending Date</td>
            <td><input  name="endingdate" id="to" type="date" min="<?php echo date('Y-m-d'); ?>" required></td>
          </tr>
        </tbody>
        <br>
      </table>
      
      <br>
        <div align="center" id="selectedtools"><b>Selected tools will be listed here...</b></div>
      <br>
      
      <table  style="width: 500px; height: 150px;"  align="center"
        bgcolor="#FFFFFF"  border="0"  cellpadding="5"  cellspacing="1">
        <tbody>
          <tr>
            <td   width="250">Type of tool
            </td>
            <td>Tool
            </td>
          </tr>
          
          <tr>
            <td>
              <select  name="tooltype" id = "tooltype" onchange="showAvailableTools()">
                <option value="">Select Tool Type:</option>
                <option  value="PowerTool">Power Tools</option>
                <option  value="HandyTool">Hand Tools</option>
                <option  value="ConstructionEquipment">Construction Tools</option>
              </select>
            </td>
            
            <td>
              <div align="center" id="available_tools"></div>
            </td>
            
          </tr>
          <tr>
            <td  style="text-align: center;"  width="300"><input  name="addmoretools"
              value="Add More Tools"  onclick="addTool()"  type="button"></td>
            <td  style="text-align: center;"  width="300"><input  name="removelasttool"
              value="Remove Last Tool"  onclick="removeTool()"  type="button"></td>
          </tr>
          <tr>
            <td  style="text-align: center;"  width="300"><input  name="calculatetotal"
              value="Calculate Total"  onclick="calTotal()"  type="button"></td>
            <td id="total">$$$$$</td>
          </tr>
          <tr>
            <td  style="text-align: center;"  width="300">
              <button name="submit"  value="Submit" type="submit">Confirm</button>
            </td>
            <td  style="text-align: center;"  width="300"><input  name="cancel"  
              value="Cancel" onclick="window.location.href='custmainmenu.php'" type="button" ></td>
          </tr>
        </tbody>
      </table>
    </form>
  </body>
</html>


<?php

#echo 'startingdate';
#echo _post('startingdate');

#$_SESSION["startingdate"] = _post('startingdate');
#$_SESSION["endingdate"] = _post('endingdate');
#$_SESSION["tooltype"] = _post('tooltype');
#$_SESSION["toolname"] = _post('toolname');

?>


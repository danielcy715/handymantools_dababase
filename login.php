<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>


<html>
   <head>
      <meta content="text/html; charset=utf-8" http-equiv="content-type">
      <title> Login </title>
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="css/bootstrap.min.css">

       <!-- jQuery library -->
       <script src="jquery.min.js"></script>

       <!-- Latest compiled JavaScript -->
       <script src="/js/bootstrap.min.js"></script>
   </head>
   <body>

      <h1 align="center"><img src="handymantoolspic.jpg" alt="handymantool" >
          </h1>
      <h1 align="center">Handyman Tools Inventory Management System
      </h1>
      <div style="text-align: center;color:red">
      <?php
        if (isset($_GET['msg'])) {
          echo $_GET['msg'];
        } else {
          echo "<br>";
        }
      ?>
      </div>
      <br>

      </form>
          <section class="container">
          <section class="login-form">
              <div class="panel panel-default">
                  <div class="panel-heading" align="center">USER LOGIN</div>
                  <div class="panel-body">
                      <form method="post" action="checklogin.php" role="login">
                          <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="5" cellspacing="1">
                              <tbody>
                              <tr>
                                  <td>Email</td>
                                  <td>
                                  <input type="email" name="login" class="form-control input-lg" placeholder="Email" required>
                                      <br>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Password  </td>
                                  <td>
                                <input type="password" name="password" class="form-control input-lg" placeholder="Password" required>
                                      <br>
                                  </td>
                              </tr>
                              <tr>
                              <td align="center">Clerk
                                  <input value="clerk" name="userid" type="radio" required>
                              </td>
                              <td align="center">Customer
                                  <input value="customer" name="userid" type="radio" required>
                              </td>
                              </tr>
                              <tr><br></tr>
                              </tbody>
                          </table>
                          <br>
                          <button type="submit" name="go" class="btn btn-lg btn-info btn-block">SIGN IN NOW</button>
                          <br>
                          <div class="form-links" align="center">
                            <span class="glyphicon glyphicon-user text-primary"></span> <a href="register.php">Create New Account</a>
                          </div>

                      </form>
                  </div>
              </div>

    

          </section>
      </section>

   </body>
</html>


<?php
session_start();

?>



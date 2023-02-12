<?php include "../../database_connect.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" bgcolor="orange">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Admin Login Form</h1>
              <div>
                <input type="text" name="id" class="form-control" placeholder="Admin" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                  <button type="submit" class="btn btn-default submit" name="submit_log">Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Jiwaji University</h1>
                  © 2021 Jiwaji Unversity All Rights Reserved. Developed By <a href="https://eibo.in/">EIBO Software (EIBO Services Pvt Ltd)</a>
                </div>
              </div>
            </form>
          </section>
        </div>
<?php
	session_start();

if(isset($_POST[submit_log]))
{
    
    if($_POST[id]=="admin")
    {
        $sel="SELECT * FROM `admin_password` WHERE `admin_password`='$_POST[password]'";
        $res=$con->query($sel);
        if ($res->num_rows > 0)
        {
          $_SESSION[admin]=$_POST[id];
          $_SESSION[admin_password]=$_POST[password];
          
          //echo $_SESSION[d_id];
    	  //echo $_SESSION[d_password];
          echo "<script>location.href='index.php';</script>";
        }
        else{
          	echo "<script>alert('Invalid user name or Password');
        	location.href='login.php';</script>";
        }
    }
    else{
          	echo "<script>alert('Invalid User ID');
        	location.href='login.php';</script>";
        }
}
?>
      </div>
    </div>
  </body>
</html>

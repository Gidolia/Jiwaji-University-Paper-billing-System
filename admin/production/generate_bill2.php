<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Cut Bill || Jiwaji</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script>
        function showResult(str) {
          if (str.length==0) {
            document.getElementById("livesearch").innerHTML="";
            document.getElementById("livesearch").style.border="0px";
            return;
          }
          var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              document.getElementById("livesearch").innerHTML=this.responseText;
              document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            }
          }
          xmlhttp.open("GET","teacher_search.php?q="+str,true);
          xmlhttp.send();
        }
    </script>
    
    
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include "include/sidebar.php";?>
        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cut Bill</h3>
              </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <?php 
                        $ey="SELECT * FROM `subjects` WHERE `s_code`='$_GET[s_id]'";
                        $rf=$con->query($ey);
                        $f=$rf->fetch_assoc();
                        
                        $te="SELECT * FROM `teachers` WHERE `t_id`='$_GET[t_id]'";
                        $rff=$con->query($te);
                        $ft=$rff->fetch_assoc();
                     ?>
                      <table class="table table_border">
                          <tr><th>Subject Name</th><td><?php echo $f[subject_name];?></td></tr>
                          <tr><th>Teacher Name</th><th><?php echo $ft[teacher_name];?></th></tr>
                          <tr><th>Bank Account</th><td><?php echo $ft[bank_acc_no];?></td></tr>
                          <tr><th>IFSC Code</th><td><?php echo $ft[bank_ifsc];?></td></tr>
                          <tr><th>Pan Card</th><td><?php echo $ft[pan_card];?></td></tr>
                          <tr><th>Balance</th><td><h3><?php echo $ft[balance]+0;?></h3></td></tr>
                      </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Last 3 Bill History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table table-border">
                          <tr><th>Bill ID</th><th>Description</th><th>Types of Work</th><th>Date</th></tr>
                     <?php 
                        //$ey="SELECT * FROM `bill` WHERE `t_id`='$_GET[t_id]'";
                        $ey="SELECT * FROM bill WHERE `t_id`='$_GET[t_id]' 
                            ORDER BY bill_id 
                            DESC
                            LIMIT 3";
                        $rf=$con->query($ey);
                       while($f=$rf->fetch_assoc())
                       {
                           /////////////////////////tow
                    $towsem="SELECT name FROM `types_of_work` WHERE `tow_id`='$f[tow_id]'";
                    $towsem=$con->query($towsem);
                    $tow_fet=$towsem->fetch_assoc();
                     ?>
                      
                          <tr><th><?php echo $f[bill_id];?></th><td><?php echo $f[description];?></td><td><?php echo $tow_fet[name];?></td><td><?php echo $f[date];?></td></tr>
                          
                          
                    <?php }?>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" onClick="refreshPage()">Cut More Bill</button>

<script>
function refreshPage(){
    window.location.reload();
} 
</script>
     
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <?php
                    if($ft[balance]<100000)
                    {?>
                    <iframe src="iframe_select_teacher.php?s_id=<?php echo $_GET[s_id];?>&t_id=<?php echo $_GET[t_id];?>" width="100%" height="500"></iframe>
                    <?php }
                    else{echo "You Cannot Cut Bill";}?>
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php include "include/footer.php";?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

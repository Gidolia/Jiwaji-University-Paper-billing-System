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
<!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Teacher Bill History List</h2>
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
                    <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-buttons"></label></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        
                        
                             
        <div class="card-box table-responsive">
        <table class="table table-striped jambo_table" id="datatable-buttons">
            <thead><tr class="headings"><th>Bill ID</th><th>Teacher Name</th><th>Date & Time</th><th>Course/Class/Semester</th><th>Types Of Work</th><th>Description</th><th>QTY</th><th>Amount</th></tr></thead>
            <tbody>
                <?php
                
                $sel="SELECT * FROM `bill` WHERE `t_id`='$_GET[t_id]'";
                $sp=$con->query($sel);
                while($e=$sp->fetch_assoc())
                {
                    $t_count=0;
                    $dd="SELECT teacher_name FROM `teachers` WHERE `t_id`='$e[t_id]'";
                    $t=$con->query($dd);
                    $t_fet=$t->fetch_assoc();
                    
                    /////////////course
                    $ddc="SELECT name FROM `course` WHERE `c_id`='$e[course_id]'";
                    $tc=$con->query($ddc);
                    $c_fet=$tc->fetch_assoc();
                    
                    /////////////////////////class
                    $ddcl="SELECT name FROM `class` WHERE `class_id`='$e[class_id]'";
                    $tcl=$con->query($ddcl);
                    $cl_fet=$tcl->fetch_assoc();
                    
                    /////////////////////////semester
                    $ddsem="SELECT name FROM `semester` WHERE `s_id`='$e[sem_id]'";
                    $tsem=$con->query($ddsem);
                    $sem_fet=$tsem->fetch_assoc();
                    
                    /////////////////////////tow
                    $tow_sem="SELECT name FROM `types_of_work` WHERE `tow_id`='$e[tow_id]'";
                    $towsem=$con->query($tow_sem);
                    $tow_fet=$towsem->fetch_assoc();
                ?>
                <tr>
                    <td><?php echo $e[bill_id];?></td>
                    <td><?php echo $t_fet[teacher_name];?></td>
                    <td><?php echo $e[date]." / ".$e[time];?></td>
                    <td><?php echo $c_fet[name]." / ".$cl_fet[name]." / ".$sem_fet[name];?></td>
                    <td><?php echo $tow_fet[name];?></td>
                    <td><?php echo $e[description];?></td>
                    <td><?php echo $e[qty];?> </td>
                    <th><?php echo $e[final_amount];?></th>
                </tr>
                <?php }?>
            </tbody>
            
        </table>
        
           </div>         
                    
                    
                    
                  </div>
                </div>
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

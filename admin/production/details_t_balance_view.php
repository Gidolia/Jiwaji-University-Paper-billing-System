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
                    <h2>Teacher Balance View List</h2>
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
                        
                        
                             
        <div class="card-box table-responsive">
        <table class="table table-striped jambo_table" id="datatable-buttons">
            <thead><tr class="headings"><th>No.</th><th>Teacher id</th><th>Bill id</th><th>Date / Time</th><th>Note</th><th>Amount</th><th>Before Amount</th><th>After Amount</th></tr></thead>
            <tbody>
                <?php
                $rel="SELECT * FROM `teacher_balance_history` WHERE `t_id`='$_GET[t_id]'";
                
                $hggp=$con->query($rel);
                while($e=$hggp->fetch_assoc())
                { ?>
                <tr>
                    <td><?php echo $e[tbh_id];?></td>
                    <td><?php echo $e[t_id];?></td>
                    <td><?php echo $e[bill_id];?></td>
                    <td><?php echo $e[date]." / ".$e[time];?></td>
                    <td><?php echo $e[note];?></td>
                    <td><?php echo $e[amount];?> </td>
                    <th><?php echo $e[b_bal];?></th>
                    <th><?php echo $e[a_bal];?></th>
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

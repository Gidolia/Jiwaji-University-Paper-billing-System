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

    <title>Types Of Work || Jiwaji</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                <h3>Types of Work</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enter Types Of Work</h2>
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
                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <input type="hidden" name="c_id" value="<?php echo $_GET[c_id];?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Types Of Work <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="tow">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3"> Rate / Price <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="number" required="required" class="form-control " name="rate">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3"> Min Amount <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="number" required="required" class="form-control " name="min_amount">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name="sub_submit">Submit</button>
                        </div>
                      </div>
                    </form>
                   
                   <?php
                   if(isset($_POST[sub_submit]))
                   {
                       $erte="INSERT INTO `types_of_work` (`tow_id`, `name`, `class_id`, `price`, `min_amount`) VALUES (NULL, '$_POST[tow]', '$_POST[c_id]', '$_POST[rate]', '$_POST[min_amount]');";
                       //$erte="INSERT INTO `semester` (`s_id`, `class_id`, `name`) VALUES (NULL, '$_POST[class_id]', '$_POST[semester]');";
                       
                       if($con->query($erte)===TRUE)
                       {
                           echo "<script>alert('Success! types of work entered successfully');
        	                     location.href='types_of_work.php?s=s&c_id=$_POST[c_id]';</script>";
                       }
                       else{
                           $df="INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', '$_SESSION[admin]', '$_SESSION[e_id]', 'Types of work', '$date', '$time', 'Types of work');";
                           $con->query($df);
                           echo "<script>alert('Failed! Plz Try Again');
        	                     location.href='types_of_work.php?s=f&c_id=$_POST[c_id]';</script>";
                       }
                   }
                   ?>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Types of Work</h2>
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
            <thead><tr class="headings"><th>Sr. No.</th><th>Types Of Works</th><th>Rate</th><th>Min Rate</th></tr></thead>
            <tbody>
                <?php
                $sel="SELECT * FROM `types_of_work` WHERE `class_id`='$_GET[c_id]'";
                $sp=$con->query($sel);
                while($e=$sp->fetch_assoc())
                {
                ?>
                <tr>
                    <td><?php echo $e[tow_id];?></td>
                    <td><?php echo $e[name];?></td>
                    <td><?php echo $e[price];?></td>
                    <td><?php echo $e[min_amount];?></td>
                </tr>
                <?php }?>
            </tbody>
            
        </table>
        
           </div>         
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
    
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

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

    <title>Calculate Bill || Jiwaji</title>

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
                <h3> Calculate Bill</h3>
              </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enter Bill ID</h2>
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
                      
                      
                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="process_calculate_bill.php">
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">From Bill ID <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="from_bill">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">TO Bill ID <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="to_bill">
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
                   
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bill Printed</h2>
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
            <thead><tr class="headings"><th>GB ID</th><th>Date / Time</th><th>From Bill - To Bill</th><th>No. Teacher</th><th>Twf</th><th>Amount Paid</th><th></th><th></th></tr></thead>
            <tbody>
                <?php
                $sel="SELECT * FROM `generate_bill`";
                $sp=$con->query($sel);
                while($e=$sp->fetch_assoc())
                {
                ?>
                <tr>
                    <td><?php echo $e[gb_id];?></td>
                    <td><?php echo $e[date]." / ".$e[time];?></td>
                    <td><?php echo $e[bill_id_from]." - ".$e[bill_id_to];?></td>
                    <td><?php echo $e[total_teacher];?></td>
                    <td><?php echo $e[twf_collect];?></td>
                    <td><?php echo $e[net_pay_amount];?></td>
                    <td><a href="print_bill.php?gb_id=<?php echo $e[gb_id];?>" target="_blank">Print Bill ID</a></td>
                    <td><a href="clear_balance_history_dlist.php?gb_id=<?php echo $e[gb_id];?>" target="_blank">Print Bank Sheet</a></td>
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
    
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

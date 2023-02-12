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

    <title>Jiwaji University, Gwalior</title>

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
   
        <style>
@font-face { font-family: kitfont; src: url('1979 Dot Matrix Regular.TTF'); } 

.customFont { /*  <div class="customFont" /> */

font-family: "Calibri";
font-size:10;
}
@page {
        size: 14in 12in /* . Random dot? */;
    }
    </style>
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
                <h3>bill id</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clear Balance History</h2>
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
                $sel="SELECT * FROM `clear_balance` WHERE `cb_id`='$_GET[cb_id]'";
                $sp=$con->query($sel);
                $e=$sp->fetch_assoc();
                echo $e[amount_distributed];
        ?>
                        
                             
        <div class="card-box table-responsive">
        <table class="table table-striped jambo_table" id="datatable-buttons" font>
            <thead><tr class="headings"><th>Sr. No.</th><th>Bill ID</th><th>Teacher Name</th><th>Bank Name</th><th>Acc No</th><th>IFSC</th><th>Amount</th></tr></thead>
            <tbody>
                <?php
                $seltbh="SELECT * FROM `generate_bill_records` WHERE `gb_id`='$_GET[gb_id]'";
                $sptbh=$con->query($seltbh);
                while($etbh=$sptbh->fetch_assoc())
                {
                    $a++;
                    
                    $selt="SELECT * FROM `teachers` WHERE `t_id`='$etbh[t_id]'";
                    $qut=$con->query($selt);
                    $rtyv=$qut->fetch_assoc();
                ?>
                <tr>
                    <td><?php echo $a;?></td>
                    <td><?php echo $etbh[gbr_id];?></td>
                    <td><?php echo $rtyv[title]." ".$rtyv[teacher_name];?></td>
                    <td><?php echo $rtyv[bank_name];?></td>
                    <td><?php echo $rtyv[bank_acc_no];?></td>
                    <td><?php echo $rtyv[bank_ifsc];?></td>
                    <td><?php echo $etbh[net_amount];?></td>
                   
                </tr>
                <?php 
                $sdff=$sdff+$etbh[net_amount];
                }?>
                <tr>
                    <td><?php $a++; echo $a;?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Total</th>
                    <th><?php echo $sdff;?></th>
                   
                </tr>
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

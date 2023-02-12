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

    <title>Details Teacher || Jiwaji</title>

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
                <h3>Details Teacher</h3>
              </div>
            </div>
            
 <?php 
            
            $detail="SELECT * FROM `teachers` WHERE `t_id`='$_GET[t_id]'";
            $det=$con->query($detail);
            $d=mysqli_fetch_assoc($det); ?> 
            <div class="clearfix"></div>
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Details Teacher</h2>
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
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Teacher Name<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["title"]." ".$d["teacher_name"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Subject  Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["subject_name"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Mobile No. <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["mobile_no"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Bank Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["bank_name"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">A/C No. <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["bank_acc_no"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">IFSC <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["bank_ifsc"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Pancard No. <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["pan_card"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Addreass <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" value="<?php echo $d["addreass"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                          
                        <div class="col-md-6 col-sm-6 offset-md-3">
                         <?php 
                        $trv=$_GET[t_id];
                         ?>
                         <a href="teacher_list.php"><button class="btn btn-primary" >Back Now </button></a>
						  <a href="details_teacher_bill.php?t_id=<?php echo $trv;?>" target="a"><button class="btn btn-primary" >Bill History </button></a>
                          <a href="details_t_balance_view.php?t_id=<?php echo $trv;?>" target="a"><button  class="btn btn-success"> Teacher Balance View</button></a>
                          
                        </div>
                      </div>
                      <div class="ln_solid"></div>
        <iframe name="a" width="100%" height="500" style="border:0px solid black;">
       </iframe>
         <div class="ln_solid"></div>
              
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

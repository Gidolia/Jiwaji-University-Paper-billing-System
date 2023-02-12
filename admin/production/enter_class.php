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

    <title>Enter class || Jiwaji</title>

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
                  <?php
                  $red="SELECT * FROM `course` WHERE `c_id`='$_GET[c]'";
                  $dvb=$con->query($red);
                  $f=$dvb->fetch_assoc();
                  ?>
                <h3> <?php echo $f[name];?> Class</h3>
              </div>
            </div>

            <div class="clearfix"></div>
<?php
if($_GET[s]=='s'){?>
                  <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> Class Name = <strong><?php echo $_GET[s_name];?></strong> Entered Successfully
                  </div>
<?php }
elseif($_GET[s]=='f'){
?>
                  <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Failed!</strong> Please Reenter <strong>Class Name = <?php echo $_GET[s_name];?></strong> (Some problem Occours)
                  </div>

<?php }?>


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enter <?php echo $f[name];?> Class</h2>
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
                      <input type="hidden" name="c_id" value="<?php echo $_GET[c];?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Class Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="class_name">
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
                       
                       $erte="INSERT INTO `class` (`class_id`, `c_id`, `name`) VALUES (NULL, '$_POST[c_id]', '$_POST[class_name]');";
                       if($con->query($erte)===TRUE)
                       {
                           echo "<script>alert('Teacher Enter Sucessfully');
        	                     location.href='enter_class.php?s=s&s_name=$_POST[class_name]&c=$_POST[c_id]';</script>";
                       }
                       else{
                           $df="INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', '$_SESSION[admin]', '$_SESSION[e_id]', 'Enter Class', '$date', '$time', 'Enter Class');";
                           $con->query($df);
                           echo "<script>alert('Failed! Plz Try Again');
        	                     location.href='enter_class.php?s=f&s_name=$_POST[class_name]&c=$_POST[c_id]';</script>";
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
                    <h2>Enter <?php echo $f[name];?> Class</h2>
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
            <thead><tr class="headings"><th>C ID</th><th>Class</th><th></th></tr></thead>
            <tbody>
                <?php
                $sel="SELECT * FROM `class` WHERE `c_id`='$_GET[c]'";
                $sp=$con->query($sel);
                while($e=$sp->fetch_assoc())
                {
                ?>
                <tr>
                    <td><?php echo $e[class_id];?></td>
                    <td><a href="enter_semester.php?class_id=<?php echo $e[class_id];?>"><?php echo $e[name];?></a></td>
                    <td><a href="enter_semester.php?class_id=<?php echo $e[class_id];?>">Semester List</a></td>
                    
                    
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

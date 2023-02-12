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

    <title>Enter Teacher || Jiwaji</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script> 
    function validateForm() {
        var pancard = document.forms["sigupForm"]["pan_ck"].value;
        
        if(pancard=="This Pancard is Already Register")
    	{
    	    document.getElementById("text_email").innerHTML = " This Email id is Already Register ";
        return false;
    	}
    }
    function showHint_pan(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint_pan").value = this.responseText;
        if(this.responseText != "Correct")
				{
					document.getElementById("text_pan").innerHTML = this.responseText;
				}
		else{ document.getElementById("text_pan").innerHTML = "";
		}
        
      }
    };
    xmlhttp.open("GET", "get_fetch_teacher.php?q=" + str, true);
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
                <h3>Enter Teacher</h3>
              </div>
            </div>

            <div class="clearfix"></div>
<?php
if($_GET[s]=='s'){?>
                  <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> Subject Name = <strong><?php echo $_GET[s_name];?></strong> Entered Successfully
                  </div>
<?php }
elseif($_GET[s]=='f'){
?>
                  <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Failed!</strong> Please Reenter <strong>Subject Name = <?php echo $_GET[s_name];?></strong> (Some problem Occours)
                  </div>

<?php }?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enter Teacher</h2>
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
                      
                      
                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" name="sigupForm" onsubmit="return validateForm()">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Subject  Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control " name="s_id">
                                <?php 
                                $ey="SELECT * FROM `subjects`";
                                $rf=$con->query($ey);
                                while($f=$rf->fetch_assoc())
                                {
                                ?>
                                <option value="<?php echo $f[s_code];?>"><?php echo $f[subject_name];?></option>
                                <?php }?>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control " name="title">
                                <option value="Dr .">Dr</option>
                                <option value="Prof .">Prof</option>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Teacher Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="teacher_name">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Mobile No. <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="number" required="required" class="form-control " name="mobile">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Bank Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="bank_name">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">A/C No. <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="number" required="required" class="form-control " name="acc_no">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">IFSC <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="ifsc">
                        </div>
                      </div>
                        <span id="text_pan" style="color: red"></span>
                            <input type="hidden" name="pan_ck" value="This Pancard is Already Register" id="txtHint_pan" readonly />
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Pancard No. <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="pan_card" onKeyUp="showHint_pan(this.value)">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Addreass <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" required="required" class="form-control " name="addreas">
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
                       $eyw="SELECT * FROM `subjects` WHERE `s_code`='$_POST[s_id]'";
                                $rfw=$con->query($eyw);
                                $fw=$rfw->fetch_assoc();
                       
                       $erte="INSERT INTO `teachers` (`t_id`, `s_id`, `title`, `teacher_name`, `mobile_no`, `bank_name`, `bank_acc_no`, `bank_ifsc`, `balance`, `subject_name`, `pan_card`, `addreass`) VALUES (NULL, '$_POST[s_id]', '$_POST[title]', '$_POST[teacher_name]', '$_POST[mobile]', '$_POST[bank_name]', '$_POST[acc_no]', '$_POST[ifsc]', '0', '$fw[subject_name]', '$_POST[pan_card]', '$_POST[addreas]');";
                       if($con->query($erte)===TRUE)
                       {
                           echo "<script>alert('Teacher Enter Sucessfully');
        	                     location.href='enter_teacher.php?s=s&s_name=$_POST[teacher_name]';</script>";
                       }
                       else{
                           $df="INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', '$_SESSION[admin]', '$_SESSION[e_id]', 'Enter Teacher', '$date', '$time', 'Enter Teacher');";
                           $con->query($df);
                           echo "<script>alert('Failed! Plz Try Again');
        	                     location.href='enter_teacher.php?s=f&s_name=$_POST[teacher_name]';</script>";
                       }
                   }
                   ?>
                   
                    
                    
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

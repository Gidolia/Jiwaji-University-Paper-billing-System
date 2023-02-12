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
  num1 = document.getElementById("sub_name").value;
  xmlhttp.open("GET","teacher_search.php?q="+str+"&e="+num1,true);
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
                      
                      
                     <form method="get" action="generate_bill2.php" autocomplete="off">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control " name="s_id" id="sub_name" autofocus>
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
                        <label class="col-form-label col-md-3 col-sm-3">Enter Teacher Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" autocomplete="off" name="teacher_name" class="form-control " onkeyup="showResult(this.value)">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Select Multiple</label>
                        <div class="col-md-9 col-sm-9 ">
                          <select class="select2_multiple form-control" name="t_id" multiple="multiple" id="livesearch">
                      
                      </select>
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

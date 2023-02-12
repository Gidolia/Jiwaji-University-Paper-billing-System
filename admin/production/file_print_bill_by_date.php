<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Jiwaji</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
  <body>
<div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
            
<?php
include "config.php";
$tech="SELECT * FROM `teachers`";
$tech_que=$con->query($tech);
while($tec_fet=$tech_que->fetch_assoc())
{
    $tot_f=0;
    $xcv="SELECT * FROM `bill` WHERE `t_id`='$tec_fet[t_id]'";
    $xcvb=$con->query($xcv);
    if($xcvb->num_rows>0)
    {
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $tec_fet[title]." ".$tec_fet[teacher_name];?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
ID = <?php echo $tec_fet[t_id];?>,
Addreass = <?php echo $tec_fet[addreass];?>, &nbsp;&nbsp;&nbsp;&nbsp;
Bank Name = <?php echo $tec_fet[bank_name];?>, &nbsp;&nbsp;&nbsp;&nbsp;Acc No. = <?php echo $tec_fet[bank_acc_no];?>,&nbsp;&nbsp;&nbsp;&nbsp; IFSC = <?php echo $tec_fet[bank_ifsc];?>
<table class="table table-striped jambo_table" id="datatable-buttons">
    <tr><th>Class</th><th>SEM.</th><th>Types Of Work</th><th> Description </th><th>QTY</th><th>Amount</th></tr>
<?php
    
    while($rfh=$xcvb->fetch_assoc())
    {
        ////////////////////for fetching tow id name
        $vfb="SELECT * FROM `types_of_work` WHERE `tow_id`='$rfh[tow_id]'";
        $mnbg=$con->query($vfb);
        $bvn=$mnbg->fetch_assoc();
        
        /////////for fetching class id
        $class_sel="SELECT * FROM `class` WHERE `class_id`='$rfh[class_id]'";
        $class_que=$con->query($class_sel);
        $class_d=$class_que->fetch_assoc();
        
        //////////////////for fetching semester id
        $sem_sel="SELECT * FROM `semester` WHERE `s_id`='$rfh[sem_id]'";
        $sem_que=$con->query($sem_sel);
        $sem_fet=$sem_que->fetch_assoc();
    ?>
        
            <tr><td><?php echo $class_d[name];?></td><td><?php echo $sem_fet[name];?></td><td><?php echo $bvn[name];?></td><td><?php echo $rfh[description];?></td><td><?php echo $rfh[qty];?></td><td><?php echo $rfh[final_amount];?>/-</td></tr>
       <?php 
       $tot_f=$tot_f+$rfh[final_amount];
     
    }?>
    <tr><th colspan="5">TOTAL</th><th><?php echo $tot_f;?>/-</th></tr>
    </table>
            </div>
        </div>
    </div>
    </div>
    <?php
    }
}

?>
</div>
</div>
</div>
</body>
</html>
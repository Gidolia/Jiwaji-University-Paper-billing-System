<?php
include "config.php";
?>
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
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
@font-face { font-family: kitfont; src: url('1979 Dot Matrix Regular.TTF'); } 

.customFont { /*  <div class="customFont" /> */

font-family: "Calibri";
font-size:10;
}
    </style>
  </head>
  <body>
<div class="container body">
    <div class="main_container">
        <div class="right_col" role="main">
            <?php
            
            
            ?>
            <h2 align="center">JIWAJI UNIVERSITY, GWALIOR</h2>
            <h2 align="center">Remuneration Register of Examiners for the Examination 2021</h2>
<?php
$gb_sel="SELECT * FROM `generate_bill` WHERE `gb_id`='$_GET[gb_id]'";
$gb_que=$con->query($gb_sel);
$gb_fet=$gb_que->fetch_assoc();
echo "<h3 align='center'>Bill ID ".$gb_fet[bill_id_from]." - ".$gb_fet[bill_id_to]."</h3>";



$tech="SELECT * FROM `generate_bill_records` WHERE `gb_id`='$_GET[gb_id]'";
$tech_que=$con->query($tech);
while($tec_fet=$tech_que->fetch_assoc())
{   ///////////fetch teacher Detail
    $fvfvfv="SELECT * FROM `teachers` WHERE `t_id`='$tec_fet[t_id]'";
    $dcdj=$con->query($fvfvfv);
    $t_det=$dcdj->fetch_assoc();
    
    $s_selo="SELECT * FROM `subjects` WHERE `s_code`='$t_det[s_id]'";
    $s_queo=$con->query($s_selo);
    $s_ert=$s_queo->fetch_assoc();
?>
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $t_det[title]." ".$t_det[teacher_name];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Bill ID = <?php echo $tec_fet[gbr_id];?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Subject = <?php echo $s_ert[subject_name];?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><?php
    $dcc="SELECT * FROM `generate_bill_records_bills` WHERE `gbr_id`='$tec_fet[gbr_id]'";
    $rfv=$con->query($dcc);
    ?>
    
    Teacher ID = <?php echo $t_det[t_id];?>,&nbsp;&nbsp;&nbsp;&nbsp;
Addreass = <?php echo $t_det[addreass];?>, &nbsp;&nbsp;&nbsp;&nbsp;
Bank Name = <?php echo $t_det[bank_name];?>, &nbsp;&nbsp;&nbsp;&nbsp;Acc No. = <?php echo $t_det[bank_acc_no];?>,&nbsp;&nbsp;&nbsp;&nbsp; IFSC = <?php echo $t_det[bank_ifsc];?>
<table class="table table-striped jambo_table" id="datatable-buttons">
    <tr><th>Bill No.</th><th>Class</th><th>SEM.</th><th>Types Of Work</th><th> Description </th><th>QTY</th><th>Rate</th><th>Amount</th><th>TWF</th><th>Net Amount</th></tr>
<?php
    
    while($fc=$rfv->fetch_assoc())
    {
        $tot_f=0;
        $xcv="SELECT * FROM `bill` WHERE `bill_id`='$fc[bill_id]'";
        $xcvb=$con->query($xcv);
        $bi=$xcvb->fetch_assoc();
        ////////////////////for fetching tow id name
        $vfb="SELECT * FROM `types_of_work` WHERE `tow_id`='$bi[tow_id]'";
        $mnbg=$con->query($vfb);
        $bvn=$mnbg->fetch_assoc();
        
        /////////for fetching class id
        $class_sel="SELECT * FROM `class` WHERE `class_id`='$bi[class_id]'";
        $class_que=$con->query($class_sel);
        $class_d=$class_que->fetch_assoc();
        
        //////////////////for fetching semester id
        $sem_sel="SELECT * FROM `semester` WHERE `s_id`='$bi[sem_id]'";
        $sem_que=$con->query($sem_sel);
        $sem_fet=$sem_que->fetch_assoc();
    ?>
        
            <tr><td><?php echo $bi[bill_id];?></td><td><?php echo $class_d[name];?></td><td><?php echo $sem_fet[name];?></td><td><?php echo $bvn[name];?></td><td><?php echo $bi[description];?></td><td><?php echo $bi[qty];?></td><td><?php echo $bi[price];?>/-</td><td><?php echo $bi[final_amount];?>/-</td><td><?php echo $bi[twf];?>/-</td><td><?php echo $bi[net_amount];?>/-</td></tr>
       <?php 
       $tot_f=$tot_f+$bi[final_amount];
     
    }?>
    <tr><th colspan="5">TOTAL</th><th></th><th></th><th><?php echo $tec_fet[total_amount];?>/-</th><th><?php echo $tec_fet[twf_cut];?>/-</th><th><?php echo $tec_fet[net_amount];?>/-</th></tr>
    <?php $bill_amount=$bill_amount+$tec_fet[total_amount];
        $total_twf=$total_twf+$tec_fet[twf_cut];
        $total_payable_amount=$total_payable_amount+$tec_fet[net_amount];
    ?>
    </table>
    </div>
    </div>
</div></div>
    <?php
}?>


<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bill Summary</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">    
    <h3>Total Bill Amount = <?php echo $bill_amount;?></h3>
    <h3>Total TWF = <?php echo $total_twf;?></h3>
    <h3>Total Payable Amount = <?php echo $total_payable_amount;?></h3>
    </div>
    </div>

        </div>
    </div>
</div>
</body>
</html>
<?php
function caulmb($txt,$size)
{
    global $myfile;
    $space_remin=$size-strlen($txt);
    
    fwrite($myfile, $txt);
    for ($x = 0; $x < $space_remin; $x++) {
      $txtee = " ";
      fwrite($myfile, $txtee);
    }
    
}
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "                         JIWAJI UNIVERSITY, GWALIOR * Remuneration Register of Examiners for the Examination 2021 \n";
fwrite($myfile, $txt);


$txt = "      ".$date."            Bill Passing from bill-id  ".$gb_fet[bill_id_from]." to ".$gb_fet[bill_id_to]." \n";
fwrite($myfile, $txt);


$txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);


$txt = " Teacher ID     Name              Addreass                                                  QTY.    Rate    Total     TWF     Bill-ID     Date\n";
fwrite($myfile, $txt);

$txt = " Subject        Class    Yr/sem   Remuneration For           Particular                                      Amt      Amt          Bill Amount\n";
fwrite($myfile, $txt);

$txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);

/////////////////////////
/////////////////////////////////
///////////////////////////////////////

$tech="SELECT * FROM `generate_bill_records` WHERE `gb_id`='$_GET[gb_id]'";
$tech_que=$con->query($tech);
while($tec_fet=$tech_que->fetch_assoc())
{   ///////////fetch teacher Detail
    $fvfvfv="SELECT * FROM `teachers` WHERE `t_id`='$tec_fet[t_id]'";
    $dcdj=$con->query($fvfvfv);
    $t_det=$dcdj->fetch_assoc();
    
    $s_selo="SELECT * FROM `subjects` WHERE `s_code`='$t_det[s_id]'";
    $s_queo=$con->query($s_selo);
    $s_ert=$s_queo->fetch_assoc();
    $txtee = "  ";

    fwrite($myfile, $txtee);caulmb($t_det[t_id],'8'); caulmb($t_det[title],'4'); caulmb($t_det[teacher_name],'22'); caulmb($t_det[addreass],'56'); caulmb(" ",'34');caulmb($tec_fet[gbr_id],'8');caulmb($tec_fet[date],'10');
    fwrite($myfile, "\n  ");caulmb($s_ert[subject_name],'117');caulmb(" ",'16');caulmb(" ",'16');
    
    
    
    
    
    $dcc="SELECT * FROM `generate_bill_records_bills` WHERE `gbr_id`='$tec_fet[gbr_id]'";
    $rfv=$con->query($dcc);

    while($fc=$rfv->fetch_assoc())
    {
        $tot_f=0;
        $xcv="SELECT * FROM `bill` WHERE `bill_id`='$fc[bill_id]'";
        $xcvb=$con->query($xcv);
        $bi=$xcvb->fetch_assoc();
        ////////////////////for fetching tow id name
        $vfb="SELECT * FROM `types_of_work` WHERE `tow_id`='$bi[tow_id]'";
        $mnbg=$con->query($vfb);
        $bvn=$mnbg->fetch_assoc();
        
        /////////for fetching class id
        $class_sel="SELECT * FROM `class` WHERE `class_id`='$bi[class_id]'";
        $class_que=$con->query($class_sel);
        $class_d=$class_que->fetch_assoc();
        
        //////////////////for fetching semester id
        $sem_sel="SELECT * FROM `semester` WHERE `s_id`='$bi[sem_id]'";
        $sem_que=$con->query($sem_sel);
        $sem_fet=$sem_que->fetch_assoc();
        
        
        
        
        fwrite($myfile, "\n              ");caulmb($class_d[name],'10');caulmb($sem_fet[name],'6');caulmb($bvn[name],'20');caulmb($bi[description],'42');caulmb($bi[qty],'8');caulmb($bi[price]."/-",'8');caulmb($bi[price]."/-",'8');caulmb($bi[twf]."/-",'8');
    
        
        
    
       $tot_f=$tot_f+$bi[final_amount];
     
    }
    fwrite($myfile, "\n  ");caulmb("PAN : ".$t_det[pan_card],'80'); caulmb("-----------------------------------",'35');
    fwrite($myfile, "\n  ");caulmb("Bank : ".$t_det[bank_name],'30');caulmb("IFSC : ".$t_det[bank_ifsc],'22');caulmb("A/C : ".$t_det[bank_acc_no],'54');caulmb($tec_fet[total_amount],'8');caulmb($tec_fet[twf_cut],'8');caulmb("Pass Amt.: ".$tec_fet[net_amount],'20');
    fwrite($myfile, "\n");
    $txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
    fwrite($myfile, $txt);
    
    $bill_amount=$bill_amount+$tec_fet[total_amount];
        $total_twf=$total_twf+$tec_fet[twf_cut];
        $total_payable_amount=$total_payable_amount+$tec_fet[net_amount];
   
}
fwrite($myfile, "\n  ");caulmb(" ",'90');caulmb("Grand Total = ",'15');caulmb($bill_amount,'8');caulmb($total_twf,'8');caulmb("Pass Amt.:",'12');caulmb($total_payable_amount,'10');

///////////////////////////////////////
//////////////////////////////
/////////////////////




fclose($myfile);




////////////////////////tested printing
/*
function caulmb($txt,$size)
{
    global $myfile;
    $space_remin=$size-strlen($txt);
    
    fwrite($myfile, $txt);
    for ($x = 0; $x < $space_remin; $x++) {
      $txtee = " ";
      fwrite($myfile, $txtee);
    }
    
}
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "                         JIWAJI UNIVERSITY, GWALIOR * Remuneration Register of Examiners for the Examination 2021 \n";
fwrite($myfile, $txt);


$txt = "      ".$date."            Bill Passing from bill-id  ".$gb_fet[bill_id_from]." to ".$gb_fet[bill_id_to]." \n";
fwrite($myfile, $txt);


$txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);


$txt = " Teacher ID     Name              Addreass                                                  QTY.    Rate    Total     TWF     Bill-ID     Date\n";
fwrite($myfile, $txt);

$txt = " Subject        Class    Yr/sem   Remuneration For           Particular                                      Amt      Amt          Bill Amount\n";
fwrite($myfile, $txt);

$txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);

$txtee = "  ";
fwrite($myfile, $txtee);caulmb("22",'8'); caulmb("DR.",'4'); caulmb("Rohit Gidolia",'22'); caulmb("D- 551 New Suresh Nagar Thatipur ",'56'); caulmb("Gwalior ",'34');caulmb("212000 ",'8');caulmb("14/11/2021 ",'10');
fwrite($myfile, "\n  ");caulmb("Education",'117');caulmb("pre. bal.: Rs.",'16');caulmb("1000",'16');
fwrite($myfile, "\n              ");caulmb("B.ED",'10');caulmb("I",'6');caulmb("Paper Setting",'20');caulmb("M-58/2020",'42');caulmb("1",'8');caulmb("1000",'8');caulmb("1000",'8');caulmb("50",'8');
fwrite($myfile, "\n  ");caulmb("PAN : BSEPG8684F",'80'); caulmb("-----------------------------------",'35');
fwrite($myfile, "\n  ");caulmb("Bank : AXIS",'30');caulmb("IFSC : UTIB0000158",'22');caulmb("A/C : 916010015926222",'54');caulmb("3000",'7');caulmb("150",'8');caulmb("Pass Amt.: 2050",'20');
fwrite($myfile, "\n");
$txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);


$txtee = "  ";
fwrite($myfile, $txtee);caulmb("123",'8'); caulmb("DR.",'4'); caulmb("Ravi Kant Dhaneley",'22'); caulmb("Near kabir Ashram Taal morar ",'56'); caulmb("Gwalior mp ",'34');caulmb("212001 ",'8');caulmb("14/11/2021 ",'10');
fwrite($myfile, "\n  ");caulmb("Education",'117');caulmb("pre. bal.: Rs.",'16');caulmb("1000",'16');
fwrite($myfile, "\n              ");caulmb("B.TECH",'10');caulmb("I",'6');caulmb("Paper Setting",'20');caulmb("M-58/2020fdgvbv5633",'42');caulmb("1",'8');caulmb("1000",'8');caulmb("1000",'8');caulmb("50",'8');
fwrite($myfile, "\n  ");caulmb("PAN : BSEPG8684F",'80'); caulmb("-----------------------------------",'35');
fwrite($myfile, "\n  ");caulmb("Bank : AXIS",'30');caulmb("IFSC : UTIB0000158",'22');caulmb("A/C : 916010015926222",'54');caulmb("3000",'7');caulmb("150",'8');caulmb("Pass Amt.: 2050",'20');
fwrite($myfile, "\n");
$txt = "-------------------------------------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);

fclose($myfile);*/

?>
<a href="newfile.txt">Download File</a>
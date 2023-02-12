<?php
include "config.php";

////////////for selecting max gb id
    $sel="SELECT MAX(gb_id) AS max FROM `generate_bill`;";
    $sel_q=$con->query($sel);
    $fet_bill=$sel_q->fetch_assoc();
    $gb_id=$fet_bill[max]+1;
    

    $no_t=0;
$tech="SELECT * FROM `teachers`";
$tech_que=$con->query($tech);
while($tec_fet=$tech_que->fetch_assoc())
{
    $no_t++;
    $gbr_id=0;
    ////////////for selecting max gbr id
    $selw="SELECT MAX(gbr_id) AS max FROM `generate_bill_records`;";
    $sel_qw=$con->query($selw);
    $fet_billw=$sel_qw->fetch_assoc();
    $gbr_id=$fet_billw[max]+1;
    
    
    $tot_f=0;
    $amount=0;
    $twf=0;
    $a=0;
    $net_amount=0;
    $xcv="SELECT * FROM `bill` WHERE `t_id`='$tec_fet[t_id]' AND `bill_id` BETWEEN $_POST[from_bill] AND $_POST[to_bill];";
    $xcvb=$con->query($xcv);
    if($xcvb->num_rows>0)
    {
        while($bil=$xcvb->fetch_assoc())
        {
            $a++;
            $gbrb_id="INSERT INTO `generate_bill_records_bills` (`gbrb_id`, `gbr_id`, `bill_id`) VALUES (NULL, '$gbr_id', '$bil[bill_id]');";
            $con->query($gbrb_id);
            $amount=$amount+$bil[final_amount];
            $twf=$twf+$bil[twf];
        }
        $net_amount=$amount-$twf;
        $gbr_ins="INSERT INTO `generate_bill_records` (`gbr_id`, `gb_id`, `t_id`, `no_bill`, `total_amount`, `twf_cut`, `net_amount`, `date`, `time`) VALUES (NULL, '$gb_id', '$tec_fet[t_id]', '$a', '$amount', '$twf', '$net_amount', '$date', '$time');";
        $con->query($gbr_ins);
        
    }
    $totaaaa_amount=$totaaaa_amount+$amount;
    $twfffff_amount=$twfffff_amount+$twf;
    $total_net_pay_amount=$total_net_pay_amount+$net_amount;
}
    $ins_gb="INSERT INTO `generate_bill` (`gb_id`, `date`, `time`, `bill_id_from`, `bill_id_to`, `total_amount`, `total_teacher`, `twf_collect`, `net_pay_amount`) VALUES (NULL, '$date', '$time', '$_POST[from_bill]', '$_POST[to_bill]', '$totaaaa_amount', '$no_t', '$twfffff_amount', '$total_net_pay_amount');";
    
    if($con->query($ins_gb)===TRUE)
    {
         echo "<script>alert('Success! Bill Calculated Successfully');
        	   location.href='file_bill_detail.php';</script>";
    }
    else{
        echo "<script>alert('Failed! Plz Contact developer');
        	   location.href='file_bill_detail.php';</script>";
    }

?>
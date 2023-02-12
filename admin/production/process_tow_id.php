<?php 
include "config.php";
if(isset($_POST[submit_bill]))
{
    
    $sel_tow="SELECT * FROM `types_of_work` WHERE `tow_id`='$_POST[tow_id]'";
    //echo $sel_tow;
    $detr=$con->query($sel_tow);
    $tow_fet=$detr->fetch_assoc();
    $price=$_POST[bill_amount];
    
    $t_sel="SELECT * FROM `teachers` WHERE `t_id`='$_POST[t_id]'";
    $t_que=$con->query($t_sel);
    $t_fet=$t_que->fetch_assoc();
    $t_bal=$t_fet[balance]+$price;
    if($_POST[course_id]==3)
    {
        $twf=0;
    $twf_bal=$t_fet[twf]+$twf;
    $net_amount=$price;
    }else{
        $twf=$price*5/100;
    $twf_bal=$t_fet[twf]+$twf;
    $net_amount=$price-$twf;
        
    }
    
    
    $sel="SELECT MAX(bill_id) AS max FROM `bill`;";
    $sel_q=$con->query($sel);
    $fet_bill=$sel_q->fetch_assoc();
    $bill_id=$fet_bill[max]+1;
    $d="INSERT INTO `bill` (`bill_id`, `s_code`, `t_id`, `course_id`, `class_id`, `tow_id`, `description`, `price`, `min_price`, `qty`, `final_amount`, `date`, `time`, `sem_id`, `twf`, `net_amount`) VALUES ('$bill_id', '$_POST[s_code]', '$_POST[t_id]', '$_POST[course_id]', '$_POST[class_id]', '$_POST[tow_id]', '$_POST[description]', '$tow_fet[price]', '$tow_fet[min_amount]', '$_POST[qty]', '$price', '$date', '$time', '$_POST[sem_id]', '$twf', '$net_amount');";
    
    $t_ent="INSERT INTO `teacher_balance_history` (`tbh_id`, `t_id`, `date`, `time`, `amount`, `b_bal`, `a_bal`, `note`, `bill_id`) VALUES (NULL, '$_POST[t_id]', '$date', '$time', '$price', '$t_fet[balance]', '$t_bal', 'Bill Cut', '$bill_id');";
    
    $t="UPDATE `teachers` SET `balance` = '$t_bal' WHERE `teachers`.`t_id` = '$_POST[t_id]';";
    
    if($_POST[course_id]==3)
    {
    
    
        if($con->query($d)===TRUE && $con->query($t_ent)===TRUE && $con->query($t)===TRUE)
        {
            echo "<script>alert('Success! Bill Entered Successfully');
            	   location.href='bill_status.php?bill_id=".$bill_id."';</script>";
        }
        else{
            $df="INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', '$_SESSION[admin]', '$_SESSION[e_id]', 'Bill Cut', '$date', '$time', 'Bill Cut');";
                               $con->query($df);
            echo "<script>alert('Failed! Plz Try Again Some Problem Occours');
            	   location.href='iframe_select_teacher.php?s_id=$_POST[s_code]&t_id=$_POST[t_id]';</script>";
        }
    }else{
        $twf_h="INSERT INTO `teacher_twf_history` (`ttwfh_id`, `t_id`, `date`, `time`, `type`, `amount`, `bill_id`, `a_bal`, `b_bal`) VALUES (NULL, '$_POST[t_id]', '$date', '$time', '+', '$twf', '$bill_id', '$t_fet[twf]', '$twf_bal');";
    $twf_u="UPDATE `teachers` SET `twf` = '$twf_bal' WHERE `teachers`.`t_id` = '$_POST[t_id]';";
    
    if($con->query($d)===TRUE && $con->query($t_ent)===TRUE && $con->query($t)===TRUE && $con->query($twf_h)===TRUE && $con->query($twf_u)===TRUE)
    {
        echo "<script>alert('Success! Bill Entered Successfully');
        	   location.href='bill_status.php?bill_id=".$bill_id."';</script>";
    }
    else{
        $df="INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', '$_SESSION[admin]', '$_SESSION[e_id]', 'Bill Cut', '$date', '$time', 'Bill Cut');";
                           $con->query($df);
        echo "<script>alert('Failed! Plz Try Again Some Problem Occours');
        	   location.href='iframe_select_teacher.php?s_id=$_POST[s_code]&t_id=$_POST[t_id]';</script>";
    }
    }
}
?>
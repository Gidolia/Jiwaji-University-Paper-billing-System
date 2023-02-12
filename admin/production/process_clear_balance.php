<?php
include "config.php";
$cb_sel="SELECT MAX(cb_id) AS `max` FROM `clear_balance`;";
$cb_que=$con->query($cb_sel);
$maxcb=$cb_que->fetch_assoc();
$max_cb_id=$maxcb[max]+1;

$dc="INSERT INTO `clear_balance` (`cb_id`, `date`, `time`, `amount_distributed`, `last_f_date`, `last_time`) VALUES ('$max_cb_id', '$date', '$time', '', '', '');";


if($con->query($dc)===TRUE)
{
    $tot=0;
    $dsc="SELECT * FROM `teachers`";
    $que=$con->query($dsc);
    while($tec=$que->fetch_assoc())
    {
        if($tec[balance]>0)
        {
            $tot=$tot+$tec[balance];
            $rfd="INSERT INTO `teacher_balance_history` (`tbh_id`, `t_id`, `date`, `time`, `amount`, `b_bal`, `a_bal`, `note`, `bill_id`, `cb_id`) VALUES (NULL, '$tec[t_id]', '$date', '$time', '$tec[balance]', '$tec[balance]', '0', 'Withdrawal', '', '$max_cb_id');";
            
            $scv="UPDATE `teachers` SET `balance` = '0' WHERE `teachers`.`t_id` = '$tec[t_id]';";
            if($con->query($rfd)===TRUE){
                
            }
            else{
               $dcvtg= "INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', 'y', '', '$rfd', '$date', '$time', 'Process Clear Balance');";
            }
            
            if($con->query($scv)===TRUE){
                
            }
            else{
               $dcvtg= "INSERT INTO `entry_fail_report` (`efr_id`, `url`, `admin`, `e_id`, `query`, `date`, `time`, `note`) VALUES (NULL, '$url', 'y', '', '$scv', '$date', '$time', 'Process Clear Balance');";
            }
        }
    }
    $rfvgt="UPDATE `clear_balance` SET `amount_distributed` = '$tot' WHERE `clear_balance`.`cb_id` = '$max_cb_id';";
    $con->query($rfvgt);
    echo "<script>alert('Success! Generated Successfully');
        	   location.href='clear_balance_history.php';</script>";
}



?>
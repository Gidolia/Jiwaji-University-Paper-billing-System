<?php include "config.php";?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        </style>
        
    </head>
<body>

<h3>Confirm Cut Bill</h3>


  <form action="process_tow_id.php" method="post">
      <input type="hidden" name="t_id" value="<?php echo $_POST[t_id];?>">
      <input type="hidden" name="s_code" value="<?php echo $_POST[s_id];?>">
 <div>
     <table border="1">
         <tr><th>Course</th><td><?php $cour_sel="SELECT * FROM `course` WHERE `c_id`='$_POST[course_id]'";
          $cour_que=$con->query($cour_sel);
          $cours=$cour_que->fetch_assoc();
          echo $cours[name];
    ?><input type="hidden" class="form-control " name="course_id" value="<?php echo $_POST[course_id];?>">
          </td></tr>
          <tr><th>Class</th><td><?php $class_sel="SELECT * FROM `class` WHERE `class_id`='$_POST[class_id]'";
          $class_que=$con->query($class_sel);
          $class=$class_que->fetch_assoc();
          echo $class[name];
    ?>
    <input type="hidden" class="form-control " name="class_id" value="<?php echo $_POST[class_id];?>" readonly></td></tr>
         <tr>
             <th>Semester</th>
             <td><?php 
            $sem_sel="SELECT * FROM `semester` WHERE `s_id`='$_POST[sem_id]'";
            $sem_query=$con->query($sem_sel);
            $sem=$sem_query->fetch_assoc();
            echo $sem[name];
        ?>
    <input type="hidden" class="form-control " name="sem_id" value="<?php echo $_POST[sem_id];?>" readonly></td>
         </tr>
         <tr>
             <th>Type of Work</th>
             <td><?php 
        $tow_sel="SELECT * FROM `types_of_work` WHERE `tow_id`='$_POST[tow_id]'";
        $tow_que=$con->query($tow_sel);
        $tow=$tow_que->fetch_assoc();
        echo $tow[name];
        
    ?>
    <input type="hidden" class="form-control " name="tow_id" value="<?php echo $_POST[tow_id];?>" readonly></td>
         </tr>
         <tr>
             <th>Add Description</th>
             <td><input type="text" class="form-control " name="description" value="<?php echo $_POST[description];?>" readonly></td>
         </tr>
         <tr>
             <th>Qty</th>
             <td><input type="text" class="form-control " name="qty" value="<?php echo $_POST[qty];?>" readonly></td>
         </tr>
         <tr>
             <th>Bill Amount</th>
             <td>
             <input type="number" class="form-control " name="bill_amount" value="<?php 
$price=$_POST[qty]*$tow[price];
if($price>$tow[min_amount])
{
    echo $price;
}
else{
    echo $tow[min_amount];
}

?>">
             
             </td>
         </tr>
     </table>
 </div>

<div id="pre"></div>


<div>


    <input type="submit" value="Submit" name="submit_bill">
  </form>


</body>
</html>

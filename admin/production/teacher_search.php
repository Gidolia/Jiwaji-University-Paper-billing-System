<?php 
include "../../database_connect.php";

$redf="SELECT * FROM `teachers` WHERE `s_id`='$_GET[e]' AND `teacher_name` LIKE '%$_GET[q]%'";
$sc=$con->query($redf);
while($f=$sc->fetch_assoc())
{
    ?>
            <option value="<?php echo $f[t_id];?>"><?php echo $f[teacher_name];?></option>
          
    <?php
}
?>
<option></option>

<?php 
include "../../database_connect.php";

$redf="SELECT * FROM `types_of_work` WHERE `class_id`='$_GET[q]'";
$sc=$con->query($redf);
if($sc->num_rows>0)
{
while($f=$sc->fetch_assoc())
{
    ?>
            <option value="<?php echo $f[tow_id];?>"><?php echo $f[name];?></option>
    <?php
}

}

?>

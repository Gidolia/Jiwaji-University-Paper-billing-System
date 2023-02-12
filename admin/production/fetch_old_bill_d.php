<?php 
include "../../database_connect.php";

$redf="SELECT * FROM `bill` WHERE `t_id`='$_GET[t_id]' AND `description` LIKE '%$_GET[q]%'";
$sc=$con->query($redf);
while($f=$sc->fetch_assoc())
{?>
<table border="1" width="50%">
    <tr><th><?php echo $f[description];?></th><td><?php echo $f[date];?></td></tr>
</table>

    <?php
}
?>
<?php 
    include "../../database_connect.php";
    
    $redf="SELECT * FROM `types_of_work` WHERE `tow_id`='$_GET[q]'";
    $sc=$con->query($redf);
    if($sc->num_rows>0)
    {
        while($f=$sc->fetch_assoc())
        {
            echo "Rate = ".$f[price];
            echo "<br>Min Rate = ".$f[min_amount];
        }
    
    }

?>

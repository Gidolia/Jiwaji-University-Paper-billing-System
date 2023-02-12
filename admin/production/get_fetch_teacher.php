<?php
include "config.php";

$q = $_REQUEST["q"];



$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $sqlkj="SELECT pan_card FROM `teachers` WHERE `pan_card`='$q'";
  $dfgh=$con->query($sqlkj);
	if($dfgh->num_rows > 0)
	{
	
	$hint="This Pancard is Already Register";
	}
	else
	{
	    $hint="Correct";
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint;

?>
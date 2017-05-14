<?php

include_once("init.php");

$Pwd = $_POST['pwd'];
$V_code = $_POST['V_code'];
$query_update = "call sp_changePwd('$Pwd','$V_code')";
$result_select = mysqli_query($con,$query_update);
if($result_select){
	echo "Saved!";	

}else{
	echo "Invalid Code";
}

mysqli_close($con);

?>
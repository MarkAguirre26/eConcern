<?php

include_once("init.php");


$V_code = $_POST['V_code'];

$query_select = "call sp_count_code('$V_code')";
$result_select = mysqli_query($con,$query_select);
if($result_select -> num_rows > 0){

	echo "Saved!";	

}else{
	echo "Invalid Code";
}

mysqli_close($con);

?>
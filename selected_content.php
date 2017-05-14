<?php
include_once("init.php");
$ID = $_POST['cn'];
$query = "call sp_selected('$ID')";
$result = mysqli_query($con,$query);
if($result -> num_rows > 0){
	while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
	}
	echo json_encode($data);
}else{
	echo "wala";
}
mysqli_close($con);
?>
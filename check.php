<?PHP 
include_once("init.php");
$ID1 = $_POST['ID1'];
$ID2 = $_POST['ID2'];
$ID3 = $_POST['ID3'];
$ID4 = $_POST['ID4'];
$ID5 = $_POST['ID5'];
//$query = "call sp_check('$ID1','$ID2','$ID3','$ID4','$ID5')";
$query = "SELECT count(t.cn) as c FROM tbl_score AS t WHERE t.Player_cn = '$ID1' AND t.`Set` = '$ID2' AND t.Category_cn = '$ID3' AND t.`Set` = '$ID4' AND t.Remark = '$ID5'";
$result = mysqli_query($con,$query);
if($result -> num_rows > 0)
{
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$data[] = $row;
	}
	echo json_encode($data);	
}
else {
	echo "wala";
}

mysqli_close($con);

?>
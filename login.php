<?PHP 
include_once("init.php");
	$CompanyID = $_POST['value0'];
	$username = $_POST['value1'];
	$password = $_POST['value2'];
	$usertype = $_POST['value3'];
	//$query = "call sp_login('$username','$password','$usertype')";
	$query = "SELECT * FROM tbl_user WHERE BINARY tbl_user.CompanyID = '$CompanyID' AND BINARY tbl_user.IDNumber = CONCAT('ID',$username,'') AND BINARY tbl_user.Pwd = '$password' and Remark ='1' and UserType = '$usertype';";
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


?>

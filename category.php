<?PHP 
 header('Access-Control-Allow-Origin: *'); 
include_once("init.php");
//$query = "call sp_category()";
$query = "SELECT * FROM tbl_temp ORDER BY tbl_temp.cn DESC";
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
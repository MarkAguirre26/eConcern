<?PHP 
include_once("init.php");
$ID1 = $_POST['Player_name'];
$ID2 = $_POST['Category_cn'];
$query = "SELECT  * FROM tbl_score AS t WHERE t.Player_name = '$ID1' AND t.Category_cn = '$ID2' ORDER BY t.Remark ASC;";
          
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
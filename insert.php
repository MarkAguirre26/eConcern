<?PHP 
include_once("init.php");
$ID1  = $_POST['ID1'];
$ID2  = $_POST['ID2'];
$ID3  = $_POST['ID3'];
$ID4  = $_POST['ID4'];
$ID5  = $_POST['ID5'];
$ID6  = $_POST['ID6'];
//$query = "call sp_insert('$ID1','$ID2','$ID3','$ID4','$ID5','$ID6')";
$query = "INSERT INTO `tbl_score` (`Player_cn`, `Player_name`, `Category_cn`, `Set`, `Score`, `Remark`) VALUES ('$ID1','$ID2','$ID3','$ID4','$ID5','$ID6')";
$result = mysqli_query($con,$query);

if($result)
{echo "Saved";}
else
{echo "Failed!";}
mysqli_close($con);
?>
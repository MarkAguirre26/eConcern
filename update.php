<?PHP 
include_once("init.php");
$ID1  = $_POST['ID1'];
$ID2  = $_POST['ID2'];
$ID3  = $_POST['ID3'];
$ID4  = $_POST['ID4'];
$query = "call sp_updateScore('$ID1','$ID2','$ID3','$ID4')";
$result = mysqli_query($con,$query);
if($result)
{echo "Saved";}
else
{echo "Failed!";}

mysqli_close($con);

?>
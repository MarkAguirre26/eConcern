<?PHP 
include_once("init.php");
$ID1  = $_POST['Sender_cn'];
$ID2  = $_POST['Subject_cn'];
$ID3  = $_POST['Subject_description'];
$ID4  = $_POST['Messsage'];
$ID5  = $_POST['File_path'];
$query = "call sp_insert_suggestion('$ID1','$ID2','$ID3','$ID4','$ID5')";
$result = mysqli_query($con,$query);
if($result)
{echo "Saved";}
else
{echo "Failed!";}


mysqli_close($con);
?>
<?PHP
 $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
 //echo $date->format('m/d/Y');
 echo json_encode($date->format('m-d-Y'));
?>
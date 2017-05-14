<?php 
//include_once("init.php");

		try {
			$base = $_REQUEST["image"];
			$filename = $_REQUEST["file_name"];

			// base64 encoded utf-8 string
			$binary = base64_decode($base);
			 	
			 
			header("Content-Type: bitmap; charset=utf-8");			 
			$file = fopen( "photos/" . $filename , "wb");			 
	

			fwrite($file, $binary);			 
			fclose($file);
			echo "OK";
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	

?>
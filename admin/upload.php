<?php
	$filename = $_FILES['imagefile'];
	$uploaddir = 'img/uploaded/';
	
	$new_file_name = rand(1,10000).$filename['name'];
	
	
	if(move_uploaded_file($filename['tmp_name'], $uploaddir.$new_file_name))
	{
		echo json_encode($new_file_name);
	}
?>
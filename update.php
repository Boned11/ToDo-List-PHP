<?php 

	$data = [
		"id" 		=> $id,
		"title" 	=> $_POST['title'],
		"content"	=> $_POST['content']
	];

	$db->update("tasks", $data);

	header("Location: /");
?>
<?php 


	$db->delete("tasks", $id);

	
	header("Location: /");
?>
<?php 

	$pdo = new PDO("mysql:host=localhost; dbname=todolist", "todo_admin", "123");
	$sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(":title", $_POST['title']);
	$statement->bindParam(":content", $_POST['content']);
	$statement->bindParam(":id", $_GET['id']);
	$statement->execute();

	header("Location: /");

?>
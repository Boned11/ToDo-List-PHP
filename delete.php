<?php 

	$pdo = new PDO("mysql:host=localhost; dbname=todolist", "todo_admin", "123");
	$sql = "DELETE FROM tasks WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(":id", $_GET['id']);
	$statement->execute();

	header("Location: /");

?>
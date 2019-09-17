<?php 

	$pdo = new PDO("mysql:host=localhost; dbname=todolist", "todo_admin", "123");
	$sql = "INSERT INTO tasks(title, content) VALUES (:title, :content)";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(":title", $_POST['title']);
	$statement->bindParam(":content", $_POST['content']);
	$statement->execute();

	header("Location: /"); exit;

?> 
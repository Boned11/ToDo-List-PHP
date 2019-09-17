<?php 

	$pdo = new PDO("mysql:host=localhost; dbname=todolist", "todo_admin", "123");
	$sql = "SELECT * FROM tasks WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->bindParam(":id", $_GET['id']);
	$statement->execute();
	$task = $statement->fetch(2);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Мой ToDo List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<h1><?= $task['title'];?></h1>
				<p><?= $task['content'];?></p>

				<a href="/" class="btn btn-info">Go Back</a>
	
			</div>
		</div>
	</div>
</body>
</html>
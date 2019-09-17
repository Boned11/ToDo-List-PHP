<?php 

	$pdo = new PDO("mysql:host=localhost; dbname=todolist", "todo_admin", "123");
	$statement = $pdo->prepare("SELECT * FROM tasks");
	$statement->execute();
	$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
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
				<h1>All Tasks</h1>
				<a href="create.php" class="btn btn-success">Add Task</a>
			</div>

			<table class="table mt-3">
				<thead>
					<tr>
						<th>ID</th>
						<th>TASKS</th>
						<th>ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tasks as $task):?>
						<tr>
							<td><?= $task['id'];?></td>
							<td><?= $task['title'];?></td>
							<td class="">
								<a href="show.php?id=<?= $task['id']; ?>" class="btn btn-info">Show</a>
								<a href="edit.php?id=<?= $task['id']; ?>" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Are you sure?');" href="delete.php?id=<?= $task['id']; ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
</body>
</html>
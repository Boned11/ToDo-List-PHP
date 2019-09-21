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
				<h1>Create Task</h1>
				<form action="/store" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<textarea class="form-control" name="content"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
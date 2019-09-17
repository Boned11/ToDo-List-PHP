<?php   

class QueryBuilder
{
    public $pdo;

    function __construct()
    {
       $this->pdo = new PDO("mysql:host=localhost; dbname=todolist", "todo_admin", "123");
    }

    function all($table) 
	{
		$statement = $this->pdo->prepare("SELECT * FROM $table");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

    function getOne($table, $id) 
	{
		$sql = "SELECT * FROM $table WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(":id", $id);
		$statement->execute();
		$task = $statement->fetch(2);

		return $task;
	}
    

	function showOne($table, $id) 
	{
		$sql = "SELECT * FROM $table WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(":id", $id);
		$statement->execute();
		$task = $statement->fetch(2);

		return $task;
	}

    
    function store($table, $data) 
	{
        $keys = array_keys($data);
        $stringOfKeys = implode(", " , $keys);
        $placeholders = ":" . implode(", :", $keys);

		$sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}
    
	function update($table, $data) 
	{
		$keys = array_keys($data);
        $fields = "";

        foreach($keys as $key) 
        {
            $fields .= $key . "=:" . $key . ", ";
        }

        $fields = rtrim($fields, ", \t\n");
        $sql = "UPDATE $table SET $fields WHERE id=:id";
		$statement = $this->pdo->prepare($sql);

		$statement->execute($data);
	}

    function delete($table, $id) 
	{
		$sql = "DELETE FROM $table WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(":id", $id);
		$statement->execute();
	}
}



/*

        echo '<pre>';
        var_dump($placeholders);
        echo '</pre>';
        die;
*/
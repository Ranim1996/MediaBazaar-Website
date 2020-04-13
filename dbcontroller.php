<?php
/*class DBController {
	private $host = "studmysql01.fhict.local";
	private $user = "dbi344446";
	private $password = "1996";
	private $database = "dbi344446";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}*/

		$conn;
		$username = 'dbi344446';
		$pass = '1996';
		$servername = 'studmysql01.fhict.local';
		$databaseName = 'dbi344446';
		try
		{
		    $conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $pass);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Connected successfully";

		    
		}

		catch(PDOException $e)
		{
		    $cisco_error = 'Try to connect to cisco!';
		    $err_mssg = $e->getMessage();
		    include('db_error.php');
		    exit();
		    #echo "Connection failed: " .$e->getMessage();
		}

		function getData(){
			global $conn;
	        $sql = "SELECT * FROM products";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

	        if (!$result) {
	        	die(mysql_error($conn));
	        }
	        else if(sizeof($result)> 0){
	            return $result;
	        }
        }
?>
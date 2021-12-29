<?php 
	session_start();
	
	try {
	$dbname="mktetris";
	$dbuser="mk";
	$dbpass="mkpass";
	
	$conn = new PDO('mysql:host=localhost;dbname='.$dbname.';', $dbuser, $dbpass);
	
	}
	catch (PDOException $error) {
	    echo $error->getMessage();
	}
	function updateSessionData()
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM USERS WHERE username = ?");
		$query->execute(array($_SESSION['username']));
		$_SESSION['userinfo'] = $query->fetch(PDO::FETCH_ASSOC);
		$_SESSION['username'] = $_SESSION['userinfo']['username'];
		$_SESSION['name'] = $_SESSION['userinfo']['name'];  
	}
?>

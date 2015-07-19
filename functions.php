<?php
	$dbhost = 'localhost';
	$dbname = 'tutorial';
	$dbuser = 'jim';
	$dbpass = 'mypasswd';
	$appname = 'InLine';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		
	function createTable($name, $query)
	{
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
		echo "Table '$name' created or already exists<br />";
	}
	
	function queryMysql($query)
	{
		global $conn;
		$result = mysqli_query($conn, $query);
		return $result;
	}
	
	function destroySession()
	{
		$_SESSION = array();
		
		if(session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
		
		session_destroy();
	}
	
	function sanitizeString($var)
	{
		global $conn;
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return mysqli_real_escape_string($conn, $var);
	}
	
	function showProfile($user)
	{
		if(file_exists("$user.jpg"))
			echo "<img src='$user.jpg' align='left' />";
		
		$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
		
		if(mysqli_num_rows($result))
		{
			$row = mysqli_fetch_row($result);
			echo stripslashes($row[1])."<br clear=left /><br />";
		}
	}
?>
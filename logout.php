<?php // logout.php
include_once 'header.php';

if(isset($_SESSION['user']))
{
	destroySession();
	
	echo "<div class='main'><br />".
			"You cannot log because you are not logged in";
}
?>

<br /><br /></div></body></html>
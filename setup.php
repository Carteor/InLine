
<?php
echo "<html><head><title>Setting up database</title></head>
<body>
	<h3>Setting up...</h3>";
	
include_once 'functions.php';

echo "Included 'functions.php' in 'setup.php' <br />";

createTable('members', 'user VARCHAR(16),
						pass VARCHAR(16),
						INDEX(user(6))');
echo "Created table 'members'<br />";
createTable('messages',
			'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			auth VARCHAR(16),
			recip VARCHAR(16),
			pm CHAR(1),
			time INT UNSIGNED,
			message VARCHAR(4096),
			INDEX(auth(6)),
			INDEX(recip(6))');
echo "Created table 'messages<br />'";
createTable('friends',
			'user VARCHAR(16),
			friend VARCHAR(16),
			INDEX(user(6)),
			INDEX(friend(6))');
echo "Created table 'friends'<br />";			
createTable('profiles',
			'user VARCHAR(16),
			text VARCHAR(4096),
			INDEX(user(6))');
echo "Created table 'profiles'<br />";
			
	echo "<br /><h4>...done.</h4></body></html>";
?>
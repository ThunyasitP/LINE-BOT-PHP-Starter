<?php

	//GET SQLITE
	$dir = 'sqlite:chatbot.sqlite';
	$dbh  = new PDO($dir) or die("cannot open the database");
	$query =  "SELECT * FROM talk";
	foreach ($dbh->query($query) as $row)
	{
	    echo $row[0];
	} 


?>
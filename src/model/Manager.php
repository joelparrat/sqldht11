<?php
	require "../src/model/config.inc.php";
	
	class Manager
	{
		protected function dbConnect()
		{
			return new PDO("mysql: host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
		}
	}




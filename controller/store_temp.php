<?php
	require_once("../src/model/Manager.php");
	require_once("../src/model/Data.php");
	require_once("../src/model/config.inc.php");
	
	
	//if (isset($_POST['data']))
	//{
		/*
		$fch = fopen("../txt/temperature.txt", "w");
		fwrite($fch, $_POST['temperature']);
		fclose($fch);
		*/
		//if (!file_put_contents("../txt/objet.json" , $_POST['data']))
		//	echo "erreur ecriture";
		// Get JSON as a string
		$json_str = file_get_contents('php://input');
		//# Get as an object
		$json_obj = json_decode($json_str);
		if (!$json_obj)
		{
			http_response_code(415);
			exit();
		}
		elseif (!$json_obj->temperature || !$json_obj->humidite)
		{
			http_response_code(400);
			exit();
		}
		
		$manager = new Manager();
		$data = new Data($json_obj->temperature, $json_obj->humidite);
		$data->storeData();
		$manager=null;
		
		if (!file_put_contents("../txt/objet.json" , $json_str))
		{
			http_response_code(500);
			exit();
		}
?>


<?php
	require_once("../src/model/Manager.php");
	
	class Data extends Manager
	{
		public $temperature;
		public $humidity;
		
		public function __construct($temperature, $humidity)
		{
			$this->temperature = $temperature;
			$this->humidity = $humidity;
		}
    	
    	public function storeData()
    	{
    	   	$bdd = $this->dbConnect();
    	   
    	   	$rqt =  $bdd->prepare("INSERT INTO data (temperature, humidity) VALUES (:temp, :humid)");
    	   	$rqt->execute(array('temp' => $this->temperature, 'humid'=> $this->humidity));
    	   
		   	$rqt->closeCursor();
    	}
    	
    	public function readData()
    	{
    	   	$bdd = $this->dbConnect();
    	   
    	   	$rqt =  $bdd->query("SELECT datetime, temperature, humidity FROM data ORDER BY datetime DESC LIMIT 1");
    	   
		   	$rqt->closeCursor();
    	}
		
	}

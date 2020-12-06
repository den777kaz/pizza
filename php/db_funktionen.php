<?php

function db_connect(){	
	// Zugangsdaten (Variablen) für DB Zugriff
	
	$db_server = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "pizzeria";
	
	// Verbindung aufbauen
	$dbh = mysqli_connect($db_server, $db_user, $db_password, $db_name)
	or die("Fehler by Connect");
	
	mysqli_set_charset($dbh, "utf8");
	
	return $dbh;
}

//*******************************
function db_close($dbh){
	mysqli_close($dbh);
}

//*******************************

// Abfrage Funktion 

function db_query($sql){
	$dbh = db_connect();
	
	$result = mysqli_query($dbh, $sql) or die ("Fehler by Query");
	db_close($dbh);
	return $result;
}



?>
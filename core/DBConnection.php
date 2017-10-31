<?php

function getConnection(){
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "copacopa@mysql.com123";
	$dbName = "dtvax";

    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
	if ($mysqli->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
    return $mysqli;
}

function executeQuery($query=''){
    $con = getConnection();
    $res = $con->query($query);
    if (!$res) {
    	echo $con->errno."---".$con->error;
    }
    return $res;
}

// /**
// * Clase que conecta con la base de datos
// */
// class BD {
    
//     private $url;
//     private $user;
//     private $pass;
//     private $name;

//     private $conection;

//     function __construct(){
//         $this->url = $DBURL;
//         $this->user = $DBUSER;
//         $this->pass = $DBPASS;
//         $this->name = $DBNAME;

//         $this->conection = new mysqli($this->url, $this->url, $this->url, $this->url);
//     }

// }

?>
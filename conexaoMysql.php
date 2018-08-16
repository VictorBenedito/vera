<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "coleta";

try {
    $connMysql = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    $connMysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connection = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

    //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)

    {
    	die("Lamento, algo não está funcionando 100% (DB) ");
    }
/*foreach(PDO::getAvailableDrivers() as $driver) {
  echo $driver.'<br />';
}*/
?>

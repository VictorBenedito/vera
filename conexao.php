<?php
//require_once("./conexaoMysql.php");
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$server = "172.16.10.118";
$username = "SYSDBA";
$password = "masterkey";
$dbname = "$server:C:\Syspdv\SYSPDV_SRV.FDB";

try {
	
	$connection = new PDO("firebird:dbname=$dbname", $username, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*foreach ($connection->query('SELECT FIRST 10 * FROM PRODUTO') as $row) {
    	$descricao = $row["PRODES"];
		$sql="INSERT INTO coleta (colDescricao) VALUES ('$descricao')";
    	//$connMysql->query($sql);
        print $row[2] . "\n";

	}*/
	//var_dump($row);
    }
catch(PDOException $e)
    {
    	die("Lamento, algo não está funcionando 100% (DB) ");
    }
/*foreach(PDO::getAvailableDrivers() as $driver) {
  echo $driver.'<br />';
}*/
?>
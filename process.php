<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$host = '172.16.10.118:C:\Syspdv\SYSPDV_SRV.FDB';
$username='SYSDBA';
$password='masterkey';
		
$dbh = ibase_connect ( $host, $username, $password ) or die ("error in db connect");
$stmt="SELECT FIRST 5 * FROM PRODUTO WHERE PROCOD = '00000000000004'";
$query = ibase_prepare($stmt);
$rs=ibase_execute($query);
$count = 0;
/*$row = ibase_fetch_object($rs);
var_dump($row);
//printf($row[0]);
foreach ( $row as $valor){
   // echo $valor[0];
}*/
//var_dump($row);

while ($row[$count] = ibase_fetch_assoc($rs))
	var_dump($row[0]["PROCOD"]);
	$procod = $row[0]["PROCOD"];
	echo $procod;
	/*foreach ( $json->PROCOD as $valor){
	    $steamid = $valor->PROCOD;
	    echo $steamid;
	}*/
    $count++;


?>
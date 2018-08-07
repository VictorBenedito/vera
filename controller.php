<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
}

function armazenarTxtTemporario($barra, $quantidade){
  require('conexaoMysql.php');
  $sql="INSERT INTO TXT_DADOS (TXT_BARRA, TXT_QUANTIDADE) VALUES ('$barra', '$quantidade')";
  if ($connMysql->query($sql)) {
        /*$produto->setBarra($barra);
        $produto->setCodigoInterno($row_all[0]['PROCOD']);
        $produto->setDescricao($row_all[0]['PRODES']);
        $produto->setUnidade($row_all[0]['PROUNID']);
        $produto->setPreco($row_all[0]['PROPRC1']);
        return $produto;*/

    echo "Criado com Sucesso!";
  }else{
    echo "Não foi possível criar a tabela!";
  }
}

function buscarDadosProduto($barra){
  require('conexao.php');
  try {
    //Verifica se o Produto existe no Banco de Dados do Cliente.
    $produto = new Produto();
    $statement = $connection->query("SELECT PROCOD, PRODES, PROUNID, PROPRC1 FROM PRODUTO WHERE PROCOD = (SELECT PROCOD FROM PRODUTOAUX WHERE PROCODAUX = '$barra')");
    $row_all = $statement->fetchall(PDO::FETCH_ASSOC);
    //Se o produto existe, pega as informações necessárias.
    if ($row_all) {
      /*$procod = $row_all[0]['PROCOD'];
      $statement = $connection->query("SELECT PROCOD, PRODES, PROUNID, PROPRC1 FROM PRODUTO WHERE PROCOD = $procod");
      $row_all = $statement->fetchall(PDO::FETCH_ASSOC);
      if ($row_all) {*/
        $produto->setBarra($barra);
        $produto->setCodigoInterno($row_all[0]['PROCOD']);
        $produto->setDescricao($row_all[0]['PRODES']);
        $produto->setUnidade($row_all[0]['PROUNID']);
        $produto->setPreco($row_all[0]['PROPRC1']);
        return $produto;
      //}
    }else{
      echo "Produto não Cadastrado!";
    }
    /*$statement = $connection->query("SELECT * FROM PRODUTOAUX WHERE PROCODAUX = '$barra'");
    //$statement->execute();
    $row_all = $statement->fetchall(PDO::FETCH_ASSOC);
    
    //var_dump($row_all);
    $var = $row_all[0]['PROCOD'];
    //echo "<br><br> $var";
    $statement = $connection->query("SELECT PROCOD, PRODES, PROUNID, PROPRC1 FROM PRODUTO WHERE PROCOD = $var");
    $row_all = $statement->fetchall(PDO::FETCH_ASSOC);
    //var_dump($row_all);
    $codInterno = $row_all[0]['PROCOD'];
    $descricao = $row_all[0]['PRODES'];
    $unidade = $row_all[0]['PROUNID'];
    $preco = $row_all[0]['PROPRC1'];

    echo "<br><br> $codInterno \t $descricao \t $unidade \t $preco";
    $sql = "INSERT INTO coleta (colCodInt, colDescricao, colQuantidade, colUnidade, colPreco) VALUES ('$codInterno', '$descricao', '$quantidade', '$unidade', $preco)";
    if ($connMysql->query($sql)) {
      echo "$descricao \t inserido!";
    } */ 
  } catch (PDOException $e) {
    echo "Erro ao Buscar o Produto. ".$e;
  }
}

function inserirDados($produto, $quantidade){
  require('conexaoMysql.php');
  //require_once('Produto.php');
  var_dump($produto);
  $codInterno = $produto->getCodigoInterno();
  $descricao = $produto->getDescricao();
  $unidade = $produto->getUnidade();
  $preco = $produto->getPreco(); 

  $sql = "INSERT INTO PRODUTO (PRO_CODINT, PRO_DESCRICAO, PRO_QUANTIDADE, PRO_UNIDADE, PRO_PRECO, PRO_COLETA) VALUES ('$codInterno', '$descricao', '$quantidade', '$unidade', $preco)";
  if ($connMysql->query($sql)) {
    echo "$descricao \t inserido!";
  }else{
    echo "Produto não inserido!";
  } 
}

function sumarizar($array){
  array_count_values($array);
}

$produto = '07896053410025';
//armazenarTxtTemporario($produto, 7);
//$codbar = "07893500012672";
/*$codbar = "07896053410025";
$produto = new Produto();
$produto = buscarDadosProduto($codbar);
if ($produto) {
  //inserirDados($produto,12);
  echo $produto->getDescricao();
}*/
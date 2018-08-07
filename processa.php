<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">
    <title>Prime Tecnologia</title>
    <!-- Import Google Icon Font -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <!-- Data Table -->  
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  </head>
  <body>
    <!--MENU-->
    <div class="navbar-fixed">
      <nav class="red darken-4">
        <div class="nav-wrapper container">
          <!--Imagem da Logo Desktop-->
          <a href="#" class="brand-logo right hide-on-med-and-down"><img style="width: 100px; margin-top: 5px" src="../img/logo.png"></a>
          <!--Imagem da Logo Mobile-->
          <a href="#" class="brand-logo center hide-on-large-only"><img style="width: 100px; margin-top: 2px" src="../img/logo.png"></a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger waves-effect"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li><a href="index.php"><i class="material-icons left">home</i>Home</a></li>
            <li class="active"><a href="processa.php"><i class="material-icons left">store</i>Produtos</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <!--MENU MOBILE-->
    <ul class="sidenav" id="mobile-demo">
      <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>
      <li class="active"><a href="processa.php"><i class="material-icons">store</i>Produtos</a></li>
    </ul>
    <nav class="red darken-3">
      <div class="nav-wrapper container">
        <div class="col s12">
          <a href="index.php" class="breadcrumb">Home</a>
          <a href="processa.php" class="breadcrumb">Produtos</a>
        </div>
      </div>
    </nav>
    <br> 
  <!--CORPO DA PÁGINA-->    
  <div class="row container">
    <h4>
      Lista de Produtos
    </h4>
    <!--MENU FLUTUANTE-->
    <!--<div class="fixed-action-btn">
      <a class="btn-floating btn-large green" href="./cadpropriedade.php">
        <i class="large material-icons">add</i>
      </a>
    </div>-->
 	  <!--<form class="col s12" action="" method="POST">-->
    <table id="produtostable" class="display">
      <thead>
          <tr>
              <th>Descrição</th>
              <th>Código Interno</th>
              <th>Preço</th>
              <th>Quantidade</th>
          </tr>
      </thead>
      <tbody>
      <form class="col l12" action="" method="POST">
    <?php
      require_once('controller.php');
      require_once("Produto.php");
      $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
      //ler todo o arquivo para um array
      $dados = file($arquivo_tmp);
      //TESTA SE O ARQUIVO ESTÁ CARREGADO!
      if(!$dados){
        header("Location: index.php");
      }
      //$produtos = array();
      $contador = 1;
      $produtos = array();
      foreach($dados as $linha){
        $linha = trim($linha);
        $valor = explode(';', $linha);
        $barra = $valor[0];
        $quantidade = $valor[1];
        $produto = new Produto();
        $produto = buscarDadosProduto($barra);
        inserirDados($produto, $quantidade);


        $produto->setQuantidade($quantidade);
        $produtos[] = $produto;
        //$produtos[] = $produtolist = array('codInt' => $codigoInterno, 'quantidade' => $quantidade);
        //inserirDados($produto, $quantidade);
        $descricao = $produto->getDescricao();
        $codigoInterno = $produto->getCodigoInterno();
        console_log("Pegou os dados de $descricao - ".date('H:i:s'));
        if ($produto) {
          //inserirDados($produto, $quantidade);
          ?>
            <tr>
              <td>
                  <?php echo $produto->getDescricao()?>
              </td>
              <td>
                <?php echo $produto->getCodigoInterno()?>
              </td>
              <td>
                <?php echo $produto->getPreco()?>
              </td>
              <td>
                  <input value="<?php echo $quantidade?>" id="quantidade<?php echo($contador) ?>" type="text" >
              </td>
            </tr>
        <?php
          $contador++;
        }else{
          ?>
          <tr>
              <td>
                <?php echo "Sem Produto";?>
              </td>
              <td>
                <?php echo "-"?>
              </td>
              <td>
                <?php echo "-"?>
              </td>
              <td>
                <?php echo "-"?>
              </td>
            </tr>
          <?php
        }
  		}
      $produtosFinal = array();
      $produtos2 = $produtos;
      foreach ($produtos as $produto) {
        foreach ($produtos2 as $produto2) {
          if ($produto->getCodigoInterno() == $produto2->getCodigoInterno()) {
            $quantidade = $produto->getQuantidade();
            $quantidade2 = $produto2->getQuantidade();
            echo "\n Quantidade: \t";
            echo $quantidade+$quantidade2;
          }else{

          }
        }
      }
      //var_dump($produtos);
	  ?>
      </form>
      </tbody>
    </table>
      <!--<div class="row">
        <button class="red darken-4 btn waves-effect waves-light center" type="submit">Alterar
          <i class="material-icons right">mode_edit</i>
        </button>
      </div>
    </form>-->

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!--Script Inicializador do Menu-->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.sidenav').sidenav();
      });
      $(document).ready(function(){
        $('.collapsible').collapsible();
      });
      //Menu Flutuante
      $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
      });
      
      $(document).ready( function () {
        $('#produtostable').DataTable();
      });
    </script>
  </body>
</html>
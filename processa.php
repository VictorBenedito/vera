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
    <ul class="collection">
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
      foreach($dados as $linha){
        $linha = trim($linha);
        $valor = explode(';', $linha);
        $barra = $valor[0];
        $quantidade = $valor[1];
        $produto = new Produto();
        $produto = buscarDadosProduto($barra);
        if ($produto) {
          echo $produto->getDescricao(). "<br>";
          //inserirDados($produto, $quantidade);
        }else{
          echo "Sem Produto";
        }

        /*if ($connection->query("SELECT * FROM PRODUTOAUX WHERE PROCODAUX = '$barra'")) {
          
        }



        $produto = array($valor[0], $valor[1]);
        array_push($produtos, $produto);
        //$arrayName = array('' => , );
        //buscarDadosProduto($valor[0], $valor[1]);*/?>
        <!--<li class="collection-item">Inserido!</li>-->
    <?php
  		}
      //var_dump($produtos);
	  ?>
    </ul>
      <!--<div class="row">
        <button class="red darken-4 btn waves-effect waves-light center" type="submit">Alterar
          <i class="material-icons right">mode_edit</i>
        </button>
      </div>
    </form>-->

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!--Script Inicializador do Menu-->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.sidenav').sidenav();
      });
      $(document).ready(function(){
	    $('.collapsible').collapsible();
      //Menu Flutuante
      $(document).ready(function(){
      $('.fixed-action-btn').floatingActionButton();
  });
	  });
    </script>
  </body>
</html>
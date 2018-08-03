<?php
    require_once("./Produto.php");
?>
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
            <li class="active"><a href="index.php"><i class="material-icons left">home</i>Home</a></li>
            <li><a href="processa.php"><i class="material-icons left">store</i>Produtos</a></li>
          </ul>
        </div>
      </nav>
    </div>
  <!--MENU MOBILE-->
  <ul class="sidenav" id="mobile-demo">
    <li class="active"><a href="index.php"><i class="material-icons">home</i>Home</a></li>
    <li><a href="processa.php"><i class="material-icons">store</i>Produtos</a></li>
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
	<div class="row container center">
	    <h4>
	      Importar dados do arquivo TXT
	    </h4>
		<form class="col s12 center" method="POST" action="processa.php" enctype="multipart/form-data">
			<div class="row center">
				<div class="col l3 file-field input-field">
			      <div class="btn">
			        <span>Arquivo</span>
			        <input type="file" name="arquivo">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="row">
				<button class="red darken-4 btn waves-effect waves-light center col l2" onclick="adicionar()" type="submit">Importar
				  <i class="material-icons right">import_export</i>
				</button>
			</div>
		</form>
		<div class="barra">
      		
  		</div>
		<progress max="100" id="progresso" value="0"></progress>
		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
			  <h4>Modal Header</h4>
			  <p>A bunch of text</p>
			</div>
			<div class="modal-footer">
			  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
	</div>

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
	  });
      //Menu Flutuante
      $(document).ready(function(){
      	$('.fixed-action-btn').floatingActionButton();
	  });
      //Modal
      $(document).ready(function(){
	    $('.modal').modal();
	  });

	  function adicionar(){
	  	var $wrapper = document.querySelector('.barra'),
	    // Pega a string do conteúdo atual
	    HTMLTemporario = $wrapper.innerHTML,
	    // Novo HTML que será inserido
	    HTMLNovo = '<div>Processando...</div><div class="preloader-wrapper small active"><div class="spinner-layer spinner-red"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';

		// Concatena as strings colocando o novoHTML antes do HTMLTemporario
		HTMLTemporario = HTMLNovo + HTMLTemporario;

		// Coloca a nova string(que é o HTML) no DOM
		$wrapper.innerHTML = HTMLNovo;
	  }
    </script>
  </body>
</html>
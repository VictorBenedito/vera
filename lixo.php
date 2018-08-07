<?php
/*foreach ($connection->query("") as $row) {
            $descricao = $row["PRODES"];
            $sql="INSERT INTO coleta (colDescricao) VALUES ('$descricao')";
            //$connMysql->query($sql);
            print $row[0] . "\n";
            //var_dump($row);
          }*/

          /*$sql1 = 'SELECT P.PROCOD, P.PRODES, P.PROUNID, P.PROPRC1 FROM PRODUTO AS P, PRODUTOAUX AS B WHERE P.PROCOD = B.PROCOD AND B.PROCODAUX = $barra';

      $sql = "SELECT FIRST 10 * FROM PRODUTO";
      echo $sql;

          $statement = $connection->prepare('SELECT FIRST 10 * FROM PRODUTO');

          $statement->execute();

          if($statement->rowCount()){
            echo("TEM LINHA");
              
          }else{
            echo "Não tem Linha";
          }*/




          //PROCESSA
          <!--<div class="row">
  	    <div class="input-field col s12 l3">
  	      <input type="text" value="<?php echo $produto->getBarra();?>" name="barra" id="barra" required="" readonly>
  	      <label>Barra</label>
  	    </div>
  	    <div class="input-field col s12 l2">
  	      <input type="text" value="<?php echo $produto->getQuantidade();?>" name="quantidade" id="quantidade" required="">
  	      <label>Quantidade</label>
  	    </div>
  	  </div>-->



      <div class="row">
              <div class="input-field col l2">
                <input value="<?php echo $produto->getCodigoInterno()?>" id="codigo<?php $contador ?>" type="text" readonly>
                <label class="active" for="codigo<?php $contador ?>">Código Interno</label>
              </div>
              <div class="input-field col l4">
                <input value="<?php echo $produto->getDescricao()?>" id="produto<?php $contador ?>" type="text" readonly>
                <label class="active" for="produto<?php $contador ?>">Descrição</label>
              </div>
              <div class="input-field col l2">
                <input value="<?php echo $produto->getPreco()?>" id="preco<?php $contador ?>" type="text" readonly>
                <label class="active" for="preco<?php $contador ?>">Preço</label>
              </div>
              <div class="input-field col l2">
                <input value="<?php echo $quantidade?>" id="quantidade<?php $contador ?>" type="text" >
                <label class="active" for="quantidade<?php $contador ?>">Quantidade</label>
              </div>
            </div>
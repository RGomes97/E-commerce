<?php
	require 'conexao.php';
	require_once 'header.php';

$produto = new Produto($mysqli);

$return = $produto->listar('envelope');

?>
<div class="row topos">

	<div class="col s12 l3 colunaesq z-depth-2">
        <div class="collection">
          <a href="prodPromocao.php" class="collection-item">Promoções</a>
          <a href="prodFolheto.php" class="collection-item">Folhetos</a>
          <a href="prodBloco.php" class="collection-item ">Blocos</a>
          <a href="prodReceituario.php" class="collection-item">Receituários</a>
          <a href="prodCartao.php" class="collection-item">Cartão de Visitas</a>
          <a href="prodBanner.php" class="collection-item ">Banners</a>
          <a href="prodEnvelope.php" class="collection-item active">Envelopes</a>
          <a href="prodComanda.php" class="collection-item">Comandas</a>
          <a href="prodTalao.php" class="collection-item">Talões</a>
        </div>
     </div>
     <h4> Blocos </h4>
	<div class="col l9">
	<?php
		foreach($return as $value){
			echo '<div class="col s12 l4">';
			echo '<div class="card z-depth-4">';
			echo '<div class="card-image">';
			echo '<div id="imagem">';
			echo '<center><img src="img/cartao1.jpg"></center>';
			echo '</div>';
			echo '</div>';
			echo '<div class="card-content">';
			echo '<center>';
			echo '<h5>'.$value['nome'].'</h5>';
			echo $value['descricao'].'<br />';
			echo '<h6 style="color: #FFFFFF; font-size:22px;text-align: center; text-style:bold;border: transparent; border-radius: 10px; background-color: #1abc9c;">'.$value['preco'].'<h6>';
			echo '</center></div>';
			echo '<div class="card-action">';
			echo '<center><button class="btn waves-effect waves"><i class="material-icons right">shopping_cart</i> Comprar</button>
		                <button class="btn waves-effect waves-light grey lighten-1"><i class="material-icons">info_outline</i></button></center>
		              </div>
		            </div>
		        </div>';
		}
	?>
	</div>
	</div>
	<?php
		require_once 'footer.php';

	?>

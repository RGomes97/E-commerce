<?php
	require 'conexao.php';
	require_once 'header.php';
	require_once "carousel.php";

	if(isset($_SESSION['venda'])){

	}else{
		$_SESSION['venda'] = array();
	}

	if(isset($_GET['prod'])){
		$produto = $_GET['prod'];
		$_SESSION['venda'][$produto] = 1;

		
	}

$produto = new Produto($mysqli);

$return = $produto->listar('banner');

?>
<div class="row topos">

	<div class="col s12 m12 l3 colunaesq z-depth-2">
        <div class="collection">
	      <a href="prodBanner.php" id="banners" class="collection-item active">Banners</a>
	      <a href="prodBloco.php" id="blocos" class="collection-item ">Blocos</a>
	      <a href="prodCartao.php" id="cartoes" class="collection-item">Cartão de Visitas</a>
	      <a href="prodComanda.php" id="comandas" class="collection-item">Comandas</a>
          <a href="prodEnvelope.php" id="envelopes" class="collection-item ">Envelopes</a>
          <a href="prodFolheto.php" id="folhetos" class="collection-item">Folhetos</a>
          <a href="prodPromocao.php" id="promocoes" class="collection-item">Promoções</a>
          <a href="prodReceituario.php" id="receituarios" class="collection-item">Receituários</a>
          <a href="prodTalao.php" id="taloes" class="collection-item">Talões</a>
        </div>
     </div>
     <div class="col s12 m12 l9">
     <h4 style="background-color: #1abc9c; color: white; border-radius: 20px;"> Banners </h4>
     </div>
	<div class="col s12 m12 l9">
	<?php
		if($return == null){
			echo '<center>Ainda não temos Banners no site, mas em breve teremos!</center>';
		}
		foreach($return as $value){
			echo '<div class="col 12 m6 l4">';
			echo '<div class="card z-depth-4">';
			echo '<div class="card-image">';
			echo '<div id="imagem">';
			echo '<center><img src="img/banner.jpg"></center>';
			echo '</div>';
			echo '</div>';
			echo '<div class="card-content">';
			echo '<center>';
			echo '<h5>'.$value['nome'].'</h5>';
			echo $value['descricao'].'<br />';
			echo '<h6 style="color: #FFFFFF; font-size:22px;text-align: center; text-style:bold;border: transparent; border-radius: 10px; background-color: #1abc9c;">'.$value['preco'].'<h6>';
			echo '</center></div>';
			echo '<div class="card-action">';
			echo '<center><a href="prodBanner.php?prod='.$value['id'].'" class="btn waves-effect waves "><i class="material-icons right">shopping_cart</i> Add +</a>
		                <button class="btn waves-effect waves-light grey lighten-1"><i class="material-icons">info_outline</i></button></center>
		              </div>
		            </div>
		        </div>';
		}
	?>
	</div>
	</div>

	<script>
		$('#banners').addClass('active');
		$('#blocos').removeClass('active');
		$('#cartoes').removeClass('active');
		$('#comandas').removeClass('active');
		$('#envelopes').removeClass('active');
		$('#folhetos').removeClass('active');
		$('#promocoes').removeClass('active');
		$('#receituarios').removeClass('active');
		$('#taloes').removeClass('active');
	</script>
	<?php
		require_once 'footer.php';

	?>

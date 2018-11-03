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

$return = $produto->listar('receituario');

?>
<div class="row topos">

	<?php require_once 'sidebar.php' ?>
     <div class="col s12 m12 l9">
     <h4 style="background-color: #1abc9c; color: white; border-radius: 20px;"> Receituários </h4>
     </div>
	<div class="col s12 m12 l9">
	<?php
		if($return == null){
			echo '<center>Ainda não temos Receituários no site, mas em breve teremos!</center>';
		}
		foreach($return as $value){
			echo '<div class="col s12 m6 l4">';
			echo '<div class="card z-depth-4">';
			echo '<div class="card-image">';
			echo '<div id="imagem">';
			echo '<center><img src="img/receituario.jpg"></center>';
			echo '</div>';
			echo '</div>';
			echo '<div class="card-content">';
			echo '<center>';
			echo '<h5>'.$value['nome'].'</h5>';
			echo $value['descricao'].'<br />';
			echo '<h6 style="color: #FFFFFF; font-size:22px;text-align: center; text-style:bold;border: transparent; border-radius: 10px; background-color: #1abc9c;">'.$value['preco'].'<h6>';
			echo '</center></div>';
			echo '<center><span style="color: #f12f12;" class="descricao">Codigo: '.$value['id'].'</span><br /></center>';
			echo '<div class="card-action">';
			echo '<center><a href="prodReceituario.php?prod='.$value['id'].'" class="btn waves-effect waves "><i class="material-icons right">shopping_cart</i> Add +</a>
		                <button class="btn waves-effect waves-light grey lighten-1"><i class="material-icons">info_outline</i></button></center>
		              </div>
		            </div>
		        </div>';
		}
	?>
	</div>
	</div>
	<script>
		$('#banners').removeClass('active');
		$('#blocos').removeClass('active');
		$('#cartoes').removeClass('active');
		$('#comandas').removeClass('active');
		$('#envelopes').removeClass('active');
		$('#folhetos').removeClass('active');
		$('#promocoes').removeClass('active');
		$('#receituarios').addClass('active');
		$('#taloes').removeClass('active');
	</script>
	<?php
		require_once 'footer.php';

	?>

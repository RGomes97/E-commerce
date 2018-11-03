<?php
require 'conexao.php';
require 'admin.php';
?>
<script>
$(document).ready(function() {
  $('select').material_select();
});
</script>
<div id="espacoadm">
<h4> Editar Produtos </h4>
<form action="editar_produtos.php" method="POST">
<div class="input-field col s12">
  <div class="row">
   <div class="col s6">
      <select name="campo">
        <option value="" disabled selected>Filtrar por:</option>
        <option>nome</option>
        <option>tipo</option>
        <option>preco</option>
        <option>descricao</option>
      </select>
    </div>
    <div class="col s6">
    	<i class="material-icons prefix" name="id">perm_identity</i>
  <input name="id" id="id" type="text" placeholder="filtro" class="validate">
    </div>
    </div>
   </div>
</div>



<center><button class="btn waves-effect waves-light" type="submit" name="action">Filtrar
		 <i class="material-icons right">send</i>
</button></center>
</form>
<?php
$produto = new Produto($mysqli);

@$id = $_POST['id'];
@$campo = $_POST['campo'];

?>

<table class="striped">
    <thead>
       	<tr>
            <th data-field="id">ID</th>
            <th data-field="name">Nome</th>
            <th data-field="price">Tipo</th>
            <th data-field="price">Descricao</th>
            <th data-field="price">Preco</th>
            <th data-field="price">Editar</th>
        </tr>
    </thead>
    <tbody>

 <?php
if($campo != null && $id != null){
	$return = $produto->listarProdutosComFiltro($campo, $id);
}else{
	$return = $produto->listarTudo(); //listar usuarios do banco	
}

foreach($return as $value){
	echo '<tr>';
	echo '<td>'.$value['id'].'</td>';
	echo '<td>'.$value['nome'].'</td>';
	echo '<td>'.$value['tipo'].'</td>';
	echo '<td>'.$value['descricao'].'</td>';
	echo '<td>'.$value['preco'].'</td>';
	echo '<td><a href="editar.php?id='.$value['id'].'">Editar</a></td>';
	#echo '<td><a href="adm_users.php?operacao=delete&id="'.$value['id'].'>rubens</a></td>';
	#echo '<td><input type = "submit" value="Excluir" href="adm_users.php?operacao=delete&id=33"></td>';
	echo '</tr>';
} 


//codigo abaixo pode ser usado!
/*
$sql = 'select * from usuario';
$query = $mysqli->query($sql);
if($query = $mysqli->query($sql)){
$user = $query->fetch_all();//atribui a variavel user a pesquisa no banco de dados
echo 'name :'.$user[0][6];//mostra um determinado elemento do banco de dados, primeiro numero = ordem de usuario, segundo numero = atributo.
}*/




?>
</div>
</tbody>
</table>

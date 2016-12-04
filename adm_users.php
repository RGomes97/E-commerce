<?php
require 'conexao.php';
require 'admin.php';
?>
<div id="espacoadm">
<h4> Excluir Usuários </h4>
<form action="adm_users.php" method="POST">
<center><div class="input-field col s10">
          <i class="material-icons prefix" name="id">perm_identity</i>
          <input name="id" id="id" type="text" class="validate" style="width:50%">
          <label for="icon_telephone">ID</label>

</div></center>


<center><button class="btn waves-effect waves-light" type="submit" name="action">Delete
		 <i class="material-icons right">send</i>
</button></center>
</form>
<?php
$user1 = new User($mysqli);

@$id = $_POST['id'];

$user1->delete($id);
?>

<table class="striped">
    <thead>
       	<tr>
            <th data-field="id">ID</th>
            <th data-field="name">Nome</th>
            <th data-field="price">telefone</th>
            <th data-field="price">Email</th>
            <th data-field="price">Senha</th>
        </tr>
    </thead>
    <tbody>

 <?php

$return = $user1->listar(); //listar usuarios do banco
foreach($return as $value){
	echo '<tr>';
	echo '<td>'.$value['id'].'</td>';
	echo '<td>'.$value['nome'].'</td>';
	echo '<td>'.$value['telefone'].'</td>';
	echo '<td>'.$value['email'].'</td>';
	echo '<td>'.$value['senha'].'</td>';
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

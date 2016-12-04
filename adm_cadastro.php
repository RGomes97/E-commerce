<?php
	require_once 'conexao.php';
	require 'admin.php';
?>

<script>
		$(document).ready(function() {
        $('select').material_select();
		});
	 </script>

<div class="row">
<div id="espacoadm">
	<h4><center>Cadastrar Usuários</center></h4>
    <form action="adm_cadastro.php" method="POST">
      <div class="row">
	  
        <div class="input-field col s12 m6 l6">
          <i class="material-icons prefix" name="nome">account_circle</i>
          <input name="nome" type="text" class="validate">
          <label for="icon_prefix">Nome Completo</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <i class="material-icons prefix" name="telefone">phone</i>
          <input name="telefone" type="tel" class="validate">
          <label for="icon_telephone">Telefone</label>
        </div>
		<div class="input-field col s12 m6 l6">
          <i class="material-icons prefix" name="data_nasc">today</i>
          <input name="data_nasc" type="text" class="validate">
          <label for="icon_telephone">Data de Nascimento</label>
        </div>
		<div class="input-field col s12 m6 l6">
          <i class="material-icons prefix" name="email">mail</i>
          <input name="email" id="email" type="email" class="validate">
          <label for="icon_telephone">E-mail</label>
        </div>
		<div class="input-field col s12 m6 l6">
          <i class="material-icons prefix" id="password" name="senha">lock</i>
          <label for="password">Senha</label>
          <input name="senha" id="password" type="password" class="validate">
        </div>
		<div class="input-field col s12 m6 l6">
	    <select name="tipo">
	      <option>cliente</option>
	      <option>funcionario</option>
	      <option>admin</option>
	    </select>
    	<label>Tipo de usuario</label>
  	</div> 
  </div>
	<center><button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
		<i class="material-icons right">send</i>
		</button>
		<a class="btn-flat disabled" href="index.php">Cancelar</a>
		</center>
	</form>
	</form>
	</div>	
  </div>
  <?php
	@$nome = $_REQUEST['nome'];
	@$telefone = $_REQUEST['telefone'];
	@$data_nasc = $_REQUEST['data_nasc'];
	@$email = $_REQUEST['email'];
	@$senha = $_REQUEST['senha'];
	@$tipo = $_REQUEST['tipo'];
	
	$user1 = new User($mysqli);
	$user1->setNome($nome)
	->setTelefone($telefone)
	->setData_nasc($data_nasc)
	->setEmail($email)
	->setSenha($senha)
	->setTipo($tipo);


	if($nome and $email and $senha != null){
		$add = $user1->insert(); //inserir usuarios no banco
		if($add){
			echo '<script>alert("Cadastrado com sucesso!")</script>';
		}else{
			echo '<script>alert("erro")</script>';
		}
	}
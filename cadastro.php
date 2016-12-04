<?php
	require_once "header.php";
	require_once "conexao.php";
?>

<div class="row">

	<h4><center>Cadastre-se</center></h4>
    <form action="cadastro.php" method="POST">
      <div class="row">
	  
        <div class="input-field col s12">
          <i class="material-icons prefix" name="nome">account_circle</i>
          <input name="nome" type="text" class="validate">
          <label for="icon_prefix">Full Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix" name="telefone">phone</i>
          <input name="telefone" type="tel" class="validate">
          <label for="icon_telephone">Phone</label>
        </div>
		<div class="input-field col s12">
          <i class="material-icons prefix" name="data_nasc">today</i>
          <input name="data_nasc" type="text" class="validate">
          <label for="icon_telephone">Birth-Date</label>
        </div>
		<div class="input-field col s12">
          <i class="material-icons prefix" name="email">mail</i>
          <input name="email" id="email" type="email" class="validate">
          <label for="icon_telephone">E-mail</label>
        </div>
		<div class="input-field col s12">
          <i class="material-icons prefix" id="password" name="senha">lock</i>
          <label for="password">Password</label>
          <input name="senha" id="password" type="password" class="validate">
          <label for="icon_telephone">Password</label>
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

  <?php
	@$nome = $_REQUEST['nome'];
	@$telefone = $_REQUEST['telefone'];
	@$data_nasc = $_REQUEST['data_nasc'];
	@$email = $_REQUEST['email'];
	@$senha = $_REQUEST['senha'];
	
	$user1 = new User($mysqli);
	$user1->setNome($nome)
	->setTelefone($telefone)
	->setData_nasc($data_nasc)
	->setEmail($email)
	->setSenha($senha);
	$add = $user1->insert(); //inserir usuarios no banco


	echo $add;
	if($nome and $email and $senha != null){
	if($add){
		echo '<script>alert("Cadastrado com sucesso!")</script>';
	}else{
		echo '<script>alert("erro")</script>';
	}
}
	
	

?>
<?php
	require "footer.php";
?>
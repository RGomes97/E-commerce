<?php
  session_start();
	require "conexao.php";

  if(isset($_SESSION['venda'])){

  }else{
    $_SESSION['venda'] = array();
  }

  if(isset($_GET['prod'])){
    $produto = $_GET['prod'];
    $_SESSION['venda'][$produto] = 1;

    
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Gráfica Flaguris</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css">
      <link type="text/css" rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">$(document).ready(function(){$("#slidingDiv").hide();$("#show_hide").show();$('#show_hide').click(function(){$("#slidingDiv").slideToggle();});});</script>
<script>   $(document).ready(function(){$('.modal-trigger').leanModal();});</script>
<script>$('.dropdown-button2').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: ($('.dropdown-content').width()*3)/2.5 + 5, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  ); </script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script> $(document).ready(function(){
      $('.carousel').carousel();
    }); </script>
    
</head>
<!--Navbar Desktop-->
<nav class="a">
    <div class="container">
    <div class="nav-wrapper z-depth-0 ">
      <a href="index.php" class="brand-logo"><i class="material-icons">cloud</i>Gráfica Flaguri's</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" id="show_hide"><i class="material-icons left">search</i>Pesquisar</a></li>
        <li><a href="#modal1" class="modal-trigger"><i class="material-icons left">person</i>Login</a></li>
        <?php echo '<li><a href="carrinho.php"><i class="material-icons left">shopping_cart</i>Carrinho<span class="carrinho">'.sizeOf($_SESSION['venda']).'</span></a></li>'; ?>
        <li><a href="contato.php"><i class="material-icons left">phone</i>Contato</a></li>
      </ul>
      <!--Navbar Mobile-->
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#modal1" class="modal-trigger"><i class="material-icons right">person</i>Login</a></li>
        <li><a href="carrinho.php"><i class="material-icons right">shopping_cart</i>Carrinho</a></li>
        <li><a href="contato.php"><i class="material-icons right">phone</i>Contato</a></li>
      </ul>
    </div>
    </div>
  </nav>
  <!-- fim do logo e afins -->

  <!-- caixa de busca hidden -->
  <nav id="slidingDiv" class="a">
	 <div class="nav-wrapper" >
	      <form>
	        <div class="input-field">
	          <input id="search" type="search" required>
	          <label for="search"><i class="material-icons">search</i></label>
	          <i class="material-icons">close</i>
            
	        </div>
	      </form>
	    </div>
    </nav>
  <!-- fecha caixa de busca -->

  <!-- Modal login-->
  <div id="modal1" class="modal">
      <main>
      <center>
        <div class="section"></div>

        <h5 class="indigo-text">Por favor, entre na sua conta</h5>
        <div class="section"></div>

        <div class="container">
          <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

            <form class="col s12" method="post">
              <div class='row'>
                <div class='col s12'>
                </div>
              </div>

              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='email' name='login' id='email' />
                  <label for='email'>Digite seu Email</label>
                </div>
              </div>

              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='password' name='senha' id='password' />
                  <label for='password'>Digite a sua senha</label>
                </div>
                <label style='float: right;'>
                  <a class='pink-text' href='#!'><b>Esqueceu sua senha?</b></a><br/>
                </label>
                <label style='float: left;'>
                  <a class='blue-text' href='cadastro.php'><b>Criar uma conta</b></a>
                </label>
              </div>

              <br />
              <center>
                <div class='row'>
                  <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Entrar</button>
                </div>
              </center>
            </form>
          </div>
        </div>
        
      </center>
      </main>
	  </div>
	   <!-- Logo e os primeiros menus -->
	   <?php
		    @$email = $_REQUEST['login'];
		    @$senha = $_REQUEST['senha']; //pega o login e a senha digitada




		    if($email != "" and $senha != ""){ //confere se a pessoa realmente tentou fazer o login
		        $user1 = new User($mysqli); //conecta ao user.php 
		        $user1->setEmail($email)
		        ->setSenha($senha);
		        $login = $user1->login(); //tenta fazer login com os dados passados
   
            $result = $user1->tipo($email); //pesquisa o tipo do usuario

            $x = $user1->getNome();

            echo $x;

            while($row = $result->fetch_assoc()){ //faz a minha variavel resultado pegar o tipo do usuario
                $resultado = $row['tipo']; 
            }

    


		        if($_REQUEST['login'] != null){ //verifica se a pessoa está fzendo o login
			         if($login == 1){ //se o login e senha forem validos inicia a sessão
                  if($resultado =='admin'){ //verifica se quem está logando é um usuario normal ou um administrador
                     
                      echo '<script>alert("Bem-vindo Admin!") 
                      location.href="admin.php" 
                      </script>';
                      $_SESSION['login'] = $email;
                      $_SESSION['senha'] = $senha;
                  }
                  else{   
                      
			                 $_SESSION['login'] = $email;
			                 $_SESSION['senha'] = $senha;
			                 echo '<script>alert("Logado com sucesso!") 
			                 location.href="logado.php" 
			                 </script>'; #redireciona pagina e da mensagem
                  }
                }

                  else{
                        unset($_SESSION['login']);
                        unset($_SESSION['senha']);
			                 echo '<script>alert("Usuario e/ou senha incorretos")</script>';
                       
		              }	
		        }	
        }	


	
  ?>
 
  <body>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86177828-2', 'auto');
  ga('send', 'pageview');

</script>

  
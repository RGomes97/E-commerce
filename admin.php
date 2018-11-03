<?php
	session_start();
	require 'conexao.php';
  if((isset ($_SESSION['login']) == false) and (isset ($_SESSION['senha']) == false)){ //testa se a sessão foi iniciada, se não, redireciona 
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  echo '<script>alert("Faça login no site!") 
                       location.href="index.php" 
                       </script>';
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Grafica Flaguris - A impressão que impressiona</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css">
	  
  
</head>
	  <body>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-86177828-2', 'auto');
      ga('send', 'pageview');

    </script>
		<ul id="slide-out" class="side-nav" style="transform: translateX(0px);">
          <li><div class="userView">
            <img class="background" src="img/wallpaper_admin.jpg">
            <a href="#!user"><img class="circle" src="img/admin.jpg"></a>
            <a href="#!name"><span class="white-text name">Admin</span></a>
            <a href="#!email"><span class="white-text email"><?php echo $_SESSION['login'] ?></span></a>
          </div></li>
          <li><a href="adm_cadastro.php"><i class="material-icons">account_circle</i>Cadastrar usuarios</a></li>
          <li><a href="cadastro_produto.php"><i class="material-icons">input</i>Cadastrar produtos</a></li>
          <li><a href="#!"><i class="material-icons">done_all</i>Cadastrar pedidos</a></li>
          <li><a href="editar_produtos.php"><i class="material-icons">done_all</i>Editar produtos</a></li>
          <li><div class="divider"></div></li>
          <li><a class="subheader">Mais</a></li>
          <li><a class="waves-effect" href="adm_users.php"><i class="material-icons">perm_identity</i>Excluir usuarios</a></li>
          <li><a class="waves-effect" href="adm_produtos.php"><i class="material-icons">assignment</i>Excluir produtos</a></li>
          <li><a class="subheader">Outros</a></li>
          <li><a class="waves-effect" href="admin.php?logout=sim"><i class="material-icons">system_update_alt</i>Sair</a></li>
		</ul>
    <?php
      if(@$_GET['logout']=="sim"){ //se a pessoa clicar em sair, a sessão é destruida.
              echo '<script>location.href="index.php" </script>';
              session_destroy();
          }  
    ?>
		<a href="#" data-activates="slide-out" class="btn-floating btn-large waves-effect waves-light waves button-collapse"><i class="material-icons">dehaze</i></a>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> 
		<script>
		 $(".button-collapse").sideNav();
		</script>
</body>

</html>


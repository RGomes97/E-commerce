<?php
  session_start();
	require "conexao.php";

  

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
	<title> Gráfica Flaguris - A impressão que impressiona</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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
<nav>
    <div class="container">
    <div class="nav-wrapper z-depth-0">
      <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" id="show_hide"><i class="material-icons">search</i></a></li>
        <li><a href="#modal1" class="modal-trigger"><i class="material-icons">person</i></a></li>
        <li><a href="#"><i class="material-icons">shopping_cart</i></a></li>
        <?php

          $name = 'rubens';
          echo '<li>Bem vindo '.$_SESSION['login'].'</li>';
          echo '<li><a href="logado.php?logout=sim">Sair</a></li>';
          echo '</ul>';
          
          if(@$_GET['logout']=="sim"){ //se a pessoa clicar em sair, a sessão é destruida.
              echo '<script>location.href="index.php" </script>';
              session_destroy();
          }  
        ?>

      
    </div>
    </div>
  </nav>
  <!-- fim do logo e afins -->

  <!-- caixa de busca hidden -->
    <nav id="slidingDiv">
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

        <h5 class="indigo-text">Please, login into your account</h5>
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
                  <label for='email'>Enter your email</label>
                </div>
              </div>

              <div class='row'>
                <div class='input-field col s12'>
                  <input class='validate' type='password' name='senha' id='password' />
                  <label for='password'>Enter your password</label>
                </div>
                <label style='float: right;'>
                  <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                </label>
              </div>

              <br />
              <center>
                <div class='row'>
                  <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                </div>
              </center>
            </form>
          </div>
        </div>
        <a href="#!">Create account</a>
      </center>
      </main>
	  </div>
	   <!-- Logo e os primeiros menus -->


  
  <!-- fecha o modal -->
   <div class="col s13 hide-on-med-and-down colunaesq">
      <img class="responsive-img" src="img/1.jpg">   
      </div>

<?php
  require_once 'admin.php';
  require_once 'conexao.php';

  @$id = $_GET['id'];
  if($id != null){
    $produto = new Produto($mysqli);
    $return = $produto->listarUm($id);
  }else{
    $return = [];
  }
?>
    <script>
      $(document).ready(function() {
          $('select').material_select();
      });
    </script>
<?php

  
  echo '<div class="row">';
  foreach($return as $value){
  echo '<h4><center>Editar Produto</center></h4>';
    echo '<form action="editar.php?id='.$value['id'].'" method="POST">';
      echo '<div class="row">';
        echo '<div class="input-field col s6">';
          echo '<i class="material-icons prefix" name="nome">account_circle</i>';
          echo '<input name="nome" type="text" class="validate" value="'.$value['nome'].'">';
          echo '<label for="icon_prefix">Nome do produto</label>';
        echo '</div>';
        echo '<div class="input-field col s6">';
              echo '<i class="material-icons prefix">credit_card</i>';
             echo ' <input name="preco" type="number" class="validate" value="'.$value['preco'].'">';
              echo '<label for="icon_credit_card">Preco</label>';
           echo ' </div>';
        echo '<div class="input-field col s12">';
              echo '<i class="material-icons prefix">description</i>';
              echo '<input name="descricao" type="text" class="validate" value="'.$value['descricao'].'">';
              echo '<label for="icon_description">Descricao</label>';
        echo '</div>';
      echo '</div>';
        echo '<center><button class="btn waves-effect waves-light" type="submit" name="action">Editar Produto';
         echo '<i class="material-icons right">send</i>';
         echo '</button>';
         echo '<a class="btn-flat disabled" href="index.php">Cancelar</a>';
         echo '</center>';
    echo '</form>';
  echo '</form>';
  }
  echo '</div>';
?> 

  <?php
  @$nome = $_REQUEST['nome'];
  @$preco = $_REQUEST['preco'];
  @$descricao = $_REQUEST['descricao'];

  $user1 = new Produto($mysqli);
  $user1->setNome($nome)
  ->setPreco($preco)
  ->setDesc($descricao)
  ->setID($id);
  
  if($nome and $preco and $descricao != null){
    $add = $user1->update();
  if($add){
    echo '<script>alert("Editado com sucesso!")</script>';
  }else{
    echo '<script>alert("erro")</script>';
  }
}
  
?>
<?php
  require "footer.php";
?>
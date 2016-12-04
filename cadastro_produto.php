<?php
  require_once 'admin.php';
  require_once 'conexao.php';
?>
    <script>
      $(document).ready(function() {
          $('select').material_select();
      });
    </script>

<div class="row">

  <h4><center>Cadastrar Produtos</center></h4>
    <form action="cadastro_produto.php" method="POST">
      <div class="row">
    
        <div class="input-field col s6">
          <i class="material-icons prefix" name="nome">account_circle</i>
          <input name="nome" type="text" class="validate">
          <label for="icon_prefix">Nome do produto</label>
        </div>
        <div class="input-field col s6">
          <select name="tipo">
            <option value="" disabled selected>Escolha uma opção</option>
            <option>promocao</option>
            <option>folheto</option>
            <option>receituario</option>
            <option>bloco</option>
            <option>cartao</option>
            <option>banner</option>
            <option>envelope</option>
            <option>comanda</option>
            <option>talao</option>
          </select>
          <label>Tipo de produto</label>
        </div> 
        <div class="input-field col s12">
              <i class="material-icons prefix">credit_card</i>
              <input name="preco" type="number" class="validate">
              <label for="icon_credit_card">Preco</label>
            </div>
        <div class="input-field col s12">
              <i class="material-icons prefix">description</i>
              <input name="descricao" type="text" class="validate">
              <label for="icon_description">Descricao</label>
        </div>
      </div>
        <center><button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar Produto
         <i class="material-icons right">send</i>
         </button>
         <a class="btn-flat disabled" href="index.php">Cancelar</a>
         </center>
    </form>
  </form>
  
  </div>
  <?php
  @$nome = $_REQUEST['nome'];
  @$tipo = $_REQUEST['tipo'];
  @$preco = $_REQUEST['preco'];
  @$descricao = $_REQUEST['descricao'];

  
  $user1 = new Produto($mysqli);
  $user1->setNome($nome)
  ->setTipo($tipo)
  ->setPreco($preco)
  ->setDesc($descricao);
  
  

  
  if($nome and $preco and $tipo != null){
    $add = $user1->insert();
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
<?php 
  require 'header.php';

  $produto1 = new Produto($mysqli);

    if(isset($_GET['del'])){
    $del = $_GET['del'];
    unset($_SESSION['venda'][$del]);
  }

?>
<style>
body{
  background-color: #e9e9e9;
}
button{
  background-color: #16a085; 
  color: white;
  border: none;
  border-radius: 10px;
  border: 2px solid #16a085;
  font-weight: bold;
}
.carrinho-val{
  margin:10px;
  font-weight: bold;
  
}
.carrinho-icon{
  background-color: #16a085; color:white; padding:10px; text-align:center;
}

</style>
<h4>Meu Carrinho</h4>
<div class="card">
    <table class="striped">
        <thead>
          <tr>
              <th id="nome-do-produto" data-field="id">Nome do Produto</th>
              <th data-field="name">Descricao</th>
              <th data-field="price">Preço</th>
              <th class="carrinho-icon" data-field="Remover"><i class="material-icons medium ">shopping_cart</i></th>

          </tr>
        </thead>

        <tbody>
          <?php
          $total = 0;

            foreach($_SESSION['venda'] as $prod => $quantidade){ //pega o id de cada produto vendido meu
              
              $result = $produto1->getProduto($prod); 

              foreach($result as $value){
              echo '<tr>';
                echo '<td>'.$value['nome'].'</td>';
                echo '<td>'.$value['descricao'].'</td>';
                echo '<td>'.$value['preco'].'</td>';
                echo '<td><a href="carrinho.php?del='.$value['id'].'"><button>Remover</button></a></td>';
              echo '</tr>';
              $total +=$value['preco'];
              }
            }
          ?>
        
        </tbody>



      <tr>
        <td></td><td></td>
        <td>
        <?php echo '<p class="carrinho-val">Quantidade: '. sizeOf($_SESSION['venda']).'</p>'; ?>
        </td>
        <td>
        <?php echo '<p class="carrinho-val">Total: '.$total.'</p>'; ?>
        </td>
      </tr>
    </table>
    <br />
    <center><a href="#" class="btn waves-effect waves"><i class="material-icons right">shopping_cart</i> Finalizar Compra</a>
    <a href="index.php"><p class="carrinho-val right">Continuar Comprando</p></a>
    <br />
    <br />
</div>

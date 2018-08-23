<?php
	require_once 'header.php';
?>
	<script>
		 $('#textarea1').val('New Text');
  		$('#textarea1').trigger('autoresize');
  	</script>
  	<!-- Div principal -->
 	<div class="row topos">
	<h4><center>Contato</center></h4>
    <form action="" method="POST">
    <div class="input-field col s12 m6 l6">
    <div class="card-panel z-depth-4">
      <div class="row">
      <h4>Mensagem</h4>
	  	
        <div class="input-field col s12 m12 l12">
          <i class="material-icons prefix" name="nome">account_circle</i>
          <input name="nome" type="text" class="validate" minlength="10">
          <label for="icon_prefix">Nome Completo</label>
        </div>
        <div class="input-field col s12 m12 l12">
          <i class="material-icons prefix" name="telefone">phone</i>
          <input name="telefone" type="text" class="validate" minlength="11">
          <label for="icon_telephone">Telefone</label>
        </div>
        <div class="input-field col s12 m12 l12">
          <i class="material-icons prefix" name="email">mail</i>
          <input name="email" id="email" type="email" class="validate">
          <label for="icon_telephone">E-mail</label>
        </div>
		<div class="input-field col s12 m12 l12">
          <i class="material-icons prefix" name="data_nasc">mode_edit</i>
          <textarea id="address" class="materialize-textarea" name="mensagem"></textarea>
          <label for="icon_telephone">Mensagem</label>
        </div>
        <center><button class="btn waves-effect waves-light" type="submit" name="action">Enviar
		<i class="material-icons right">send</i>
		</button>
		<a class="btn-flat disabled" href="index.php">Cancelar</a>
		</center>
		</form>
        </div>
        </div>
		
		</div>
		<!-- Div do endereço -->
    <div class="row topos">
    	<div class="input-field col s12 m6 l6">
    		<div class="card-panel z-depth-4 blue lighten-4">
      			<div class="row">
	  				<h4>Gráfica Flaguri's</h4><br />
	  				<center><p>Endereço:<br /> Rua Três - Nº 51 - Vila Nova Bremen</p><br />
	  				<p>Guarulhos - SP</p><br />
	  				<p>CEP: 07124-369</p><br />
	  				<p>Telefone: (11) 2458-4662 / (11) 99684-1206</p></center><br />
	  				<center>
	  				<a href="https://wa.me/5511996841206?text=Oi, estava navegando no site e queria um orçamento" target="_blank" class="btn waves-effect waves-light">Solicite orçamento pelo whatsapp</a>
	  				<center>
        		</div>
        	</div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
	
		

<?php 
	@$nome = $_POST["nome"];
	@$telefone = $_POST["telefone"];
	@$email = $_POST["email"];
	@$mensagem = $_POST["mensagem"];
	if($nome != null  and $email != null and $mensagem != null){

	require_once("PHPMailer-master/PHPMailerAutoload.php"); 


	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp-mail.outlook.com'; //host da outlook
	$mail->Port = 587; //25 ou 587
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;

	// REMOVER A CONDIÇÃO DE BAIXO PRA VER SE RODA
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
	// REMOVER A CONDIÇÃO DE CIMA PRA VER SE RODA
	
	$mail->Username = "rubensgagostinho@outlook.com"; 
	$mail->Password = "rg64567203";


	// quem vai enviar
	$mail->setFrom("rubensgagostinho@outlook.com", "Mensagem do adm");
	// quem vai receber
	$mail->addAddress("rubensgagostinho@outlook.com");
	$mail->Subject = "Contato ADM";
	$mail->msgHTML("<html>De: {$nome}<br/>Telefone: {$telefone}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
	$mail->AltBody = "De: {$nome}\nTelefone: {$telefone}\nEmail:{$email}\nmensagem: {$mensagem}";

	if($mail->send()){
		echo '<script>alert("Mensagem enviada com sucesso, logo entraremos em contato, obrigado!")</script>';
	} else {
		echo '<script>alert("Não foi possivel enviar a sua mensagem")</script>';
	}
	die();

}
?>

	


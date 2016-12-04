<?php 

class User{

	private $db;
	private $id;
	private $nome;
	private $cpf;
	private $email;
	private $telefone;
	private $data_nasc;
	private $login;
	private $senha;
	private $tipo;
	

	function __construct(Mysqli $mysqli){
		$this->db = $mysqli;
	}

	
	public function insert(){
		$stmt = $this->db->stmt_init();
		$stmt->prepare('INSERT INTO usuario(nome,telefone,data_nasc,email,senha,tipo) VALUES(?,?,?,?,?,?)');
		$stmt->bind_param('sissss',$this->nome,$this->telefone,$this->data_nasc,$this->email,$this->senha,$this->tipo);
		$stmt->execute();
		return $stmt->insert_id;
	}
	public function listar(){
		$sql = "SELECT * FROM usuario";
		$query = $this->db->query($sql);
		return $query->fetch_all(MYSQLI_ASSOC);
	}

	public function update(){
		$stmt = $this->db->stmt_init();
		$stmt->prepare('UPDATE usuario SET nome = ?, email = ? WHERE id = ?');
		$stmt->bind_param('ssi',$this->nome,$this->email,$this->id);
		$stmt->execute();
		echo ' foi atualizado o usuario numero : ';
		return $stmt->execute();

	}
	public function delete($id){
		$stmt = $this->db->stmt_init();
		$stmt->prepare('DELETE FROM usuario WHERE id = ?');
		$stmt->bind_param('i',$id);
		return $stmt->execute();


		

	}
	public function login(){ 		
		$stmt = $this->db->stmt_init();
		$stmt->prepare('SELECT * FROM usuario WHERE email = ? and senha = ?');
		$stmt->bind_param('ss',$this->email,$this->senha);
		$stmt->execute();
		$rows = $stmt->get_result()->num_rows; //retorna o numero de linhas encontradas no banco de dados com essas informações
		return $rows;

		
	}

	public function tipo($email){
		$sql = "SELECT tipo FROM usuario WHERE email = '{$email}'";
		$result = $this->db->query($sql);
		return $result;
	}

	

	
	
	public function getID(){
		return $this->id;
	}
	
	public function setID($id){
		$this->id = $id;
		return $this;
	}

	public function getTipo(){
		return $this->tipo;
	}
	
	public function setTipo($tipo){
		$this->tipo = $tipo;
		return $this;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}

	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}
	public function getCPF(){
		return $this->cpf;
	}
	
	public function setCPF($cpf){
		$this->cpf = $cpf;
		return $this;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	
	public function setTelefone($telefone){
		$this->telefone = $telefone;
		return $this;
	}
	public function getData_nasc(){
		return $this->data_nasc;
	}
	
	public function setData_nasc($data_nasc){
		$this->data_nasc = $data_nasc;
		return $this;
	}
	public function getLogin(){
		return $this->login;
	}
	
	public function setLogin($login){
		$this->login = $login;
		return $this;
	}
	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
		return $this;
	}


}

 ?>

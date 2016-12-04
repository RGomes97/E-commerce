
<?php
	
	class Produto{

		private $db;
		private $id;
		private $nome;
		private $tipo;
		private $preco;
		private $descricao;
		private $imagem;


		function __construct(Mysqli $mysqli){
			$this->db = $mysqli;
		}

		
		public function insert(){
			$stmt = $this->db->stmt_init();
			$stmt->prepare("INSERT INTO produtos (nome,tipo,preco,descricao) VALUES(?,?,?,?)");
			$stmt->bind_param('ssss',$this->nome,$this->tipo,$this->preco,$this->descricao);
			$stmt->execute();
			return $stmt->insert_id;
		}
		public function listar($tipo){
			$sql = "SELECT * FROM produtos WHERE tipo = '{$tipo}'";
			$query = $this->db->query($sql);
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function getProduto($id){
			$sql = "SELECT * FROM produtos WHERE id = '{$id}'";
			$query = $this->db->query($sql);
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function listarTudo(){
			$sql = "SELECT * FROM produtos";
			$query = $this->db->query($sql);
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function update(){
			$stmt = $this->db->stmt_init();
			$stmt->prepare('UPDATE produtos SET nome = ?, email = ? WHERE id = ?');
			$stmt->bind_param('ssi',$this->nome,$this->email,$this->id);
			$stmt->execute();
			echo ' foi atualizado o produtos numero : ';
			return $stmt->execute();

		}
		public function delete($id){
			$stmt = $this->db->stmt_init();
			$stmt->prepare('DELETE FROM produtos WHERE id = ?');
			$stmt->bind_param('i',$id);
			return $stmt->execute();


			
		}
		public function login(){ 		
			$stmt = $this->db->stmt_init();
			$stmt->prepare('SELECT * FROM produtos WHERE email = ? and senha = ?');
			$stmt->bind_param('ss',$this->email,$this->senha);
			$stmt->execute();
			$rows = $stmt->get_result()->num_rows; //retorna o numero de linhas encontradas no banco de dados com essas informações
			return $rows;

			
		}

		public function getID(){
			return $this->id;
		}
		
		public function setID($id){
			$this->id = $id;
			return $this;
		}

		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
			return $this;
		}

		public function getTipo(){
			return $this->tipo;
		}
		
		public function setTipo($tipo){
			$this->tipo = $tipo;
			return $this;
		}

		public function getPreco(){
			return $this->preco;
		}
		
		public function setPreco($preco){
			$this->preco = $preco;
			return $this;
		}

		public function getDesc(){
			return $this->descricao;
		}
		
		public function setDesc($descricao){
			$this->descricao = $descricao;
			return $this;
		}

		public function getImagem(){
			return $this->imagem;
		}
		
		public function setImagem($imagem){
			$this->imagem = $imagem;
			return $this;
		}


}

	?>
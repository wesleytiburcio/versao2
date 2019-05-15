<?php 
require_once("Conexao.php");

class Usuario extends Conexao {
  
	private $nome;
	private $email;

  public function getNome() { return $this->nome; }
  public function setNome($nome) { $this->nome = $nome; return $this; }

  public function getEmail() { return $this->email; }
  public function setEmail($email) { $this->email = $email; return $this; }

  public function selectAll() {
  	$sql = "SELECT * FROM usuarios ORDER BY nome;";
  	$res = Conexao::prepare($sql);
  	$res->execute();
  	return $res->fetchAll();
  }

  public function selectUnit($id) {
  	$sql = "SELECT * FROM usuarios WHERE id = :id";
  	$res = Conexao::prepare($sql);
  	$res->bindParam('id', $id, PDO::PARAM_INT);
  	$res->execute();
  	return $res->fetch();
  }

  public function inserir() {
  	$sql = "INSERT INTO usuarios(nome, email) VALUES(:n, :e)";
  	$res = Conexao::prepare($sql);

  	$res->bindParam(':n', $this->nome);
  	$res->bindParam(':e', $this->email);

  	$res->execute();
  	return $res;
  }

  public function update($id, $nome, $email) {
    $sql  = "UPDATE usuarios SET nome = :n, email = :e WHERE id = :id";
    $res = Conexao::prepare($sql);
    
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->bindParam(':n', $this->nome);
    $res->bindParam(':e', $this->email);    
    
    $res->execute();
    return $res;
  }

  public function delete($id) {
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam('id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res;
  }

  public function pesquisar($nome) {
    $sql = "SELECT * FROM usuarios WHERE nome = :n";
    $res = Conexao::prepare($sql);

    $res->bindParam(':n', $this->nome);

    $res->execute();
    return $res->fetch();
  } 

}
?>
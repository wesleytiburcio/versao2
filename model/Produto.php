<?php 
require_once 'Conexao.php';

class Produto extends Conexao {
	private $nome;
	private $preco;
	private $quantidade;
	private $descricao;

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; return $this; }

    public function getPreco() { return $this->preco; }
    public function setPreco($preco) { $this->preco = $preco; return $this; }

    public function getQuantidade() { return $this->quantidade; }
    public function setQuantidade($quantidade) { $this->quantidade = $quantidade; return $this; }

    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) { $this->descricao = $descricao; return $this; }

    public function selectAll() {
    	$sql = "SELECT * FROM produtos ORDER BY nome";
    	$res = Conexao::prepare($sql);
    	$res->execute();
    	return $res->fetchAll();
    }

    public function selectUnit($id) {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $res = Conexao::prepare($sql);        
        $res->BindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res->fetch();   	
    }

    public function insert() {
        $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao) VALUES(:n, :p, :q, :d)";
        $res = Conexao::prepare($sql);

        $res->BindValue(':n', $this->nome);
        $res->BindValue(':p', $this->preco);
        $res->BindValue(':q', $this->quantidade);
        $res->BindValue(':d', $this->descricao);

        $res->execute();
        return $res;   	
    }

    public function update($id, $nome, $preco, $quantidade, $descricao) {
        $sql = "UPDATE produtos SET nome = :n, preco = :p, quantidade = :q, descricao = :d WHERE id = :id";
        $res = Conexao::prepare($sql);

        $res->BindParam(':id', $id, PDO::PARAM_INT);
        $res->BindValue(':n', $this->nome);
        $res->BindValue(':p', $this->preco);
        $res->BindValue(':q', $this->quantidade);
        $res->BindValue(':d', $this->descricao);

        $res->execute();
        return $res;    	
    }

    public function delete($id) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $res = Conexao::prepare($sql);
        $res->BindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res;    	
    }

    public function pesquisar($nome) {
        $sql = "SELECT * FROM produtos WHERE nome = :n ";
        $res = Conexao::prepare($sql);
        $res->BindValue(':n', $this->nome);
        $res->execute();
        return $res->fetch();    	
    }

}
?>
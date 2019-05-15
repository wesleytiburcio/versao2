<?php 
require_once("../view/Menu.php");
require_once("../model/Produto.php");

$produto = new Produto();
?>

<div class="container">
	<ul>
		<li style="list-style-type: none;">
			<a href="../view/Produto.php" class="btn btn-default btn-sm">Listar Produto</a>
			<a href="../view/CadastrarProduto" class="btn btn-default btn-sm">Novo Produto</a>
			<a href="../view/PesquisarProduto" class="btn btn-default">Pesquisar Produto</a>
		</li>
	</ul>
	<hr>

	<form action="" method="POST" accept-charset="utf-8">
		<label for="nome">Nome</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" name="nome" placeholder="digite nome">	
		</div>

		<label for="preco">Preço</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-ok"></i></span>
			<input type="text" name="preco" placeholder="digite preco">	
		</div>

		<label for="quantidade">Quantidade</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-plus-sign"></i></span>
			<input type="text" name="quantidade" placeholder="digite quantidade">	
		</div>

		<label for="descricao">Descrição</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-list-alt"></i></span>
			<input type="text" name="descricao" placeholder="digite descricao">	
		</div>
		<br>

		<input type="submit" name="cadastrarproduto" value="Cadastrar Produto">	
	</form>
	
</div>

<?php 
if (isset($_POST['cadastrarproduto'])) {
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$quantidade = $_POST['quantidade'];
	$descricao = $_POST['descricao'];
	
	$produto->setNome($nome);
	$produto->setPreco($preco);
	$produto->setQuantidade($quantidade);
	$produto->setDescricao($descricao);

	if ($produto->insert()) {
		echo "Cadastrado produto com sucesso!";
	}
}

?>

<?php require_once '../view/Footer.php'; ?>
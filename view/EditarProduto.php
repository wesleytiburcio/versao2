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
			<a href="../view/PesquisarProduto" class="btn btn-default btn-sm">Pesquisar Produto</a>
		</li>
	</ul>
	<hr>

	<?php 

	$id = (int) $_GET['id'];
	$dados = $produto->selectUnit($id);
	?>

	<form action="" method="POST" accept-charset="utf-8">
		
		<label for="nome">Nome</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" name="nome" id="nome" value="<?php echo $dados->nome ?>">
		</div>

		<label for="preco">Preço</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-ok"></i></span>
			<input type="text" name="preco" id="preco" value="<?php echo $dados->preco ?>">
		</div>
		
		<label for="quantidade">Quantidade</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-plus-sign"></i></span>
			<input type="text" name="quantidade" id="quantidade" value="<?php echo $dados->quantidade ?>">
		</div>

		<label for="descricao">Descrição</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-list-alt"></i></span>
			<input type="text" name="descricao" id="descricao" value="<?php echo $dados->descricao ?>">
		</div>
		<br>

		<input type="submit" value="Atualizar Produto" name="atualizarproduto" class="btn btn-default btn-sm">			
	</form>

	<?php 
	if (isset($_POST['atualizarproduto'])) {
		
		$id = (int) $_GET['id'];
		$nome = $_POST['nome'];
		$preco = $_POST['preco'];
		$quantidade = $_POST['quantidade'];
		$descricao = $_POST['descricao'];

		$produto->setNome($nome);
		$produto->setPreco($preco);
		$produto->setQuantidade($quantidade);
		$produto->setDescricao($descricao);

		if ($produto->update($id, $nome, $preco, $quantidade, $descricao)) {
		  	echo "Produto atualizado com sucesso!";
		  	header('Location: ../view/Produto.php');
		  }
	} 
	?>
		
</div>

<?php require_once '../view/Footer.php'; ?>
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

	<form action="" method="post" accept-charset="utf-8">
		<label for="nome">Nome</label>
		<div>			
			<input type="text" name="nome" id="nome" placeholder="digite nome">
		</div>

		<input type="submit" name="pesquisarproduto" value="Pesquisar Produto" class="btn btn-default">		
	</form>	

	<?php 
	if (isset($_POST['pesquisarproduto'])):
		$nome = $_POST['nome'];
		$produto->setNome($nome);

		$dado = $produto->pesquisar($nome);
	
		?>

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th style="display: none;">Id</th>
					<th>Nome</th>
					<th>Preço (R$)</th>
					<th>Quantidade</th>
					<th colspan="2">Descrição</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="display: none;"><?php echo $dado->id; ?></td>
					<td><?php echo $dado->nome; ?></td>
					<td><?php echo $dado->preco; ?></td>
					<td><?php echo $dado->quantidade; ?></td>
					<td><?php echo $dado->descricao; ?></td>
					<td>
						<a href="../view/EditarProduto.php?id=<?php echo $dado->id; ?>" class="btn btn-default">Editar</a>
						<a href="../view/Produto.php?acao=deletar&id=<?php echo $dado->id; ?>" class="btn btn-default">Excluir</a>
					</td>

				</tr>
			</tbody>
		</table>

		<a href="../view/PesquisarProduto.php" class="btn btn-default btn-sm">Limpar Produto</a>

		<?php
		endif;
	?>

</div>
<?php require_once '../view/Footer.php'; ?>
<?php 
require_once '../view/Menu.php';
require_once '../model/Produto.php';
$produto = new Produto();

?>

<div class="container">
	
	<ul>
	  <li style="list-style-type: none">
	  	<a href="../view/Produto.php" class="btn btn-default btn-sm">Listar Produto</a>
		  <a href="../view/CadastrarProduto.php" class="btn btn-default btn-sm">Novo Produto</a>
		  <a href="../view/PesquisarProduto.php" class="btn btn-default btn-sm" >Pesquisar Produto</a>
		</li>
	</ul>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th style="display: none;">Id</th>
				<th>Nome</th>
				<th>Preço</th>
				<th>Quantidade</th>
				<th colspan="2">Descricao</th>
			</tr>
		</thead>

		<?php foreach ($produto->selectAll() as $key => $value): ?>		
		<tbody>
				<tr>
					<td style="display: none;"><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo "R$ ". $value->preco; ?></td>
					<td><?php echo $value->quantidade; ?></td>
					<td><?php echo $value->descricao; ?></td>
					<td>
						<a href="../view/EditarProduto.php?id=<?php echo $value->id; ?>" class="btn btn-default">Editar</a>
						<a href="../view/Produto.php?acao=deletar&id=<?php echo $value->id; ?>" class="btn btn-default btn-sm">Excluir</a>
					</td>
			</tr>
		</tbody>
		<?php endforeach ?>
	
	</table>
</div>

<?php 
if (isset($_GET['acao']) && $_GET['acao'] == 'deletar') {
	$id = (int)$_GET['id'];

	$produto->delete($id);
	header('Location: ../view/Produto.php');	
}
?>

<?php require_once '../view/Footer.php'; ?>
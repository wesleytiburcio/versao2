<?php 
require_once '../view/Menu.php';
require_once '../model/Usuario.php';
require_once '../controller/ControllerUsuario.php';
$usuario = new Usuario();

?>

<?php 

if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
	$id = (int) $_GET['id'];
	if ($usuario->delete($id)) {
		echo "Deletado usuario com sucesso!";
	}
endif;
?>

<div class="container">
	
	<ul>
	  <li style="list-style-type: none">
	  	<a href="../view/Usuario.php" class="btn btn-default btn-sm">Listar Usuário</a>
		  <a href="../view/CadastrarUsuario.php" class="btn btn-default btn-sm">Novo Usuário</a>
		  <a href="../view/PesquisarUsuario.php" class="btn btn-default btn-sm" >Pesquisar Usuário</a>
		</li>
	</ul>
		 
	<table class="table table-bordered table-hover">	
		<thead>
			<tr>
				<th style="display: none">Id</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>			

			</tr>
		</thead>

		<?php foreach ($usuario->selectAll() as $key => $value): ?>		
		<tbody>
			<tr>
				<td style="display: none"><?php echo $value->id; ?></td>
				<td><?php echo $value->nome; ?></td>
				<td><?php echo $value->email; ?></td>
				<td>
					<a href="EditarUsuario.php?id=<?php echo $value->id; ?>" class="btn btn-default btn-sm">Editar</a>
					
					<a href="Usuario.php?acao=deletar&id=<?php echo $value->id; ?>" class="btn btn-default btn-sm" >Excluir</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>

	</table>
</div>

<?php require_once '../view/Footer.php'; ?>
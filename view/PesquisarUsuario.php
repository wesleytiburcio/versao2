<?php 
require_once '../view/Menu.php';
require_once '../model/Usuario.php';
$usuario = new Usuario();

?>
<div class="container">
	<ul>
	  <li style="list-style-type: none">
	  	<a href="../view/Usuario.php" class="btn btn-default btn-sm">Listar Usuário</a>
		  <a href="../view/CadastrarUsuario.php" class="btn btn-default btn-sm">Novo Usuário</a>
		  <a href="../view/PesquisarUsuario.php" class="btn btn-default btn-sm" >Pesquisar Usuário</a>
		</li>
	</ul>

	<hr>
	<form action="" method="post" accept-charset="utf-8">
		<label for="nome">Nome</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" name="nome" id="nome" placeholder="digite nome">
		</div>

		<!-- <label for="email">Email</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="email" name="email" id="email" placeholder="digite email">
		</div>-->
		<br>

		<input type="submit" value="Pesquisar Usuário" class="btn btn-default btn-sm" name="pesquisarusuario">			
	</form>


	<?php
	if (isset($_POST['pesquisarusuario'])):
		$nome = $_POST['nome'];
		//$email = $_POST['email'];

		$usuario->setNome($nome);
		$dado = $usuario->pesquisar($nome);

		?>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th style="display: none;">Id</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="display: none"><?php echo $dado->id; ?></td>
					<td><?php echo $dado->nome; ?></td>
					<td><?php echo $dado->email; ?></td>
					<td>
						<a href="EditarUsuario?id=<?php echo $dado->id; ?>" class="btn btn-default btn-sm"
							>Editar</a>
						<a href="Usuario.php?acao=deletar&id=<?php echo $dado->id; ?>" 
							class="btn btn-default btn-sm">Excluir</a>
					</td>
				</tr>
						
			</tbody>
		</table>

		<a href="PesquisarUsuario.php" class="btn btn-default">Limpar Usuário</a>

	<?php 
	endif;
	?>
</div>

<?php require_once '../view/Footer.php'; ?>
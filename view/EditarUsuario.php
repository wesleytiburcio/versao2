<?php 
require_once '../view/Menu.php';
require_once '../model/Usuario.php';
$usuario = new Usuario();

$id = (int) $_GET['id'];
$dados = $usuario->selectUnit($id);

?>
<?php 
if (isset($_POST['atualizarusuario'])) {
	$id = (int) $_GET['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$usuario->setNome($nome);
	$usuario->setEmail($email);
	
	if ($usuario->update($id, $nome, $email)) {		
		header('Location: ../view/Usuario.php');
		echo "Usuario atualizado com sucesso!";
	}
}
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
			<input type="text" name="nome" id="nome" value="<?php echo $dados->nome ?>">
		</div>

		<label for="email">Email</label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="email" name="email" id="email" value="<?php echo $dados->email ?>">
		</div>
		<br>

		<input type="submit" value="Atualizar Usuário" name="atualizarusuario" class="btn btn-default btn-sm">			
	</form>
</div>

<?php require_once '../view/Footer.php'; ?>
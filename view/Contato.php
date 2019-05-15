<?php 
require_once '../view/Menu.php';
require_once '../model/Usuario.php';
$usuario = new Usuario();

?>
<div class="container">
	
	<ul>
	  <li style="list-style-type: none">
	  	<a href="../view/Contato.php" class="btn btn-default btn-sm">Listar Contato</a>
			<a href="../view/CadastrarContato.php" class="btn btn-default btn-sm">Novo Contato</a>
			<a href="../view/PesquisarContato.php" class="btn btn-default btn-sm" >Pesquisar Contato</a>
		</li>
	</ul>




</div>
<?php require_once '../view/Footer.php'; ?>
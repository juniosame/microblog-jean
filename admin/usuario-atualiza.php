<?php 
require_once "../inc/funcoes-usuarios.php";
require_once "../inc/cabecalho-admin.php";

// Pegando o valor do parâmetro id vindo da URL
$id = $_GET['id'];

// Chamando a função e guardando o retorno dela
$usuario = lerUmUsuario($conexao, $id);


// Verificando se o formulário foi acionadp
if(isset($_POST['atualizar'])){
	// Capturando os dados
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tipo = $_POST['tipo'];

	/* Lógica para a senha
	Se o campo senha estiver vazio OU se a senha digitada for igual à senha que já existe no banco de dados, então significa que o usuário NÃO ALTETOU A SENHA. Portanto, devemos MANTER a senha existente */
	if(empty($_POST['senha']) ||
		password_verify($_POST['senha'], $usuario['senha']) ) {
		$senha = $usuario['senha']; // mantemos a mesma senha
	} else {
	/* Caso contrário, pegaremos a senha nova digitada e a codificamos antes de mandar para o banco */
		$senha = password_hash($_POST['senha]'], PASSWORD_DEFAULT);
	}

	// Chamamos a função e passamos os dados
	atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);
	
	// Redirecionamos para a página de usúarios
	header("location:usuarios.php");
}
?>

<!-- <pre><?=var_dump($dados)?></pre> -->


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar dados do usuário
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?=$usuario['nome']?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?=$usuario['email']?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<div class="mb-3">
				<label class="form-label" for="tipo">Tipo:</label>
				<select class="form-select" name="tipo" id="tipo" required>

					<option value=""></option>

					<option
					<?php if($usuario['tipo'] === "editor") echo "selected"?>
					value="editor">Editor</option>


					<option
					<?php if($usuario['tipo'] === "admin") echo "selected"?>
					value="admin">Administrador</option>

				</select>
			</div>
			
			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>


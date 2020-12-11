<?php
include('../../connection/connection.php');
include('./ler.php');
include('./login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<title>Cadastro</title>
</head>

<body>
	<div class="container-fluid">
		<article class="row justify-content-around mt-3">

			<form class="card card-cadastro col-3" action="" method="POST">
				<h5 class="text-center font-weight-bold font-italic mt-1" for="">Dados para Login</h5>

				<!-- LOGIN -->
				<label class="sr-only" for="inlineFormInputGroup">Login</label>
				<div class="input-group my-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="far fa-user-circle"></i></div>

					</div>
					<input type="text" class="form-control card-input" name="login" id="login" placeholder="Login...">
				</div>

				<!-- SENHA -->
				<label class="sr-only" for="inlineFormInputGroup">Senha</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
					</div>
					<input type="password" class="form-control card-input" name="senha" id="senha" placeholder="Senha...">
				</div>
				<!-- <span id="span"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?></span> -->

				<!-- BOTOES -->
				<div class="text-center mt-3">
					<button type="submit" name="salvar" id="save" class="btnPublicar col-5 mx-2 mb-2">Entrar <i class="fas fa-sign-in-alt"></i></button>
					<button type="button" name="limpar" id="clear" class="btnExcluir col-5 mx-2 mb-2">Limpar <i class="fas fa-ban"></i></button>
				</div>

				<hr>
				<!-- TIMER -->
				<div class="row justify-content-center">
					<h5 id="timer1" class="col-auto"></h5>
					<h5 id="timer2" class="col-auto"></h5>
				</div>

				<hr>
				<!-- BOTAO DARK THEME -->
				<div class="row">
					<div class="switch__container col-2">
						<label class="font-weight-bold font-italic">Light/Dark</label>
						<input id="switch-shadow" name="theme" class="switch switch--shadow" type="checkbox" />
						<label for="switch-shadow"></label>
					</div>
					<div class="col-3">
						<p><a href="../../index.php">Voltar...</a></p>
					</div>
					<p><a href="../cadastro/index.php">Click aqui para Cadastrar!</a></p>
				</div>
			</form>

		</article>
	</div>
	<script src="../../scripts/timer.js"></script>
	<script src="../../scripts/script.js"></script>
</body>

</html>

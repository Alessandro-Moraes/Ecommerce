<?php
include('../../connection/connection.php');
include('../login/login.php');
include('update.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
	<link rel="stylesheet" href="../styles/style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<title>Perfil Usuário</title>
</head>

<body>
	<div class="container-fluid">
		<article class="row justify-content-around mt-3">

			<form class="card card-cadastro col-4" action="" method="POST" enctype="multipart/form-data">
				<h5 class="text-center font-weight-bold font-italic mt-1" for="">Perfil de usuário</h5>

				<?php foreach (readLogin() as $value) { ?>
				<!-- ID -->
				<input type="hidden" name="id" value="<?php echo $value->id ?>">

				<!-- LOGIN -->
				<label class="sr-only" for="inlineFormInputGroup">Login</label>
				<div class="input-group mt-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-sign-in-alt"></i></div>

					</div>
					<input type="text" class="form-control card-input" name="login" id="login" value="<?php echo $value->login ?>">
				</div>

				<!-- EMAIL -->
				<label class="sr-only" for="inlineFormInputGroup">Email</label>
				<div class="input-group mt-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="far fa-envelope"></i></div>

					</div>
					<input type="email" class="form-control card-input" name="email" id="email" value="<?php echo $value->email ?>">
				</div>

				<!-- AVATAR -->
				<label class="sr-only" for="inlineFormInputGroup">Avatar</label>
				<div class="input-group my-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="far fa-user-circle"></i></div>
					</div>
					<input type="file" class="form-control card-input" name="avatar" id="avatar" placeholder="Avatar..." accept='image/*'>
				</div>

				<img class="imgUser" src=<?php echo "../cadastro/img/{$value->avatar}"; ?> alt="Imagem de avatar do usuário">
							
				<?php } ?>

				<!-- BOTOES -->
				<div class="text-center mt-3">
					<button type="submit" name="salvar" id="save" class="btnPublicar col-5 mx-2 mb-2">Salvar <i class="far fa-save"></i></button>
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
					<div class="col-4">
						<p><a href="../../index.php">Voltar...</a></p>
					</div>
				</div>
			</form>
		</article>
	</div>
	<script src="../scripts/timer.js"></script>
	<script src="../scripts/script.js"></script>
</body>

</html>

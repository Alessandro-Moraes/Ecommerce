<?php
include('./connection/connection.php');
include('login/login.php');
include('login/logout.php');
include('produto/cadastro.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
	<link rel="stylesheet" href="./styles/index.css">
	<link rel="stylesheet" href="./styles/style.css">
	<title>Ecommerce</title>
</head>

<body>
	<div class="container-fluid">
		<article class="row justify-content-around mt-3">
			<div class="card">

				<!-- BOTAO DARK THEME -->
				<form action="" method="POST">
					<div class="switch__container">
						<input id="switch-shadow" name="theme" class="switch switch--shadow" type="checkbox" />
						<label for="switch-shadow"></label>
						<label class="switch-label">Light/Dark</label>
					</div>

					<h3><a href="../p3/index.php" class="index">Geek Shop</a></h3>

					<?php if (!isset($_SESSION['id'])) { ?>
						<div>
							<img class="imgLogin" src=<?php echo "./images/avatar.jpg"; ?> alt="Imagem de avatar do usuário">
							<span class="login"><?php echo "Anônimo" ?></span>
						</div>
						<a href="./pages/login/index.php" class="btnLogout"><i class="far fa-user-circle"></i>Login</a>
						<?php } else {
						foreach (readLogin() as $value) { ?>
							<div>
								<img class="imgLogin" src=<?php echo "./pages/cadastro/img/{$value->avatar}"; ?> alt="Imagem de avatar do usuário">
								<span class="login"><?php echo $_SESSION['login'] ?></span>
							</div>
							<?php if ($value->tipo === 'cadastro') { ?>
								<a href="./pages/produto/produto.php" name="produto" value="<?php echo $_SESSION['id']; ?>">Cadastrar</a>
							<?php } ?>
							<a href="./pages/usuario/perfil.php" name="perfil" value="<?php echo $_SESSION['id']; ?>">Perfil</a>
							<button type="submit" name="btnLogout" class="btnLogout">Logout <i class="far fa-user-circle"></i></button>
					<?php }
					} ?>
				</form>

				<!-- INPUT PESQUISA -->	
				<form class="pesquisa" action="#" method="POST">
					<div>
						<input type="search" name="pesquisa" class="pesquisar" placeholder="Pesquisar...">
						<button type="submit" class="btnPesquisar"><i class="fas fa-search"></i></button>
					</div>
					<a href="./pages/carrinho.php"><i class="fas fa-shopping-bag"></i>Carrinho</a>
				</form>

				<!-- CARROSSEL DESTAQUES -->
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						$cont = 0;
						foreach (destaque() as $value) {
							if ($cont == 0) {
						?>
								<div class="carousel-item active">
								<?php } else { ?>
									<div class="carousel-item">
									<?php }  ?>
									<h2 class="carrosselTitle"><?php echo $value->produto; ?></h2>
									<img class="carrosselImage" src=<?php echo "./pages/cadastro/img/{$value->imagem}"; ?> alt="First slide">
									<div class="carrosselInfo">
										<h2 class="">R$ <?php echo $value->valor; ?></h2>
										<a class="btnDetalhe" href="./comentario/<?php echo $value->idProduto; ?>" name="idProduto" class="detalhesCard">Detalhes...</a>
									</div>
									<?php $cont++ ?>
									</div>
								<?php } ?>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
					</div>


					<div class="hr">
						<hr>
					</div>

					<!-- CARDS PRODUTOS -->
					<!-- <form action="./pages/comentarios/comentario.php" method=""> -->
					<?php echo carrinho(); if(isset($_POST['pesquisa'])) { ?>
						<div class="produtos">
						<?php foreach (pesquisar() as $value) { ?>
							<div class="card" style="max-width: 450px;">
								<div class="row no-gutters">
									<div class="col-md-5">
										<img src=<?php echo "./pages/cadastro/img/{$value->imagem}"; ?> class="card-img" alt="...">
									</div>
									<div class="col-md-7">
										<div class="card-body">
											<h4 class="card-title"><?php echo $value->produto; ?></h4>
											<h5 class="card-title">R$ <?php echo $value->valor; ?></h5>
											<a class="btnDetalhe" href="./comentario/<?php echo $value->idProduto; ?>" name="idProduto" class="detalhesCard">Detalhes...</a>
											<hr>
											<a class="btnCarrinho" href="#">Adicionar ao carrinho...</a>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<?php } else { ?>
					<div class="produtos">
						<?php foreach (produtos() as $value) { ?>
							<div class="card" style="max-width: 450px;">
								<div class="row no-gutters">
									<div class="col-md-5">
										<img src=<?php echo "./pages/cadastro/img/{$value->imagem}"; ?> class="card-img" alt="...">
									</div>
									<div class="col-md-7">
										<div class="card-body">
											<h4 class="card-title"><?php echo $value->produto; ?></h4>
											<h5 class="card-title">R$ <?php echo $value->valor; ?></h5>
											<a class="btnDetalhe" href="./comentario/<?php echo $value->idProduto; ?>" name="idProduto" class="detalhesCard">Detalhes...</a>
											<hr>
											<a class="btnCarrinho" href="?adicionar=<?php echo $value->idProduto; ?>" name="carrinho" >Adicionar ao carrinho</a>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
						<?php } ?>
					<!-- </form> -->
				</div>
			</div>
		</article>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="scripts/script.js"></script>
</body>

</html>

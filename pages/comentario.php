<?php
include('./connection/connection.php');
include('./pages/login/login.php');
include('./pages/login/logout.php');
include('./pages/produto/cadastro.php');
include('./pages/comentarios/create.php');
include('./pages/comentarios/read.php');
include('./pages/comentarios/delete.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Descrição do Produto</title>
</head>

<body>
  <div class="container-fluid">
    <article class="row justify-content-around mt-3">
      <div class="card">
        <!-- BOTAO DARK THEME -->
        <form action="../" method="POST">
          <div class="switch__container">
            <input id="switch-shadow" name="theme" class="switch switch--shadow" type="checkbox" />
            <label for="switch-shadow"></label>
            <label class="switch-label">Light/Dark</label>
          </div>

          <h3><a href="../index.php" class="index">Geek Shop</a></h3>

          <?php if (!isset($_SESSION['id'])) { ?>
            <div>
              <img class="imgLogin" src=<?php echo "../images/avatar.jpg"; ?> alt="Imagem de avatar do usuário">
              <span class="login"><?php echo "Anônimo" ?></span>
            </div>
            <a href="../pages/login/index.php" class="btnLogout">Login <i class="far fa-user-circle"></i></a>
            <?php } else {
            foreach (readLogin() as $value) { ?>
              <div>
                <img class="imgLogin" src=<?php echo "../pages/cadastro/img/{$value->avatar}"; ?> alt="Imagem de avatar do usuário">
                <span class="login"><?php echo $_SESSION['login'] ?></span>
              </div>

              <?php if ($value->tipo === 'cadastro') { ?>
                <a href="../produto/produto.php" name="produto" value="<?php echo $_SESSION['id']; ?>">Cadastrar</a>
              <?php } ?>

              <a href="../usuario/perfil.php" name="perfil" value="<?php echo $_SESSION['id']; ?>">Perfil</a>
              <button type="submit" name="btnLogout" class="btnLogout">Logout <i class="far fa-user-circle"></i></button>
              <?php }
          } ?>
        </form>

        	<!-- INPUT PESQUISA -->
				<div class="pesquisa">
					<a href="#"><i class="fas fa-shopping-bag"></i>Carrinho</a>
				</div>

        <h3 class="titleDetalhe">Detalhe Produtos</h3>

        <!-- CARDS PRODUTOS COMENTARIOS -->
        <form action="" method="post">

          <div class="detalhe">
            <?php foreach (readProduto() as $value) { ?>
              
                <img src=<?php echo "../pages/cadastro/img/{$value->imagem}"; ?> class="detalheImg" alt="...">
                <div class="card-body detalheInfo">
                  <h4 class="card-title" style="margin: 0; paddind: 0;"><?php echo $value->produto; ?></h4>
                  <h5 class="card-title" style="margin: 0; paddind: 0;"><?php echo $value->categoria; ?></h5>
                  <p class="card-text">
                    <h5 class="card-title">R$ <?php echo $value->valor; ?></h5>
                    <p class="card-text">
                      <hr>
                      <p class="descricao"><?php echo $value->descricao; ?></p>
                </div>
              
            <?php $idProduto = $value->idProduto; } ?>
            </div>
        </form>

        <!-- PUBLICAÇÃO -->
				<form class="publicacoes" action="" method="POST">
					<div class="comentarios">
						<img src="<?php echo isset($_SESSION['id']) ? "../pages/cadastro/img/{$_SESSION['avatar']}" : "../images/avatar.jpg"; ?>" class="avatar" alt="meu avatar">
						<textarea class="comentario" name="comentario" placeholder="Insira seu comentário aqui..."></textarea>
						<button class="btnPublicar" name="btnPublicar" type="submit">Publicar</button>
					</div>
					<!-- FINAL PUBLICAÇÃO -->

					<hr class="">

					<!-- COMENTARIO -->
					<?php if (!empty(read($idProduto))) {
						foreach (read($idProduto) as $value) { ?>
							<div>
								<div class="comentarios">
									<img src="<?php echo $value->avatar ? "../pages/cadastro/img/{$value->avatar}" : "../images/avatar.jpg" ?>" class="avatar" alt="meu avatar">
									<div>
										<h5 class="dadosUsuario">
                      <?php
                        $date = new DateTime($value->dataComentario);
                        $date->modify('-3 hour');
                        echo ($value->login ? $value->login : "Anônimo") . ' ' . $date->format('d/m/Y - H:i:s') ?></h5>
										<p class="comentario"><?php echo $value->comentario ?></p>
									</div>
									<!-- BOTOES -->
									<div class="botoes">
										<?php if (isset($_SESSION['id']) == $value->id) { ?>
											<button type="submit" name="btnExcluir" class="btnExcluir" value="<?php echo $value->idComentario ?>">Excluir <i class="fas fa-ban"></i></button>
										<?php } ?>
									</div>
								</div>
								<hr>
							</div>
					<?php }
					}
					?>
					<!-- FINAL COMENTARIO -->
				</form>
    </article>
  </div>
  <script src="../scripts/script.js"></script>
</body>

</html>

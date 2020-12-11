<?php
include('../connection/connection.php');
include('../pages/login/login.php');
include('../pages/login/logout.php');
include('../pages/produto/cadastro.php');
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

        <!-- CARDS PRODUTOS -->
          <div class="cardCarrinho">
              <?php foreach ($_SESSION['carrinho'] as $value) { ?>
                <div class="card" style="max-width: 450px;">
                  <div class="row no-gutters">
                    <div class="col-md-5">
                      <img src=<?php echo "./cadastro/img/{$value['imagem_url']}";; ?> class="card-img" alt="...">
                    </div>
                    <div class="col-md-7">
                      <div class="detalheCarrinho card-body">
                        <h4 class="card-title"><?php echo $value['nome']; ?></h4>
                        <h5 class="card-title">R$ <?php echo $value['valor'];; ?></h5>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>  

    </article>
  </div>
  <script src="../scripts/script.js"></script>
</body>

</html>

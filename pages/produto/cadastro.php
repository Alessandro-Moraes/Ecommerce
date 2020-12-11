<?php

function cadastroProdutos() {
  $avatar = $_FILES['avatar'];

  if ($avatar['name'] !== '') {

    $produto = isset($_POST['produto']) ? $_POST['produto'] : '';
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $destaque = isset($_POST['destaque']) ? $_POST['destaque'] : '';
    $valor = isset($_POST['valor']) ? $_POST['valor'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

    $nameImage = md5($avatar['name'] . rand(0, 9999));
    $tipo = substr($avatar['name'], -4);
    $nomeCompleto = "{$nameImage}{$tipo}";
    $imagem = $avatar['tmp_name'];
    move_uploaded_file($imagem, "../cadastro/img/{$nomeCompleto}");

    $sql = 'insert into produtos (produto, categoria, destaque, valor, descricao, imagem)
                        values (:produto, :categoria, :destaque, :valor, :descricao, :imagem)';

    $connection = connection();
    $result = $connection->prepare($sql);
    $result->bindValue(':produto', $produto);
    $result->bindValue(':categoria', $categoria);
    $result->bindValue(':destaque', $destaque);
    $result->bindValue(':valor', $valor);
    $result->bindValue(':descricao', $descricao);
    $result->bindValue(':imagem', $nomeCompleto);
    $result->execute();
  }
}

if (isset($_POST['salvar'])) {
  cadastroProdutos();
}

function destaque() {
  $sql = 'select * from produtos where destaque= :destaque';

  $connection = connection();
  $result = $connection->prepare($sql);
  $result->bindValue(':destaque', 'sim');
  $result->execute();
  return $result->fetchAll(PDO::FETCH_OBJ);
}

function produtos() {
  $sql = 'select * from produtos';

  $connection = connection();
  $result = $connection->prepare($sql);
  $result->execute();
  return $result->fetchAll(PDO::FETCH_OBJ);
}


function readProduto() {
  $url = explode('/', $_SERVER['REQUEST_URI']);
  $idProduto = $url[count($url) - 1];

  $sql = 'select * from produtos where idProduto= :idProduto';

  $connection = connection();
  $results = $connection->prepare($sql);
  $results->bindValue('idProduto', intval($idProduto));
  $results->execute();
  return $results->fetchAll(PDO::FETCH_OBJ);
}

function pesquisar() {
  $sql = 'select * from produtos WHERE produto LIKE :pesquisa';

  $connection = connection();
  $results = $connection->prepare($sql);
  $results->bindValue(':pesquisa', "%{$_POST['pesquisa']}%");
  $results->execute();
  return $results->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_POST['pesquisa'])) {
    pesquisar();
}

function carrinho() {
  
  if(isset($_GET['adicionar'])){
    $idProduto = intval($_GET['adicionar']);
    if(isset($idProduto)) {
      
      $sql = 'select * from produtos where idProduto= :idProduto';
      
      $connection = connection();
      $results = $connection->prepare($sql);
      $results->bindValue('idProduto', intval($idProduto));
      $results->execute();
      
      $produto = $results->fetchAll(PDO::FETCH_ASSOC);
      
      $teste = [
        'id' => $idProduto,
        'nome' => $produto[0]['produto'],
        'imagem_url' => $produto[0]['imagem'],
        'valor' => $produto[0]['valor'],
        'quantidade' => 1
      ];
      // var_dump($produto);

      $_SESSION['carrinho'][] = $teste;
     }
     
    } 
  }



<?php

function publicar() {
  $url = explode('/', $_SERVER ['REQUEST_URI'] );
  $idProduto = $url[count($url)-1];

  $comentario = $_POST['comentario'];

  $sql = 'insert into comentarios (comentario, id, idProduto)
                          values (:comentario, :id, :idProduto)';

  $connection = connection();
  $result = $connection->prepare($sql);
  $result->bindValue(':comentario', $comentario);
  $result->bindValue(':id', isset($_SESSION['id']) ? $_SESSION['id'] : null);
  $result->bindValue(':idProduto', isset($idProduto) ? $idProduto : null);
  $result->execute();
}

if (isset($_POST['btnPublicar'])) {
  publicar();
}

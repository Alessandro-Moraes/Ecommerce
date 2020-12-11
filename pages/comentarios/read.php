<?php

function read($idProduto) {
  $sql = "select coment.*, user.* from comentarios coment left join usuarios user
          on coment.id = user.id
          Where idProduto = :idProduto";
          
  $connection = connection();
  $result = $connection->prepare($sql);
  $result->bindValue('idProduto', intval($idProduto));
  $result->execute();
  return array_reverse($result->fetchAll(PDO::FETCH_OBJ));
};

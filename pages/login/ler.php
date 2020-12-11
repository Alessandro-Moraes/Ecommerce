<?php //LER

function ler($login) {
  $sql = 'select * from usuarios where login = :login';
  $connection = connection();
  $result = $connection->prepare($sql);
  $result->bindValue(':login', $login);
  $result->execute();
  return $result->fetchAll(PDO::FETCH_OBJ);
};

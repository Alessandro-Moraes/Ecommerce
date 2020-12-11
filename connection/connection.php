<?php  // CONEXÃO

function connection() {
  try {
    // $connection = new PDO('mysql:host=dbteste.cly0kznzqwwq.us-east-1.rds.amazonaws.com;port=3306;dbname=p3','admin','Secreta5');
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=p3','root','');
    return $connection;
  } catch (Exception $error) {
    echo "Ocorreu o seguinte erro: {$error->getMessage()}";
  }
}

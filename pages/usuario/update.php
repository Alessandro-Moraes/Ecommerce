<?php 

function update() {
  $avatar = $_FILES['avatar'];
  
  if ($avatar['name'] !== '') {

    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    
    $nameImage = md5($avatar['name'] . rand(0, 9999));
    $tipo = substr($avatar['name'], -4);
    $nomeCompleto = "{$nameImage}{$tipo}";
    $imagem = $avatar['tmp_name'];
    move_uploaded_file($imagem, "../cadastro/img/{$nomeCompleto}");    

    $sql = 'update usuarios set login= :login, email= :email, avatar= :avatar where id= :id';                       

    $connection = connection();
    $result = $connection->prepare($sql);
    $result->bindValue(':login', $login);
    $result->bindValue(':email', $email);
    $result->bindValue(':avatar', $nomeCompleto);
    $result->bindValue(':id', intval($id));
    $result->execute();
  }
}

if (isset($_POST['salvar'])) {
  update();
  header('Location: ../../index.php');
}


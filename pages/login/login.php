<?php
session_start();
$_SESSION['logged'] = False;

function login() {
  if (isset($_POST['login']) && isset($_POST['senha'])) {
    
    global $erro;
    $user = ler($_POST['login']);

    if (empty($user[0])) {
      header('Location: ./index.php');
      // $erro = 'Digite Login e/ou Senha';
      return;
    }

    $password = password_verify($_POST['senha'], $user[0]->senha);

    if ($password) {
      $_SESSION['logged'] = True;
      $_SESSION['id'] = $user[0]->id;
      $_SESSION['login'] = $user[0]->login;
      $_SESSION['avatar'] = $user[0]->avatar;
      header('Location: ../../index.php');
      return;
    } //else $erro = 'Login ou Senha incorretos!';
  }
}

if (isset($_POST['salvar'])) {
  login();
  //$_SESSION['error'] = $erro;
}

function readLogin() {
  $id = $_SESSION['id'];
  $sql = 'select * from usuarios where id= :id';
  $connection = connection();
  $result = $connection->prepare($sql);
  $result->bindValue(':id', intval($id));
  $result->execute();
  return array_reverse($result->fetchAll(PDO::FETCH_OBJ));
};

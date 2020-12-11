<?php

function logout() {
  session_destroy();
}

if  (isset($_POST['btnLogout'])) {
  logout();
  header('Location: index.php');
}

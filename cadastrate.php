<?php
require_once("connection.php");

$nome= mysqli_real_escape_string($connection, trim($_POST['username']));
$email= mysqli_real_escape_string($connection, trim($_POST['email']));
$senha= mysqli_real_escape_string($connection, trim($_POST['password']));



$insert_usuario ="insert into usuario(nome, email, senha) values('$nome','$email', sha1('$senha'));";

  $salvar = mysqli_query($connection,$insert_usuario);
   
  mysqli_close($connection);

  header('Location: login.php');

  ?>
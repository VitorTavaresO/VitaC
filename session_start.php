<?php
    require_once("connection.php");
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['password']))) {
      header("Location: index.php"); exit;
  }

  $email= mysqli_real_escape_string($connection, trim($_POST['email']));
  $senha= mysqli_real_escape_string($connection, trim($_POST['password']));
   
  echo  $email;
  echo  $senha;
  $sql = "SELECT `iduser`, `nome` FROM `usuario` WHERE (`email` = '" .$email ."') AND (`senha` = '". sha1($senha) ."')";
  $query = mysqli_query($connection,$sql);
  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; exit;
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);
  }
  if (!isset($_SESSION)) session_start();
    
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['iduser'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
    
      mysqli_close($connection);
      // Redireciona o visitante
      header("Location: index.php"); exit;


  ?>
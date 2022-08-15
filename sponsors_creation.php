<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
    
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
 require_once("connection.php");

	 $idUser = $_SESSION['UsuarioID'];
	 $url = $_POST['url'];

	 $uploaddir = 'img/uploads/sponsors/';
	 $uploaddirN = 'img/uploads/sponsors/';
	 $uploadfile = $_FILES['userfile'];
     $uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


$sql ="INSERT INTO sponsorsspost(id_postador, imagem, url) values('$idUser', '$uploadfileN', '$url');";


$query = mysqli_query($connection,$sql);

if (move_uploaded_file($uploadfile["tmp_name"], "$uploaddir".$uploadfile["name"])) { 
 echo "Arquivo enviado com sucesso!"; 
} 
else { 
 echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}           
mysqli_close($connection);

 header("Location: sponsors.php");

?>
<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
    
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: loginHTML.php"); exit;
}
 require_once("connection.php");

	 $idUser = $_SESSION['UsuarioID'];
	 $titulo = $_POST['titulo'];
	 $post = $_POST['post'];

	 $uploaddir = 'img/uploads/events/';
	 $uploaddirN = 'img/uploads/events/';
	 $uploadfile = $_FILES['userfile'];
     $uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


$sql ="INSERT INTO eventspost(id_postador, titulo, post, data, imagem) values('$idUser','$titulo', '$post', '$data', '$uploadfileN');";


$query = mysqli_query($connection,$sql);

if (move_uploaded_file($uploadfile["tmp_name"], "$uploaddir".$uploadfile["name"])) { 
 echo "Arquivo enviado com sucesso!"; 
} 
else { 
 echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}           
mysqli_close($connection);\

 header("Location: events.php");

?>
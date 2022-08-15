<?php
require_once("connection.php");
$idactivitiespublic = $_POST['idpublic'];
$titulo = $_POST['titulo'];
$post = $_POST['post'];

$uploaddir = 'img/uploads/activities/';
$uploaddirN = 'img/uploads/activities/';
$uploadfile = $_FILES['userfile'];
$uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


$sql ="UPDATE activitiespost SET titulo = '$titulo', post ='$post', imagem = '$uploadfileN' WHERE idactivitiespublic = '$idactivitiespublic';";


$query = mysqli_query($connection,$sql);

if (move_uploaded_file($uploadfile["tmp_name"], "$uploaddir".$uploadfile["name"])) { 
echo "Arquivo enviado com sucesso!"; 
} 
else { 
echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}           
mysqli_close($connection);

header("Location: activities.php");

?>
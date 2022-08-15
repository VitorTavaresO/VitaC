<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vita C Fitness</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <?php require_once("menu.php")?>

<!-- Page Content -->
<div class="container">
<?php
require_once("connection.php");

$idpublic = $_GET["idpublic"];
$title = $_GET["title"];
$content = $_GET["content"];
$image = $_GET["image"];

$sql = "SELECT * FROM newspost WHERE idnewspublic=$idpublic;";

$query = mysqli_query($connection, $sql);
$array = mysqli_fetch_array($query);
$content = $array[3];

mysqli_close($connection);


?>
  <!-- Related Projects Row -->
  <hr class="mt-2 mb-5">

</div>
<!-- /.container -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
    <input type="hidden" name="idpublic" value="<?=$idpublic?>">
      <h1 class="font-weight-light"><?=$title?></h1>
      <?php
            if(isset($_SESSION['UsuarioID'])) {
              print "<article>";
              print "<a href='newsUpdate.php?idpublic=$idpublic&title=$title&content=$content&image=$image'><img class='editPic' src='img/EditPic.png' width='35' height='35'></a>";
              print "</article>";
               }
                ?>
      <img class="" src="<?=$image?>" alt="" width="500" height="400">
      <p class="lead"><?=nl2br($content)?></p>
    </div>
  </div>
</div>


 <?php require_once("footer.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
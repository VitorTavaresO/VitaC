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
 
  <section class="page-section cta">
  <?php if (isset($_SESSION['UsuarioID'])) {
   
   ?>
          <li>
            <a href="newsCreate.php"><img class="Profile" src="img/Plus.png" width="25" height="25"></a>
          </li>
 
      <?php } ?>
          <div class="cta-inner text-center rounded">
            <h1 class="mb-0">Notícias</h1>
          </div>
  </section>
 <!-- Header -->
</header>

<!-- Page Content -->
<div class="container">

<?php
    require_once("connection.php");
    $sql = "SELECT * FROM newspost ORDER BY idnewspublic DESC;";
    $query = mysqli_query($connection, $sql);
    $cadastrates = mysqli_num_rows($query);




    while($linha = mysqli_fetch_array($query)){
    $idpublic = $linha[0];
    $title = $linha[2];
    $content = $linha[3];
    $image = $linha[5];

    @mysqli_close($connection);

   ?>

<div class="row">
  <div class="col-md-7">
      <img class="card-img-top rounded mb-3" src="<?php echo "$image"?>" alt="" height="400">
  </div>
  <div class="col-md-5">
    <h3><?php echo "$title" ?></h3>
    <div class="about-heading-content">
        <div class="row">
         <div class="bg-faded rounded p-5">
         <p><?php echo substr_replace(nl2br($content), (strlen($content) > 130 ? '...' : ''), 130);?></p>
         </div>
       </div>
      </div>

    <?php
              print "<article>";
              print "<a class='btn btn-primary' href='newsApresentation.php?idpublic=$idpublic&title=$title&content=$content&image=$image'> Ver Notícia </a>";
              print "</article>";
                ?>

  </div>
</div>
<?php } ?>
<!-- /.row -->

<hr>

<!-- Pagination -->
<ul class="pagination justify-content-center">
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
      <span class="sr-only">Previous</span>
    </a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">1</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">2</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">3</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      <span class="sr-only">Next</span>
    </a>
  </li>
</ul>

</div>
<!-- /.container -->

  <!-- /.row -->

</div>
<!-- /.container -->


 <?php require_once("footer.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
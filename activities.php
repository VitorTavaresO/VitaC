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
            <a href="activitiesCreate.php"><img class="Profile" src="img/Plus.png" width="25" height="25"></a>
          </li>
 
      <?php } ?>
          <div class="cta-inner text-center rounded">
            <h1 class="mb-0">Atividades</h1>
          </div>
  </section>
</header>
<hr class="mt-2 mb-5">
  <div class="container">
  <div class="row">
  <?php
    require_once("connection.php");
    $sql = "SELECT * FROM activitiespost ORDER BY idactivitiespublic DESC;";
    $query = mysqli_query($connection, $sql);
    $cadastrates = mysqli_num_rows($query);




    while($linha = mysqli_fetch_array($query)){
    $idpublic = $linha[0];
    $title = $linha[2];
    $content = $linha[3];
    $image = $linha[5];

    @mysqli_close($connection);

   ?>


  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="<?php echo "$image"?>" alt=""  height="300"></a>
      <div class="card-body">
        <h4 class="card-title">
          <?php echo "$title" ?>
        </h4>
        <p class="card-text"><?php echo substr_replace($content, (strlen($content) > 230 ? '...' : ''), 230);?></p>
        <?php
              print "<article>";
              print "<a class='btn btn-primary' href='activitiesApresentation.php?idpublic=$idpublic&title=$title&content=$content&image=$image'> Ver Atividade </a>";
              print "</article>";
                ?>

      </div>
    </div>
  </div>
<!-- /.row -->
<?php } ?>
</div>
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

  

 <?php require_once("footer.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
</html>
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
            <a href="galeryCreate.php"><img class="Profile" src="img/Plus.png" width="25" height="25"></a>
          </li>
 
      <?php } ?>
          <div class="cta-inner text-center rounded">
            <h1 class="mb-0">Galeria</h1>
            
          </div>
  </section>

    <!-- Header -->
    </header>

 
<div class="container">
  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">

  <?php
        require_once("connection.php");
        $sql = "SELECT * FROM galerypost ORDER BY idgalerypublic;";
        $query = mysqli_query($connection, $sql);
        $cadastrates = mysqli_num_rows($query);




        while($linha = mysqli_fetch_array($query)){
        $idpublic = $linha[0];
        $image = $linha[2];
        $url = $linha[3];
        $content = $linha[4];
        $title = $linha[5];

        
        

    ?>
    <div class="col-lg-3 col-md-4 col-6">
    <style> 
   input[type=submit] {
    visibility: hidden;
}
</style>
    <form method="get "action="#">
    <label for="enviar">
    <div class="portfolio-item mx-auto" data-toggle="modal" data-target=#<?="$title"?>>
            <img class="img-fluid img-thumbnail" src=<?="$image"?> alt="">
            <input type="hidden" name="idpublic" value=<?="$idpublic"?>>
            <input type="hidden" name="title" value=<?="$title"?>>
            <input type="hidden" name="image" value=<?="$image"?>>
            <input type="hidden" name="content" value=<?="$content"?>>
            <input type="submit" id="enviar" />
            </label>
         </div>
         </form>
        </div><?php } ?>
        </div>
        </div>

        <?php
    if(isset($_GET['idpublic']))
    $idpublic = $_GET['idpublic'];
else
    $idpublic = "";
 
    $sql = "SELECT * FROM galerypost WHERE idgalerypublic=$idpublic;";

     $query = mysqli_query($connection, $sql);
     @$array = mysqli_fetch_array($query);
     $title = $array[5];
     $image = $array[2];
     $content = $array[3];

     @mysqli_close($connection);

    
    ?>
    <div class="portfolio-modal modal fade" id=<?="$title"?> tabindex="-1" role="dialog" aria-labelledby="#portfolioModal0Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary mb-0">Log Cabin</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5" src=<?="$image"?> alt="Log Cabin"/>
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" onClick="history.go(-1)" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close Window</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

<!-- /.container -->

 <?php require_once("footer.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
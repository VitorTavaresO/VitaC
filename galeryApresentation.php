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
    <?php if (isset($_SESSION['UsuarioID'])) {
    
    ?>
            <li>
                <a href="galeryCreate.php"><img class="Profile" src="img/Plus.png" width="25" height="25"></a>
                <a href="sponsorsSelect.php"><img class="Profile" src="img/EditPic.png" width="25" height="25"></a>
            </li>
    
        <?php } ?>

        

    <?php require_once("menu.php")?>

    <!-- Header -->
    </header>
 

<?php

require_once("connection.php");
        $idpublic = $_GET["idpublic"];
        $sql = "SELECT * FROM galerypost WHERE idgalerypublic=$idpublic;";
        $query = mysqli_query($connection, $sql);
        $linha = mysqli_fetch_array($query);

        $idpublic = $linha[0];
        $image = $linha[2];
        $url = $linha[3];
        $content = $linha[4];
        $title = $linha[5];

        @mysqli_close($connection);

    ?>

    <div class="portfolio-modal modal fade" id=<?="$idpublic"?> tabindex="-1" role="dialog" aria-labelledby="#portfolioModal0Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary mb-0"><?="$title"?></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5" src=<?="$image"?> alt=<?="$title"?>/>
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" href="#" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close Window</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <?php require_once("footer.php")?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
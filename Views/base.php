<?php
  # Declaration and incrementing of variables 
  $titleOnglet = (isset($ArrayRender) ? $ArrayRender->getOngletPage() : "En Dev");
  $sheetCss = (isset($ArrayRender) ? $ArrayRender -> getSheetCss() : "");
  $scriptJs = (isset($ArrayRender) ? $ArrayRender -> getScriptJs() : "");
?>

<!-- **********************************************************************
**** Titre: ????????????????????????????                               ****
**** Author: Yann Martin                                               ****
**** Version: 1.00                                                     ****
**** Date creation: 04/07/2025                                         ****
**** Date modification:                                                ****
*************************************************************************** -->



<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height">
      <!-- <meta name="viewport" content="user-scalable=1"> -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="Yann MARTIN">
      <title> <?= $titleOnglet ?> </title>
      <link rel="shortcut icon" href="App/Images/LogoChichoune50x50.png" type="image/x-icon"> 
      <!-- Link to  styles fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven Pro">
      <!--Links to icons  -->
      <script src="https://kit.fontawesome.com/a9862965ca.js" crossorigin="anonymous"></script>
      <!-- Link to modale sweetalert -->
      <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

      <!-- ▂ ▅ ▆ █ BOOTSTRAP █ ▆ ▅ ▂ -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <!--ICONES Bootstrap -->
      <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->

      <!-- ▂ ▅ ▆ █ CSS STYLES SHEETS █ ▆ ▅ ▂ -->
      <link rel="stylesheet" href="App/Css/base.css">
      <link rel="stylesheet" href= <?= $sheetCss ?> > 
      <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->

      <!-- ▂ ▅ ▆ █ SCRIPTS JS/MODULES █ ▆ ▅ ▂ -->
      <script type="module" src=<?= $scriptJs ?>></script>
      <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  -->

  </head>

<!--  
Memo
    container: Notre classe par défaut est un conteneur réactif à largeur fixe, c’est-à-dire qu’il change à chaque point d’arrêt.
    container-fluid: Utilisez pour un conteneur pleine largeur, couvrant toute la largeur de la fenêtre de vue.

xs => <576px
sm => ≥576px
md => ≥768px
lg => ≥992PX
xl => ≥1200px
xxl => ≥1400px

-->

    <body>
        <!-- ▂ ▅ ▆ █   Loading  █ ▆ ▅ ▂ -->
            <div id='loader' class="container-loader visibilityHidden" >
                <div class="spinner-container">
                    <div class="spinner">
                        <div class="spinner-ring spinner-ring-1"></div>
                        <div class="spinner-ring spinner-ring-2"></div>
                        <div class="spinner-ring spinner-ring-3"></div>
                        <div class="spinner-center">
                            <div class="spinner-icon"> </div>
                        </div>
                    </div>
                </div>
                <div class="message-container">
                    <div class="status" id="status">  </div>
                </div>
            </div>
        <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->

        <!-- ▂ ▅ ▆ █   HEADER  █ ▆ ▅ ▂ -->
        <header class="container-fluid header">
            <nav class="navbar ">
                <div class="container-fluid">
                    <!-- <a class="navbar-brand" href="#">Offcanvas navbar</a> -->
                    <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                   <!--  <span class="navbar-toggler-icon"></span> -->
                    <span> <img src="App/Images/LogoChichoune50x50.png" alt="" class="img-fluid rounded-circle"> </span>

                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Api - Chichoune</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <?php
                                # Loading menu
                                require "../Includes/navMenu.php";
                                if(isset($Menu['li_1'])){ echo $Menu['li_1']; };
                                if(isset($Menu['li_2'])){ echo $Menu['li_2']; };
                                if(isset($Menu['li_3'])){ echo $Menu['li_3']; };
                                if(isset($Menu['li_4'])){ echo $Menu['li_4']; };
                                if(isset($Menu['Diviser_Li'])){ echo $Menu['Diviser_Li']; };
                                if(isset($Menu['li_10'])){ echo $Menu['li_10']; };
                                ?>
                            </ul>
                            <!-- <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </nav>
            <!-- nav charger!!!! -->   
        </header>
        <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->
      
        <!-- ▂ ▅ ▆ █   MAIN  █ ▆ ▅ ▂ -->
        <main class="container-fluid align-content-center p-0">
            <div class="d-flex justify-content-center mb-2">        
                    <!-- Affichage dynamique de la variable $content -->
                    <?= $content ?> 
            </div>
        </main>
        <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->

        <!-- ▂ ▅ ▆ █   FOOTER  █ ▆ ▅ ▂ -->
        <footer class="container-fluid align-content-center">
                <div class="d-flex flex-row">
                    <div class="col">
                        <img class='img-fluid logoMt' src="App/Icons/LogoMT.png" alt="Logo de l'entreprise MT Sofware Development">
                    </div>

                    <div class="col-8">
                    Variable width content
                    </div>

                    <div class="col-2">
                    3 of 3
                    </div>
                </div>     
        </footer>
        <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->

        <!-- ▂ ▅ ▆ █ BOOTSTRAP █ ▆ ▅ ▂ -->
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper 
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
        <!-- ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ -->
    </body>
    <!-- End body -->

</html>
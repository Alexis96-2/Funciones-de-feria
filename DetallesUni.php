<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SeccionAdministrativa/css/bootstrap.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="css/descUni.css">
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/lightgallery.min.css">
    <link rel="shortcut icon" href="http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png" type="image/x-icon">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <title id="titulo">Descripcion uni</title>
</head>
<body id="title">
    <?php
    include_once("Componentes/header.php");
    include_once("Tareas/ConsultasDetalles.php");
    ?>
    <!-- menu de opciones -->
    <?php obtenermenu($_GET["Uni"]); ?>
    <!------------------------------------------------------------fin menu de opciones---------------------------------------------------------->
    <!------------------------------------------------------------menu de regreso---------------------------------------------------------->
    <a class="btn-regreso btn-floating btn-lg red waves-effect waves-light " href="Listado.php?municipio=<?php echo $_GET['municipio']; ?>" data-toggle="tooltip" title="Listado de universidades">
        <i class="text-decoration-none"><img src="SeccionAdministrativa/img/Inicio/back-arrow.svg" alt="R" width="30px"></i>
    </a>
    <br>
    <!-- Titulo -->
    <?php
    obtenerTitulo($_GET["Uni"]);
    ?>

    <div class="container card" id="contenido">

        <br>
        <!-- Seccion Bienvenida -->
        <div class="container contenido-item  text-center" id="Bienvenida">

            <h2 class="text-center"> Bienvenida</h2>
            <?php obtenerBienvenida($_GET["Uni"]); ?>
        </div>
        <!-- Seccion fotos -->
        <div class="container-fluid contenido-item justify-content-center" id="fotos">

            <?php obtenerFotos($_GET["Uni"]); ?>

        </div>
        <!-- Seccion videos -->
        <div class="container-fluid contenido-item justify-content-center" id="videos">

            <div class="container">
                <?php obtenerVideos($_GET["Uni"]); ?>
            </div>
        </div>
        <!-- Seccion admision -->
        <div class="container-fluid contenido-item" id="admision">
            <?php obtenerAdmision($_GET["Uni"]); ?>

        </div>
        <!---------------------------- Seccion Contacto ---------------------------->
        <div class="container-fluid contenido-item text-center" id="contacto">
            <?php
            obtenerContactos($_GET["Uni"]);
            obtenerUbicacion($_GET["Uni"]);
            ?>
        </div>
        <!-- Seccion oferta educativa -->
        <div class="container-fluid contenido-item" id="oferta">
            <h2 class="text-center"> Oferta educativa</h2>
            <hr>
            <?php obtenerOferta($_GET["Uni"]);           ?>

        </div>
        <!-- Seccion becas -->
        <div class="container contenido-item" id="becas">
            <h2 class="text-center"> Becas</h2>
            <hr>
            <div class="row">
                <?php obtenerBecas($_GET["Uni"]); ?>
            </div>
        </div>

    </div>
    <br>

</body>
<!-- Footer -->
<?php
include_once("Componentes/footer.php");
?>

<script src="js/lightgallery.min.js"></script>
<script src="js/lg-fullscreen.min.js"></script>
<script src="js/lg-thumbnail.min.js"></script>
<script src="js/lg-video.min.js"></script>
<script type="text/javascript" src="js/DetallesUni/main.js"></script>
<script async src="js/DetallesUni/pdfthumb.js"></script>



</html>
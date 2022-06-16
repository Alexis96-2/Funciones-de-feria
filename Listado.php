<!doctype html>
<html lang="en">

<head>
  <title>Municipio</title>
  <!-- Required meta tags -->
  <link rel="shortcut icon" href="http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--  CSS -->
  <link rel="stylesheet" href="css/Listado.css">
  <link rel="stylesheet" href="SeccionAdministrativa/css/bootstrap.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include_once("Componentes/header.php");
  ?>
  <br>
  <div class="container-fluid">
  </div>
  <!--Titulo municipio-->
  <div class="container buscador">
    <div class="row justify-content-center">
      <input type="hidden" value="<?php echo $_GET['municipio'] ?>" id="municipio">
      <img alt="Escudo Municipio" id="ruta_img_mun" class="escudo col-sm-2 float-left img-responsive">
      <div class="col-10 h1  text-center align-self-center" id="nom_mun">
      </div>
    </div>
    <br>
    <!--Barra de busqueda-->
    <div class="row  justify-content-center">
      <div class="form-group col-12">
        <input type="text" class="form-control" name="" id="txt-busqueda" aria-describedby="helpId" placeholder="Nombre Universidad">
      </div>
    </div>
    <!--Filtros-->
    <div class="btn-group">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filtrar por tipo de instituci&oacute;n
      </button>
      <div class="dropdown-menu categort_list">
        <a class="dropdown-item category_item" href="#" category="1">Privada</a>
        <a class="dropdown-item category_item" href="#" category="0">Publicas</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item category_item " href="#" category="all">Todo</a>
      </div>
    </div>
    <span id="active-filter" class="mx-4"></span>
    <!-- Terminan filtros-->
  </div>
  <br>

  <!--Listado universidades-->

  <div class="container" id="Listado">

  </div>
  </br>
  </br>
  </br>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js"></script>
  <script>
    function logElementEvent(eventName, element) {
      console.log(Date.now(), eventName, element.getAttribute("data-src"));
    }
    var callback_enter = function(element) {
      logElementEvent("🔑 ENTERED", element);
    };
    var callback_exit = function(element) {
      logElementEvent("🚪 EXITED", element);
    };
    var callback_loading = function(element) {
      logElementEvent("⌚ LOADING", element);
    };
    var callback_loaded = function(element) {
      logElementEvent("👍 LOADED", element);
    };
    var callback_error = function(element) {
      logElementEvent("💀 ERROR", element);
      element.src =
        "http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png";
    };
    var callback_finish = function() {
      logElementEvent("✔️ FINISHED", document.documentElement);
    };
    var callback_cancel = function(element) {
      logElementEvent("🔥 CANCEL", element);
    };
    var lazyLoadInstance = new LazyLoad({

      threshold: 0,
      // Assign the callbacks defined above
      callback_enter: callback_enter,
      callback_exit: callback_exit,
      callback_cancel: callback_cancel,
      callback_loading: callback_loading,
      callback_loaded: callback_loaded,
      callback_error: callback_error,
      callback_finish: callback_finish
    });
  </script>
  <script src="js/Listado.js"></script>
</body>
<!-- Footer -->
<?php
include_once("Componentes/footer.php");
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


</html>
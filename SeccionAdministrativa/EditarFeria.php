<?php
include 'funciones/fileSize.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/Listado.css">
    <link rel="stylesheet" type="text/css" href="../css/descUni.css">
    <link rel="shortcut icon" href="http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png" type="image/x-icon">
    <title>Editar feria</title>
</head>

<body>
    <!--header-->
    <?php
    include 'componentes/header.php';
    if(isset($_SESSION['tipo'])){
        if($_SESSION['tipo']!="Supervisor.php")
        header("location:./");
    }
    ?>
    <!--header-->
    <section id="accordion " class="   border-primary container">
        <!--Textos-->
        <div class=" card-header border-primary bg-white ">
            <h1>Textos
                <a class="btn  btn-outline-info" data-toggle="collapse" href="#collapseTextos" role="button" aria-expanded="false" aria-controls="collapseTextos"> >
                </a>
            </h1>
            <div class="collapse" id="collapseTextos">
                <div class="card card-body">
                    <h4 class="py-1">Título Bienvenida</h4>
                    <p class="text-justify"> Actual: <?php include 'textos/Titulo.txt'; ?></p>
                    <form method="POST" id="formTitle">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Nuevo título de bienvenida" id="floatingTextarea1" name="message" required></textarea>
                        </div>
                        <input name="action" type="hidden" value="1">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                    <hr class="bg-primary">
                    <h4 class="py-1">Texto Bienvenida</h4>
                    <p class="text-justify"> Actual: <?php include 'textos/TextoBienvenida.txt'; ?></p>
                    <form method="POST" id="formWelcomeText">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Nuevo texto de bienvenida" id="floatingTextarea2" name="message" required></textarea>
                        </div>
                        <input name="action" type="hidden" value="2">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Textos-->
      
        <!--Multimedia-->
        <div class=" card-header border-primary mb-5 bg-white">
            <h1>Multimedia
                <a class="btn  btn-outline-info " data-toggle="collapse" href="#collapseMultimedia" role="button" aria-expanded="false" aria-controls="collapseMultimedia">
                    >
                </a>
            </h1>
            <div class="collapse" id="collapseMultimedia">
                <div class="card card-body">
                    <h4 class="py-1">Imagenes img_defaults</h4>
                    <div class="">
                        <div class="table-wrap">
                            <table class="table table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Nombre</th>
                                        <th>Tamaño</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($images as $img) : ?>
                                        <?php echo ' 
                                <tr>
                                    <td class="border-bottom-0  col-2 ">
                                        <a href="' . $img . '" target="_blank">
                                            <img loading="lazy" src="' . $img . '" class="img-fluid m-auto "alt="' . $img . '" >
                                        </a>
                                    </td>
                                    <td class=" align-items-center border-bottom-0 " >
                                        <a  target="_blank" href="' . $img . '">' . (pathinfo($img)['basename'])  . '</a>
                                    </td>
                                    <td class=" border-bottom-0">
                                        <span class="waiting">' . fileSizeConvert(filesize($img)) . '</span>
                                    </td>
                                    <td class="border-bottom-0 text-center">                                                                                         
                                        <form method="POST" class="cambioimg" enctype="multipart/form-data"> 
                                            <div class="input-group mb-3 btn-secondary">
                                                <input type="hidden" name="action" value="1" />
                                                <input type="hidden" name="old" value="' . $img . '" />
                                                <input type="file"  name="myfile" title="subir archivo"  accept="image/*" required />
                                            </div>
                                            <div class="input-group mb-3">
                                                <button title="Aceptar cambios"  type="submit " class="btn-primary btn-sm ">
                                                    <span >Confirmar</span>
                                                </button >
                                            </div>
                                        </form>
                                    </td>
                                </tr>'; ?>
                                    <?php endforeach;
                                    echo '
                                </tbody>
                            </table>
                            <hr>
                            <h4 class="py-1">Videos</h4>
                            <table class="table table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Nombre</th>
                                        <th>Tamaño</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            <tbody>';
                                    $images = glob('{../VideoPresentacionFeria/*.*}', GLOB_BRACE);
                                    foreach ($images as $img) :
                                        echo '
                                <tr>
                                <td class="border-bottom-0  col-2 ">
                                    <a href="' . $img . '" target="_blank">
                                        <img src="../Imagenes/repro.png" class="img-fluid m-auto "alt="' . $img . '" >
                                    </a>
                                </td>
                                <td class=" align-items-center border-bottom-0 " >
                                    <a  target="_blank" href="' . $img . '">' .(pathinfo($img)['basename'])  . '</a>
                                </td>
                                <td class=" border-bottom-0">
                                    <span class="waiting">' . fileSizeConvert(filesize($img)). '</span>
                                </td>
                                <td class="border-bottom-0 text-center">
                                <form method="POST" class="cambioimg" enctype="multipart/form-data"> 
                                <div class="input-group mb-3 btn-secondary">
                                    <input type="hidden" name="action" value="1" />
                                    <input type="hidden" name="old" value="' . $img . '" />
                                    <input type="file"  name="myvideo" title="subir archivo" accept="video/*" required />
                                </div>
                                <div class="input-group mb-3">
                                    <button title="Aceptar cambios"  type="submit " class="btn-primary btn-sm ">
                                        <span >Confirmar</span>
                                    </button >
                                </div>
                            </form>
                                </td>
                                </tr>';
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Multimedia-->
        <?php
        include "Tareas/FileUpload.php";
        ?>
    </section>
    <!-- MDB -->
    <script src="./js/ajax.jquery.js">
    </script>
    <script src="js/bootstrap.bundle.min.js">
    </script>
    <script src="js/configuracion/configF.js">
    </script>
  <script src="../js/evitar_reenvio.js"> </script>
</body>

</html>
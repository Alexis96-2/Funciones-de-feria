<?php

if (!isset($_POST['CONFIG'])) {

    header("location:./index.php");
}

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png" type="image/x-icon">

    <!-- aqui pido por post el nombre de la pag -->

    <title><?php echo $_POST['CONFIG']; ?></title>

    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
        .active-cyan .fa,

        .active-cyan-2 .fa {

            color: #4dd0e1;

        }



        img {

            max-height: 84px;

            max-width: 84px;

        }
    </style>

</head>



<body>

    <!-- se agregan los headers -->

    <?php include_once("componentes/header.php");

    if ($_POST['CONFIG'] == "Videos") {

        //Insert videos

        if (isset($_POST['inputname']) && isset($_POST['urlvideo']) && $_POST['inputname'] != "" && $_POST['urlvideo'] != "") {


            console_log("Nombre: " . $_POST['inputname'] . ", URL del Video: " . $_POST['urlvideo'] . ", id de la seccion: " . $_POST['idseccionvideo']);

            console_log($_SESSION['ID']);

            inserVideo($_POST['inputname'], $_POST['urlvideo'], $_POST['idseccionvideo'], $_SESSION['Universidad_ID']);


            $_POST['inputname'] = "";

            $_POST['urlvideo'] = "";

            $_POST['idseccionvideo'] = "";

            $_POST['newseccionvideo'] = "";

            $_POST['checkModAgrVideos'] = "";

            $_POST['newseccionvideo'] = "";
        }

        //Update videos

        if (isset($_POST['updatename']) && isset($_POST['updateurl'])) {

            console_log($_POST['IDVID']);

            updateVideos($_POST['updatename'], $_POST['updateurl'], $_POST['idseccionvideo'], $_POST['IDVID']);
        }
    }



    if ($_POST['CONFIG'] == "Fotos") {

        console_log("Sabe que esta en Fotos");

        //INSERT fotos

        if (isset($_POST['inputname']) && isset($_FILES['archivo']) && $_POST['inputname'] != "") {

            console_log("Hace el primer if");


            if ($_FILES['archivo']['size'] <= 8388608) {

                $nom = $_POST['inputname'];

                $foto = $_FILES['archivo']['name'];

                $ruta = $_FILES['archivo']['tmp_name'];

                if ($foto != "" && $ruta != "") {

                    $destino = nombreRandom($foto, "docs_Unis/Fotos/");

                    console_log("destion: " . $destino);

                    console_log("Resultado de move_uploaded_file (Insert): " . move_uploaded_file($ruta, $destino));

                    $destino = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/" . $destino;

                    console_log("destion: " . $destino);

                    insertFoto($nom, $destino, $_POST['idseccionfoto'], $_SESSION['Universidad_ID']);
                } else {
                    alert("Debe elegir un archivo");
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }

        //Update fotos

        if (isset($_POST['updatename']) && isset($_FILES['archivoupdate'])) {

            console_log("Sabes que es update (Fotos)");

            if ($_FILES['archivoupdate']['size'] <= 8388608) {

                $foto = $_FILES['archivoupdate']['name'];

                $ruta = $_FILES['archivoupdate']['tmp_name'];

                if ($foto != "" && $ruta != "") {

                    $rutaOld = getRuta("Recurso", $_POST['IDfoto'], "foto");

                    console_log($rutaOld);

                    $rutaOldAux = pathinfo($rutaOld);

                    if ($rutaOldAux['basename'] != "NA" && $rutaOldAux['basename'] != "") {

                        console_log(getcwd() . "/docs_Unis/Fotos/" . $rutaOldAux['basename']);

                        console_log(unlink(getcwd() . "/docs_Unis/Fotos/" . $rutaOldAux['basename']));
                    }

                    $destino = nombreRandom($foto, "docs_Unis/Fotos/");

                    console_log("Resultado de move_uploaded_file (Update): " . move_uploaded_file($ruta, $destino));

                    $destino = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/" . $destino;

                    updateFotos($_POST['updatename'], $destino, $_POST['idseccionfoto'], $_POST['IDfoto']);
                } else {

                    updateFotos($_POST['updatename'], "", $_POST['idseccionfoto'], $_POST['IDfoto']);
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }
    }



    if ($_POST['CONFIG'] == "Carreras") {

        console_log("Sabe que esta en Carreras");

        //Insert Ofertas

        if (isset($_POST['pVigencia']) && isset($_POST['inputname']) && isset($_FILES['archivo']) && $_POST['inputname'] != "" && $_POST['rvoe'] != "") {

            console_log("Sabe que es Insert (Carrera)");

            if ($_FILES['archivo']['size'] <= 8388608) {

                $nom = $_POST['inputname'];

                $oferta = $_FILES['archivo']['name'];

                $ruta = $_FILES['archivo']['tmp_name'];

                $nivel = $_POST['idseccionoferta'];

                $rvoe = $_POST['rvoe'];

                if ($oferta != "" && $ruta != "") {

                    $destino = nombreRandom($oferta, "docs_Unis/carreras/");

                    console_log("destino: " . $destino);

                    console_log("Resultado de move_uploaded_file (Insert): " . move_uploaded_file($ruta, $destino));

                    $destino = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/" . $destino;

                    console_log("destino: " . $destino);

                    insertOferta($_POST['pVigencia'], $nom, $destino, $_SESSION['Universidad_ID'], $nivel, $rvoe);
                } else {
                    alert("Debe elegir un archivo");
                }

                unset($_POST['inputname']);
                unset($_POST['rvoe']);
                unset($_FILES['inputname']);

                console_log("unsets");

                unset($nom);
                unset($oferta);
                unset($ruta);
                unset($destino);
                unset($nivel);
                unset($rvoe);
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }

        //Update Ofertas

        if (isset($_POST['pVigenciaU']) && isset($_POST['rvoeU']) && isset($_POST['updatename']) && isset($_FILES['archivoupdate'])) {

            console_log("Sabes que es update (Carrera)");

            if ($_FILES['archivoupdate']['size'] <= 8388608) {

                $oferta = $_FILES['archivoupdate']['name'];

                $ruta = $_FILES['archivoupdate']['tmp_name'];

                console_log("Nombre documento nuevo: " . $oferta);
                console_log("Ruta tmp: " . $ruta);

                if ($oferta != "" && $ruta != "") {
                    console_log("Pasa el if");

                    $rutaOld = getRuta("Recurso", $_POST['IDoferta'], "carrera");

                    $rutaOldAux = pathinfo($rutaOld);

                    if ($rutaOldAux['basename'] != "NA" && $rutaOldAux['basename'] != "") {

                        console_log(getcwd() . "/docs_Unis/carreras/" . $rutaOldAux['basename']);

                        console_log(unlink(getcwd() . "/docs_Unis/carreras/" . $rutaOldAux['basename']));
                    }

                    $destino = nombreRandom($oferta, "docs_Unis/carreras/");

                    console_log("Se guardara en: " . $destino);

                    console_log("Resultado de move_uploaded_file (Update): " . move_uploaded_file($ruta, $destino));

                    $destino = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/" . $destino;

                    updateOfertas($_POST['pVigenciaU'], $_POST['updatename'], $destino, $_POST['newseccionoferta'], $_POST['IDoferta'], $_POST['rvoeU'], $_POST['idSeccion']);
                } else {

                    updateOfertas($_POST['pVigenciaU'], $_POST['updatename'], "", $_POST['newseccionoferta'], $_POST['IDoferta'], $_POST['rvoeU'], $_POST['idSeccion']);
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }
    }

    if ($_POST['CONFIG'] == "Becas") {

        console_log("Sabe que esta en Becas");

        //INSERT BECAS

        if (isset($_POST['inputname']) && isset($_FILES['archivo']) && $_POST['inputname'] != "") {

            console_log("Hace el primer if");

            if ($_FILES['archivo']['size'] <= 8388608) {

                $nom = $_POST['inputname'];

                $beca = $_FILES['archivo']['name'];

                $ruta = $_FILES['archivo']['tmp_name'];

                if ($beca != "" && $ruta != "") {

                    $destino = nombreRandom($beca, "docs_Unis/Becas/");

                    console_log("destino: " . $destino);

                    console_log("Resultado de move_uploaded_file (Insert): " . move_uploaded_file($ruta, $destino));

                    $destino = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/" . $destino;

                    console_log("destino: " . $destino);

                    insertBeca($nom, $destino, $_SESSION['Universidad_ID']);
                } else {
                    alert("Debe elegir un archivo");
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }

        //UPDATE BECAS

        if (isset($_POST['updatename']) && isset($_FILES['archivoupdate'])) {

            console_log("Sabes que estas en update");

            if ($_FILES['archivoupdate']['size'] <= 8388608) {

                $nom = $_POST['updatename'];

                $beca = $_FILES['archivoupdate']['name'];

                $ruta = $_FILES['archivoupdate']['tmp_name'];

                if ($beca != "" && $ruta != "") {

                    $rutaOld = getRuta("Recurso", $_POST['IDbeca'], "beca");

                    console_log($rutaOld);

                    $rutaOldAux = pathinfo($rutaOld);

                    if ($rutaOldAux['basename'] != "NA" && $rutaOldAux['basename'] != "") {

                        console_log(getcwd() . "/docs_Unis/Becas/" . $rutaOldAux['basename']);

                        console_log(unlink(getcwd() . "/docs_Unis/Becas/" . $rutaOldAux['basename']));
                    }

                    $destino = nombreRandom($beca, "docs_Unis/Becas/");

                    console_log("Resultado de move_uploaded_file (Update): " . move_uploaded_file($ruta, $destino));

                    $destino = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/" . $destino;

                    updateBecas($nom, $destino, $_POST['IDbeca']);
                } else {

                    updateBecas($nom, "", $_POST['IDbeca']);
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }
    }

    //Convocatoria
    if ($_POST['CONFIG'] == 'Convocatoria') {
        if (isset($_FILES['archivo'])) {
            if ($_FILES['archivo']['size'] <= 8388608) {
                $nomArch = $_FILES['archivo']['name'];
                $temArch = $_FILES['archivo']['tmp_name'];
                if ($nomArch != "NA" && $nomArch != "" && $temArch != "") {
                    $rutaOld = getRuta("Proceso_Admision", $_SESSION['Universidad_ID'], "universidad");
                    $rutaOldAux = pathinfo($rutaOld);

                    if ($rutaOldAux['basename'] != "NA" && $rutaOldAux['basename'] != "") {
                        console_log("rutalOldAux (Convocatoria): " . getcwd() . "/docs_Unis/admision/" . $rutalOldAux['basename']);
                        console_log("Unlink (Convocatoria): " . unlink(getcwd() . "/docs_Unis/admision/" . $rutalOldAux['basename']));
                    }

                    $des = nombreRandom($nomArch, "docs_Unis/admision/");
                    console_log("Destino 2: " . $des);
                    console_log("Ruta tmp 2: " . $temArch);
                    console_log("Resultado de move_uploaded_file (Convocatoria): " . move_uploaded_file($temArch, $des));

                    $des = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/$des";

                    $query =
                        "UPDATE 
                        universidad 
                    SET 
                        Proceso_Admision='{$des}'
                    WHERE 
                        ID={$_SESSION['Universidad_ID']}";

                    $con = conexion10();
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    setSolicitado("universidad", "ID");
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        } else if (isset($_FILES['archivoupdate'])) {
            if ($_FILES['archivoupdate']['size'] <= 8388608) {
                $nomArch = $_FILES['archivoupdate']['name'];
                $temArch = $_FILES['archivoupdate']['tmp_name'];
                if ($nomArch != "NA" && $nomArch != "" && $temArch != "") {
                    $rutaOld = getRuta("Proceso_Admision", $_SESSION['Universidad_ID'], "universidad");
                    $rutaOldAux = pathinfo($rutaOld);

                    if ($rutaOldAux['basename'] != "NA" && $rutaOldAux['basename'] != "") {
                        console_log("rutalOldAux (Convocatoria): " . getcwd() . "/docs_Unis/admision/" . $rutalOldAux['basename']);
                        console_log("Unlink (Convocatoria): " . unlink(getcwd() . "/docs_Unis/admision/" . $rutalOldAux['basename']));
                    }

                    $des = nombreRandom($nomArch, "docs_Unis/admision/");
                    console_log("Destino 2: " . $des);
                    console_log("Ruta tmp 2: " . $temArch);
                    console_log("Resultado de move_uploaded_file (Convocatoria): " . move_uploaded_file($temArch, $des));

                    $des = "http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/$des";

                    $query =
                        "UPDATE 
                        universidad 
                    SET 
                        Proceso_Admision='{$des}'
                    WHERE 
                        ID={$_SESSION['Universidad_ID']}";

                    $con = conexion10();
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    setSolicitado("universidad", "ID");
                }
            } else {
                alert("El archivo que intenta subir es demasiado pesado, debe pesar menos de 8MB.");
            }
        }
    }

    if ($_POST['CONFIG'] == "Conferencias") {

        //Insert Conferencia

        if (isset($_POST['inputname']) && isset($_POST['urlconfe']) && $_POST['inputname'] != "" && $_POST['urlconfe'] != "") {

            insertConferencia($_POST['inputname'], $_POST['urlconfe'], $_SESSION['Universidad_ID']);
        }

        //Update Conferencia

        if (isset($_POST['updatename']) && isset($_POST['updateurlconfe'])) {

            console_log($_POST['IDconfe']);

            updateConferencias($_POST['updatename'], $_POST['updateurlconfe'], $_POST['IDconfe']);
        }
    }

    ?>

    <?php include_once("componentes/header2.php"); ?>

    <br />

    <section class="container-fluid">

        <!-- Hacen condicionales dependiendo de la pagina que sea se crea  -->

        <?php

        if ($_POST['CONFIG'] == "Cuenta escolar") {

            include_once("componentes/Cuentaescolar.php");
        } else if ($_POST['CONFIG'] == "Contactos") {

            if (isset($_POST['inputname']) && isset($_POST['IdRedSocial'])) {

                if (($_POST['IdRedSocial'] != "tel") && ($_POST['IdRedSocial'] != "ce")) {
                    updateRecurso($_POST['IdRedSocial'], $_POST['inputname']);
                } else if ($_POST['IdRedSocial'] != "ce") {

                    updateTel($_POST['inputname']);
                } else {
                    updateCE($_POST['inputname']);
                }



                $_POST['inputname'] = null;

                $_POST['IdRedSocial'] = null;
            }

            include_once("componentes/Editar_AgregarContacto.php");

            AgregarModal($_POST['CONFIG']);

            include_once("componentes/Contactos.php");
        } else if ($_POST['CONFIG'] == "Configuración de usuario") {

            include_once("componentes/Configuracion_cuenta.php");
        } else {

            include_once("componentes/Listado.php");
        }

        ?>

        <br>



    </section>



    <footer>

        <br>

        <hr class="mb-4">

        <hr class="mb-4">

    </footer>

    <script>
        function mostrarRed(id, valor, url) {

            document.getElementById('IdRedSocial').value = id;

            document.getElementById('EditarArchivoLabel').innerHTML = valor;

            document.getElementById('urlUpdate').innerHTML = url;



            if (id == "tel" || url == "Vacio" || id == "ce") {

                document.getElementById("urlUpdate").style.pointerEvents = "none";

            } else {

                document.getElementById('urlUpdate').href = url;

                document.getElementById("urlUpdate").style.pointerEvents = "auto";

            }



            if (url == "Vacio") {

                document.getElementById('urlUpdate').href = "";

                document.getElementById('urlUpdate').innerHTML = "Vacio";

                document.getElementById("urlUpdate").style.pointerEvents = "none";

            }

        }
    </script>

    <script src="js/jquery.min.js"></script>

    <script src="js/popper.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>



</html>
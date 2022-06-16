<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SeccionAdministrativa/css/bootstrap.css">
    <link rel="stylesheet" href="css/testPreguntas.css">
    <link rel="shortcut icon" href="http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png" type="image/x-icon">
    <title>Test vocacional</title>
</head>

<?php
include_once("Componentes/header.php");
?>
<script>
    //Codigo para quitar el video de presentación
    var myobj = document.getElementById("intro");
    myobj.remove();
    var element = document.getElementById('Test');
    resetnav();
    element.classList.add("active");
</script>
<style>
    .blank_row {
        height: 2rem !important;
        background-color: #FFFFFF !important;
    }
</style>

<body>
    <!-- Footer -->
    <?php
    include_once("Componentes/footer.php");
    ?>
    <br>
    <br>
    <form action="ResultadosTest.php" method="post">
        <div class="container">
            <h2 class="mb-3">Test Vocacional</h2>
            <div class="row">
                Esta pagina esta hecha de tal forma que al terminar de responder el test vocacional y enviar los resultados, sera redirigido a una pagina en la que se calculara su afinidad respecto diversas áreas y se mostraran las carreras que entren en las dos áreas con las que tenga mayor afinidad agrupadas por universidad.
            </div>
            <br>
            <div class="row">
                <label class="h3">Instrucciones</label>
            </div>
            <div class="row">
                Encontrará un cierto número de actividades agrupadas de tres en tres. En cada grupo, lea las tres actividades, decida cuál le gusta más y cuál le gusta menos, y CONTESTE marcando la casilla en la columna "Prefiero" al frente de la frase con la actividad que más le gusta y marcando la casilla en la columna "No Prefiero" frente a la actividad que le agrade menos.
            </div>
            <br>
            <div class="row">
                <label class="h4">Ejemplo</label>
            </div>
            <img class="row img-fluid mb-2" src="Imagenes/ejemploTestVocacional.png" alt="Ejemplo" style="border: 2px solid #555;">
            <div class="row">
                A la persona que ha dado estas dos respuestas, lo que más le gusta en el primer grupo de actividades es "Fijarme en las cosechas del campo durante el viaje", y lo que menos le gusta es "Contemplar el paisaje mientras viajo". En el segundo grupo de actividades ha indicado que, generalmente, lo que más le gusta es "Leer las lecciones a un estudiante ciego" y lo que menos le agrada es "Interrogar a la gente en una encuesta de opinión pública".
            </div>
            <br>
            <div class="row">
                Encontrará algunas actividades que implican unos estudios y una experiencia. En estos casos, supóngase que usted ya posee estos estudios y experiencia. No elija una actividad porque es nueva, poco común o está de moda. Piense en lo que usted preferiría hacer si estuviera igualmente familiarizado con todas las actividades.
            </div>
            <br>
            <div class="row">
                En algunos casos encontrará que las tres actividades le son igualmente agradables. En otros casos las tres le son igualmente poco agradables. Por favor, indique siempre aquellas actividades que usted escogería si no tuviera más remedio que decidirse.
            </div>
            <br>
            <div class="row">
                Algunas actividades pueden parecerle triviales o ridículas. Por favor, indique de todas formas sus preferencias en todos los grupos; son necesarios para ayudarle a usted con un informe completo. Sus respuestas serán guardadas de forma confidencial.
            </div>
            <br>
            <div class="row">
                No invierta demasiado tiempo en cada grupo. Señale espontáneamente sus elecciones y continúe con otro grupo; no discuta las actividades con sus compañeros; el verdadero valor de una respuesta está en que haya sido decidida por usted mismo. EL TIEMPO ESTIMADO PARA RESPONDER LA PRUEBA ES DE 45 A 60 MINUTOS MÁXIMO
            </div>
            <br>
            <div class="row">
                <label class="h3">Elija la opción de acuerdo a su situación</label>
            </div>
            <div class="row my-2">
                <label class="col col-sm-2" style="margin-top: auto;margin-bottom: auto;" for="genero">Genero </label>
                <select class="col-auto col-sm-10 custom-select" id="genero" name="genero">
                    <option value="0">Masculino</option>
                    <option value="1">Femenino</option>
                </select>
            </div>
            <div class="row my-2">
                <label class="col col-sm-2" style="margin-top: auto;margin-bottom: auto;" for="edad">Grupo de Edad</label>
                <select class="col-auto col-sm-10 custom-select" name="edad" id="edad" name="edad">
                    <option value="1">Entre 8 y 9 Años</option>
                    <option value="2">Entre 10 y 11 Años</option>
                    <option value="3">Adolescente Joven</option>
                    <option value="4">Universitario</option>
                </select>
            </div>
            <br>
            <div id="Contenedor" class="container">
                <div class="row">
                    <label class="h2">Test</label>
                </div>
                <table class="table table-sm table-striped table-hover" style="border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th scope="col">Situacion</th>
                            <th scope="col" class="th text-center mal-2">Prefiero</th>
                            <th scope="col" class="text-center">No Prefiero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="blank_row" style="height: 1rem !important;">
                            <td colspan="3"></td>
                        </tr>
                    </tbody>
                    <tbody id="testP1">
                    </tbody>
                    <tbody id="testP2">
                    </tbody>
                    <tbody id="testP3">
                    </tbody>
                    <tbody id="testP4">
                    </tbody>
                    <tbody id="testP5">
                    </tbody>
                    <tbody id="testP6">
                    </tbody>
                    <tbody id="testP7">
                    </tbody>
                    <tbody id="testP8">
                    </tbody>
                    <tbody id="testP9">
                    </tbody>
                    <tbody id="testP10">
                    </tbody>
                    <tbody id="testP11">
                    </tbody>
                    <tbody id="testP12">
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    <button id="ant" type="button" onclick="retroceder()" class="btn btn-primary col-3 col-md-2" disabled="true">      
                        <
                    </button>
                    <label class="h5 col-2 col-md-1 align-self-center" id="act" for="pagAct" style="text-align: center;">1</label>
                    <label class="h5 col-2 col-md-1 align-self-center" for="pagAct" style="text-align: center;">/</label>
                    <label class="h5 col-2 col-md-1 align-self-center" for="pagAct" style="text-align: center;">12</label>
                    <button id="sig" type="button" onclick="avanzar()" class="btn btn-primary col-3 col-md-2">
                        >
                    </button>
                </div>
                <div class="row justify-content-center mt-3">
                    <button type="submit" onclick='document.getElementById("error").style.display = "block";' class="btn btn-success col-12 col-md-7">Concluir Evaluación</button>
                </div>
                <div class="row justify-content-center mt-2">
                    <span id="error" style="display: none;">Revise que ha respondido todos los grupos.</span>
                </div>
            </div>
            <br>
    </form>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/TestVocacional.js"></script>

</body>

</html>
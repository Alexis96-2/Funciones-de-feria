<?php 
session_start();
/*
   if(!isset($_COOKIE['Registrado'])){
        if(isset($Es404)){
        }else if(!isset($Esbienvenida)){
              header("Location: http://feriavirtual.upqroo.edu.mx/Bienvenida.php");
          }
           
    }
*/
?>
<!--Main Navigation-->
<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar
        bg-info ">
        <a class="navbar-brand align-items-start" href="<?php  if(!isset($_COOKIE['Registrado'])){
                            echo 'http://feriavirtual.upqroo.edu.mx/index.php#Bienvenida';
                          }else{
                            echo 'http://feriavirtual.upqroo.edu.mx/index.php';
                          } ?>">
            <strong>Feria Virtual</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center " id="navbarSupportedContent">
            <div class=" align-items-start">
                <ul class="navbar-nav mr-auto d-flex">
                    <li class="nav-item align-items-start">
                        <a class="nav-link" id="inicio" href="<?php  if(!isset($_COOKIE['Registrado'])){
                            echo 'http://feriavirtual.upqroo.edu.mx/Bienvenida.php#Bienvenida';
                          }else{
                            echo 'http://feriavirtual.upqroo.edu.mx/index.php';
                          } ?>" target="_self">Inicio </a>
                    </li>
                    <li class="nav-item align-items-start">
                        <a class="nav-link" id="Mapa" href="http://feriavirtual.upqroo.edu.mx/index.php#Bienvenida" target="_self" onclick="marcarMapa();">Mapa de universidades</a>
                    </li>
                    <li class="nav-item align-items-start">
                        <a class="nav-link" href="<?php  if(!isset($_COOKIE['Registrado'])){
                            echo 'http://feriavirtual.upqroo.edu.mx/Bienvenida.php#Bienvenida';
                          }else{
                            echo 'http://feriavirtual.upqroo.edu.mx/Conferencias.php';
                          } ?>" target="_self" id="conferencias">Conferencias</a>
                    </li>
                    <li class="nav-item align-items-start">
                        <a class="nav-link" href="<?php  if(!isset($_COOKIE['Registrado'])){
                            echo 'http://feriavirtual.upqroo.edu.mx/Bienvenida.php#Bienvenida';
                          }else{
                            echo 'http://feriavirtual.upqroo.edu.mx/TestVocacional.php';
                          } ?>" target="_self" id="Test">Test Vocacional</a>
                    </li>

                </ul>
            </div>
            <hr>
        
        
            <div style="align-items: flex-end;">
                <ul class="navbar-nav mr-auto d-flex justify-content-end">
                    <li class="nav-item align-items-end">
                        <a class="nav-link" href="http://feriavirtual.upqroo.edu.mx/Registro" target="_self" id="Test" style="display: flex;">Inscribe a tu universidad!</a>
                    </li>
                </ul>
            </div>

        </div>
         

    </nav>
    <br>
    <br>      
     <?php  
     
    if (isset($inicio)) {
                echo'
    <div class="view intro-2" id="intro">
        <div class="embed-responsive embed-responsive-21by9">
            <video loop="true" controls autoplay muted>
                <source src="./VideoPresentacionFeria/Feria2020.mp4" type="video/mp4">
            </video>
            <!--  <iframe class="embed-responsive-item bg-dark" src="./VideoPresentacionFeria/Feria2020.mp4" frameborder="0" allowfullscreen></iframe>
            <div class="embed-responsive bg-dark" >  </div>-->
        </div>
    </div>';
   }?>

</header>

<!--Main Navigation-->
<script>
    function marcarMapa() {
        var element = document.getElementById('Mapa');
        var element2 = document.getElementById("inicio");
        resetnav();
        element.classList.add("active");
        element2.classList.remove('active');

    }

    function resetnav() {
        var element1 = document.getElementById("conferencias");
        var element2 = document.getElementById("inicio");
        var element3 = document.getElementById("Test");
        var element4 = document.getElementById("Mapa");
        if (element1.classList.contains('active')) {
            // Has active in it
            element1.classList.remove('active');
        } else {
            if (element2.classList.contains('active')) {
                // Has active in it
                element2.classList.remove('active');
            } else {
                if (element3.classList.contains('active')) {
                    // Has active in it
                    element3.classList.remove('active');
                } else {
                    if (element4.classList.contains('active')) {
                        // Has active in it
                        element4.classList.remove('active');
                    } else {
                        // No active :(
                    }
                }
            }
        }
    }
  
</script>
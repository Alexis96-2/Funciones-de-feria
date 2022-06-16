# Funciones-de-feria
Pongo el codigo desarrollado para el proyecto de la feria virtual

### Registro

Aquí se puede apreciar el `head` del index del registro.

```html
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
  <link rel="shortcut icon" href="http://feriavirtual.upqroo.edu.mx/img_defaults/feria_app_icon.png" type="image/x-icon">
    <title>Registro</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="../SeccionAdministrativa/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css">
   <!-- add icon link -->

</head>
```
Aquí se puede apreciar el `contenido` del index del registro.

```html
<?php include("ConsultasDeRegistro.php"); ?>
<body>
  <!-- imagen principal class="img-fluid"-->
  <div class="container text-center mb-3 mt-5"><img src="img/secretaria-seq.png" class="img-fluid" alt="Feria Virtual"><hr class="my-3"></div>
  <!-- imagen principal fin -->

  <!--Menu-->
  <div class="container">
      <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
            aria-controls="pills-home" aria-selected="true">Convocatoria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
            aria-controls="pills-profile" aria-selected="false">Registro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="../SeccionAdministrativa/index.php" role="tab"
            aria-controls="pills-contact" >Ingreso</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="../index.php" role="tab"
            aria-controls="pills-contact" >Regresar a la feria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
            aria-controls="pills-contact" aria-selected="false">Sobre nosotros</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active text-center" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          Bienvenidos a la convocatoria para la feria de universidades, para registrar su universidad está el apartado
          "Registro" <br>en donde deberá llenar sus respectivos campos para cumplir con su registro a la feria 
          virtual de universidades.<br>
          Cabe aclarar que este apartado es para las universidades que piensan registrar a su respectiva instalación 
          <br>en esta feria virtual para que los jovenes aspirantes las vean reflejadas en la aplicación móvil y en este
          sitio.<br>
          </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <?php include("registro.php"); ?>
        </div>
        <div class="tab-pane fade" id="pills-ingress" role="tabpanel" aria-labelledby="pills-ingress-tab">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <?php include("aboutus.php"); ?>
        </div>
      </div>
  </div>
  <!--Menu Fin-->
  <br>
  <!-------- script base --------->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!--------------script de funciones interna--------------->
  <script type="text/javascript">
    function validar(){
      var copia = document.getElementById("copiatxt").value;
      var captcha = document.getElementById("captcha").value;
      var carreras = document.getElementById("carrera");
      for(var i = 0; i < carreras.length; i++){
        if(document.getElementById("prov").checked) {
          document.getElementById('rp').disabled = true;
        }
      }
    }

// AGREGAR Inputs
$(document).ready(function () {
    var campos_max          = 20;   //max de 10 campos
      var contador = 1;
        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listado').append('<tr>'+
                                '<td><input class="form-control col-12 col-md-12" type="text" name="carrera[]" id="carrera" placeholder="Nombre de la carrera" required/></td>'+
                                '<td><select class="browser-default custom-select form-control col-12 col-md-9" id="lvlEdu[]" name="nvlEdu[]">'+
                                '<?php getNivelEducativo(); ?></select></td>'+
                                '<td><input type="checkbox" class="col-12 col-md-4" id="prov[]" name="prov'+contador+'" value=1>'+
                                '<input type="hidden" id="rp[]" name="check[]" value=0></td>'+
                                '<td><input class="form-control col-12 col-md-9" type="text" name="rvoe[]" id="rvoe[]" placeholder="Escriba su RVOE/DPG"/></td>'+
                                '<td class="row"><input class="form-control col-12 col-md-7" type="text" name="periodo[]" id="periodo[]" placeholder="Escriba su periodo..."/>'+
                                '<a href="#" class="remover_campo btn btn-primary btn-sm"> - </a></td>'+
                                '</tr>');
                        x++;
                        contador++;
                }
                console.log("Funcaaaa");
                if(x>19){
                  $('#add_field').prop( "disabled", true );
                }else{$('#add_field').prop( "disabled", false );}
        });
        // Remover o div anterior
        $('#listado').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
                if(x>9){
                  $('#add_field').prop( "disabled", true );
                }else{$('#add_field').prop( "disabled", false );}
        });
      });


        //Para el select de municipio dependiendo de su estado
      $(document).ready(function(){
        recargarlista(1);
      });

      function recargarlista(val){
        var dataContact = '';
    $.ajax({
        url: '../Tareas/ajaxRegistroMunicipio.php',
        type: 'POST',
        async: true,
        data: {
            action: val
        },
        success: function (resultado) {
            if (resultado == 'noData') {
                dataContact = 'no se encontraron resultados';
            } else {
                var info = JSON.parse(resultado);
                dataContact = info;
            }

            $('#slctBox').html(dataContact);
            
        }, error: function (error) {
            console.log(error);
        }

    });
      }

  </script>
  
</body>

<?php 
if(isset($_POST['enviando']) && isset($_POST['copiatxt'])){
  if($_POST['copiatxt']==$_POST['captcha'] && $_POST['correoCon']==$_POST['correoR']){
    $conexion=conexion10();
    // Datos del usuario
    $nombreRes=$_POST['responsablename'];
    $ApPa=$_POST['APResponsable'];
    $ApMa=$_POST['AMResponsable'];
    $Tel=$_POST['telfijo'];
    $Movil=$_POST['numeromovil'];
    $correoR=$_POST['correoR'];
    $user=$_POST['usuarionam'];
    $password=$_POST['contra'];
    // Datos de la universidad
    $NameInstituto=$_POST['uniname'];
    $TipoInstituto=$_POST['Tinstituto'];
    $cTrabajo=$_POST['ctraba'];
    // Datos de la ubicación
    $numeroI=$_POST['numeroI'];
    $numeroE=$_POST['numeroE'];
    $calle=$_POST['calleD'];
    $colonia=$_POST['coloniavalue'];
    $ciudad=$_POST['ciudadvalue'];
    $codiPos=$_POST['CPdato'];
    $Muni=$_POST['municipio'];
    // Datos del contacto de la uni
    $TelUni=$_POST['telefonovalue'];
    $correoU=$_POST['correoUni'];
    // Datos de la carrera
    $carrera=($_POST['carrera']);
    $rvoe=($_POST['rvoe']);
    $nivel=($_POST['nvlEdu']);
    $periodo=($_POST['periodo']);
    $check=array();
    $n=count($carrera);
    for($i=0; $i<$n; $i++) 
    {       
      if (isset($_POST['prov'.$i])){
        $check[]=1;
      }
      else{
        $check[]=0;
      }
    }
    $validarUser = "SELECT * FROM `usuario` WHERE `Nombre_Usuario`='$user'";
    $validarUser=mysqli_query($conexion, $validarUser);
    if(mysqli_num_rows($validarUser)>0){
      echo "<script>alert('El usuario ya existe');</script>";
    }
    else{
      // Insert Master
      InsertUsuario($nombreRes, $ApPa, $ApMa, $Tel, $Movil, $correoR, $password,
      $user, $NameInstituto, $TipoInstituto, $TelUni, $correoU, $numeroI, $numeroE, 
      $calle, $colonia, $ciudad, $codiPos, $Muni, $carrera, $rvoe, $check, $nivel, $cTrabajo, $periodo);
      // Borramos datos
      unset($nombreRes, $ApPa, $ApMa, $Tel, $Movil, $correoR, $password, $NameInstituto, $user,
      $TipoInstituto, $TelUni, $correoU, $numeroI, $numeroE, $calle, $colonia, $ciudad, $codiPos, $Muni, $carrera, 
      $rvoe, $check, $nivel, $n, $cTrabajo, $periodo);
    }
    mysqli_close($conexion);
  }else{
    echo "<script>alert('Sus campos no se llenaron correctamente');</script>";
  }
}
?>
<?php 
include_once("../Componentes/footer.php");
?>
<script type="text/javascript" src="evitar_reenvio.js"></script>
```

### Consulta de Registro

```php
<?php
include('../Tareas/conexion.php');
if(isset($_POST['esta'])){
  $Estadosele=$_POST['esta'];
  //getMunicipiosBox($Estadosele);
}
```

```php
// EL USUARIO SE REGISTRA
function InsertUsuario($Nombre, $ApellidoP, $ApellidoM, $Telefono, $Celular, $Correo, $contraseña,
$usuario, $Nombre1, $Tipo1, $TelefonoUni1, $CorreoUni1, $NumIn11, $NumEx11, $Calle11, $Colonia11, 
$Ciudad11, $CP11, $idMunicipios11, $carreras, $rvoes, $provs, $lvl, $claveTra, $per1odo){
    $conexion=conexion10();
    require "../SeccionAdministrativa/PHPMailer/src/PHPMailer.php";
    require "../SeccionAdministrativa/PHPMailer/src/SMTP.php";
    require "../SeccionAdministrativa/PHPMailer/src/Exception.php";

    //    CONTRASEÑA RANDOM
    /*$contraseña="";
    $parametros="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $maximo=strlen($parametros)-1;
    for($i=0; $i<8; $i++){
      $s = rand(0, strlen($parametros)-1);
      $contraseña .= $parametros[$s];
    }*/

    //    USUARIO RANDOM
    /*$chekeo = "1";
    $usuario="";
    while ($chekeo == "1") {
      $datos="ABCUDEFOGHIJKLMNOPQRISTEUVWXYZA";
      $max=strlen($datos)-1;
      for($i=0; $i<5; $i++){
      $s = rand(0, strlen($datos)-1);
      $usuario .= $datos[$s];
      }
      $validarUser = "SELECT * FROM `usuario` WHERE `Nombre_Usuario`='$usuario'";
      $valiUsuario=mysqli_query($conexion, $validarUser);
      if(mysqli_num_rows($valiUsuario)>0){
        $chekeo = "1";
      }
      else{
        $chekeo = "0";
      }
    }*/
    
    //  VALIDAR UNIVERSIDAD
    $validarUni = "SELECT * FROM `universidad` WHERE `Nombre`='$Nombre1'";
    $valiUniversidad=mysqli_query($conexion, $validarUni);
    if(mysqli_num_rows($valiUniversidad)>0){
      echo "<script>alert('La universidad ya existe');</script>";
    }else{
    $consulta="INSERT INTO `usuario`
    (`Nombre`, `Apellido_P`, `Apellido_M`, `Telefono`, `Celular`, `Correo_Electronico`, `Tipo`, `Contrasena`, `Nombre_Usuario`) 
    VALUES ('$Nombre', '$ApellidoP', '$ApellidoM', '$Telefono', '$Celular', '$Correo', '2', '$contraseña', '$usuario')";

    $mail = new PHPMailer(true);
    try{
        //configuracion de servidor
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='feria.orientacion.educativa@gmail.com';
        $mail->Password='feria2017';
        $mail->SMTPSecure = 'ssl';   
        $mail->Port='465';
        //destinatarios
        $mail->SetFrom("feria.orientacion.educativa@gmail.com","
        No contestar a este correo (feriaVirual)");
        $mail->addAddress($Correo);
        //contenido
        $mail->isHTML(true);
        $mail->Subject = 'Cuenta creada en la feria virtual asociada a este correo!';
        $mail->Body = '<div style="margin:0px;padding:0px;font-family:Avenir,sans-serif;line-height:100%">
        <h4 class="my-4">Entrega de usuario y contraseña para la feria de universidades.</h4>
        <p class="my-4">ATENCIÓN. Su usuario no cuenta con logo de su universidad ni archivos correspondientes, <br>
        los cuales podrá subir ingresando a su usuario asignado.</p>
        <table border="0" align="center" cellpadding="0" cellspacing="0" 
            style="table-layout:fixed;border-collapse:separate;background-color:#5bc0de;width:100%;min-width:100%">
            <tbody>
                <tr>
                    <td align="center" style="border-collapse:separate;table-layout:fixed">
                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                            width="600"
                            style="width:600px;table-layout:fixed;border-collapse:separate;min-width:600px">
                            <tbody>
                                <tr>
                                    <td align="center" bgcolor="#E7E6E3" 
                                        style="border-collapse:separate;table-layout:fixed;padding-top:30px">
                                        <table border="0" cellspacing="0"
                                            cellpadding="0"
                                            style="table-layout:fixed;border-collapse:separate;width:90%">
                                            <tbody>
                                                <tr>
                                                    <td align="center" 
                                                        style="padding-bottom:40px;border-collapse:separate;table-layout:fixed;font-family:Avenir,sans-serif;font-size:31px;line-height:32px;color:#1a1a18;text-decoration:none;font-weight:normal">
                                                        <strong>Credenciales para la feria virtual</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" 
                                                        style="text-align:center;padding-bottom:20px;border-collapse:separate;table-layout:fixed;font-family:Avenir,sans-serif;font-size:20px;line-height:30px;color:#454545">
                                                        Usuario
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"
                                                        style="text-align:center;padding-bottom:20px;border-collapse:separate;table-layout:fixed;font-family:Avenir,sans-serif;font-size:40px;line-height:32px;color:#1a1a18;text-decoration:none;font-weight:normal">
                                                        '.$usuario.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"
                                                        style="text-align:center;padding-bottom:20px;border-collapse:separate;table-layout:fixed;font-family:Avenir,sans-serif;font-size:20px;line-height:30px;color:#454545">
                                                        Contraseña
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"
                                                        style="text-align:center;padding-bottom:20px;border-collapse:separate;table-layout:fixed;font-family:Avenir,sans-serif;font-size:40px;line-height:32px;color:#1a1a18;text-decoration:none;font-weight:normal">
                                                        '.$contraseña.'
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
          </table>
        </div>';
        if(mysqli_query($conexion, $consulta)){
          console_log($consulta);
          $mail->Send();
  
          $IDUSER = mysqli_insert_id($conexion);
          console_log($IDUSER);
  
          InsertUni($Nombre1, $Tipo1, $IDUSER, $TelefonoUni1, $CorreoUni1, $NumIn11, $NumEx11, $Calle11, $Colonia11, 
          $Ciudad11, $CP11, $idMunicipios11, $carreras, $rvoes, $provs, $lvl, $claveTra, $per1odo);
        }else{
          echo "<script>alert('Error al subir sus datos');</script>";
        }
    }catch(Exception $e){
      echo "<script>alert('Error en el correo');</script>";
      console_log("El error es ".$e);
    }
      
  }
    mysqli_close($conexion);
}
```

```php
// SE AÑADE LA UNIVERSIDAD AL USUARIO 
function InsertUni($Nombre, $Tipo, $UserInsertId, $TelefonoUni, $CorreoUni,
$NumIn1, $NumEx1, $Calle1, $Colonia1, $Ciudad1, $CP1, $idMunicipios1, $carreras1, $rvoes1, $provs1, $nvl, $claveT, $per10do){

  $conexion2=conexion10();
  $nombreMayus=strtoupper($Nombre);

  $consulta="INSERT INTO `universidad`(`Nombre`, `Ruta_Escudo`, `Tipo`, `Proceso_Admision`, `Clave_Centro_Trabajo`, `Usuario_ID`, `Estatus_ID`) 
  VALUES ('".$nombreMayus."', 'NA', '".$Tipo."', 'NA', '".$claveT."', '".$UserInsertId."', '1')";

  if(mysqli_query($conexion2, $consulta)){
    console_log($consulta);
    $idUNI = mysqli_insert_id($conexion2);
    //Pasamos parametros
    // CONTACTOS
    InsertContacUni($TelefonoUni, $CorreoUni, $idUNI);
    // UBICACIONES
    InserUbica($NumIn1, $NumEx1, $Calle1, $Colonia1, $Ciudad1, $CP1, $idUNI, $idMunicipios1);
    // CARRERAS
    InsertCarrera($carreras1, $rvoes1, $provs1, $idUNI, $nvl, $per10do);
  }
  // SE CIERRA
  mysqli_close($conexion2);

}
```

```php
// SE AÑADE EL CONTACTO DEL INSTITUTO
function InsertContacUni($Telefono, $Correo, $IDUniAlways){
  $conexion5=conexion10();

  $consulta="INSERT INTO `contacto_universidad`(`Telefono`, `Correo_Electronico`, `Universidad_ID`) VALUES ('".$Telefono."', '".$Correo."', '".$IDUniAlways."')";

  if(mysqli_query($conexion5, $consulta)){
    console_log($consulta);

    console_log("El id de la universidad es ".$IDUniAlways);
  }
  mysqli_close($conexion5);

}
```

```php
// SE AÑADE LA UBICACIÓN DEL INSTITUTO
function InserUbica($NumIn, $NumEx, $Calle, $Colonia, $Ciudad, $CP, $idInstituto, $idMunicipios){
  $conexion6=conexion10();

  $consulta="INSERT INTO `ubicacion`(`Num_Interior`, `Num_Exterior`, `Calle`, `Colonia`, `Ciudad`, `Codigo_Postal`, `url_Maps`, `Universidad_ID`, `Municipio_ID`) 
  VALUES ('$NumIn', '$NumEx', '$Calle', '$Colonia', '$Ciudad', '$CP', 'NA', '$idInstituto', '$idMunicipios')";

  if(mysqli_query($conexion6, $consulta)){
    console_log($consulta);
  }

  mysqli_close($conexion6);
}
```

```php
// SE AÑADEN LAS CARRERAS
function InsertCarrera($nombreCarrera, $RVOEs, $checks, $idUniversidades, $nivel, $per){
  $conexion7=conexion10();
  $valores="";
  while (true) {
    // RECUPERAMOS VALORES DEL ARRAY
    $carrera= current($nombreCarrera);
    $rvoe= current($RVOEs);
    $check= current($checks);
    $nvlEdu= current($nivel);
    $periodoV= current($per);

    // ASIGNAMOS LOS VALORES
    $carr=(($carrera !== false) ? $carrera : ", &nbsp;");
    $registro=(($rvoe !== false) ? $rvoe : ", &nbsp;");
    $c=(($check !== false) ? $check : ", &nbsp;");
    $pVigencia=(($periodoV !== false) ? $periodoV : ", &nbsp;");
    $educacion=(($nvlEdu !== false) ? $nvlEdu : ", &nbsp;");
    $auxiliar ="NULL";

    // CONDICIONAL PARA LA CONSULTA RESPECTO AL RVOE
    if($c != 1){
      $valores="('$carr', $auxiliar, 'NA', $auxiliar, '$idUniversidades', '1', '$educacion'),";
    }else{
      $valores="('$carr', '$registro', 'NA', '$pVigencia', '$idUniversidades', '1', '$educacion'),";
    }

    // YA QUE TERMINAMSO CON COMA HACEMOS ESTO
    $valoresF= substr($valores, 0, -1);

    // GUARDAMOS LA CONSULTA
    $consulta="INSERT INTO `carrera`(`Nombre`, `RVOE`, `Recurso`,  `Periodo_Vigencia`, `Universidad_ID`, `Estatus_ID`, `Nivel_Educativo_ID`) VALUES $valoresF";
    // Y LA EJECUTAMOS 
    if(mysqli_query($conexion7, $consulta)){
      console_log($consulta);
    }

    // Pasamos siguiente valores
    $carrera= next($nombreCarrera);
    $rvoe= next($RVOEs);
    $check= next($checks);
    $nvlEdu= next($nivel);
    $periodoV= next($per);

    // CHECK TERMINATOR
    if($carrera === false && $rvoe === false && $check === false && $nvlEdu === false) break;

  }
  console_log($nombreCarrera);
  console_log($RVOEs);
  console_log($checks);
  console_log($nivel);
  console_log($per);
  mysqli_close($conexion7);

}
```

```php
// Conseguimos los Estados
function getEstadosBox()
{
  $conexion = conexion10();
  $consulta = "SELECT * FROM estado;";
  $resultado = mysqli_query($conexion, $consulta) or die("Error de llenado de tabla");
  if (mysqli_num_rows($resultado) > 0) {
    while ($columna = mysqli_fetch_array($resultado)) {
        if($columna['ID'] == 1){
          echo '<option selected value="' . $columna['ID'] . '">' . $columna['Nombre'] . '</option>';
        }else{
        echo '<option value="' . $columna['ID'] . '">' . $columna['Nombre'] . '</option>';
        } 
    }
  }
  mysqli_close($conexion);
}
```

```php
function getNivelEducativo(){
  $conexion = conexion10();
  $consulta = "SELECT * FROM `nivel_educativo`";
  $resultado = mysqli_query($conexion, $consulta) or die("Error de llenado de tabla");
  if (mysqli_num_rows($resultado) > 0) {
    while ($columna = mysqli_fetch_array($resultado)) {
        if($columna['ID'] == 1){
          echo '<option selected value="' . $columna['ID'] . '">' . $columna['Nombre'] . '</option>';
        }else{
        echo '<option value="' . $columna['ID'] . '">' . $columna['Nombre'] . '</option>';
        } 
    }
  }
  mysqli_close($conexion);
}
?>
```

### Donde se realiza el Registro

```html
<form form="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <h1 class="text-center my-4">Formulario de Registro</h1>
  <h4 class="text-center my-4">Datos del Coordinador Institucional de la Feria</h4>
  <hr>
  <div class="form-row">
    <div class="col-12 mb-3">
      <div class="row">
        <label for="responsablename" class="col-12 col-md-3">Nombre(s)</label>
        <input type="text" class="form-control col-12 col-md-9" id="responsablename" name="responsablename" placeholder="Nombre del responsable" required>
      </div>
    </div>
    <div class="col-12 mb-3">
      <div class="row">
        <label for="APResponsable" class="col-12 col-md-3">Apellido P.</label>
        <input type="text" class="form-control col-12 col-md-9" id="APResponsable" name="APResponsable" placeholder="Apellido Paterno" required>
      </div>
    </div>
    <div class="col-12 mb-3">
      <div class="row">
        <label for="AMResponsable" class="col-12 col-md-3">Apellido M.</label>
        <input type="text" class="form-control col-12 col-md-9" id="AMResponsable" name="AMResponsable" placeholder="Apellido Materno" required>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row">
        <label for="telfijo" class="col-12 col-md-3">Tel&eacute;fono fijo</label>
        <input type="text" class="form-control col-12 col-md-9" id="telfijo" name="telfijo" placeholder="N&uacute;mero del responsable" required>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row">
        <label for="numeromovil" class="col-12 col-md-3">N&uacute;mero Móvil</label>
        <input type="text" class="form-control col-12 col-md-9" id="numeromovil" name="numeromovil" placeholder="N&uacute;mero del responsable" required>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row">
        <label for="correoR" class="col-12 col-md-3">Correo Electr&oacute;nico</label>
        <input type="text" class="form-control col-12 col-md-9" id="correoR" name="correoR" placeholder="Correo Electr&oacute;nico completo" aria-describedby="inputGroupPrepend21" required>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row">
        <label for="usuarionam" class="col-12 col-md-3">Usuario</label>
        <input type="text" class="form-control col-12 col-md-9" id="usuarionam" name="usuarionam" placeholder="Escriba el nombre de su usuario que usará para la feria" aria-describedby="inputGroupPrepend21" required>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row">
        <label for="contra" class="col-12 col-md-3">Contraseña</label>
        <input type="password" class="form-control col-12 col-md-8" id="contra" name="contra" placeholder="Escriba la contraseña para su usuario" aria-describedby="inputGroupPrepend21" required>
        <input id="myChbx" type='checkbox' onclick="setVisible('contra')" class="btn btn-primary"><i class="fas fa-low-vision"></i>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row">
        <label for="correoCon" class="col-12 col-md-3">Confirmar Correo</label>
        <input type="text" class="form-control col-12 col-md-9" id="correoCon" name="correoCon" placeholder="Confirme su Correo Electr&oacute;nico completo" aria-describedby="inputGroupPrepend21" required>
      </div>
    </div>

    <!------------------------------------------------------ Datos de la universidad ----------------------------------------------------------->

    <h4 class="text-center my-4">Datos de la universidad</h4>
    <hr>
    <div class="form-row">
      <div class="col-12 mb-3">
        <div class="row">
          <label for="uniname" class="col-12 col-md-3">Instituci&oacute;n</label>
          <input type="text" class="form-control col-12 col-md-9" id="uniname" name="uniname" placeholder="Nombre de la Instituci&oacute;n" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="Tinstituto" class="col-12 col-md-3">Tipo de Instituci&oacute;n</label>
          <select class="browser-default custom-select form-control col-12 col-md-9" id="Tinstituto" name="Tinstituto" required>
            <option selected>Elija su tipo de universidad</option>
            <option value="0">P&uacute;blica</option>
            <option value="1">Privada</option>
          </select>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="uniname" class="col-12 col-md-3">Clave Centro de Trabajo</label>
          <input type="text" class="form-control col-12 col-md-9" id="ctraba" name="ctraba" placeholder="Clave del centro de trabajo" required>
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div class="row">
          <label for="correoUni" class="col-12 col-md-3">Correo Electr&oacute;nico</label>
          <input type="text" class="form-control col-12 col-md-9" id="correoUni" name="correoUni" placeholder="Correo Electr&oacute;nico de la universidad" required>
        </div>
      </div>

      <!---------------------------------------- Direccion ---------------------------------------------------------->

      <div class="col-12 mb-3">
        <div class="row">
          <label for="Selectbox" class="col-12 col-md-3">Estado</label>
          <select class="browser-default custom-select form-control col-12 col-md-9" id="SelectboxEs" name="estado" onchange="recargarlista(this.value);">
            <?php getEstadosBox(); ?>
          </select>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for='slctBox' class='col-12 col-md-3'>Municipio</label>
          <select class='browser-default custom-select form-control col-12 col-md-9' id='slctBox' name='municipio'>
          </select>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="calleD" class="col-12 col-md-3">Calle</label>
          <input type="text" class="form-control col-12 col-md-9" id="calleD" name="calleD" placeholder="Calle donde se encuentra" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="numeroE" class="col-12 col-md-3">N° Exterior</label>
          <input type="text" class="form-control col-12 col-md-9" id="numeroE" name="numeroE" placeholder="Numero de Exterior si tiene" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="numeroI" class="col-12 col-md-3">N° Interior</label>
          <input type="text" class="form-control col-12 col-md-9" id="numeroI" name="numeroI" placeholder="Numero de Interior si tiene" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="coloniavalue" class="col-12 col-md-3">Colonia</label>
          <input type="text" class="form-control col-12 col-md-9" id="coloniavalue" name="coloniavalue" placeholder="Colonia/Fraccionamiento donde se encuentra" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="ciudadvalue" class="col-12 col-md-3">Ciudad</label>
          <input type="text" class="form-control col-12 col-md-9" id="ciudadvalue" name="ciudadvalue" placeholder="Ciudad donde se encuentra" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="CPdato" class="col-12 col-md-3">C&oacute;digo Postal</label>
          <input type="text" class="form-control col-12 col-md-9" id="CPdato" name="CPdato" placeholder="C&oacute;digo Postal" required>
        </div>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <label for="telefonovalue" class="col-12 col-md-3">Tel&eacute;fono</label>
          <input type="text" class="form-control col-12 col-md-9" id="telefonovalue" name="telefonovalue" placeholder="Tel&eacute;fono de la Instituci&oacute;n" required>
        </div>
      </div>


      <!---------------------- Carreras -------------------------->
      <div class="container text-center">
        <h5 class="text-center my-4">Oferta(s) Educativa(s)</h5>
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">Carrera</th>
              <th scope="col">Nivel Educativo</th>
              <th scope="col">¿Tiene registro?</th>
              <th scope="col">RVOE/DPG</th>
              <th scope="col">Periodo</th>
            </tr>
          </thead>
          <tbody id="listado">
            <tr>
              <td><input class="form-control col-12 col-md-12" type="text" name="carrera[]" id="carrera" placeholder="Nombre de la carrera" required /></td>
              <td><select class="browser-default custom-select form-control col-12 col-md-9" id="lvlEdu[]" name="nvlEdu[]">
                  <?php getNivelEducativo(); ?></select></td>
              <td><input type="checkbox" class="col-12 col-md-4" id="prov[]" name="prov0" value=1>
                <input type="hidden" id="rp[]" name="check[]" value=0>
              </td>
              <td><input class="form-control col-12 col-md-9" type="text" name="rvoe[]" id="rvoe[]" placeholder="Escriba su RVOE/DPG" /></td>
              <td><input class="form-control col-12 col-md-11" type="text" name="periodo[]" id="periodo[]" placeholder="Periodo de tiempo" /></td>
            </tr>
          </tbody>
        </table>
        <input class="btn btn-primary btn-sm" type="button" id="add_field" value="+">
      </div>


    </div>
    <hr>
    <!--------------------------------------------------------- Datos de la universidad fin -------------------------------------------------->

    <!---------------------- No soy un robot -------------------------->
    <?php
    function codigo_captcha()
    {
      $k = "";
      $datos = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $max = strlen($datos) - 1;
      for ($i = 0; $i < 5; $i++) {
        $s = rand(0, strlen($datos) - 1);
        $k .= $datos[$s];
      }

      return $k;
    }
    ?>
    <center class="col">
      <div class="container">
        <div class="form-group">
          <input type="text" class="form-control col-md-2" style="border-radius: 5px;font-size: 20px;text-align: center;" id="captcha" name="captcha" value=<?php echo codigo_captcha(); ?> readonly required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control col-md-4" id="copiatxt" name="copiatxt" placeholder="Escriba lo que marca arriba" required>
        </div>
      </div>



      <!---------------------- No soy un robot  fin -------------------------->

      <div class="form-group text-center">
        <div class="custom-control custom-checkbox row">
          <input type="checkbox" class="custom-control-input" id="invalidCheck12" required>
          <label class="custom-control-label col-12 col-md-4" for="invalidCheck12">De acuerdo con los t&eacute;rminos y condiciones.</label>
        </div>
      </div>
      <button id="botonazo" class="btn btn-primary btn-sm" type="submit" name="enviando">Enviar</button>
    </center>
  </div>
</form>
<script type="text/javascript">
  function setVisible(objetivo) {

    var obj = document.getElementById(objetivo);

    var type = obj.getAttribute('type') === 'password' ? 'text' : 'password';

    obj.setAttribute('type', type);

  }
</script>
```

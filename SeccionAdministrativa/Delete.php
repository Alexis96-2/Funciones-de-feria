<?php
include_once("conexiones/conexion.php");
$rutaAux = "";
$conexion = conexion10();
$ID = $_POST['ID'];
console_log("La id del elemento es: " . $ID);
$consulta = "DELETE FROM {$_GET['tabla']} WHERE `ID`=" . $ID;

switch ($_GET['tabla']) {
    case 'foto':
        console_log($_POST['ruta']);
        $rutaAux = pathinfo($_POST['ruta']);
        console_log("rutaAux: " . getcwd() . "/docs_Unis/Fotos/" . $rutaAux['basename']);
        console_log("Unlink: " . unlink(getcwd() . "/docs_Unis/Fotos/" .  $rutaAux['basename']));

        //console_log(unlink("../" . $_POST['ruta']));
        mysqli_query($conexion, $consulta);
        console_log($consulta);
        mysqli_close($conexion);
        break;
    case 'beca':
        console_log($_POST['ruta']);
        $rutaAux = pathinfo($_POST['ruta']);
        console_log("rutaAux: " . getcwd() . "/docs_Unis/Becas/" . $rutaAux['basename']);
        console_log("Unlink: " . unlink(getcwd() . "/docs_Unis/Becas/" .  $rutaAux['basename']));

        //console_log(unlink("../" . $_POST['ruta']));
        mysqli_query($conexion, $consulta);
        console_log($consulta);
        mysqli_close($conexion);
        break;
    case 'carrera':
        $con2 = conexion10();
        $cons2 = "DELETE FROM carrera_area WHERE Carrera_ID=$ID";
        mysqli_query($con2, $cons2);
        console_log($cons2);
        mysqli_close($con2);

        mysqli_query($conexion, $consulta);
        console_log($consulta);
        mysqli_close($conexion);

        console_log($_POST['ruta']);
        $rutaAux = pathinfo($_POST['ruta']);
        console_log("rutaAux: " . getcwd() . "/docs_Unis/carreras/" . $rutaAux['basename']);
        console_log("Unlink: " . unlink(getcwd() . "/docs_Unis/carreras/" .  $rutaAux['basename']));
        break;
    default:
        mysqli_query($conexion, $consulta);
        console_log($consulta);
        mysqli_close($conexion);
        break;
}
?>

<div style="display: none;">
    <form id="b_submit" method="POST" action="Configuracion.php?CONFIG=<?php echo $_POST['origen']; ?>">

        <button type="submit">

            <input type="hidden" name="CONFIG" value="<?php echo $_POST['origen']; ?>">

            <input type="hidden" name="CONFIG_IMG" value="<?php echo $_POST['img']; ?>">

        </button>

    </form>
</div>

<script>
    document.getElementById("b_submit").submit();
</script>
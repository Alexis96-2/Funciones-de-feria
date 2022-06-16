
<?php
if (isset($_GET['actionid']) && !empty($_GET['actionid'])) {
  include_once("conexion.php");
  //funcion para regresar todas las universidades en un municipio
  function ObtenerTodasLasUnis($MID)
  {
    $conexion = conexion10();
    $consulta = "SELECT `ubicacion`.`Municipio_ID`,`municipio`.`nombre`,`municipio`.`Ruta_Escudo` as 'ruta_mun', `universidad`.*
    FROM `ubicacion` 
      JOIN `municipio` ON `ubicacion`.`Municipio_ID` = `municipio`.`ID`
       JOIN `universidad` ON `ubicacion`.`Universidad_ID` = `universidad`.`ID`
        WHERE `municipio`.`ID`=$MID AND (`universidad`.`Estatus_ID`=3 OR `universidad`.`Estatus_ID`=2)";
    $result = mysqli_query($conexion, $consulta);
    $num_rows = mysqli_num_rows($result);
    
    if ($num_rows > 0) {
      $formato = '
        <div class="row align-items-center "> ';
      $I = 0;
      while ($row = mysqli_fetch_array($result)) {
        if ($I < 1) {
          
        $I++;
          $formato .= '
            <input   type="hidden" value="' . $row['ruta_mun'] . '" id="log_mun">
            <input   type="hidden" value="' . $row['nombre'] . '" id="mun">
         
          ';
        }
        $formato .= '
      
          <a class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 dr Uni" title="'.$row['Nombre'] .'" category="'.$row['Tipo'].'" href="DetallesUni.php?Uni=' . $row['ID'] . '&municipio=' . $MID . '" style="height:auto;width:100%;" >
       
          <div class="text-center container my-4"  >
 ';       
if(isset($row['Ruta_Escudo']))
{
  if($row['Ruta_Escudo']=="NA"){
    $formato.= '  <img   data-src="./img_defaults/feria_app_icon.png" class="lazy photo justify-content-center text-decoration-none rounded" alt="Logo Universidad"  style="width:100%;height:auto;" >  
    ';
  }else
  {
      $formato.= '  <img    data-src="'.$row['Ruta_Escudo'].'" class="lazy photo justify-content-center text-decoration-none rounded" alt="Logo Universidad"  style="width:100%;height:auto;" >  
    ';
  }
}else{
  $formato.= '   <img   data-src="./img_defaults/feria_app_icon.png" class="lazy photo justify-content-center text-decoration-none rounded" alt="Logo Universidad"  style="height:50px;" >  
    ';
}
if($row['Tipo']==0)
{
 $formato .= '  <span class="badge badge-pill badge-info h4 text-uppercase">Publica</span>';

}else{
 $formato .= '  <span class="badge badge-pill badge-info h4 text-uppercase">Privada</span>';

}         
$formato.='    
</div>
      
     
      </a>
    ';
      }
    
      $formato .= '   </div> ';
      //Escuchando el resultado de json
      echo json_encode($formato, JSON_UNESCAPED_UNICODE);
    } else {
      
      $formato="noData";
      echo  json_encode($formato, JSON_UNESCAPED_UNICODE);
    }
  }
  
  //funcion para regresar todas las universidades en un municipio con criterio de busqueda
  function ObtenerTodasLasUnisCtriterio($MID, $NUni)
  {
    $conexion = conexion10();
    $consulta = "SELECT `ubicacion`.`Municipio_ID`,`municipio`.`nombre`, `universidad`.* 
    FROM `ubicacion` 
    JOIN `municipio` ON `ubicacion`.`Municipio_ID` = `municipio`.`ID` 
    JOIN `universidad` ON `ubicacion`.`Universidad_ID` = `universidad`.`ID` 
    WHERE `municipio`.`ID`=$MID AND (`universidad`.`Estatus_ID`=3 OR `universidad`.`Estatus_ID`=2)
    AND `universidad`.`Nombre` LIKE '%$NUni%'";
    $result = mysqli_query($conexion, $consulta);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
      $formato = '  
    <div class="row align-items-center "> ';
      $I = 0;
      while ($row = mysqli_fetch_array($result)) {
       
        if ($I < 1) {
          
          $I++;
            $formato .= '
            ';
          }
        // Array temporal para crear una sola categoría
        $formato .= '
    
        <a class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 dr Uni" title="'.$row['Nombre'] .'" category="'.$row['Tipo'].'" href="DetallesUni.php?Uni=' . $row['ID'] . '&municipio=' . $MID . '" style="height:auto;width:100%;" >
       
          <div class="text-center container my-4"  >
      ';
      
 
          
   
      if(isset($row['Ruta_Escudo']))
      {
        if($row['Ruta_Escudo']=="NA"){
          $formato.= '  <img   data-src="./img_defaults/feria_app_icon.png" class="lazy photo justify-content-center text-decoration-none rounded" alt="Logo Universidad"  style="width:100%;height:auto;" >  
          ';
        }else
        {
            $formato.= '  <img    data-src="'. $row['Ruta_Escudo'].'" class="lazy photo justify-content-center text-decoration-none rounded" alt="Logo Universidad"  style="width:100%;height:auto;" >  
          ';
        }
      }else{
        $formato.= '   <img   data-src="./img_defaults/feria_app_icon.png" class="lazy photo justify-content-center text-decoration-none rounded" alt="Logo Universidad"  style="height:50px;" >  
          ';
      }

if($row['Tipo']==0)
{
 $formato .= '  <span class="badge badge-pill badge-info h4 text-uppercase">Publica</span>';

}else{
 $formato .= '  <span class="badge badge-pill badge-info h4 text-uppercase">Privada</span>';

}     
$formato.='   
</div>
   
      </a>
       
    ';
      }
      $formato .= '  </div> ';
      //Escuchando el resultado de json
      echo json_encode($formato, JSON_UNESCAPED_UNICODE);
    } else {
      $formato="noData";
      echo  json_encode($formato, JSON_UNESCAPED_UNICODE);
    }
  }


  $action = $_GET['actionid'];
  //switch de las acciones a realizar
  switch ($action) {
    case '1':
      if (isset($_GET['MunicipioId']) && !empty($_GET['MunicipioId'])) {
        $MunicipioId = $_GET['MunicipioId'];
        ObtenerTodasLasUnis($MunicipioId);

        exit;
      }
      break;
    case '2':
      if (
        isset($_GET['MunicipioId']) && !empty($_GET['MunicipioId'])  &&
        isset($_GET['NombreUni']) && !empty($_GET['NombreUni'])
      ) {
        $MunicipioId = $_GET['MunicipioId'];
        $NombreUni = $_GET['NombreUni'];
        ObtenerTodasLasUnisCtriterio($MunicipioId, $NombreUni);

        exit;
      }
      break;
  }
}
?>

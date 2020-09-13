<?php
  require('./conector.php');

  session_start();

  if (isset($_SESSION['username'])) {

    $con = new ConectorBD('localhost', 'usuariophp', 'R123456');
    
    //$response['conexion'] = $con->initConexion('agendaphp');

    if ($con->initConexion('agendaphp')=='OK') {
      
      $resultado = $con->consultar(['tblusuarios'], ['nombre', 'idusuario'], "WHERE email ='".$_SESSION['username']."'");
      $fila = $resultado->fetch_assoc();
      
      $response['nombre']=$fila['nombre'];

      $resultado = $con->getEventosUser($fila['idusuario']);
      $i=0;
      while ($fila = $resultado->fetch_assoc()) {
        $response['eventos'][$i]['title']=$fila['titulo'];
        $response['eventos'][$i]['start']=$fila['fechaini'].'T'.$response['eventos'][$i]['horaini']=$fila['horaini'];
        $response['eventos'][$i]['end']=$fila['fechafin'].'T'.$response['eventos'][$i]['horafin']=$fila['horafin'];
        $response['eventos'][$i]['allday']=$fila['todoeldia'];
        $i++;
      }
      $response['msg'] = "OK";

    }else {
      $response['msg'] = "No se pudo conectar a la Base de Datos";
    }
  }else {
    $response['msg'] = "No se ha iniciado una sesión";
  }
  
  
  echo json_encode($response);
 

 ?>

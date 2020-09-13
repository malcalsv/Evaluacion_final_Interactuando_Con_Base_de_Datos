<?php
   require('./conector.php');
  
  $con = new ConectorBD('localhost','usuariophp','R123456');

  $response['conexion'] = $con->initConexion('agendaphp');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['tblusuarios'],
    ['email', 'contrasena'], 'WHERE email="'.$_POST['username'].'" AND contrasena=md5("'.$_POST['password'].'")');

    if ($resultado_consulta->num_rows != 0) {
      $fila = $resultado_consulta->fetch_assoc();
      $response['acceso'] = 'concedido';
      session_start();
      $_SESSION['username']=$fila['email'];
    }else $response['acceso'] = 'rechazado';
  }

  $response['usuario'] = $fila['email'];
  

  echo json_encode($response);

  $con->cerrarConexion(); 
  

 ?>

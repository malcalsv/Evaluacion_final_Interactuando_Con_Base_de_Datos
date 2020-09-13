<?php
     require('./conector.php');

     session_start();
  
     if (isset($_SESSION['username'])) {
        
              $con = new ConectorBD('localhost', 'usuariophp', 'R123456');
  
             if ($con->initConexion('agendaphp')=='OK') 
             {
                      $data['fechaini'] = "'".$_POST["start_date"]."'";
                      $data['horaini'] = "'".$_POST["start_hour"]."'";
                      $data['fechafin'] = "'".$_POST["end_date"]."'";
                      $data['horafin'] = "'".$_POST["end_hour"]."'"; 
                      if ($con->actualizarRegistro('tbleventos', $data,'idevento =1')) {
                        $response["msg"] = 'OK';
                      }
                      $con->cerrarConexion();
             }     
             else{
               $response["msg"] = 'Error: en la conexion de la BD';
             }     
     }
     else
     {
      $response['msg'] = "Error la sesion ha caducado";
     }
     echo json_encode($response);
   



 ?>

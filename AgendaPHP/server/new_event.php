<?php
   require('./conector.php');

   session_start();

   if (isset($_SESSION['username'])) {
      
            $con = new ConectorBD('localhost', 'usuariophp', 'R123456');

           if ($con->initConexion('agendaphp')=='OK') 
           {
               
                $resultado = $con->consultar(['tblusuarios'], ['idusuario'], "WHERE email ='".$_SESSION['username']."'");
                if ($resultado->num_rows != 0) 
                {

                    $fila = $resultado->fetch_assoc();
                    
                    $data['idusuario'] = $fila['idusuario'];
                    $data['titulo'] = "'".$_POST["titulo"]."'";
                    $data['fechaini'] = "'".$_POST["start_date"]."'";
                    $data['horaini'] = "'".$_POST["start_hour"]."'";
                    $data['fechafin'] = "'".$_POST["end_date"]."'";
                    $data['horafin'] = "'".$_POST["end_hour"]."'";
                    $data['todoeldia'] = $_POST["allDay"];

                    if ($con->insertData('tbleventos', $data)) {
                      $response["msg"]='OK';
                    }
                }
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

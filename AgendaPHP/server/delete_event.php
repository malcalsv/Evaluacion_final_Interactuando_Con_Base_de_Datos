<?php
    require('./conector.php');

    session_start();

    if (isset($_SESSION['username'])) {

        if (isset($_POST['id'])){
            $con = new ConectorBD('localhost', 'usuariophp', 'R123456');

            if ($con->initConexion('agendaphp')=='OK') 
            {
                if($con->eliminarRegistro('tbleventos','idevento = "'.$_POST['id'].'"'))
                {
                    $response["msg"] = 'OK';
                }
            }
            else{
                $response["msg"] = 'conexion no establecida';
            }
        }
    }
    else
    {
        $response["msg"] =  'Sesion Caducada';
    }

    echo json_encode($response);

 ?>

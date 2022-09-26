<?php
  require_once "models/Tablas1.php";

  switch ($_SERVER['REQUEST_METHOD']){
    case 'POST':
      $datos = json_decode(file_get_contents('php://input'));
      if($datos != null){
        if(Tablas1::create($datos->descripcion, $datos->nombres, $datos->apellidos)){
          http_response_code(200);
        }
      }
      break;
    default:
      break;
  }
?>
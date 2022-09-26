<?php
  require_once "models/Tablas2.php";

  switch ($_SERVER['REQUEST_METHOD']){
    case 'POST':
      $datos = json_decode(file_get_contents('php://input'));
      if($datos != null){
        if(Tablas2::create(
            $datos->tabla1_id, 
            $datos->descripcion, 
            $datos->titulo,
            $datos->horario,
            $datos->fecha,
            $datos->unidades,
            $datos->precio,
            $datos->email
          )
        ){
          http_response_code(200);
        }
      }
      break;
    default:
      break;
  }
?>
<?php
  require_once "models/Tablas2.php";

  switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
      echo json_encode(Tablas2::getAll());
      break;
    
    default:
      break;
  }
?>
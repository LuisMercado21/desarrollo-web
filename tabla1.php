<?php
  require_once "models/Tablas1.php";

  switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
      echo json_encode(Tablas1::getAll());
      break;
    
    default:
      break;
  }
?>
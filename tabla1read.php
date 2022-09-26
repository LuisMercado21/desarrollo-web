<?php
  require_once "models/Tablas1.php";

  switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
      if(isset($_GET['id'])){
        echo json_encode(Tablas1::getById($_GET['id']));
      }
      break;
    default:
      break;
  }
?>
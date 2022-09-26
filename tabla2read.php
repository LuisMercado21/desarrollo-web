<?php
  require_once "models/Tablas2.php";

  switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
      if(isset($_GET['id'])){
        echo json_encode(Tablas2::getById($_GET['id']));
      }
      break;
    default:
      break;
  }
?>
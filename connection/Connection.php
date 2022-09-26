<?php
  class Connection extends Mysqli {
    function __construct()
    {
      parent::__construct('localhost', 'root', "", "usuarios");
      $this->set_charset('utf8');
      $this->connect_error == null ? 'Conexión exitosa a la DB' : die('Error interno');
    }
  }
?>
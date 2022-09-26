<?php
  require_once "connection/Connection.php";

  class Tablas2 {
    public static function getAll(){
      $db = new Connection();
      $query = "SELECT * FROM tabla2";
      $resultado = $db->query($query);
      $datos = [];
      if($resultado->num_rows){
        while($row = $resultado->fetch_assoc()) {
          $tabla1_id = $row['tabla1_id'];
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          $datos[] = [
            'id' => $row['id'],
            'fk_id' => $row['tabla1_id'],
            'descripcion' => $row['descripcion'],
            'titulo' => $row['titulo'],
            'horario' => $row['horario'],
            'fecha' => $row['fecha'],
            'unidades' => $row['unidades'],
            'precio' => $row['precio'],
            'email' => $row['email'],
            'data_fk' => [
              'id' => $row2['id'],
              'descripcion' => $row2['descripcion'],
              'nombres' => $row2['nombres'],
              'apellidos' => $row2['apellidos']
            ]
          ];
        }
        return $datos;
      }
      return $datos;
    }

    public static function getById($id){
      $db = new Connection();
      $query = "SELECT * FROM tabla2 WHERE id = $id";
      $resultado = $db->query($query);
      $datos = [];
      if($resultado->num_rows){
        while($row = $resultado->fetch_assoc()) {
          $tabla1_id = $row['tabla1_id'];
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          $datos[] = [
            'id' => $row['id'],
            'fk_id' => $row['tabla1_id'],
            'descripcion' => $row['descripcion'],
            'titulo' => $row['titulo'],
            'horario' => $row['horario'],
            'fecha' => $row['fecha'],
            'unidades' => $row['unidades'],
            'precio' => $row['precio'],
            'email' => $row['email'],
            'data_fk' => [
              'id' => $row2['id'],
              'descripcion' => $row2['descripcion'],
              'nombres' => $row2['nombres'],
              'apellidos' => $row2['apellidos']
            ]
          ];
        }
        return $datos;
      }
      return $datos;
    }

    public static function create($tabla1_id, $descripcion, $titulo, $horario, $fecha, $unidades, $precio, $email){
      $db = new Connection();
      $query = "INSERT INTO tabla2 (tabla1_id, descripcion, titulo, horario, fecha, unidades, precio, email)
      VALUES ($tabla1_id, '".$descripcion."', '".$titulo."', '".$horario."', '".$fecha."', $unidades, $precio, '".$email."')";
      $db->query($query);
      if($db->affected_rows){ 
        $query2 = "SELECT * FROM tabla2 ORDER BY id DESC LIMIT 1";
        $res = $db->query($query2);
        $datos = [];
        if($res->num_rows){
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          while($row = $res->fetch_assoc()) {
            $datos[] = [
              'id' => $row['id'],
              'fk_id' => $row['tabla1_id'],
              'descripcion' => $row['descripcion'],
              'titulo' => $row['titulo'],
              'horario' => $row['horario'],
              'fecha' => $row['fecha'],
              'unidades' => $row['unidades'],
              'precio' => $row['precio'],
              'email' => $row['email'],
              'data_fk' => [
                'id' => $row2['id'],
                'descripcion' => $row2['descripcion'],
                'nombres' => $row2['nombres'],
                'apellidos' => $row2['apellidos']
              ]
            ];
          }
          echo json_encode($datos);
        }
        //echo file_get_contents('php://input'); //Esta es la respuesta pero no muestra el ID
      } else {
        return FALSE;
      }
    }

    public static function update($id_registro, $descripcion, $titulo, $horario, $fecha, $unidades, $precio, $email){
      $db = new Connection();
      $query = "UPDATE tabla2 SET
      descripcion = '".$descripcion."', titulo = '".$titulo."', horario = '".$horario."', fecha = '".$fecha."', unidades = $unidades, precio = $precio, email = '".$email."'
      WHERE id=$id_registro";
      $query2 = "SELECT * FROM tabla2 WHERE id = $id_registro";
      $db->query($query);
      if($db->affected_rows){
        $res = $db->query($query2);
        $datos = [];
        if($res->num_rows){
          while($row = $res->fetch_assoc()) {
            $tabla1_id = $row['tabla1_id'];
            $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
            $res2 = $db->query($query3);
            $row2 = $res2->fetch_assoc();
            $datos[] = [
              'mensaje' => 'Registro actualizado satisfactoriamente',
              'data' => [
                'id' => $row['id'],
                'fk_id' => $row['tabla1_id'],
                'descripcion' => $row['descripcion'],
                'titulo' => $row['titulo'],
                'horario' => $row['horario'],
                'fecha' => $row['fecha'],
                'unidades' => $row['unidades'],
                'precio' => $row['precio'],
                'email' => $row['email'],
                'data_fk' => [
                  'id' => $row2['id'],
                  'descripcion' => $row2['descripcion'],
                  'nombres' => $row2['nombres'],
                  'apellidos' => $row2['apellidos']
                ]
              ]
            ];
          }
        }
        echo json_encode($datos);
      }
      
    }

    public static function delete($id){
      $db = new Connection();
      $query = "SELECT * FROM tabla2 WHERE id = $id";
      $query2 = "DELETE FROM tabla2 WHERE id = $id";
  
      $res = $db->query($query);
      $datos = [];
      if($res->num_rows){
        while($row = $res->fetch_assoc()) {
          $tabla1_id = $row['tabla1_id'];
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          $datos[] = [
            'mensaje' => 'Registro eliminado satisfactoriamente',
            'data' => [
              'id' => $row['id'],
              'fk_id' => $row['tabla1_id'],
              'descripcion' => $row['descripcion'],
              'titulo' => $row['titulo'],
              'horario' => $row['horario'],
              'fecha' => $row['fecha'],
              'unidades' => $row['unidades'],
              'precio' => $row['precio'],
              'email' => $row['email'],
              'data_fk' => [
                'id' => $row2['id'],
                'descripcion' => $row2['descripcion'],
                'nombres' => $row2['nombres'],
                'apellidos' => $row2['apellidos']
              ]
            ]
          ];
        }
        
        $db->query($query2);
        if($db->affected_rows){
          echo json_encode($datos);
        }
      }
    }
  }
  
?>
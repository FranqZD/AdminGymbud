<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Usuarios</title>
  <style>

    .btn-group a {
  margin-right: 10px;
}

    </style>
</head>
<body>
  <h1>Listado de Usuarios</h1>

  <table class="table table-striped">
    <tr>
      <th>UID</th>
      <th>User</th>
      <th>Mail</th>
      <th>Role</th>
      <th>Options</th>
    </tr>
    <?php
      // Aquí iría tu código PHP para obtener los usuarios de la query
      // Supongamos que los usuarios se almacenan en un array llamado $usuarios
      require_once("Connection.php");
      require_once("bootstrap.html");

      $query = "SELECT UID,User,Mail,Role FROM user";
      $result = mysqli_query($link,$query);
      $datos = array();
      if ($result) {
          while($row = $result->fetch_array()){
              $UID = $row['UID'];
              $User = $row['User'];
              $Mail = $row['Mail'];
              $Role = $row['Role'];

              $datos[] = array ('UID' => $UID,'User' => $User, 'Mail' => $Mail, 'Role' => $Role);
          }
        }else{
          echo "Error";
        }


      foreach ($datos as $dato) {
        echo "<tr>";
        echo "<td>" . $dato['UID'] . "</td>";
        echo "<td>" . $dato['User'] . "</td>";
        echo "<td>" . $dato['Mail'] . "</td>";
        echo "<td>" . $dato['Role'] . "</td>";
        echo "<td>";
        //echo "<div class='btn-group' role='group' aria-label='Basic example'>";
        echo "<a href='EditarUsuario.php?id=" . $dato['UID'] . "' class='btn btn-info'>Editar</a>";
        if($dato['Role'] < 0){
          echo "<a href='ActivarUsuario.php.php?id=" . $dato['UID'] . "' class='btn btn-success'>Activar</a>";
        }else{
        echo "<a href='DesactivarUsuario.php?id=" . $dato['UID'] . "' class='btn btn-danger'>Desactivar</a>";
        }
        //echo "</div>";        
        echo "</td>";
        echo "</tr>";
      }
    ?>
  </table>
</body>
</html>

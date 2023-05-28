<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Usuario</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col text-right">
        <a href="UserList.php" class="btn btn-secondary">Regresar</a>
      </div>
    </div>
    <h1>Editar Usuario</h1>
    <?php
      // Aquí iría tu código PHP para obtener los usuarios de la query
      // Supongamos que los usuarios se almacenan en un array llamado $usuarios
      require_once("Connection.php");
      require_once("bootstrap.html");
      $Code = $_GET['Code'];

      $query = "SELECT UID, User, Mail, Role FROM user WHERE Password = '" . $Code . "'";
      $result = mysqli_query($link,$query);
      $datos = array();
      if ($result) {
          while($row = $result->fetch_array()){
              $UID = $row['UID'];
              $User = $row['User'];
              $Mail = $row['Mail'];
              $datos = array ('UID' => $UID,'User' => $User, 'Mail' => $Mail, 'Role' => $Role);
          }
        }else{
          echo "Error";
        }
    ?>
    <form action="UserUpdate.php" method="post">
      <div class="form-group">
        <label for="uid">UID</label>
        <input type="text" class="form-control" id="uid" name="uid" placeholder="UID del usuario" value="<?php echo $datos['UID']; ?>">
      </div>
      <div class="form-group">
        <label for="user">User</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" value="<?php echo $datos['User']; ?>">
      </div>
      <div class="form-group">
        <label for="mail">Mail</label>
        <input type="email" class="form-control" id="mail" name="mail" placeholder="Correo electrónico" value="<?php echo $datos['Mail']; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <input type="hidden" name="code" value="<?php echo $Code; ?>">
    </form>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

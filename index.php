<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practicando consulta sql</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<center><h1>Practicando conexion y consultas</h1></center>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4">
    <h2>Ingreso de datos</h2>
    <form action="index.php" method="post">
    <label for="id">Doc:</label>
    <input type="text" class="form-control" name="id" id="id" placeholder="Documento"><br><br>
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"><br><br>
    <label for="apellido">Apellido:</label>
    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido"><br><br>
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"><br><br>
    <label for="direccion">Direccion:</label>
    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"><br><br>
    <label for="usuario">Usuario:</label>
    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Direccion"><br><br>
    <label for="correo">Correo:</label>
    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo"><br><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña"><br><br>
    <label for="contraseña2">Confirmar Contraseña:</label>
    <input type="password" class="form-control" name="contraseña2" id="contraseña2" placeholder="Contraseña"><br><br>
    <input type="submit" class="btn btn-warning" value="Ingresar" name="btningresar"><br>
    </form>
    <?php 
    if (isset($_POST['btningresar'])) {
        $_id = $_POST['id'];
        $_nombre = $_POST['nombre'];
        $_apellido = $_POST['apellido'];
        $_telefono = $_POST['telefono'];
        $_direccion = $_POST['direccion'];
        $_usuario = $_POST['usuario'];
        $_correo = $_POST['correo'];
        $_contraseña = $_POST['contraseña'];
        $_contraseña2 = $_POST['contraseña2'];

        if ($_contraseña === $_contraseña2) {
            
            include("./clases/conexionOpen.php");
            $conexion->query("INSERT INTO $tb1(usuario, pass, email) VALUES('$_usuario','$_contraseña','$_correo')");
            $conexion->query("INSERT INTO $tb2(id, nombre, apellido, telefono, direccion, usuario) 
            VALUES('$_id','$_nombre','$_apellido','$_telefono','$_direccion','$_usuario')");
            include("./clases/conexionClose.php");
            echo "Datos ingresados correctamente";

        } else {
            echo "Las contraseñas no coinciden";
        }
        
    }
    ?>

  </div>
  <div class="col-md-1"></div>
  <div class="col-md-3">
  <h2>Consulta de datos</h2>
    <form action="index.php" method="post">
    <label for="id">ID:</label>
    <input type="search" class="form-control" name="id" id="id" placeholder="ID a Buscar"><br>
    <input type="submit" class="btn btn-info" value="Buscar" name="btnbuscar">
    </form><br><br><br>

        <?php 
            if (isset($_POST['btnbuscar'])) {
                
                $_id = $_POST['id'];
                include("./clases/conexionOpen.php");
                    $resultados = mysqli_query($conexion, ("SELECT * FROM $tb2 WHERE id = $_id"));
                    while ($consulta = mysqli_fetch_array($resultados)) {
                        echo "
                        <table width=\"100%\" class=\"table\">
                        <tr>
                             <td>
                             <center>
                            <b>
                                ID
                            </b>
                            </center>
                             </td>
                             <td>
                               <center>
                                <b>
                                   Nombre
                               </b>
                                </center>
                             </td>
                             <td>
                               <center>
                                <b>
                                   Apellido
                               </b>
                                </center>
                              </td>
                             <td>
                               <center>
                                <b>
                                   Telefono
                               </b>
                                </center>
                             </td>
                             <td>
                               <center>
                                <b>
                                   Direccion
                               </b>
                                </center>
                             </td>
                             <td>
                               <center>
                                <b>
                                    Usuario
                                </b>
                                </center>
                             </td>
                             <td>
                               <center>
                                <b>
                                    Correo
                                </b>
                                </center>
                             </td>
                        </tr>
                        <tr>
                            <td>".$consulta['id'] ."</td>
                            <td>".$consulta['nombre'] ."</td>
                            <td>".$consulta['apellido'] ."</td>
                            <td>".$consulta['telefono'] ."</td>
                            <td>".$consulta['direccion'] ."</td>
                            <td>".$consulta['usuario'] ."</td>
                        </tr>
                        </table>
                        
                            ";
                    }
                include("./clases/conexionClose.php");
            }
        ?>
  </div>
</div>
</body>
</html>
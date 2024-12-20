<!--Pagina de profesores-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
    </script>
</head>
<body>
    <!--cabecera-->
    <header>
        <div class="container">
            <h1>Gestión de unidad educativa</h1>
        </div>
    </header>
    <!--botones para acceder a las demas paginas-->
    <div class="Btninicio">
      <div class="inf" ><a href="index.html">Inicio</a></div>
    </div>
    <div class="Btnprofesores" href="profesores.html">
      <div class="inf"><a href="profesores.php">Profesores</a></div>
    </div>
    <div class="Btnestudiantes" href="estudiantes.html">
      <div class="inf"><a href="estudiantes.php">Estudiantes</a></div>
    </div>
    <!--contenedor donde podra agregar a los estudiantes-->
    <div class="container">
        <div class="content">
            <h2>Agregar estudiante:</h2>
            <form action="conexion_estudiante.php" method="post">
                 <label>Cedula:</label><br>
                 <input type="text" name="id"><br>
                <label>Nombre:</label><br>
                <input type="text" name="nombre"><br>
                <label>Apellido:</label><br>
                <input type="text" name="apellido"><br>
                <label>Curso:</label><br>
                <input type="text" name="curso"><br>
                <label>Edad:</label><br>
                <input type="number" name="edad"><br><br>
                <input type="submit" class="btn"name="create" value="Registrar estudiante">
            </form>
        </div>
         <!--contenedor donde se podra consultar informacion de los estudiantes-->
        <div class="content">
            <h2>Lista de Estudiantes</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cusro</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <!--codigo php para poder  reflejar los datos de los estudiantes-->
            <?php
            include 'conexion_estudiante.php';
            if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["apellido"]."</td>
                <td>".$row["curso"]."</td>
                <td>".$row["edad"]."</td>
                <td>
                    <form style='display:inline;' action='conexion_estudiante.php' method='post'>
                        <input type='hidden' name='id' value='".$row["id"]."'>
                        <input type='submit' name='delete' value='eliminar' class='btn'>
                    </form>
                    <form style='display:inline;' action='conexion_estudiante.php' method='post'>
                        <input type='hidden' name='id' value='".$row["id"]."'>
                        <input type='hidden' name='nombre' value='".$row["nombre"]."'>
                        <input type='hidden' name='apellido' value='".$row["apellido"]."'>
                        <input type='hidden' name='titulo' value='".$row["curso"]."'>
                        <input type='hidden' name='edad' value='".$row["edad"]."'>
                    </form>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay estudiantes registrados</td></tr>";
    }
    ?>
            </tbody>
        </table>
        </div>
        <!--contenedor donde se podra actualizar a los estudiantes-->
        <div class="content">
            <h2>Editar informacion de estudiante</h2>
            <form action="conexion_estudiante.php" method="post">
                <b><label >Ingrese la cedula del estudiante que quiere actualizar sus datos:</label><br></b>
                <label >Cedula</label><br>
                <input type="text" name="id" value=""><br>
                <b><label >Ingrese los nuevos datos:</label><br></b>
                <label>Nombre</label><br>
                <input type="text" name="nombre" value=""><br>
                <label>Apellido</label><br>
                <input type="text" name="apellido" value=""><br>
                <label>Curso</label><br>
                <input type="text" name="curso" value=""><br>
                <label>Edad</label><br>
                <input type="number" name="edad" value=""><br><br>
                <input type="submit" class="btn"name="update" value="Actualizar estudiante">
            </form>
        </div>
    </div>
</body>
</html>

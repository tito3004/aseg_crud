<?php
//datos necesarios para la conexion de base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edu";
// declaramos la conexion a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
//en caso de que haya un error alertar 
if ($conn->connect_error) {
    die("Conexión fallida:". $conn->connect_error);
}
//inserta datos si detecta que el usuario ha enviado datos en el formulario de ingresar  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $curso = $_POST['curso'];
        $edad = $_POST['edad'];

        if (!empty($nombre) && !empty($apellido) && !empty($curso) && !empty($edad)) {
            $sql = "INSERT INTO estudiantes (id,nombre, apellido, curso, edad) VALUES ('$id','$nombre', '$apellido', '$curso', '$edad')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Los datos se han enviado correctamente');</script>";
                echo "<script>window.location.href = 'estudiantes.php';</script>";
            } 
            else {
                echo "<script>alert(Ha ocurrido un error);</script>";
            }
            } else {
            echo "<script>alert(Existen campos vacios );</script>";
        }
    }
    //actualiza datos si detecta que el usuario ha enviado datos en el formulario de actualizar  
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $curso = $_POST['curso'];
        $edad = $_POST['edad'];

        if (!empty($id) && !empty($nombre) && !empty($apellido) && !empty($curso) && !empty($edad)) {
            $sql = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', curso='$curso', edad='$edad' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Los datos se han actualizado correctamente');</script>";
                echo "<script>window.location.href = 'estudaintes.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Todos los campos son obligatorios');</script>";
            echo "<script>window.location.href = 'estudiantes.php';</script>";
        }
    }
    //elimina datos en el caso que el usuario pulse el boton de eliminar
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        if (!empty($id)) {
            $sql = "DELETE FROM estudiantes WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Se ha borrado con exito al estudiante');</script>";
                echo "<script>window.location.href = 'estudiantes.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('La cedula de estudiante es obligatorio');</script>";
            echo "<script>window.location.href = 'estudiantes.php';</script>";
        }
    }
}

$sql = "SELECT * FROM estudiantes";
$result = $conn->query($sql);
?>


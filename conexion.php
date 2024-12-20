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
        $titulo = $_POST['titulo'];
        $edad = $_POST['edad'];

        if (!empty($nombre) && !empty($apellido) && !empty($titulo) && !empty($edad)) {
            $sql = "INSERT INTO profesores (id,nombre, apellido, titulo, edad) VALUES ('$id','$nombre', '$apellido', '$titulo', '$edad')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Los datos se han enviado correctamente');</script>";
                echo "<script>window.location.href = 'profesores.php';</script>";
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
        $titulo = $_POST['titulo'];
        $edad = $_POST['edad'];

        if (!empty($id) && !empty($nombre) && !empty($apellido) && !empty($titulo) && !empty($edad)) {
            $sql = "UPDATE profesores SET nombre='$nombre', apellido='$apellido', titulo='$titulo', edad='$edad' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Los datos se han actualizado correctamente');</script>";
                echo "<script>window.location.href = 'profesores.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Todos los campos son obligatorios');</script>";
            echo "<script>window.location.href = 'profesores.php';</script>";
        }
    }
    //elimina datos en el caso que el usuario pulse el boton de eliminar
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        if (!empty($id)) {
            $sql = "DELETE FROM profesores WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Se ha borrado con exito al profesor');</script>";
                echo "<script>window.location.href = 'profesores.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('la cedula del profesor es obligatoria');</script>";
            echo "<script>window.location.href = 'profesores.php';</script>";
        }
    }
}
$sql = "SELECT * FROM profesores";
$result = $conn->query($sql);
?>


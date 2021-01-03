<?php
    include("db.php");

    if(isset($_POST['guardar_usr'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $cv = $_POST['CV'];

        $query = "INSERT INTO usuarios(nombre,correo,CV) VALUES('$nombre','$correo','$cv')";

        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Error en query");
        }else{
            $_SESSION['mensaje'] = "Usuario registrado";
            $_SESSION['color'] = "success";
            header("Location: index.php");
        }
    }
?>
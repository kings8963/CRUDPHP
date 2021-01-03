<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Fallo al eliminar");
    }else{
        $_SESSION['mensaje'] = "Usuario eliminado";
        $_SESSION['color'] = "danger";

        header("Location: index.php");
    }


}else{
    echo "Id incorrecto";
}

?>
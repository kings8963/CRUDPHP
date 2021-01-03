<?php
    //Biblioteca de conexion
    /*
        primer parametro = direccion a en donde se encuentra la BD
        segundo parametro = usuarioen nuestro servidor
        tercer parametro = contraseña de usuario
        cuarto parametro= nomre de la base de datos. 
    */

    session_start();
   $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
 );
    if(isset($conn))
    {
        echo "<script> console.log('Conectado a BD'); </script>";
    }
    else{
        echo "<script> console.log('Sin conexion a BD'); </script>";
    }

?>
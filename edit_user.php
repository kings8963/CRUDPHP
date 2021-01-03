<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);

            $nombre = $row['nombre'];
            $correo = $row['correo'];
            $cv = $row['CV'];
        }

    }

    if(isset($_POST['edit_usr'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $cv = $_POST['CV'];

        $query = "UPDATE usuarios set nombre = '$nombre', correo = '$correo', cv = '$cv' WHERE id = $id";
        mysqli_query($conn,$query);

        $_SESSION['mensaje'] = "Usuario actualizado";
        $_SESSION['color'] = "warning";

        header("Location: index.php");
    }

?>

<?php
    include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" value=<?php echo$nombre; ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" class="form-control" value=<?php echo$correo; ?>>
                    </div>
                    <div class="form-group">
                        <textarea type="text" rows="10" name="CV" class="form-control"> <?php echo $cv ?> </textarea>
                    </div>

                    <input type="submit" value="Editar usuario" name="edit_usr" class="btn btn-success btn-block">

                </form>
            </div>
        </div>
    </div>
</div>



<?php
    include("includes/footer.php");
?>
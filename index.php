<?php
    include("db.php");
?>

<?php
    include("includes/header.php");
?>

<?php
    include("includes/navigation.php");
?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-4 mt-4">

        <?php
            if(isset($_SESSION['mensaje'])){?>
            
            <div class="alert alert-<?php print $_SESSION['color'];?> alert-dismissible fade show" role="alert">
        
                <?php echo $_SESSION['mensaje']; ?>    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            
        <?php 
        session_unset();  
         }
        ?>
            <div class="card card-body">
                <form action="save_user.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form_control" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <input type="text" name="correo" class="form_control" placeholder="Correo">
                    </div>

                    <div class="form-group">
                        <textarea type="text" rows="10" name="CV" class="form_control" placeholder="Curriculum"></textarea>
                    </div>
                    <input type="submit" value="Guardar Usuario" name="guardar_usr" class="btn btn-success btn-block">

                </form>
            </div>

        </div>

        <div class="col-md-8 mt-4 table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Curriculum</th>
                            <th>Fecha de creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query = "SELECT * FROM usuarios";
                        $result = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result)){?>
                            <tr>
                                <td><?php echo $row['nombre'];?> </td>
                                <td><?php echo $row['correo'];?> </td>
                                <td><?php echo $row['CV'];?> </td>
                                <td><?php echo $row['fecha_creacion'];?> </td>

                                <td>
                                    <a href="edit_user.php?id=<?php echo $row['id']; ?> " class="btn btn-warning btn-block"><i class="fad fa-edit"></i>Edit</a>
                                    <a href="delete_user.php?id=<?php echo $row['id'];?> " class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i>Delete</a>
                                </td>

                            </tr>
                       <?php } ?>
                        
                    </tbody>
                </table>
        </div>
    </div>

</div>













<?php
    include("includes/footer.php");
?>

      

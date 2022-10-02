<?php  

    // Connect to Database
    require '../../includes/config/database.php';
    $db = conectDb();

    // Consulting DB
    $query = "SELECT * FROM asegurados";
    $result = mysqli_query($db, $query);

    // Muestra mensaje condicional
    $resultado = $_GET['prot'] ?? null;





    // Adding Templates
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor database-asegurados">
    
    <h1>Base de Datos de Asegurados</h1>


    <section class="contenedor-botones">
        <div >
            <a href="../"  class="boton-azul"> Volver</a>
        </div>
        
        <?php if(intval($resultado) === 1) :?>
            <p class="alerta exito">Asegurado Agregado Correctamente</p>
        <?php elseif(intval($resultado) === 2) : ?>
            <p class="alerta exito">Actualizado Correctamente</p>
        <?php elseif(intval($resultado) === 3) : ?>
            <p class="alerta exito">Asegurado ELiminado</p>
        <?php endif ;?>
    
        <div >
            <a href="add.php" class="boton-azul">Agregar</a>
        </div>

    </section>

    <table class="asegurados">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Cedula</th>
                <th>Telefono</th>
            </tr>
        </thead>

        <tbody>
            <?php while($asegurado = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $asegurado['id']?></td>
                <td><?php echo $asegurado['nombres'] . ' ' .$asegurado['apellidos']?></td>
                <td><?php echo $asegurado['fechaNacimiento']?></td>
                <td><?php echo $asegurado['cedula']?></td>
                <td><?php echo $asegurado['telefono']?></td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</main>

<?php  
    // // Close DataBase Connection
    // mysqli_close($db);

    incluirTemplate('footer');

?>
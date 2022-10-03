<?php  

    // Connect to Database
    require '../../includes/config/database.php';
    $db = conectDb();

    // Consulting DB
    $query = "SELECT * FROM asegurados";
    $result = mysqli_query($db, $query);

    // Muestra mensaje condicional
    $resultado = $_GET['prot'] ?? null;

    // CODE FOR ELIMINATE 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            // LETS DELETE ASEGURADO
            $query = "DELETE FROM asegurados WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('location: /admin/asegurados/listaAsegurados.php?prot=3');
            }
        }
    }



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
                <th><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                </svg>
</th>
            </tr>
        </thead>

        <tbody>
            <?php while($asegurado = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $asegurado['id']?></td>
                <td><?php echo $asegurado['apellidos'] . ' ' .$asegurado['nombres']?></td>
                <td><?php echo $asegurado['fechaNacimiento']?></td>
                <td>V-<?php echo $asegurado['cedula']?></td>
                <td><?php echo $asegurado['telefono']?></td>
                <td>
                <a href="update.php?id=<?php echo $asegurado['id']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                    </svg>
                </a>

                <form method="POST" class="">
                    <!-- <a href=""> -->
                       
                        <input type="hidden" name='id' value="<?php echo $asegurado['id']?>">
                        <button type="submit" class="boton-erase">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 img-boton">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        </button>
                    <!-- </a> -->
                </form>


                </td>
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
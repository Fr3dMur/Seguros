<?php  

    // Connect to Database
    require '../../includes/config/database.php';
    $db = conectDb();

    // Request to Database
    $request = "SELECT * FROM asegurados";
    $result = mysqli_query($db, $request);

    // Array to Errors
    $errors = [];

    // Database cells
    $names = '';
    $names2 = '';
    $birthDate = '';
    $dni = '';
    $phone = '';

    // When User Write on Form
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $names = mysqli_real_escape_string($db, $_POST['names']);
        $names2 = mysqli_real_escape_string($db, $_POST['names2']);
        $birthDate = mysqli_real_escape_string($db, $_POST['birthDate']);
        $dni = mysqli_real_escape_string($db, $_POST['dni']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);

        // Check that every camp is full
        if(!$names){
            $errors[] = "Los nombres son requeridos";
        }
        if(!$names2){
            $errors[] = "Agrega los apellidos";
        }
        if(!$birthDate){
            $errors[] = "La fecha de nacimiento es Obligatoria";
        }
        if(!$dni){
            $errors[] = "La Cedula es Obligatoria";
        }
        if(empty($errors)){
            //Writing the Query
            $query = "INSERT INTO asegurados (nombres, apellidos, fechaNacimiento, cedula, telefono) VALUES ('$names', '$names2', '$birthDate', '$dni', '$phone')";

            // echo $query;
            // exit;

            //Upload to DB
            $result = mysqli_query($db, $query);

            if($result){
                header('Location: /admin/asegurados/listaAsegurados.php?prot=1');
            };

            
        }
    };

    // echo '<pre>';
    //     var_dump($_SERVER['REQUEST_METHOD']);
    // echo '</pre>';

    // echo '<pre>';
    //     var_dump($_POST);
    // echo '</pre>';

    
    // Adding Templates
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor w-1000">

    <h1>Agregar Asegurados</h1>

    <div>
        <a href="listaAsegurados.php" class="boton-azul" > Volver</a>
    </div>
    
    <form action="add.php" class="contenedor-logIn w-1000 contenedor" method="POST" enctype="multipart/form-data" >

          <!-- IMPRIMIR ERRORES    -->
        <?php foreach($errors as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>

        <fieldset class="formulario">
            <legend>Agregar Asegurado</legend>

            <label for="name">Nombres</label>
            <input type="text" id="name" placeholder="Escribe los Nombres" name="names">

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" placeholder="Escribe los Apellidos" name="names2">
            
            <label for="birthDate">Fecha de Nacimiento</label>
            <input type="date" id="birthDate" placeholder="Fecha de Nacimiento" name="birthDate">

            <label for="dni">Cedula</label>
            <input type="number" id="dni" placeholder="Escribe tu Cedula" name="dni">

            <label for="phone">Telefono</label>
            <input type="number" id="phone" placeholder="Numero de Telefono" name="phone">


        </fieldset>

        <input type="submit" class=" boton-azul" value="Enviar">
    </form>
</main>

<?php  
    // // Close DataBase Connection
    // mysqli_close($db);

    incluirTemplate('footer');

?>
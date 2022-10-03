<?php  
    // Validate ID to URL
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    // Re Locate user if id isnt a INT
    if(!$id){
        header('Location: /admin/asegurados/listaAsegurados.php');
    }

    // Connect to Database
    require '../../includes/config/database.php';
    $db = conectDb();

    // Request to Database
    $request = "SELECT * FROM asegurados WHERE id = ${id}";
    $result = mysqli_query($db, $request);
    $asegurado = mysqli_fetch_assoc($result);

    // Array to Errors
    $errors = [];


    // Database cells
    $names = $asegurado['nombres'];
    $names2 = $asegurado['apellidos'];
    $birthDate = $asegurado['fechaNacimiento'];
    $dni = $asegurado['cedula'];
    $phone = $asegurado['telefono'];

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
            $query = "UPDATE asegurados SET nombres = '${names}', apellidos = '${names2}', fechaNacimiento = '${birthDate}', cedula = '${dni}', telefono = '${phone}' WHERE id = ${id}";

            // echo $query;
            // exit;

            //Upload to DB
            $result = mysqli_query($db, $query);

            if($result){
                header('Location: /admin/asegurados/listaAsegurados.php?prot=2');
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

    <h1>Actualizar Asegurados</h1>

    <div>
        <a href="listaAsegurados.php" class="boton-azul" > Volver</a>
    </div>
    
    <form class="contenedor-logIn w-1000 contenedor" method="POST" enctype="multipart/form-data" >

          <!-- IMPRIMIR ERRORES    -->
        <?php foreach($errors as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>

        <fieldset class="formulario">
            <legend>Cambia los datos que necesites</legend>

            <label for="name">Nombres</label>
            <input type="text" id="name" placeholder="Escribe los Nombres" name="names" value="<?php echo $names;?>">

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" placeholder="Escribe los Apellidos" name="names2" value="<?php echo $names2;?>">
            
            <label for="birthDate">Fecha de Nacimiento</label>
            <input type="date" id="birthDate" placeholder="Fecha de Nacimiento" name="birthDate" value="<?php echo $birthDate;?>">

            <label for="dni">Cedula</label>
            <input type="number" id="dni" placeholder="Escribe tu Cedula" name="dni" value="<?php echo $dni;?>">

            <label for="phone">Telefono</label>
            <input type="number" id="phone" placeholder="Numero de Telefono" name="phone" value="<?php echo $phone;?>">


        </fieldset>

        <input type="submit" class=" boton-azul" value="Actualizar">
    </form>
</main>

<?php  
    // // Close DataBase Connection
    // mysqli_close($db);

    incluirTemplate('footer');

?>
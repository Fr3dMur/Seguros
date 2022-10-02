<?php  
    require '../includes/funciones.php';
    incluirTemplate('header');

?>

<main>


    <form action="" class="contenedor-logIn w-1000 contenedor">
        <fieldset class="logIn">
            <legend>Iniciar Sesion</legend>

            <label for="user">Usuario</label>
            <input type="text" id="user" placeholder="Escribe tu Usuario">

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Escribe tu Password">
        </fieldset>

        <input type="submit" class=" boton-azul" value="Iniciar Sesion">
    </form>
</main>

<?php  
    incluirTemplate('footer');

?>
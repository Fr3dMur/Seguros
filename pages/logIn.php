<?php  
    require '../includes/funciones.php';
    incluirTemplate('header');

?>

<main class="contenedor">


    <form action="" class="logIn">
        <fieldset>
            <legend>Iniciar Sesion</legend>

            <label for="user">Usuario</label>
            <input type="text" id="user" placeholder="Escribe tu Usuario">

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Escribe tu Password">
        </fieldset>
    </form>
</main>

<?php  
    incluirTemplate('footer');

?>
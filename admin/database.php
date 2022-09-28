<?php  
    require '../includes/funciones.php';
    incluirTemplate('header');

?>

<main class="contenedor database-asegurados">
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
            <tr>
                <td>1</td>
                <td>Aguilar Castaño Jaiber Antonio</td>
                <td>16/08/1979</td>
                <td>V-13692285</td>
                <td>02736635205</td>
            </tr>
        </tbody>
    </table>
</main>

<?php  

    incluirTemplate('footer');

?>
<?php  
    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <div class="bg-img">
        
        <div class="overlay">
            <div class="contenedor contenido-imagen">
                <h2>Brindamos el mejor <span>Servicio de Salud</span></h2>
                <p>Cuenta con Nosotros</p>
            </div>
        </div>

        <!-- <picture class="top-img">
            <source srcset="build/img/pexels-christina-morillo-1181555.avif" alt="Imagen apreton de manos" type="image/avif">
            <source srcset="build/img/pexels-christina-morillo-1181555.webp" alt="Imagen apreton de manos" type="image/webp">
            <img loading="lazy" width="200" height="300" src="build/img/pexels-christina-morillo-1181555.jpg" alt="Imagen apreton de manos">
        </picture> -->

    </div>

    <main class="principal">
        <section class="contenedor contenido-principal">
            <div class="principal-text">
                <h3>
                    Sobre Nosotros
                </h3>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi nobis voluptate, aliquid vitae sapiente culpa quisquam accusamus nihil dignissimos maxime nostrum rem quo dicta vel doloribus. Consequuntur ad nobis quos!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis maiores ratione doloremque consequuntur omnis quam amet fuga. Similique laborum temporibus, ipsum animi modi quo expedita eaque voluptatem eligendi totam commodi? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ex natus dignissimos nihil veritatis temporibus praesentium ullam ipsam autem consequuntur ea numquam, nulla, alias aspernatur hic quia, aliquid sint debitis!</p>
            </div>

            <div class="principal-img">
                <picture>
                    <source srcset="build/img/meet.avif" alt="Una imagen sobre Seguros" type="image/avif">
                    <source srcset="build/img/meet.webp" alt="Una imagen sobre Seguros" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/meet.jpg" alt="Una imagen sobre Seguros">
                </picture>
            </div>

           
        </section>
    </main>


    <section class="servicios">
        <h3> Servicios </h3>
        <div class="contenedor servicios-grid">

            <div class="servicios__contenido">
                <img src="build/img/svg/undraw_appreciation_vmef.svg" alt="Imagen de una chica con un corazon" class="contenido-img">
                <h4>Cotizaciones de HCM</h4>
            </div>
            
            <div class="servicios__contenido">
                <img src="build/img/svg/undraw_by_my_car_re_j3jt (1).svg" alt="Imagen de dos personas sobre un coche" class="contenido-img ">
                <h4>Cotizaciones de Vehiculo</h4>
            </div>
            
            <div class="servicios__contenido">
                <img src="build/img/svg/undraw_for_sale_re_egkk.svg" alt="Imagen de una persona junto a un arbol, que va caminando hacia su casa" class="contenido-img fastidiosa">
                <h4>Patrimoniales</h4>
            </div>
            
            <div class="servicios__contenido">
                <img src="build/img/svg/undraw_my_files_swob.svg" alt="Imagen de dos personas sobre un coche" class="contenido-img ">
                <h4>Cotizaciones de Vehiculo</h4>
            </div>
            
        </div>

    </section>

    <section class="contact">
        <h3>Contactanos</h3>
        <div class="contenedor">
            <form action="" class="form__contact w-100 contenedor">
                <fieldset>
                    <legend>Llena el formulario y nos pondremos en contacto contigo</legend>

                    <div class="contenedor__inputs">
                    
                    <label for="name">Nombre</label>
                        <input placeholder="Tu nombre" id="name" type="text">

                    <label for="phone">Telefono</label>
                        <input type="number" placeholder="Tu Telefono" id="phone">

                    <label for="mail">Email</label>
                        <input type="text" placeholder="Tu Correo" id="mail" class="mail">
                    </div>
                    
                    
                    <div class="contenedor__t-area">
                        <label for="t-area">Dejanos un Mensaje</label>
                        <textarea name="t-area" placeholder="Escribenos tus dudas   " id="t-area" cols="30" rows="10"></textarea>
                    
                    </div>
                    <input type="submit" class=" boton-azul" value="Enviar">
                </fieldset>
            </form>
        </div>
    </section>
   
<?php  
    incluirTemplate('footer');

?>
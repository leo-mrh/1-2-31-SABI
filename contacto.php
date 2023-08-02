    <?php
    include_once('templates/header.php');
    include_once('templates/navegacion.php');
    include_once('templates/info.php');
    ?>

     <!-- Page Add Section Begin -->
     <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Contáctanos<span>.</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Contact Section Begin -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Tu Nombre">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Tu Apellido">
                            </div>
                            <div class="col-lg-12">
                                <input type="email" placeholder="Tu E-mail">
                                <input type="text" placeholder="Tu Teléfono">
                                <textarea placeholder="Tu Mensaje"></textarea>
                            </div>
                            <div class="col-lg-12 text-right">
                                <button type="submit">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="contact-widget">
                        <div class="cw-item">
                            <h5>Dirección</h5>
                            <ul>
                                <li>Niños Heroes esq. Melchor Ocampo, </li>
                                <li>Xonacatlán, Mex.</li>
                            </ul>
                        </div>
                        <div class="cw-item">
                            <h5>Teléfonos</h5>
                            <ul>
                                <li>+52 7294507714</li>
                                <li>+52 7226414302</li>
                                <li>+52 5517426613</li>
                            </ul>
                        </div>
                        <div class="cw-item">
                            <h5>Correo</h5>
                            <ul>
                                <li>sabi@contacto.com</li>
                                <li>spabi.proyectosutvt.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map">
                <div class="row">
                    <div class="col-lg-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881.6029605729802!2d-99.5329086198125!3d19.40350678610592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20b5a59d2a905%3A0xfcadfed8fbe139f7!2sNi%C3%B1os+Heroes%2C+Xonacatlan+de+Vicencio%2C+52060+Xonacatl%C3%A1n%2C+M%C3%A9x.!5e0!3m2!1ses!2smx!4v1470663708066"
                            height="560" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    <?php 
    include_once('templates/footer.php');
    ?>
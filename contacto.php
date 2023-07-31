<?php
include_once('templates/header.php');
include_once('templates/navegacion.php');
?>
     <!-- Header Info Begin -->
     <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p>Envíos Gratis</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p>20% de descuento en estudiantes</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                    <img src="img/icons/sales.png" alt="">
                    <p>30% de descuento en ropa para Dama</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->

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
                            <input type="text" placeholder="Nombre">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Apellido">
                        </div>
                        <div class="col-lg-12">
                            <input type="email" placeholder="E-mail">
                            <input type="text" placeholder="Teléfono">
                            <textarea placeholder="Tu mensaje"></textarea>
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
                            <li>Calle Niños Héroes, </li>
                            <li>Xonacatlán, Edo de Mex.</li>
                        </ul>
                    </div>
                    <div class="cw-item">
                        <h5>Teléfonos</h5>
                        <ul>
                            <li>+52 729457714</li>
                            <li>+52 7224614302</li>
                            <li>+52 5517426613</li>
                        </ul>
                    </div>
                    <div class="cw-item">
                        <h5>E-mail</h5>
                        <ul>
                            <li>correo@correo.com</li>
                            <li>correo@correo.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Contact Section End -->


<?php 
include_once('templates/footer.php');
?>
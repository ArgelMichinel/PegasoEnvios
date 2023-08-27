<!doctype html>
<html lang="en">

  <head>  	
  	<meta charset="utf-8">

    <meta name="keywords" content="pegaso envios seguridad logistica paquetes seguro envio">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Pegaso inc.">
    <meta property="og:image" content="https://www.pegasoenvios.com/img/logo4.png">
    <meta property="og:title"content="Pegaso Envíos">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="250">
    <meta property="og:image:height" content="250">
		<title>Pegaso Envios</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- tus fuente de iconitos Font Awesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- fuente roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-200694711-1">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-200694711-1');
    </script>
      
      
      <style>

          
          
          .affix {
   
    background: #081665 !important;
}
.navbar.navbar, .navbar-default.navbar {
    
    background-color: #0a1c80;
    color: rgba(255,255,255,.84);
}
          
          .navbar-inverse.navbar {
    background-color: #081665;
    color: rgba(255,255,255,.84);
    width: 100vw;
    max-height: 15%;
}
      
* {
  box-sizing: border-box;
}

.w-100 {
   width: 40vw;
   height: 22vw;
   max-width: 585px;
   max-height: 322px;
   object-fit: cover;
}

#contact {
  /*background-color: #e9d5d5;*/
  background-image: linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url("images/imagen-contact.png");
  background-repeat: no-repeat;
  background-position: center; 
}

#contacto .row {
  opacity: 1;
}

body {
  font-family: "Lato", sans-serif;
  max-width: 100vw;
}

.hero {
  width: 100%;
  height: 100%;
  min-height: 450px;
  position: relative;
  top: 0;
  left: 0;
  background-color: #d9edfd;
  transform: translate3d(0, 0, 0);
}

#Tracking {
    padding: 25px 0px 25px 0px;
    background-image: linear-gradient(rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url("images/15576-NQFKRZ.jpg");
    object-fit: contain;
    overflow-x: hidden;
 }

 #Tracking .container, #Service_zone .container {
    align-content: center;
    display: flex;
  }

  #Service_zone {
    object-fit: contain;
    overflow-x: hidden;
 }

 .map_servi {
    padding: 25px 0px 25px 0px;
    height: 80vh;
    max-height: 500px;
    width: auto;
    overflow-x: hidden;
 }

 /* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
  opacity: 0.96;
  transform: scale(0.0);
  animation-delay: 1000ms;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 20% auto 20% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

.cajita {
    width:60vw;
    height: calc(60vw * 0.5);
    border: none;
    margin: auto;
}

.carousel-inner p {
  font-size: 20px;
  font-family: 'Roboto', sans-serif; 
}

#contact .info p, .info li {
  color: black;
}

.layer-1 {
 /* animation: parallax_fg linear 220s infinite both;*/
  background: url(img/pegasuslogo-1000w.png) 0 100% no-repeat;
  z-index: 1;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 400px;
}

@media (max-width: 600px) {
  .w-100 {
      width: 90vw;
      height: 49.45vw;
      object-fit: cover;
  }

  .container .contents a {
    font-size: 1.2rem;
  }
    
  .layer-1 {
     /* animation: parallax_fg linear 220s infinite both;*/
      background: url(img/pegasuslogo-600w.png) 0 100% no-repeat;
    }

    .cajita {
    width:80vw;
    height: calc(80vw * 0.9);
    border: none;
    margin: auto;
  }

  .map_servi {
    width:90vw;
    height: auto;
    object-fit: contain;
 }
}

.layer-2 {
  animation: parallax_fg linear 30s infinite both;
  background: url(img/c2x.png) 0 100% repeat-x;
  z-index: 1;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 145px;
}

.layer-3 {
  animation: parallax_fg linear 55s infinite both;
  background: url(img/c3.png) 0 100% repeat-x;
  z-index: 1;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 158px;
}

.layer-4 {
  animation: parallax_fg linear 75s infinite both;
  background: url(img/c4.png) 0 100% repeat-x;
  z-index: 1;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 468px;
}

.layer-5 {
  animation: parallax_fg linear 95s infinite both;
  background: url(img/c5.png) 0 100% repeat-x;
  z-index: 1;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 311px;
}

.layer-6 {
  animation: parallax_fg linear 120s infinite both;
  background: url(img/c6.png) 0 100% repeat-x;
  z-index: 1;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 222px;
}

.bike-1, .bike-2 {
  background: url(img/c7x.png) 0 100% no-repeat;
  z-index: 1;
  position: absolute;
  bottom: 100px;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: auto 100px;
  animation: parallax_bike linear 20s infinite both;
}
          
        .bike-2 {
  background: url(img/camioncito2.png) 0 100% no-repeat;
  
}

.bike-2 {
  animation: parallax_bike linear 15s infinite both;
}

@keyframes parallax_fg {
  0% {
    background-position: 2865px 100%;
  }
  100% {
    background-position: 550px 100%;
  }
}
@keyframes parallax_bike {
  0% {
    background-position: -300px 100%;
  }
  100% {
    background-position: 2000px 100%;
  }
}

#mail input, #mail textarea, #mail button[type="submit"] {
    background: #d0d1d3;
    border-radius: 0;
    box-shadow: none;
    border: 0;
    font-size: 16px;
}

#mail input::placeholder, #mail textarea::placeholder { 
  color: black;
  opacity: 0.5; 
}
      
      </style>
  </head>

  <body>           

    <div class="navbar navbar-invers menu-wrap">
      <div class="navbar-header text-center">
      
    <!--    <a class="navbar-brand logo-right" href="javascript:void(0)"><i class="fa fa-list" aria-hidden="true"></i>Menu</a> -->
   <img src="img/logo2.png" height="100px" width ="140x">
      </div>
        <ul class="nav navbar-nav main-navigation">
          <li class="active"><a href="#home">Home</a></li>
          <li><a href="#features">Nosotros</a></li>
          <li><a href="tracking.php">Seguimiento de envío</a></li>
          <li><a href="access_client.php">Ingreso clientes</a></li>
          <li><a href="create_entrust.php">Crear encomienda</a></li>
          <li><a href="#contact">Contactos</a></li>
        </ul>
        <button class="close-button" id="close-button">Cerrar Menu</button>
    </div>
  	
  	<div class="content-wrap">
     <header class="hero-area1" id="home">
         
         <div class="col-md-12">

            <div class="navbar navbar-inverse sticky-navigation navbar-fixed-top"  role="navigation" data-spy="affix" data-offset-top="200"     >
        
                <div class="container" >     

                <div class="navbar-header col-xs-10 col-sm-10" >
                  <a style ="opacity:0.7;" class="logo-left " href="index.html"><i class="fa fa-cubes" aria-hidden="true"></i><i>Pegaso Env&iacute;os, tu envío en buenas manos.</i></a>
                </div>
                <div class="navbar-right col-xs-2 col-sm-2">
                  <button class="menu-icon"  id="open-button">
                    <i class="mdi-navigation-menu"></i>
                  </button>             
                </div>
              </div>
            </div>
        </div> 
         
         <div class="hero">
             
            
  <div class="parallax-layer layer-6"></div>
  <div class="parallax-layer layer-5"></div>
  <div class="parallax-layer layer-4"></div>
  <div class="parallax-layer bike-1"></div>
  <div class="parallax-layer bike-2"></div>
  <div class="parallax-layer layer-3"></div>
  <div class="parallax-layer layer-2"></div>
  <div class="parallax-layer layer-1 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="400ms"></div>
                  
</div>
      
      <div class="container">
                 
        <div class="contents text-right">
            
           
            
            
            
          <h1 class="wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="300ms">Tu envío, en buenas manos.</h1>
          <a href="#why" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Tecnología  al servicio de tu e-commerce</a>
          <p class="wow fadeInRight" data-wow-duration="1400ms" data-wow-delay="400ms">Eficiencia, seguridad y economia.</p>
      
        </div>   
      </div>
    </header>

    <section id="features" class="section">
      <div class="container ">
          

          
        <div class="section-header">
            
          <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="100ms">Acerca de Nosotros</h1>
          <h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Compromiso y responsabilidad.</h2>
        </div>
        <div class="row">

          <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="features">
              <div class="icon">
            <i class="fa fa-user"></i>
              </div>
              <div class="features-text">
                <h4>Quienes Somos ?</h4>
                <p>
                  Pegaso envíos es una empresa de logística, fundada en el 2019, que se encarga de entrega de encomiendas en la Ciudad Autónoma de Buenos Aires y parte de la provincia de Buenos Aires.
                    </p><br>
                  <p>
                    Somos un equipo joven que apostó al uso de la tecnología para optimizar la asignación de las encomiendas a los mensajeros, garantizando unos menores tiempos de entrega, a través de agrupamiento por localidad de los envíos.
                </p>
                  
              </div>
             </div>
          </div>


          <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1700ms" data-wow-delay="450ms">
            <div class="features">
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <div class="features-text">
                <h4>Que Hacemos ?</h4>
                <p>
                Pegaso está especializado en Envíos Flex para que puedas realizar tus ventas a través de MercadoLibre, sin tener que preocuparte de la logística necesaria para la entrega; garantizando tiempos de recepción menores a 24hs. Nosotros nos encargamos de que su producto llegue en tiempo y forma establecido.


                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1700ms" data-wow-delay="550ms">
            <div class="features">
              <div class="icon">
                <i class="fa fa-laptop"></i>
              </div>
              <div class="features-text">
                <h4>  Tecnolog&iacute;a al servicio de los clientes</h4>
                <p>
                
En Pegaso envíos contamos con una plataforma que permite hacerle seguimiento detallado de las encomiendas, conociendo la ubicación geográfica de los mismos en todo momento, para que el usuario pueda estimar el tiempo necesario para llegar a su destino y evitando la molesta incertidumbre de saber si su paquete ha salido a su destino o aún se encuentra en el centro de acopio.
                </p>
              </div>
            </div>
          </div>            



    
        </div>
      </div>
    </section>


  


   


    <section id="testimonial" class="section">
      <div class="container ">
     
    <div class="section-header text-center wow1 fadeInDown" data-wow-duration="1600ms" data-wow-delay="400ms">
          <h1 class="section-title" style="font-size: 40px">¿Por qué somos el mejor aliado de tu e-commerce?</h1>
          {{-- <h2 class="section-subtitle">subtitulo</h2> --}}
        </div> 
          
  


          
          
        
            <div id="testimonial-carousel" class="carousel slide" data-ride="carousel" data-wow-duration="1000ms" data-wow-delay="400ms">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                <li data-target="#testimonial-carousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner wow fadeInUp">
                  
                    <div class="item active text-center">  
                        <div class="row">
                            <div class="col-sm-6">
                              <p>Tenemos una aplicación tecnológica asociada a las principales plataformas de ventas (Mercado Envíos, Shopify).</p>
                              <div class="meta">
                                <p>Logramos una sectorización óptima de los envíos por zona, reduciendo los tiempos de entrega y asegurando el reparto en menos de 24hrs! </p>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <img class="d-block w-100" src="./images/real-time-pricing.png" alt="First slide">
                            </div>
                        </div>
                    </div>
                    
                    <div class="item text-center">  
                        <div class="row">
                            <div class="col-sm-6" data-wow-duration="1000ms" data-wow-delay="400ms">
                              <p>Pegaso Envíos te permite conocer la ubicación exacta de tus envíos en todo momento.</p>
                              <div class="meta">
                                <p>Ofrece una respuesta a su cliente del estado de su compra, mostrando con un mapa la ubicación en la que se encuentra la encomienda! </p>
                              </div>
                            </div>
                            <div class="col-sm-6" data-wow-duration="1000ms" data-wow-delay="400ms">
                              <img class="d-block w-100" src="./images/Localizacion-pegaso.png" alt="Second slide">
                            </div>
                        </div>
                    </div>
                    
                    <div class="item text-center">  
                        <div class="row">
                            <div class="col-sm-6">
                              <p>Con Pegaso envíos como aliado, puedes conocer la distribución de tus ventas, identificando las zonas de mayor acogida de tus productos.</p>
                              <div class="meta">
                                <p>Identifica tus clientes y potencia tus ventas, que nosotros nos encargamos de que tu producto llegue en el menor tiempo posible!<span><a href=""></a></span></p>
                              </div>
                            </div>
                            <div class="col-sm-6" data-wow-duration="1000ms" data-wow-delay="400ms">
                              <img class="d-block w-100" src="./images/Performance-Scoreboard.jpeg" alt="Second slide">
                            </div>
                        </div>
                    </div>
                    
                    
                  </div>
            
        </div>
      </div>
    </section>


   

<!-- otra seccion 
    <section id="otraseccion" class="section">
      <div class="container1">
        
        <div class="section-header text-center">
          <h1 class="section-title wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">Contactos</h1>
          <h2 class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">A un click de distancia.</h2>
        </div>

          <div class="c wow fadeInRight" data-wow-duration="1800ms" data-wow-delay="300ms">
            <div class="client-item-wrapper">
              <img src="logo3.png" alt="">
            </div>
       
        
         
        
        </div>
      </div>
    </section>      -->

    <section id="Tracking">
      <div class="container">
        <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms" style="margin: auto;">
          <!--<img class="d-block map_servi" src="./images/Mapa_servicio.png" alt="Mapa de servicio"> -->
          <img class="d-block map_servi" src="https://www.pegasoenvios.com/images/Mapa_servicio_500w.png" 
          srcset="https://www.pegasoenvios.com/images/Mapa_servicio_500w.png 600w,
                  https://www.pegasoenvios.com/images/Mapa_servicio.png 889w"
               alt="Mapa de servicio">
        </div>
      </div>
      <div class="container">
        <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms" style="margin: auto;">
          <iframe src="/back/back/index.html" class="cajita" autoplay="autoplay" loop="loop" scrolling="no">  </iframe>
        </div>
      </div>
    </section>

    <section>        
        <div class="row" style="margin: 0px;">
          <div class="col-md-6 col-sm-12 wow fadeInLeft" id="contact" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2 class="section-title">Contactos</h2>
    
            <div class="row" id="campo_contacto">

              <div class="col-md-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-maps-map"></i>
                  </div>
                  <h4>Centros de distribuci&oacute;n</h4>
                  <li>Bernardo de Irigoyen 1390, San Telmo, CABA</li>
                </div>
              </div>

              <div class="col-md-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-content-mail"></i>
                  </div>
                  <h4>Email</h4>
                  <a href="mailto:contacto@pegasoenvios.com">contacto@pegasoenvios.com</a>
                </div>
              </div>

            </div>
            <div class="row">
     
              <div class="col-md-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-action-settings-phone"></i>
                  </div>
                  <h4>Telefonos</h4>
                  <p>+54 911 4187 0373</p>
                </div>
              </div>

            </div>

          </div>
       
          <div class="col-md-6 col-sm-12 wow fadeInLeft" id="mail" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2 class="section-title">Envíanos tu consulta</h2>
    
              <div class="col-md-12">
                
                <form method="POST" action="{{route('home.mail')}}">
                  @csrf

                  <div class="form-group">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre (requerido)" required>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name="asunto" placeholder="Asunto (requerido)" required>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name="telefono" placeholder="Tel&eacute;fono">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="e-mail (requerido)" required>
                  </div>
                  <div class="form-group">
                    <input type="num_packets" class="form-control" name="num_packets" placeholder="Cantidad de envíos mensuales de su ecommerce (requerido)" required>
                  </div>
                  <div class="form-group button-row">
                    <textarea class="form-control" rows="4" name="comentario" placeholder="Mensaje" style="height:80px;"></textarea>
                    <button type="submit" id="boton_form" class="btn btn-default" style="display: none;">Enviar<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                  </div>
                </form>
                <button onclick="mail_send();" class="btn btn-default" style="background-color: blue; color:#d0d1d3; ">Enviar<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </div>

        </div>


      </div>
    </section>      

    <div id="id01" class="modal">
      <div class="modal-content">

        <div class="alert alert-success" role="alert">
          <strong>
            <b>Mensaje envíado con éxito.</b> Espere a ser redirigido.
          </strong>
        </div>

      </div>
    </div>

    <section id="footer">
      <div class="container">
        <div class="container">
          <div class="row">
        
            
         
      
            <div class="col-md-12 ">
                <center>    <h3>Nuestras Redes Sociales</h3>        
                       
              
           
              <a class="social" href="https://m.facebook.com/Pegaso-Env%C3%ADos-100162322295398/?ref=bookmarks" target="_blank"><i class="fa fa-facebook"></i></a>  &nbsp;&nbsp;
    
                  <a class="social" href="https://www.instagram.com/pegasoenviosar/" target="_blank"><i class="fa fa-instagram"></i></a>  &nbsp;&nbsp; </center>
  
            </div>

        </div>  
      </div>      
             </div>
      <!-- arriba  -->
      <a href="#home" class="btn btn-primary back-to-top">
      <i class=" mdi-hardware-keyboard-arrow-up"></i>
      </a>
    </section> 

    <section id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="copyright-text">
             © Pegasos Envios
              <a rel="nofollow" href="">
               2019
              </a>
            </p>
          </div>
        </div>
      </div>
    </section>     

		

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.mmenu.min.all.js"></script> 
    <script src="js/count-to.js"></script>   
    <script src="js/jquery.inview.min.js"></script>     
    <script src="js/classie.js"></script>
    <script src="js/jquery.nav.js"></script>      
    <script src="js/smooth-on-scroll.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/main.js"></script>

    

    <script>
        $(document).ready(function() {
            $.material.init();
        });
        $('.carousel').carousel({
          interval: 7000
        })

        function mail_send() {
          let form_data = document.getElementsByClassName('form-control');
          let flat = true;
          let element = document.getElementById('id01');
          
          for (let index = 0; index < form_data.length; index++) {
            if ((index != 2) && (index != 5)) {
              if (form_data[index].value == '') {
                flat = false;
              }
            }
          }
          if (flat == true){
            element.style.transform = 'scale(1.0)';
            element.style.transitionDuration = '500ms';
            setTimeout(() => {
              element.style.transform = 'scale(0.0)';
              document.getElementById('boton_form').click();
            }, 3500);
          }
        }

    </script>
        
       
  </body>

</html>
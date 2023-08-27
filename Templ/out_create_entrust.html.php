<div class="parallax-layer layer-1 animate__animated animate__fadeInLeft" style="--animate-duration: 2s;"></div>

<div class="container_track" >
    
    <div class="container-Total" id="loader" style="display: none;">
        <div class="loader-container">
            <div class="loader"></div>
            <div class="loader2"></div>
        </div>
    </div>

    <div class="container_title">
        <h2>Crear Envío</h2>
    </div>

    <div id="escritorio" class="animate__animated">

        <div class="formulario">

            <div class="container_form">
                <h3>Información del vendedor</h3>
            
                <label for="cliente"><b>Vendedor</b></label>
                <select name="cliente" id="client">
                    <option selected>(Seleccione un vendedor)</option>
                    <?php
                        for ($i=0; $i < count($clients); $i++) {
                            echo ('<option value="'. $clients[$i]['user_id'] . '">' . $clients[$i]['Nombre'] . '</option>' . PHP_EOL);
                        }
                    ?>
                </select>
            
                <label for="order"><b>Número de orden</b></label>
                <input type="text" placeholder="Solicite este número a su vendedor" name="order" id="order" required>

                <label for="product"><b>Producto</b></label>
                <input type="text" placeholder="Nombre o descripción breve" name="product" id="product" required>
            
            </div>
            
        </div>

        <div class="opciones">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        
                    </div>
                    <div class="col-xs-6">
                        <div class="avanzar">
                            <button class="btn" onclick="siguiente_vende()">Siguiente  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- ///////////////////////////////////////////////////////////////////////-->
    
    <div id="escritorio2" class="animate__animated" style="display: none;">

        <div class="formulario">

            <div class="container_form">
                <h3>Información del destinatario</h3>
            
                <label for="order"><b>Nombre del destinatario</b></label>
                <input type="text" placeholder="Coloque el nombre" name="destinatario" id="destinatario" required>

                <label for="order"><b>DNI o pasaporte</b></label>
                <input type="text" placeholder="Número de documento (sin puntos)" name="documento" id="documento" required>
            
                <label for="order"><b>Teléfono</b></label>
                <input type="text" placeholder="Número de teléfono" name="telef" id="telef" required>
            
            </div>
            
        </div>

        <div class="opciones">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="retroceder">
                            <button class="btn" onclick="atras_destina()" style="background-color: red;"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Atrás</button>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="avanzar">
                            <button class="btn" onclick="siguiente_destina()">Siguiente  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- ///////////////////////////////////////////////////////////////////////-->
    
    <div id="escritorio3" class="animate__animated" style="display: none;">

        <div class="formulario">

            <div class="container_form">
                <h3>Destino de la compra</h3>

                <div class="container container_destino">
            
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <label for="provincia"><b>Provincia</b></label>
                            <select name="provincia" class="input_direccion" onchange="cambia_ciudad()" id="provincia">
                                <option value="0">(Seleccione la provincia)</option>
                                <option value="1">Capital Federal</option>
                                <option value="2">Buenos Aires</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <label for="ciudad"><b>Ciudad</b></label>
                            <select name="ciudad" class="input_direccion" id="ciudad"> 
                                <option value="-">-</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-9 col-sm-9">
                            <label for="calle"><b>Calle</b></label>
                            <input type="text" class="input_direccion" placeholder="Nombre de la calle" name="calle" id="calle" required>
                        </div>

                        <div class="col-xs-3 col-sm-3">
                            <label for="altura"><b>Altura</b></label>
                            <input type="text" class="input_direccion" placeholder="#" name="altura" id="altura" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-9 col-sm-9">
                            <label for="comentario"><b>Comentario</b></label>
                            <input type="text" placeholder="Ej: Piso 4, depto 4A" name="comentario" id="comentario">
                        </div>

                        <div class="col-xs-3 col-sm-3">
                            <label for="CPostal"><b>C. Postal</b></label>
                            <input type="text" class="input_direccion" placeholder="# postal" name="CPostal" id="CPostal" required>
                        </div>
                    </div>
            
                </div>

            </div>
            
        </div>

        <div class="opciones">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="retroceder">
                            <button class="btn" onclick="atras_compra()" style="background-color: red;"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Atrás</button>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="avanzar">
                            <button class="btn" onclick="siguiente_compra()">Siguiente  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- ///////////////////////////////////////////////////////////////////////-->
    
    <div id="escritorio4" class="animate__animated" style="display: none;">

        <div class="formulario">

            <div class="container_form">
                <h3 style="padding-bottom: 30px;">Ubicación en mapa</h3>

                <div class="container container_destino" style="padding-top: 0px;">
            
                    <div class="row" id="Selec_direccion" style="display: none;">
                        <div class="col-xs-12 col-lg-12">
                            <label for="ubicacion"><b style="color: red;">Varias direcciones coinciden con los parámetros. Por favor seleccione la ubicación correcta</b></label>
                            <select name="ubicacion" onchange="select_ubicacion()" id="select_ubicacion">
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <span style="color: mediumblue; padding-bottom: 10px">Seleccione siguiente si la ubicación es la correcta, de lo contrario seleccione atrás e ingrese nuevos parámetros.</span>
                        <div id="map"></div>
                        <span>*La imagen es sólo de referencia, puede que el lugar de entrega se enceuntre en una posición cercana al marcador</span>

                        <script>
                            // initialize Leaflet
                            var coord_lat;
                            var coord_lon;
                            var map;

                            function inicio_map() {
                                coord_lat = respu[0].lat;
                                coord_lon = respu[0].lon;

                                crea_mapa();
                            }

                            function crea_mapa () {
                                window.map = L.map('map').setView({lon: coord_lon, lat: coord_lat}, 16);

                                // add the OpenStreetMap tiles
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 18,
                                    minZoom: 9,
                                }).addTo(map);

                                // show the scale bar on the lower left corner
                                L.control.scale().addTo(map);

                                //Marcador de ubicación
                                L.marker([coord_lat, coord_lon]).addTo(map);
                                
                            }

                        </script>

                    </div>

                    
                </div>

            </div>

        </div>

        <div class="opciones">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="retroceder">
                            <button class="btn" onclick="atras_mapa()" style="background-color: red;"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Atrás</button>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="avanzar">
                            <button class="btn" onclick="siguiente_mapa()">Siguiente  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--///////////////////////////////////////////// -->

    <div id="resumen" class="animate__animated" style="display: none;">

        <div class="formulario">

            <div class="container_form">
                <h3>Resumen de la orden</h3>

                <div class="container container_destino">

                    <form action="" method="POST">

                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <label for="client_text"><b>Vendedor</b></label>
                                <input type="text" name="client_text" id="client_text" readonly>
                            </div>
                            <div class="col-xs-12 col-lg-12" style="display: none;">
                                <input type="text" name="new_entrust[sender_id]" id="client_value" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <label for="new_entrust[order_id]"><b>Número de orden</b></label>
                                <input type="text"  name="new_entrust[order_id]" id="order2" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <label for="new_entrust[description]"><b>Producto</b></label>
                                <input type="text" name="new_entrust[description]" id="product2" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <label for="new_entrust[receiver_name]"><b>Nombre del destinatario</b></label>
                                <input type="text" name="new_entrust[receiver_name]" id="destinatario2" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-lg-6">
                                <label for="new_entrust[document]"><b>DNI o pasaporte</b></label>
                                <input type="text" name="new_entrust[document]" id="documento2" readonly class="input_direccion">
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <label for="new_entrust[receiver_phone]"><b>Teléfono</b></label>
                                <input type="text" name="new_entrust[receiver_phone]" id="telef2" readonly class="input_direccion">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <label for="new_entrust[state]"><b>Provincia</b></label>
                                <input type="text" class="input_direccion" name="new_entrust[state]" id="provincia2" readonly>
                            </div>

                            <div class="col-xs-6 col-sm-6">
                                <label for="new_entrust[city]"><b>Ciudad</b></label>
                                <input type="text" class="input_direccion" name="new_entrust[city]" id="ciudad2" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-lg-6">
                                <label for="new_entrust[calle]"><b>Calle</b></label>
                                <input type="text" name="new_entrust[street_name]" id="calle2" readonly class="input_direccion">
                            </div>
                            <div class="col-xs-3 col-lg-3">
                                <label for="new_entrust[altura]"><b>Altura</b></label>
                                <input type="text" name="new_entrust[street_number]" id="altura2" readonly class="input_direccion">
                            </div>
                            <div class="col-xs-3 col-lg-3">
                                <label for="new_entrust[zip_code]"><b>C. Postal</b></label>
                                <input type="text" name="new_entrust[zip_code]" id="CPostal2" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <label for="new_entrust[comentario]"><b>Comentario</b></label>
                                <input type="text" name="new_entrust[comment]" id="comentario2" readonly class="input_direccion">
                            </div>
                        </div>

                        <div class="row" style="display: none;">
                            <div class="col-xs-6 col-lg-6">
                                <input type="text" name="new_entrust[Latit]" id="Latit" readonly>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <input type="text" name="new_entrust[Longit]" id="Longit" readonly>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="avanzar">
                                <button type="submit" class="btn">Finalizar</button>
                            </div>
                        </div>
                        
                    </form>

                </div>

            </div>
            
        </div>

        <div class="opciones">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="retroceder">
                            <button class="btn" onclick="atras_resumen()" style="background-color: red;"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Atrás</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

</div>

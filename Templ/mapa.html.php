        <div class="map_container col-sm-12 col-md-12" style="padding-bottom: 40px;">
            <h2>Ubicación geográfica</h2>

            <div id="map"></div>
            <script>
            // initialize Leaflet
            var map = L.map('map').setView({lon: -58.4730416, lat: -34.6003347}, 11);
            var blueIcon = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker-icon.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

            var greenIcon = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker-icon-green.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

            var yellowIcon = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker-icon-gold.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

            var redIcon = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker-icon-red.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

            var blackIcon = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker-icon-black.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

            // add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                minZoom: 9,
            }).addTo(map);

            // show the scale bar on the lower left corner
            L.control.scale().addTo(map);
            
            <?php
            //Impresión de la ubicación de los envíos
                $rows = count($packets);
                for ($i=0 ; $i < $rows; $i++) {
                    echo('L.marker([');
                    echo ($packets[$i]['Latit'] != '') ? $packets[$i]['Latit'] : "-34.6003347";
                    echo(', ');
                    echo ($packets[$i]['Longit'] != '') ? $packets[$i]['Longit'] : "-58.4730416";
                    echo('], {icon: ');
                    
                        if (isset($packets[$i]['status'])) {
                            switch ($packets[$i]['status']) {
                                case 'En curso':
                                    echo ('greenIcon');
                                break;
                                case '1era visita':
                                    echo ('yellowIcon');
                                break;
                                case 'Completado':
                                    echo ('blueIcon');
                                break;
                                case 'No completado':
                                    echo ('redIcon');
                                break;
                                case 'Cancelado':
                                    echo ('redIcon');
                                break;
                                default:
                                echo ('blackIcon');
                            }
                        } else {
                            echo ('blackIcon');
                        }

                    echo('}).bindPopup("');
                    echo($packets[$i]['id_ship'] . ', ' . $packets[$i]['description']);
                    echo('").addTo(map);');
                }
            ?>

            </script>

            <div id="leyenda_map">
                <img src="https://www.pegasoenvios.com/js/images/Leyenda_mapa.png" alt="Leyenda">
            </div>

        </div>
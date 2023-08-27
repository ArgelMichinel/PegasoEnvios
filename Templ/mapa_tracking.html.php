        <div class="map_container col-sm-12 col-md-6" style="padding-bottom: 40px;">
            <h2>Ubicación geográfica</h2>

            <div id="map"></div>
            <script>
            // initialize Leaflet
            var map = L.map('map').fitBounds([[<?=$pack_locat[0]?>, <?=$pack_locat[1]?>], [<?=$packets['latit']?>, <?=$packets['longit']?>]]); //setView({lon: -58.4730416, lat: -34.6003347}, 11);
            var PegasoMarker = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker_pegaso.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [29, 42],
            iconAnchor: [15, 42],
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

            // add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                minZoom: 9,
            }).addTo(map);

            // show the scale bar on the lower left corner
            L.control.scale().addTo(map);
            
            <?php
            //Impresión de la ubicación de los envíos
                $matriz1 = [];
                $matriz2 = [];
                $matriz1['Latit'] = $pack_locat[0];
                $matriz1['Longit'] = $pack_locat[1];
                $matriz2['Latit'] = $packets['latit'];
                $matriz2['Longit'] = $packets['longit'];
                $marcadores = [$matriz1, $matriz2];

                for ($i=0 ; $i < 2; $i++) {
                    echo('L.marker([');
                    echo ($marcadores[$i]['Latit']);
                    echo(', ');
                    echo ($marcadores[$i]['Longit']);
                    echo('], {icon: ');
                    
                        if ($i == 0) {
                            echo ('PegasoMarker');
                        } else {
                            echo ('greenIcon');
                        }
                        
                                
                    echo('}).addTo(map);');
                }
            ?>

            </script>

            <div id="leyenda_map">
                <img src="https://www.pegasoenvios.com/js/images/Leyenda_tracking.png" alt="Leyenda">
            </div>

        </div>
        <div class="map_container col-sm-12 col-md-12" style="padding-bottom: 40px;">
            <h2>Destino del envío</h2>

            <div id="map"></div>
            <script>
            // initialize Leaflet
            var map = L.map('map').setView({lon: -58.4730416, lat: -34.6003347}, 11);
            var PegasoMarker = new L.Icon({
            iconUrl: 'https://www.pegasoenvios.com/js/images/marker_pegaso.png',
            shadowUrl: 'https://www.pegasoenvios.com/js/images/marker-shadow.png',
            iconSize: [29, 42],
            iconAnchor: [15, 42],
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

            </script>
        </div>
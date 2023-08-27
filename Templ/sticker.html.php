<?php
$remito = '<body>

<div class="div_total">
	<div id="header" class="header container">
		
        <div class="header1 row">
                <div class="col-xs-4 col-lg-4 hero-image">
                    <div class="logo-space" style="width: 33%;">
                        <img src="images/remito_logo.png">
                    </div>
                </div>
                <div class="col-xs-8 col-lg-8 remitente" style="width: 100%; display: inline-block;">
                    <div class="logo-space" style="width: calc(100% - 20px); display: inline-block; margin-left: 15px;">
                        <p style="width: 100%;"><b>' . $client['first_name'] . ' ' . $client['last_name'] . '</b> #' . $sender_id . '</p>
                        <p style="width: 100%;"><b>Domicilio:</b> ' . $client['address']['address'] . '</p>
                        <p style="width: 100%;">' . $client['address']['city'] . ' '. $client['address']['state'] . ' '. $client['address']['zip_code'] . '</p>
                        <p style="width: 100%;"><b>#PE:</b> ' . $packet['id_ship'] . '.  <b>#orden: </b>'. $packet['order_id'] . '</p>
                    </div>
                </div>
        </div>
		
	</div>

    <div  class="QR_section">';

$Parametr = '{"sender_id":"'. $sender_id .'","id":"'. $packet_num .'"';
$ourParamId = rawurlencode ($Parametr);

$remito.= '<img src="QRgenerator_client.php?id=' . $ourParamId . '" style="margin: auto;" />';

$remito.= '		
	</div>

    <div id="destinatario" class="container">
		
        <div class="header1 row">
                <div class="col-xs-12 col-lg-12">
                    <div class="logo-space">
                        <p><b>Destinatario:</b> ' . $packet['receiver_name'] . '</p>
                        <p><b>Domicilio:</b> ' . $packet['street_name'] . '' . $packet['street_number']  . '</p>
                        <p><b>Ciudad dest.:</b> ' . $packet['city'] . ' ('. $packet['state'] . ')' . '</p>
                        <p><b>Referencia.:</b> ' . $packet['comment'] . '</p>
                        <p><b>CP:</b> ' . $packet['zip_code'] . '            Telef.: '. $packet['receiver_phone'] . '</p>
                    </div>
                </div>
        </div>
		
	</div>

</div>

</body>';
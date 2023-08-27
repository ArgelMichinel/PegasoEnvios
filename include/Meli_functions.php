<?php

function info_shipping($shipnumb,$ACCESS_TOK) {

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, 'https://api.mercadolibre.com/shipments/'.$shipnumb);
    curl_setopt($cliente, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($cliente, CURLOPT_HEADER, false);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$ACCESS_TOK));
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($cliente);
    curl_close($cliente);

    //$datos=json_decode($result,true);

    return $result;
}

////////////////////////////////////////////////////////////

function info_user($pdo,$id_client) {
    
    $client = checkValdTok($pdo,$id_client);
    
    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, 'https://api.mercadolibre.com/users/'.$id_client);
    curl_setopt($cliente, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($cliente, CURLOPT_HEADER, false);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$client['access_tok']));
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($cliente);
    curl_close($cliente);

    $datos=json_decode($result,true);

    return $datos;
}

////////////////////////////////////////////////////////////

function meli_sticker($pdo,$shipnum,$id_client) {
    
    $client = checkValdTok($pdo,$id_client);
    
    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, '"https://api.mercadolibre.com/shipment_labels?shipment_ids='.$shipnum.'&savePdf=Y"');
    curl_setopt($cliente, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($cliente, CURLOPT_HEADER, false);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$client['access_tok']));
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($cliente);
    curl_close($cliente);

    return $result;
}

///////////////////////////////////////////////////////////////

function refresh_tok($APP_ID,$SECRET_KEY,$REFRESH_TOK) {

    $body = array(
                    'grant_type' => 'refresh_token',
                    'client_id' => $APP_ID,
                    'client_secret' => $SECRET_KEY,
                    'refresh_token' => $REFRESH_TOK
                );

    $headers_req =array(
                        'POST' => 'application/json',
                        'Content-type' => 'application/x-www-form-urlencoded'
                     );

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, 'https://api.mercadolibre.com/oauth/token');
    curl_setopt($cliente, CURLOPT_POST, TRUE);
    curl_setopt($cliente, CURLOPT_HEADER, false);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, $headers_req);
    curl_setopt($cliente, CURLOPT_POSTFIELDS, $body);
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($cliente);
    curl_close($cliente);


    //print_r($result);

    $datos=json_decode($result,true);
    
    return $datos;
    
}

////////////////////////////////////////////////////////////////

function request_tok($code,$state,$APP_ID,$SECRET_KEY,$URL) {

    $body = array(
                    'grant_type' => 'authorization_code',
                    'client_id' => $APP_ID,
                    'client_secret' => $SECRET_KEY,
                    'code' => $code,
                    'redirect_uri' => $URL
                );

    $headers_req =array(
                        'POST' => 'application/json',
                        'Content-Type' => 'application/x-www-form-urlencoded'
                     );

    $cliente = curl_init();
    curl_setopt($cliente, CURLOPT_URL, "https://api.mercadolibre.com/oauth/token");
    curl_setopt($cliente, CURLOPT_POST, TRUE);
    curl_setopt($cliente, CURLOPT_HEADER, false);
    curl_setopt($cliente, CURLOPT_HTTPHEADER, $headers_req);
    curl_setopt($cliente, CURLOPT_POSTFIELDS, $body);
    curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($cliente);
    curl_close($cliente);

    //print_r($result);

    $datos=json_decode($result,true);
    
    return $datos;
}


///////////////////////////////////////////////////////
function insert($pdo, $table, $fields) {
    $query = 'INSERT INTO `' .$table. '` (';

    foreach ($fields as $key => $value) {

        $query .= '`' . $key . '`,';

    }

    $query = rtrim($query, ',');
    $query .= ') VALUES (';

    foreach ($fields as $key => $value) {

        $query .= ':' . $key . ',';

    }

    $query = rtrim($query, ',');
    $query .= ')';
    
    $fields = processDates($fields);
    
    query($pdo, $query, $fields);
}

///////////////////////////////////////////////////////
function delete($pdo, $table, $primaryKey, $id ) {
    $parameters = [':id' => $id];

    query($pdo, 'DELETE FROM `' . $table . '`WHERE `' . $primaryKey . '` = :id', $parameters);
}

///////////////////////////////////////////////////////
function update_access($pdo, $table, $fields) {
    
    $query = 'UPDATE `' .$table. '` SET ';
    foreach ($fields as $indi => $valor){
        $query .= "`". $indi ."` = :". $indi .",";
    }
    
    $query = rtrim($query, ',');
    $query .= ' WHERE `user_id` = :primaryKey';
    
    $fields = processDates($fields);
    
    // Set the :primaryKey variable
    $fields['primaryKey'] = $fields['user_id'];
    
    query($pdo, $query, $fields);
}

////////////////////////////////////////////////////////

function update($pdo, $table, $primaryKey, $fields) {

    $query = ' UPDATE `' . $table .'` SET ';
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '` = :' . $key . ',';
    }

    $query = rtrim($query, ',');
    $query .= ' WHERE `' . $primaryKey . '` = :primaryKey';
    
    // Set the :primaryKey variable
    
    $fields['primaryKey'] = $fields[$primaryKey];
    $fields = processDates($fields);
    query($pdo, $query, $fields);
}

////////////////////////////////////////////////////////

function processDates($fields) {
    
    foreach ($fields as $key => $value) {
        if ($value instanceof DateTime) {
            $fields[$key] = $value->format('Y-m-d H:i:s');
        }
    }
    
    return $fields;
}

////////////////////////////////////////////////////////

function save($pdo, $table, $primaryKey, $record) {
    try {
        
        insert($pdo, $table, $record);
        
    }
    catch (PDOException $e) {
        update($pdo, $table, $primaryKey, $record);
        
    }
}

////////////////////////////////////////////////////////

function ask_client($pdo,$id_client) {
    
    $dat_user = findById($pdo,'access','user_id',$id_client);
    
    return $dat_user;
}

///////////////////////////////////////////////////////

function checkValdTok($pdo,$id_client) {
	$timeNow =  new DateTime();
	
	$dat_user = ask_client($pdo,$id_client);
    $time_access = new DateTime($dat_user['fec_hora']);
    $time_created = new DateTime($dat_user['created_at']);
    
    $interva = $time_access -> diff($timeNow);
    $interva = Diff_On_Sec ($interva);
    $interva2 = $time_created -> diff($timeNow);
    $interva2 = Diff_On_Sec ($interva2);

    
    if ($interva2 < 15552000) {
        if ($interva > 21600) {
            include 'Datosprogram.php';
            $datos = refresh_tok($APP_ID,$SECRET_KEY,$dat_user['refresh_tok']);
            update($pdo, 'access', 'user_id', ['user_id' => $datos["user_id"],
                                       'access_tok' => $datos["access_token"],
                                       'refresh_tok' => $datos["refresh_token"],
                                       'fec_hora' => new DateTime()]);
            $dat_user = ['user_id' => $datos["user_id"],
                         'access_tok' => $datos["access_token"],
                         'refresh_tok' => $datos["refresh_token"],
                         'fec_hora' => new DateTime()];
        }
    } else {
        
        $mensaje = "Credenciales vencidas";
    }
    
    return $dat_user;
	
}

///////////////////////////////////////////////////////

function Diff_On_Sec ($interva){
$interva = ($interva -> format('%Y'))*365*24*60*60 +
           ($interva -> format('%m'))*30*24*60*60 +
           ($interva -> format('%d'))*24*60*60 +
           ($interva -> format('%H'))*60*60 +
           ($interva -> format('%i'))*60 +
           ($interva -> format('%s'));
    
return $interva;
    }

///////////////////////////////////////////////////////

function insert_by_lots ($pdo, $table, $fields) {
    
    $pdo->beginTransaction();
    
    $n_data = count($fields);
    for ($i = 0; $i < $n_data; $i++) {
        
        $colum = $fields[$i];
        
        $query = 'INSERT INTO `' .$table. '` (';

        foreach ($colum as $key => $value) {

            $query .= '`' . $key . '`,';

        }

        $query = rtrim($query, ',');
        $query .= ') VALUES ';
        
        
        $query .= '(';
        
        foreach ($colum as $key => $value) {

            $query .= ':' . $key . ',';

        }
        $query = rtrim($query, ',');
        $query .= '), ';
        
        $colum = processDates($colum);
        
        $query = rtrim($query, ', ');
        query($pdo, $query, $colum);
        
    }
    
    $pdo->commit();    
    
}

///////////////////////////////////////////////////////

function query_customized ($pdo,$parameters,$table='envios') {
    
    $query='SELECT * FROM ' . $table . ' WHERE ';
    
    $datos = [];
        
    if (isset($parameters['incl_client'])) {
            $query.= '`sender_id` = :client AND';
            $datos['client'] = $parameters['client'];
    }
    if (isset($parameters['incl_no_delivered'])) {
        $query.= '`status` not like :status AND';
        $datos['status'] = 'delivered';
    }
    if (isset($parameters['incl_status'])) {
        if ($parameters['status'] === 'En_curso') {
            $query.= '`status` = :status1 OR `status` = :status2 AND';
            $datos['status1'] = 'shipped';
            $datos['status2'] = 'ready_to_ship';
        } else {
            $query.= '`status` = :status AND';
            $datos['status'] = $parameters['status'];
        }
        
    }
    if (isset($parameters['incl_cadete'])) {
            if ($parameters['cadete'] == 'none') {
                $query.= '`cadete` IS NULL AND';
            } else {
                $query.= '`cadete` = :cadete AND';
                $datos['cadete'] = $parameters['cadete'];
            }
    }
    if (isset($parameters['incl_date'])) {
            if (isset($parameters['begin_date']) && isset($parameters['end_date'])) {
                $query.= '`date_in` >= :begin_date AND `date_in` < :end_date AND';
                $datos['begin_date'] = $parameters['begin_date'];
                $datos['end_date'] = $parameters['end_date'];
            }
    }
    if (isset($parameters['incl_update'])) {
        if (isset($parameters['begin_update']) && isset($parameters['end_update'])) {
            $query.= '`updated_at` >= :begin_update AND `updated_at` < :end_update AND';
            $datos['begin_update'] = $parameters['begin_update'];
            $datos['end_update'] = $parameters['end_update'];
        }
}
    if (isset($parameters['incl_zona'])) {
        include 'Zonas.php';
    }
    
    $query = rtrim($query, ' AND');
    
    $result = query($pdo, $query, $datos);
    
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

///////////////////////////////////////////////////////

function update_by_lots ($pdo, $table, $primaryKey, $fields) {
    
    $pdo->beginTransaction();
    
    $n_data = count($fields);
    for ($i = 0; $i < $n_data; $i++) {
        
        $colum = $fields[$i];
        /////////////////////////////////////////////////
        $query = ' UPDATE `' . $table .'` SET ';
        foreach ($colum as $key => $value) {
            $query .= '`' . $key . '` = :' . $key . ',';
        }

        $query = rtrim($query, ',');
        $query .= ' WHERE `' . $primaryKey . '` = :primaryKey';

        // Set the :primaryKey variable

        $colum['primaryKey'] = $colum[$primaryKey];
        //////////////////////////////////////////////////
        
        $colum = processDates($colum);
        
        query($pdo, $query, $colum);
        
    }
    
    $pdo->commit();    
    
}

//////////////////////////////////////////////////////
function print_answer ($shipnum,$ACCESS_TOK,$sender_id) {
    $shipping = info_shipping($shipnum,$ACCESS_TOK);

    //////////////////////////////////////
    $shipping_res = json_decode($shipping,true);
    
    $shipping = [];
    $shipping[0] = $shipnum;                   //'id_ship'
    $shipping[1] = new DateTime();             //'date_in'
    $shipping[2] = $shipping_res['status'];     //'status'
    $shipping[3] = $sender_id;                  //'sender_id'
    $shipping[4] = $shipping_res['order_id'];        //'order_id'
    
    $address = [];
    $address[0] = $shipping_res['receiver_address']['street_name'];        //'street_name'
    $address[1] = $shipping_res['receiver_address']['street_number'];      //'street_number'
    $address[2] = $shipping_res['receiver_address']['comment'];            //'comment'
    $address[3] = $shipping_res['receiver_address']['zip_code'];           //'zip_code'
    $address[4] = $shipping_res['receiver_address']['city']['name'];       //'city'
    $address[5] = $shipping_res['receiver_address']['state']['name'];      //'state'
    $address[6] = $shipping_res['receiver_address']['country']['name'];    //'country'
    $address[7] = $shipping_res['receiver_address']['latitude'];           //'latitude'
    $address[8] = $shipping_res['receiver_address']['longitude'];          //'longitude'
    $address[9] = $shipping_res['receiver_address']['geolocation_last_updated'];    //'geolocation_last_updated'

    $receiver_per = [];
    $receiver_per[0] = $shipping_res['receiver_address']['receiver_name'];      //'receiver_name'
    $receiver_per[1] = $shipping_res['receiver_address']['receiver_phone'];      //'receiver_phone'
    
    $shipping_items = [];
    $shipping_items[0] = $shipping_res['shipping_items'][0]['description'];          //'description'
    $shipping_items[1] = $shipping_res['shipping_items'][0]['dimensions'];            //'dimensions'
    
    $delivery = [];
    $delivery[0] = $shipping_res['status_history']['date_first_visit'];     //'date_first_visit'
    $delivery[1] = $shipping_res['status_history']['date_delivered'];       //'date_delivered'
    $delivery[2] = $shipping_res['status_history']['date_not_delivered'];    //'date_not_delivered'

    $ship_mat = [$shipping, $address, $receiver_per, $shipping_items, $delivery];
    
    //////////////////////////////////////
    
    return $ship_mat;
}

//////////////////////////////////////////////////////


function record_track_pe($pdo, $fields) {

    $query = 'UPDATE `cadetes` SET `Longi3` = `Longi2`, `Lati3` = `Lati2`, `Tiempo3` = `Tiempo2` WHERE `cadetes`.`num_cadete` = :num_cadete; UPDATE `cadetes` SET `Longi2` = `Longi1`, `Lati2` = `Lati1`, `Tiempo2` = `Tiempo1` WHERE `cadetes`.`num_cadete` = :num_cadete';
    $fields = processDates($fields);
    $nuevo['num_cadete'] =$fields['num_cadete'];
    query($pdo, $query, $nuevo);

    $query = 'UPDATE `cadetes` SET ';
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '` = :' . $key . ',';
    }

    $query = rtrim($query, ',');
    $query .= ' WHERE `cadetes`.`num_cadete` = :num_cadete';
    
    // Set the :primaryKey variable
    query($pdo, $query, $fields);
}

//////////////////////////////////////////////////////


function find_path($location, $directions, $num_pack, $Google_Key) {

    $request = 'origin=' . $location[0] . ',' . $location[1] . '&destination=' . $directions[$num_pack-1][0] . ',' . $directions[$num_pack-1][1] .
                '&waypoints=';

    //Se agregan los puntos intermedios del recorrido
    for ($i=0; $i < ($num_pack-1); $i++) { 
        $request .= $directions[$i][0] . ',' . $directions[$i][1] . '|';
    }

    $request = rtrim($request, '|');
    $request .= '&key=';

    $cURLConnection = curl_init();

    $headers_req =array(
        'GET' => 'application/json',
        'Access-Control-Allow-Origin' => '*'
     );

     /* Ayuda en la pagina https://developers.google.com/maps/documentation/directions/get-directions */

    curl_setopt($cURLConnection, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/directions/json?'. $request . $Google_Key);
    curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers_req);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $routes = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    return $routes;
}

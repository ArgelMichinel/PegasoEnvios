<?php
namespace App\Classes;

use Illuminate\Support\Facades\DB;

class MeliFunctions
{
    private $table;
    private $primaryKey;

    public function __construct(string $table, string $primaryKey) {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    /*//////////////////////////////////////////////////////

    private function query($sql, $parameters =[]) {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        
        return $query;
    }

    *///////////////////////////////////////////////////////
    public function findById($id) {
        $parameters=['id' => $id];
        
        $query = DB::select('SELECT * FROM `' .$this->table. '` WHERE ' .$this->primaryKey. '= :id', $parameters);
        
        return $query /*-> fetch()*/;
    }

    ///////////////////////////////////////////////////////
    public function findAll() {
        $result = DB::select('SELECT * FROM `' .$this->table. '`');
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    ///////////////////////////////////////////////////////
    public function find300() {
        $result = DB::select('SELECT * FROM `' .$this->table. '` ORDER BY date_in DESC LIMIT 0, 300');
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    ///////////////////////////////////////////////////////
    public function findSeveral($id) {
        $parameters=['id' => $id];
        
        $query = DB::select('SELECT * FROM `' .$this->table. '` WHERE ' .$this->primaryKey. '= :id', $parameters);
        
        return $query->fetchAll();
    }

    ///////////////////////////////////////////////////////
    public function IsLogged() {
            
        $LoggedTable = new MeliFunctions('administ','email');
        $admintrador = $LoggedTable->findById($_SESSION['user']);
        /*$this->findByID('administ','email',$_SESSION['user']);*/

        if ($admintrador['password'] != $_SESSION['password']) {

            session_destroy();
            header('location: index.php');

        }
    }

    ///////////////////////////////////////////////////////
    public function IsLogged_client() {
            
        $LoggedTable = new MeliFunctions('access','email');
        $administrador = $LoggedTable->findById($_SESSION['user']);
        /*$administrador = $this->findByID($this->pdo,'access','email',$_SESSION['user']); */

        if ($administrador['password'] != $_SESSION['password']) {
            
            session_destroy();
            header('location: index.php');

        }
    }

    ///////////////////////////////////////////////////////
    public function Authentification($user, $contra) {
        $num_errores = 0;
        $errores = [];
        
        if (empty($user)) {
                $num_errores += 1;
                $errores[] = 'El campo de email no puede quedar en blanco';
            } else {
                if (filter_var($user, FILTER_VALIDATE_EMAIL) == false) {
                    $num_errores += 1;
                    $errores[] = 'Dirección inválida de email';
                } else {
                    // convert the email to lowercase
                    $user = strtolower($user);
                    // Search for the lowercase version of $author['email']
                    /*$administra = $this->findByID($this->pdo,'administ','email',$user); */
                    $LoggedTable = new MeliFunctions('administ','email');
                    $administra = $LoggedTable->findById($user);

                    if (empty($administra)) {
                        $num_errores += 1;
                        $errores[] = 'Credenciales inválidas';
                    } else {
                        if (!empty($contra)) {
                            if (!password_verify($contra,$administra['password'])) {
                                $num_errores += 1;
                                $errores[] = 'Credenciales inválidas';
                            } elseif (password_verify($contra,$administra['password'])) {
                                $_SESSION['user'] = $user;
                                $_SESSION['password'] = $administra['password'];
                                header('location: desk_admin.php');
                                die();
                            }
                        } else {
                            $num_errores += 1;
                            $errores[] = 'Credenciales inválidas';
                        }
                    }

                }
            }
        return $errores;
    }

    ///////////////////////////////////////////////////////
    public function Authentification_cl($user, $contra) {
        $num_errores = 0;
        $errores = [];
        
        if (empty($user)) {
                $num_errores += 1;
                $errores[] = 'El campo de email no puede quedar en blanco';
            } else {
                if (filter_var($user, FILTER_VALIDATE_EMAIL) == false) {
                    $num_errores += 1;
                    $errores[] = 'Dirección inválida de email';
                } else {
                    // convert the email to lowercase
                    $user = strtolower($user);
                    // Search for the lowercase version of $author['email']
                    /*$administra = $this->findByID($this->pdo,'access','email',$user);*/
                    $LoggedTable = new MeliFunctions('access','email');
                    $administra = $LoggedTable->findById($user);

                    if (empty($administra)) {
                        $num_errores += 1;
                        $errores[] = 'Credenciales inválidas';
                    } else {
                        if (!empty($contra)) {
                            if (!password_verify($contra,$administra['password'])) {
                                $num_errores += 1;
                                $errores[] = 'Credenciales inválidas';
                            } elseif (password_verify($contra,$administra['password'])) {
                                $_SESSION['user'] = $user;
                                $_SESSION['password'] = $administra['password'];
                                header('location: desk_admin.php');
                                die();
                            }
                        } else {
                            $num_errores += 1;
                            $errores[] = 'Credenciales inválidas';
                        }
                    }

                }
            }
        return $errores;
    }

    ////////////////////////////////////////////////////////////

    public function info_shipping($shipnumb,$ACCESS_TOK) {

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

    public function info_user($id_client) {
        
        $client = $this->checkValdTok($id_client);
        
        $cliente = curl_init();
        curl_setopt($cliente, CURLOPT_URL, 'https://api.mercadolibre.com/users/'.$id_client);
        curl_setopt($cliente, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($cliente, CURLOPT_HEADER, false);
        curl_setopt($cliente, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$client['access_tok']));
        curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($cliente);
        curl_close($cliente);

        $datos = json_decode($result,true);

        return $datos;
    }

    ///////////////////////////////////////////////////////////////

    private function refresh_tok($APP_ID,$SECRET_KEY,$REFRESH_TOK) {

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

        $datos = json_decode($result,true);
        
        return $datos;
        
    }

    ////////////////////////////////////////////////////////////////

    public function request_tok($code,$state,$APP_ID,$SECRET_KEY,$URL) {

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

        $datos = json_decode($result,true);
        
        return $datos;
    }


    ///////////////////////////////////////////////////////
    public function insert($fields) {
        $query = 'INSERT INTO `' .$this->table. '` (';

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
        
        $fields = $this->processDates($fields);
        
        DB::insert( $query, $fields);
    }

    ///////////////////////////////////////////////////////
    public function delete($id ) {
        $parameters = [':id' => $id];

        DB::delete('DELETE FROM `' . $this->table . '`WHERE `' . $this->primaryKey . '` = :id', $parameters);
    }

    ///////////////////////////////////////////////////////
    public function update_access($fields) {
        
        $query = 'UPDATE `' .$this->table. '` SET ';
        foreach ($fields as $indi => $valor){
            $query .= "`". $indi ."` = :". $indi .",";
        }
        
        $query = rtrim($query, ',');
        $query .= ' WHERE `user_id` = :primaryKey';
        
        $fields = $this->processDates($fields);
        
        // Set the :primaryKey variable
        $fields['primaryKey'] = $fields['user_id'];
        
        DB::update( $query, $fields);
    }

    ////////////////////////////////////////////////////////

    public function update($fields) {

        $query = ' UPDATE `' . $this->table .'` SET ';
        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '` = :' . $key . ',';
        }

        $query = rtrim($query, ',');
        $query .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';
        
        // Set the :primaryKey variable
        
        $fields['primaryKey'] = $fields[$this->primaryKey];
        $fields = $this->processDates($fields);
        DB::update( $query, $fields);
    }

    ////////////////////////////////////////////////////////

    private function processDates($fields) {
        
        foreach ($fields as $key => $value) {
            if ($value instanceof DateTime) {
                $fields[$key] = $value->format('Y-m-d H:i:s');
            }
        }
        
        return $fields;
    }

    ////////////////////////////////////////////////////////

    public function save($record) {
        try {
            
            $this->insert( $record);
            
        }
        catch (PDOException $e) {
            $this->update( $record);
            
        }
    }

    ////////////////////////////////////////////////////////

    public function ask_client($id_client) {
        
        /*$dat_user = $this->findById($this->pdo,'access','user_id',$id_client);*/
        $ClientTable = new MeliFunctions('access','user_id');
        $dat_user = $ClientTable->findById($id_client);
        
        return $dat_user;
    }

    ///////////////////////////////////////////////////////

    public function checkValdTok($id_client) {
        $timeNow =  new DateTime();
        
        $dat_user = $this->ask_client($id_client);
        $time_access = new DateTime($dat_user['fec_hora']);
        
        $interva = $time_access -> diff($timeNow);
        $interva = $this->Diff_On_Sec ($interva);
        
        if ($interva > 648000) {
                $message = 'Usuario con credenciales expiradas';
        } elseif (($interva > 21600) and ($interva < 648000)) {
                include 'Datosprogram.php';
                $datos = $this->refresh_tok($APP_ID,$SECRET_KEY,$dat_user['refresh_tok']);
                $TableAccessUser = new MeliFunctions('access','user_id');
                $TableAccessUser->update(['user_id' => $datos["user_id"],
                                          'access_tok' => $datos["access_token"],
                                          'refresh_tok' => $datos["refresh_token"],
                                          'fec_hora' => new DateTime()]); 
                /*$this->update($this->pdo, 'access', 'user_id', ['user_id' => $datos["user_id"],
                                        'access_tok' => $datos["access_token"],
                                        'refresh_tok' => $datos["refresh_token"],
                                        'fec_hora' => new DateTime()]);*/
                $dat_user = ['user_id' => $datos["user_id"],
                            'access_tok' => $datos["access_token"],
                            'refresh_tok' => $datos["refresh_token"],
                            'fec_hora' => new DateTime()];
        } 
        
        return $dat_user;
        
    }

    ///////////////////////////////////////////////////////

    private function Diff_On_Sec ($interva){
    $interva = ($interva -> format('%Y'))*365*24*60*60 +
            ($interva -> format('%m'))*30*24*60*60 +
            ($interva -> format('%d'))*24*60*60 +
            ($interva -> format('%H'))*60*60 +
            ($interva -> format('%i'))*60 +
            ($interva -> format('%s'));
        
    return $interva;
        }

    ///////////////////////////////////////////////////////

    public function insert_by_lots ($fields) {
        
        DB::beginTransaction();
        
        $n_data = count($fields);
        for ($i = 0; $i < $n_data; $i++) {
            
            $colum = $fields[$i];
            
            $query = 'INSERT INTO `' .$this->table. '` (';

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
            
            $colum = $this->processDates($colum);
            
            $query = rtrim($query, ', ');
            DB::insert( $query, $colum);
            
        }
        
        DB::commit();    
        
    }

    ///////////////////////////////////////////////////////

    public function query_customized ($parameters) {
        
        $query='SELECT * FROM `envios` WHERE ';
        
        $datos = [];
            
        if (isset($parameters['incl_client'])) {
                $query.= '`sender_id` = :client AND';
                $datos['client'] = $parameters['client'];
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
        if (isset($parameters['incl_zona'])) {
            switch ($parameters['zona']) {
            case "Zona 1":
                $query.= '`zip_code` >= :zip_min AND `zip_code` < :zip_max AND';
                $datos['zip_min'] = 0;
                $datos['zip_max'] = 1500;
                break;
            case "Zona 2":
                $query.= '`zip_code` IN (
                            1602, 1606, 1674, 1676, 1678, 1682, 1684, 1702, 1605, 1603, 1636, 1638, 1870, 1871, 1872, 1874, 1875, 1686, 1688, 1713, 1714, 1704, 1754, 1766, 1752, 1768, 1822, 1824, 1825, 1826, 1773, 1828, 1829, 1831, 1832, 1834, 1835, 1836, 1706, 1708, 1712, 1644, 1646, 1607, 1609, 1640, 1641, 1642, 1643, 1650, 1651, 1653, 1655, 1672, 1657
                                        ) AND';
                break;
            case "Zona 3":
                $query.= '`zip_code` IN (
                            1664, 1742, 1659, 1661, 1663, 1611, 1617, 1618, 1621, 1648, 1610, 1846, 1847, 1849, 1852, 1854, 1856, 1884, 1885, 1886, 1890, 1893, 1776, 1838, 1842, 1802, 1804, 1806, 1812, 1888, 1889, 1891, 1665, 1755, 1763, 1770, 1778, 1759, 1765, 1757, 1774, 1772, 1612, 1613, 1614, 1615, 1667, 1716, 1718, 1722, 1723, 1761, 1664, 1742, 1744, 1746, 1876, 1878, 1879, 1881, 1882
                                        ) AND';
                break;
            default:
                $packets[$i]['country'] = "Argentina";
            }
        }
        
        $query = rtrim($query, ' AND');
        
        $result = DB::select( $query, $datos);
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    ///////////////////////////////////////////////////////

    public function update_by_lots ($fields) {
        
        DB::beginTransaction();
        
        $n_data = count($fields);
        for ($i = 0; $i < $n_data; $i++) {
            
            $colum = $fields[$i];
            /////////////////////////////////////////////////
            $query = ' UPDATE `' . $this->table .'` SET ';
            foreach ($colum as $key => $value) {
                $query .= '`' . $key . '` = :' . $key . ',';
            }

            $query = rtrim($query, ',');
            $query .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';

            // Set the :primaryKey variable

            $colum['primaryKey'] = $colum[$this->primaryKey];
            //////////////////////////////////////////////////
            
            $colum = $this->processDates($colum);
            
            DB::update( $query, $colum);
            
        }
        
        DB::commit();    
        
    }

    //////////////////////////////////////////////////////
    public function print_answer ($shipnum,$ACCESS_TOK,$sender_id) {
        $shipping = $this->info_shipping($shipnum,$ACCESS_TOK);

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

}
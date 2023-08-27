<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classes\MeliFunctions;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class clientController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        include app_path() . '/files/Datosprogram.php';
        //$prueba = DB::select('SELECT * FROM access WHERE user_id = :user_id', ['user_id' => 21308690]);

        //$TablaAccess = new MeliFunctions('access','user_id');
        //$prueba = $TablaAccess->findById(688403891);
        $num_envios = 0;
        $TablaEnvios = new MeliFunctions('envios','id_ship');
        $_POST['new_query']['incl_client'] = True;
        $_POST['new_query']['incl_date'] = True;
        //$fecha2 = new DateTime();
        $fecha2 = Carbon::now();
        $fecha = $fecha2->modify('-1 day');
        $dat_user = $_SESSION;
        $_POST['new_query']['client'] = $dat_user['user_id'];
        $_POST['new_query']['begin_date'] = $fecha2->format('Y-m-d');
        $_POST['new_query']['end_date'] = $fecha->format('Y-m-d');
        $data = $TablaEnvios->query_customized($pdo,$_POST['new_query']);
        //echo($dat_user['user_id'] . PHP_EOL);
        //print_r($data);
        $packets = [];
        
        for ($i=0 ; $i<count($data) ; $i++ ){
            $ship_mat = $TablaEnvios->print_answer($data[$i]['id_ship'],$dat_user['access_tok'],$dat_user['user_id']);
            usleep(10*10000); //10 envíos por seg 
            
            $packets[$i] = [];
            $packets[$i]['id_ship'] = $ship_mat[0][0];
            $packets[$i]['date_in'] = $data[$i]['date_in'];
            $packets[$i]['status'] = $ship_mat[0][2];
            $packets[$i]['street_name'] = $ship_mat[1][0];
            $packets[$i]['street_number'] = $ship_mat[1][1];
            $packets[$i]['comment'] = $ship_mat[1][2];
            $packets[$i]['zip_code'] = $ship_mat[1][3];
            $packets[$i]['city'] = $ship_mat[1][4];
            $packets[$i]['state'] = $ship_mat[1][5];
            $packets[$i]['country'] = $ship_mat[1][6];
            $packets[$i]['receiver_name'] = $ship_mat[2][0];
            $packets[$i]['receiver_phone'] = $ship_mat[2][1];
            $packets[$i]['date_first_visit'] = $ship_mat[4][0];
            $packets[$i]['date_delivered'] = $ship_mat[4][1];
            $packets[$i]['date_not_delivered'] = $ship_mat[4][2];
        }

        return view('client_query', compact('packets')); 
        //return print_r($prueba);
    }
}

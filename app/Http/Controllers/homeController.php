<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function mail(Request $request){
        
        $errorMSG = "";

        // NAME
        if (empty($_POST["nombre"])) {
            $errorMSG = "Name is required ";
        } else {
            $name = $_POST["nombre"];
        }

        // EMAIL
        if (empty($_POST["email"])) {
            $errorMSG .= "Email is required ";
        } else {
            $email = $_POST["email"];
        }

        $telefono = $_POST["telefono"];
        $message = $_POST["comentario"];

        // MSG SUBJECT
        if (empty($_POST["asunto"])) {
            $errorMSG .= "Subject is required ";
        } else {
            $msg_subject = $_POST["asunto"];
        }

        // NUMERO DE PAQUETES
        if (empty($_POST["num_packets"])) {
            $errorMSG .= "Amounts of packets is required ";
        } else {
            $num_packets = $_POST["num_packets"];
        }


        $EmailTo = "contacto@pegasoenvios.com";
        $EmailTo2 = "amichinel@gmail.com";
        //$EmailTo3 = "sulbarand34@gmail.com";
        $Subject = "New Message Received";

        // prepare email body text
        $Body = "";
        $Body .= "Name: ";
        $Body .= $name;
        $Body .= "\n";
        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";
        $Body .= "Teléfono: ";
        $Body .= $telefono;
        $Body .= "\n";
        $Body .= "Cantidad de envíos: ";
        $Body .= $num_packets;
        $Body .= "\n";
        $Body .= "Subject: ";
        $Body .= $msg_subject;
        $Body .= "\n";
        $Body .= "Message: ";
        $Body .= $message;
        $Body .= "\n";

        // send email
        $headers = "From:".$email . "\r\n" . "CC: ".$EmailTo2; //. ", " .$EmailTo3;
        $success = mail($EmailTo, $Subject, $Body, $headers);

        return view('home');
        
    }
}

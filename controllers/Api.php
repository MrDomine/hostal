<?php
require_once("./models/Habitacion_model.php");
    class ApiController{
        public function index()
        {
            
        }

        public function crearReserva()
        {
            $reservaHabitacion = new Habitacion();
            $idHabitacion = $_GET["id"];
            $nombre = $_GET["nombre"];
            $password = $_GET["pass"];

            $reserva=$reservaHabitacion->reservar($idHabitacion,$nombre,$password);
            if($reserva){
                echo "Habitacion reservada";
                die();
            } else {
                echo "Error";
                die();
            }
        }

        public function librarHabitacion()
        {
            $liberarHabitacion = new Habitacion();
            $idHabitacion = $_GET["id"];
            $password = $_GET["pass"];

            $liberar = $liberarHabitacion->salir($idHabitacion,$password);
            if($liberar){
                echo "Habitacion liberada";
                die();
            } else {
                echo "Error";
                die();
            }
        }
    }
?>
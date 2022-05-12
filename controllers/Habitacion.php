<?php
require_once("./models/Habitacion_model.php");

    class HabitacionController{
        public function index()
        {
            $habitaciones= new Habitacion();
            $arrayHabitaciones=$habitaciones->getHabitaciones();
            $estaLibre=$this->comprobarLibre($arrayHabitaciones);
            require_once("./views/hostal/hostal.php");
        }

        public function comprobarLibre($arrayHabitaciones)  
        {
            for($i=0;$i<count($arrayHabitaciones);$i++){
                if($arrayHabitaciones[$i]["huesped"]!=""){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function reservar($idHabitacion, $nombre, $pass)
        {
            
        }
    }
?>
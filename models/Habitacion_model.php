<?php
    class Habitacion{
        private $db;
        private $habitaciones;
        private $idhabitacion;

        public function __construct()
        {
            $this->db=Conectar::conexion();
            $this->habitaciones=array();

        }

        public function getHabitaciones()
        {
            $dormitorios=array();
            $consulta="SELECT idreserva, nombre_habitacion,huesped,contraseña,fecha_reserva, TIMESTAMPDIFF(DAY,fecha_reserva,now()) as dias_reservado FROM habitaciones";
            $stm=$this->db->prepare($consulta);
            $stm->execute();
            $result=$stm->get_result();

            while($room=$result->fetch_assoc()){
                //array_push($dormitorios, array($room["idreserva"],$room["nombre_habitacion"], $room["fecha_reserva"], $room["huesped"], $room["contraseña"]));
                array_push($dormitorios,$room);
            }

            return $dormitorios;
        }

        public function reservar($idhabitacion, $huesped, $pass)         
        {
            $consulta = "UPDATE habitaciones SET huesped=?, contraseña=?, fecha_reserva=now() WHERE idreserva=?";
            $stm=$this->db->prepare($consulta);
            $stm->bind_param("ssi",$huesped,$pass,$idhabitacion);
            $stm->execute();
            $result=$stm->affected_rows;
            if($result>0){
                return true;
            } else {
                return false;
            }
        }

        public function salir($idhabitacion,$pass)
        {
            try{
            $consulta="UPDATE habitaciones SET huesped='', contraseña='', fecha_reserva=NULL WHERE idreserva=? AND contraseña=?";
            $stm=$this->db->prepare($consulta);
            $stm->bind_param("is", $idhabitacion,$pass);
            $stm->execute();

            $result=$stm->affected_rows;
            if($result>0){
                return true;
            } else {
                return false;
            }
            } catch(\Throwable $e){
                var_dump($e);
                die();
            }
        }
    }
?>
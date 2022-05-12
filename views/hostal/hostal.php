<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/js.js"></script>
    <title>Hostal</title>
</head>
<body>
    <main>
        <div class="contenedor col-6">
        <?php require_once("./views/fragments/cabecera.php") ?>
            <table class="table table-striped table-responsive" id="datos">
                <tr class="active">
                    <th>Id reserva</th>
                    <th>Habitacion</th>
                    <th>Huesped</th>
                    <th>Fecha reserva</th>
                    <th>Dias reservados</th>
                    <th></th>
                </tr>
                <?php
                    for($i=0;$i<count($arrayHabitaciones);$i++){
                        if($arrayHabitaciones[$i]["huesped"]==NULL){
                            $boton="<button class='btn boton btnReserva' id='reserva".$arrayHabitaciones[$i]["idreserva"]."'> Reservar </button>";
                            $dias = "";
                        } else {
                            $boton="<button class='btn boton btnSalir' id='salir".$arrayHabitaciones[$i]["idreserva"]."'> Salir </button>";
                            $dias = $arrayHabitaciones[$i]["dias_reservado"]." dias";
                        }

                        echo "<tr>
                        <td>".$arrayHabitaciones[$i]["idreserva"]."</td>
                        <td>".$arrayHabitaciones[$i]["nombre_habitacion"]."</td>
                        <td>".$arrayHabitaciones[$i]["huesped"]."</td>
                        <td>".$arrayHabitaciones[$i]["fecha_reserva"]."</td>
                        <td class='dias'>".$dias."</td>
                        <td class='celdaBtn' id='habitacion".$arrayHabitaciones[$i]["idreserva"]."'>".$boton."</td>
                        </tr>";
                    }
                ?>
            </table>

            <div class="modal fade" id="modalReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reserva</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="post">
                        <div class="modal-body">
                            <input type="hidden" name="idHabitacion" id="idHabitacion">
                            <label for="" class="campoModal">Nombre: </label>
                            <input type="text" name="nombre" id="nombre" class="campoModal">
                            <label for="" class="campoModal">Contraseña: </label>
                            <input type="password" name="pass" id="pass" class="campoModal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="aceptar">Aceptar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalLibre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Abandonar reserva</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="post">
                        <div class="modal-body">
                            <input type="hidden" name="idHabitacion" id="habitacionLibre">
                            <label for="" class="campoModal">Contraseña: </label>
                            <input type="password" name="pass" id="passVerify" class="campoModal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="abandonar">Aceptar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
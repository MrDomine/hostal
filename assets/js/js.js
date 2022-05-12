window.onload=function(){
    $(".btnReserva").click(function(event){
        $("#idHabitacion").val(event.currentTarget.id.substring(7));
        $("#modalReserva").modal();
    });

    $("#aceptar").click(function(){
        let idHabitacion = $("#idHabitacion").val();
        let nombre = $("#nombre").val();
        let pass = $("#pass").val();

        $.ajax({
            url: "?c=api&a=crearReserva&id=" + idHabitacion + "&nombre=" + nombre + "&pass=" + pass,
            success: function(result){
                if(result == "Error"){
                    alert("No se ha podido reservar la habitacion");
                } else {
                    location.reload();
                }
            }
        })
    })

    $(".btnSalir").click(function(event){
        $("#habitacionLibre").val(event.currentTarget.id.substring(5));
        $("#modalLibre").modal();
    });

    $("#abandonar").click(function(){
        let idHabitacion = $("#habitacionLibre").val();
        let pass = $("#passVerify").val();

        $.ajax({
            url: "?c=api&a=librarHabitacion&id=" + idHabitacion + "&pass=" + pass,
            success: function(result){
                if(result == "Error"){
                    alert("No se ha podido liberar la habitacion");
                } else {
                    location.reload();
                }
            }
        })
    })
}
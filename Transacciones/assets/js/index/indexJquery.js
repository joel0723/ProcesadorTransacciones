$(document).ready(function () {
    // peliculas/delete.php?id=<?= $estudiante->Id ?>

    $(".btn-delete").on("click", function () {



        if (confirm("Estas seguro que quieres eliminar a esta transaccion?")) {
            let id = $(this).data("id");
            window.location.href = "transacciones/delete.php?id=" + id;




        }


    });



});
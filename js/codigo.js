// configuracion en español de datatable
$('.table').DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
    "ordering": false,
});

// funcion para eliminar un registro mediante ajax
const eliminar = (tabla, id) => {
    //event.preventDefault();
    let opcion = confirm("¿Estas seguro de eliminar este registro?");
    if (opcion == true) {
        $.ajax({
        type: 'POST',
        url: './delete.php',
        data: {id:id, tabla: tabla},
        success: function(response){
            //console.log(response)
            location.reload()  
        }
        });
    }     
}

// funcion para asignar el id al formulario del modal en aceptar 
const asignar_cargo = id => {
  $("#id_usuario_cargo").val(id)
}


function confirmar(valor){
    //ruta.concat(variable,")}}");
    swal({
      title: "¿Eliminar aviso?",
      text: "Esta acción es irreversible.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Aviso eliminado", {
          icon: "success",
        });
        document.getElementById("formulario"+valor).submit();
      } else {
        swal("Eliminación cancelada");
      }
    });
}
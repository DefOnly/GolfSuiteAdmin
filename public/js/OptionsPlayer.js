$(document).ready(function(){

  $(".datepicker").datepicker(
    {
      dateFormat: 'dd/mm/yy',
      firstDay: 1
    }).datepicker("setDate", new Date());
    
    var labelCheck = $('.label__checkbox');
    var addPlayers = $('#addPlayers');
    var crearTorneo = $('.crearTorneo');
    var btnEliminar = $('#btnEliminar');
    var form_delete = $('.form-delete');
    var Paginate_Dinamic = $('#players');
    var form_torneo = $('.form-torneo');

    var habilitado = $('#habilitado');
    var bloqueado = $('#bloqueado');
    // Paginate_Dinamic.DataTable( {
    //   "pagingType": "full_numbers"
    // });

    labelCheck.on('change', function(){     
           if(labelCheck.is(':checked')) {
                  addPlayers.slideDown();
                  btnEliminar.slideDown();
                }
                else {  
                  addPlayers.slideUp();
                  btnEliminar.slideUp();
                }
    });

    habilitado.on('click', function(){

      Lobibox.notify('success', {
        size: 'mini',
        rounded: true,
        delayIndicator: false,
        icon: 'fa fa-check-circle',
        sound: 'sound2.mp3',
        title: '¡Jugador Habilitado!'
        });
    });

    bloqueado.on('click', function(){

      Lobibox.notify('success', {
        size: 'mini',
        rounded: true,
        delayIndicator: false,
        icon: 'fa fa-check-circle',
        sound: 'sound2.mp3',
        title: '¡Jugador Bloqueado!'
        });
    });

  crearTorneo.on('click', function(){

      Lobibox.notify(type, {
        icon: 'fa fa-check-circle',
      sound: 'sound2.mp3',
      title: '¡Torneo Creado!',
      delay: false,
        });
    });

  form_delete.submit(function(e){

    e.preventDefault();

    Swal.fire({
      title: '¿Está seguro?',
      text: "¡El o los jugadores perderán su progreso, no podrá revertir los cambios!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#09e06a',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, Eliminar Jugadores!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit(function(){
    
          Lobibox.notify('success', {
          size: 'mini',
          rounded: true,
          delayIndicator: false,
          icon: 'fa fa-check-circle',
          sound: 'sound2.mp3',
          title: '¡Jugadores Eliminados!'
          });
        
    }); 
        
      }
    })
  });

  form_torneo.submit(function(e){

    e.preventDefault();

    Swal.fire({
      title: '¿Está seguro?',
      text: "¡Se elimirá el torneo y a todos los jugadores!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#09e06a',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, Eliminar Torneo!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit(function(){
    
          Lobibox.notify('success', {
          size: 'mini',
          rounded: true,
          delayIndicator: false,
          icon: 'fa fa-check-circle',
          sound: 'sound2.mp3',
          title: '¡Jugadores Eliminados!'
          });
        
    }); 
        
      }
    })
  });
});

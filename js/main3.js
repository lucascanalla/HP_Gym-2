$(document).ready(function(){

    $('form').on('submit', function(ev){
    //ev.preventDefault();
    var esValido = true;
    var $this = $(this);
    var errores = ["","","",""];

    $('.errores').addClass('hide');
    $('ul.listaErrores').html('');
    document.getElementsByClassName('listaErrores')[0].innerHTML = '';

    ///Validacion de identificaSocio.php
     $this.find('[id="dniNoEncontrado"]').each(function(indice, elemento){
      esValido = false;
      errores[2] = 'El DNI ingresado no corresponde a un Profesional existente';
    });


    if(esValido == false){
      ev.preventDefault();
      $('.errores').removeClass('hide');
      for(i=0; i < errores.length ; i++ ){
        if( errores[i] != '' ){
          $('<li>'+ errores[i] + '</li>').appendTo('.listaErrores');
        }
      }
    };
   
    console.log(esValido,'esValido', errores);
  });

 
});


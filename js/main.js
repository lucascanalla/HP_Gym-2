$(document).ready(function(){

    $('form').on('submit', function(ev){
    //ev.preventDefault();
    var esValido = true;
    var $this = $(this);
    var errores = ["","","",""];

    $('.errores').addClass('hide');
    $('ul.listaErrores').html('');
    document.getElementsByClassName('listaErrores')[0].innerHTML = '';

    // Validamos que todos los campos esten completos
    $this.find('.obligatorio').each(function(indice, elemento){

      if( $(elemento).val() === '' ){
        esValido = false;
        errores[0] = 'Existe al menos un campo obligatorio vacío';
      }

    });

    $this.find('.numerico').each(function(indice, elemento){

      if( !$(elemento).val().match(/^[0-9]+$/)){
        esValido = false;
        errores[4] = 'Existe al menos un campo numérico inválido';
      }

    });

      var dni = $this.find('[id="dni"]').val();
   // $this.find('[id="dni"]').each(function(indice, elemento){
     if( dni.lenght > 9 ){
        esValido = false;
        errores[1] = 'El DNI es inválido';
      };




    $this.find('[id="dniNO"]').each(function(indice, elemento){

      esValido = false;
      errores[2] = 'El DNI ingresado ya corresponde a un Profesional';
    });

    

    // validamos que el email esta ingresado correctamente
    var email = $this.find('[name="mail"]').val();
    
      if(validateEmail(email) == false){
        esValido = false;
        errores[3] = 'El email ingresado es invalido';
      };
    

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

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateNumeros(numeros){
    var num = /^[0-9]+$/;
    return num.test(numeros);
}


    

    // validar que las contraseñas coincidan

   // var contrasena = $this.find('[name="contrasena"]').val();
    //var repetirContrasena = $this.find('[name="repetirContrasena"]').val();

    //if( contrasena != repetirContrasena ){
    //  esValido = false;
   //   errores[2] = 'Las contraseñas no coinciden';
  //}











 // seleccionando elementos por atributo name
  /*$('[name="contrasena"]').on('click',function(){
    alert('Su contraseña tiene que tener más de 4 caracteres.');
  });*/

  // seleccionando elementos por atributo type
  /*$('[type="password"]').on('click',function(){
    alert('Su contraseña tiene que tener más de 4 caracteres.');
  });*/

  // seleccionando elementos por clase
  /*$('.contrasena').on('click',function(){
    alert('Su contraseña tiene que tener más de 4 caracteres.');
  });*/

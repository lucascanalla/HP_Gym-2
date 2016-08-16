// Avoid `console` errors in browsers that lack a console.

$(document).ready(function() { 
      $('#dni').blur(function(){
        
        $('#resultado').html('<img src="loader.gif" alt="" />').fadeOut(1000);

        var dni = $(this).val();       
        var dataString = 'dni='+dni;
        
        $.ajax({
            type: "POST",
            url: "js/valida2.php",
            data: dataString,
            success: function(data) {
                $('#resultado').fadeIn(1000).html(data);
            }
        });
    });          
});    


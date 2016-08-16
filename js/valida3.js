// Avoid `console` errors in browsers that lack a console.

$(document).ready(function() {  
    
   // $('input[type=radio]').each(function(){ 
      $('#boton').click(function(){
        
            
            $('#loader').html('<img src="infinity.gif" alt="" />').fadeOut(1000);

            var esp = document.getElementById('esp').value;
            console.log(esp);
            //var dia = $(this).val(); 
            var dia = $('input:radio[name=dia]:checked').val();
            console.log(dia);
            var dataString  = new Array(dia,esp);
            var jsonString = JSON.stringify(dataString);
            //var dataString2 = 'esp='+esp;
            console.log(dataString);
             console.log(jsonString);
            
            $.ajax({
                type: "POST",
                url: "js/valida3.php",
                data: {data : jsonString},
                success: function(data) {
                    $('#resultado').fadeIn(1000).html(data);
                }
           
        });  
    });                          
});    


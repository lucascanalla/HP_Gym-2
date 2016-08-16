$("document").ready(function(){

	$("#provincia").load("provincias.php");
	$("#provincia").change(function(){
		var id=$("#proveedor").val();
		$.get("localidades.php",{param_id:id})
		.done(function(data){
			$("#localidad").html(data);

			$("#localidad").change(function(){
				var.idlocalidad = $("#localidad").val();
				$.get("")
			})
		})

	})
})
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script language="javascript">
var timestamp = null;
function cargar_push() 
{ 
	$.ajax({
	async:	true, 
    type: "POST",
    url: "httpush.php",
    data: "&timestamp="+timestamp,
	dataType:"html",
    success: function(data)
	{	
		//console.log(data);

		var json    	   = eval("(" + data + ")");
		timestamp 		   = json.timestamp;
		mensaje     	   = json.mensaje;
		id        		   = json.id;
		sonido      	   = json.sonido;

		if(timestamp == null)
		{
		
		}
		else
		{

		//var sonido = 0;

			$.ajax({
			async:	true, 
			type: "POST",
			url: "mensajes.php",
			data: {"id":id},
			dataType:"html",
			success: function(data)
			{	

				// reproduce sonido para mensajes nuevos

				if (sonido == 1){
			
					new Audio("bell.wav").play();

				}

				
				$('#contenido').html(data);
			}
			});	
		}
		setTimeout('cargar_push()',1000);
		    	
    }
	});		
}

$(document).ready(function()
{
	cargar_push();
});	 

</script>

</head>

<body>
<div id="contenido">
</div>




</body>
</html>
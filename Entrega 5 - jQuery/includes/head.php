<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Refugi Gaïa | informació i reserves</title>
	
	<meta name="title" content="Reserves online refugi de muntanya Gaïa Spain" />
	<meta name="description" content="Situat Pirineus Aragonès, al Parc Natural Serra de Besava. Activitats d'alta muntanya: excursions i ascensions a cims, travesses (GR11, HRP), escalada, esquís de travessa, raquetes de neu .." />
	<meta name="keywords" content="refugi gaia, refugis, situats al Pirineu Aragones, Parc Nacional, activitats d'alta muntanya,excursions, ascensions a cims, travesses, escalada, esqui de travessia, raquetes de neu" />
	<meta name="Url" content="http://www.refugigaia.besaba.com" />
    
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script>
		var i = 0;
		$(function(){
			$("#logo2").on("click", function(){
			if (i==0){
				i = 1;
				$("#logorefugi").attr('src', 'img/logo_inv.jpg');
			} else {
				i = 0;
				$("#logorefugi").attr('src', 'img/logo.jpg');
			}
		  });
		});	
	
		$(function() {
			$( "#accordion" ).accordion();
			$( document ).tooltip();
			$( "#datepicker" ).datepicker();
			$( "#datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy");
			
			var availableTags = [
				"Canigó",
				"Peguera",
				"Pedraforca"
			];
			$( "#tags" ).autocomplete({
				source: availableTags
			});
		});	

		function showHabitacio(str) {
			if (str == "") {
				document.getElementById("txtHint2").innerHTML = "";
				return;
			} else { 
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","getreserva.php?habitacio="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	
	
</head>

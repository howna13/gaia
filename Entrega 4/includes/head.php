<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Refugi Gaïa | informació i reserves</title>
	
	<meta name="title" content="Reserves online refugi de muntanya Gaïa Spain" />
	<meta name="description" content="Situat Pirineus Aragonès, al Parc Natural Serra de Besava. Activitats d'alta muntanya: excursions i ascensions a cims, travesses (GR11, HRP), escalada, esquís de travessa, raquetes de neu .." />
	<meta name="keywords" content="refugi gaia, refugis, situats al Pirineu Aragones, Parc Nacional, activitats d'alta muntanya,excursions, ascensions a cims, travesses, escalada, esqui de travessia, raquetes de neu" />
	<meta name="Url" content="http://www.refugigaia.besaba.com" />
    
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script>
		function showHint(str) {
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "gethint.php?q=" + str, true);
				xmlhttp.send();
			}
		}
	</script>
	
	<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
	<script>

		function hideElement(){
			$('taula_reserves').hide();
		}
		
		function showElement(){
			$('taula_reserves').show();
		}

	</script>
	
</head>

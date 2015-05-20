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
				xmlhttp.open("GET", "gethint.php?habitacio=" + str, true);
				xmlhttp.send();
			}
		}
		
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
	
	<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
	<script>

		function hideElement(){
			$('taula_reserves').hide();
		}
		
		function showElement(){
			$('taula_reserves').show();
		}
		
		function SubmitRequest()
		{
			new Ajax.Request('/ajax.cgi', {
			method: 'get',
			onSuccess: successFunc,
			onFailure:  failureFunc
			});
		}

		function successFunc(response){
			 if (200 == response.status){
				alert("Call is success");
			}
			var container = $('notice');
			var content = response.responseText;
			container.update(content);
		}

		function failureFunc(response){
			 alert("Call is failed" );	
		}

	</script>
	
</head>

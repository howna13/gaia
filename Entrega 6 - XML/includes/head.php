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
		function loadJSON(data)
		{
			text = (JSON.stringify(data));
			$.ajax({
				method: "POST",
				url: "ajax.php",
				data: { data: text},
				dataType: "json"
			})
	}
	
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
			var xmlhttp;
			var txt,xx,x,i;
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
						if (window.DOMParser)
						  {
						  parser=new DOMParser();
						  xmlDoc=parser.parseFromString(xmlhttp.responseText.trim(),"text/xml");
						  }
						else // Internet Explorer
						  {
						  xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
						  xmlDoc.async=false;
						  xmlDoc.loadXML(xmlhttp.responseText); 
						  }
																		
						txt="<table id=\"taula_reserves\"><tr><th>Dia</th><th>Persones</th><th>Habitació</th></tr>";
						x=xmlDoc.getElementsByTagName("RESERVA");
						
						for (i=0;i<x.length;i++)
						  {
						  txt=txt + "<tr>";
						  xx=xmlDoc.getElementsByTagName("DIA");
							{
							try
							  {
							  txt=txt + "<td>" + xx[i].childNodes[0].nodeValue + "</td>";
							  }
							catch (er)
							  {
							  txt=txt + "<td>&nbsp;</td>";
							  }
							}
						xx=xmlDoc.getElementsByTagName("N_PERSONES");
						  {
							try
							  {
							  txt=txt + "<td>" + xx[i].childNodes[0].nodeValue + "</td>";
							  }
							catch (er)
							  {
							  txt=txt + "<td>&nbsp;</td>";
							  }
							}
						  
						xx=xmlDoc.getElementsByTagName("HABITACIO");
							{
							try
							  {
							  txt=txt + "<td>" + xx[i].childNodes[0].nodeValue + "</td>";
							  }
							catch (er)
							  {
							  txt=txt + "<td>&nbsp;</td>";
							  }
							}
						txt=txt + "</tr>";
						}
						txt=txt + "</table>";
						document.getElementById('txtHint2').innerHTML=txt;
					}
				}
				xmlhttp.open("GET","getreserva.php?habitacio="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	
	
</head>

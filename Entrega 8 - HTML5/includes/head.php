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
	
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	
	<script>
	
		var map;
		function initialize() {
		  var mapOptions = {
			zoom: 18
		  };
		  map = new google.maps.Map(document.getElementById('map-canvas'),
			  mapOptions);

		  // Try HTML5 geolocation
		  if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
			  var pos = new google.maps.LatLng(position.coords.latitude,
											   position.coords.longitude);

			  var infowindow = new google.maps.InfoWindow({
				map: map,
				position: pos,
				content: 'La seva localització'
			  });

			  map.setCenter(pos);
			}, function() {
			  handleNoGeolocation(true);
			});
		  } else {
			// Browser doesn't support Geolocation
			handleNoGeolocation(false);
		  }
		}

		function handleNoGeolocation(errorFlag) {
		  if (errorFlag) {
			var content = 'Error: The Geolocation service failed.';
		  } else {
			var content = 'Error: Your browser doesn\'t support geolocation.';
		  }

		  var options = {
			map: map,
			position: new google.maps.LatLng(60, 105),
			content: content
		  };

		  var infowindow = new google.maps.InfoWindow(options);
		  map.setCenter(options.position);
		}

		google.maps.event.addDomListener(window, 'load', initialize);

	
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
			document.getElementById("i_"+data).value = "si";
		}
		
		var n,m;
		function cancelarReserva(n_reserva,i){
			$.ajax({
			  method: "POST",
			  url: "ajax.php?mode=reserva",
			  data: { n_res: n_reserva},
			})
			
			n= n-1;
			m = m-1;
			if (n == 0){
				$( '#'+i ).animate({opacity: "0.01"});
				$( "#taula_reserves" ).animate({opacity: "0.01"});
			} else {
				$( "#"+i ).fadeOut("slow")
			}
			if(m == 0){
				$( "#nova_reserva" ).fadeOut("slow");
			}
			window.setTimeout(cancelarReservaBis,1000);
		}
		
		function cancelarReservaBis(n_reserva,i){
			if(n == 0){
				$( i ).css('visibility','hidden');
				$( "#taula_reserves" ).css('visibility','hidden');
			}
			if (m == 0){
				location.reload();
			} else if (n == 0){
				$( "#taula_reserves" ).remove();
			}
		}
		
		function confirmarCancelarReserva(i){
			xx=xmlDoc.getElementsByTagName("DIA");
			dia = xx[i].childNodes[0].nodeValue;
			xx=xmlDoc.getElementsByTagName("N_PERSONES");
			n_per = xx[i].childNodes[0].nodeValue;
			xx=xmlDoc.getElementsByTagName("HABITACIO");
			hab = xx[i].childNodes[0].nodeValue;
			xx=xmlDoc.getElementsByTagName("N_RESERVA");
			n_reserva = xx[i].childNodes[0].nodeValue;
			if (confirm("La següent reserva serà cancelada:  \n\n    Dia:              "+dia+"\n    Persones:     "+n_per+"\n    Habitació:    "+hab) == true) {
				cancelarReserva(n_reserva,i);
			}
		}
		
		function getValueCookie(name){
			var valor = "";
			var allCookies = document.cookie.split(";"); // ["username=smith","password=12345"]
			for (var i = 0; i < allCookies.length; i++) {
				var eachCookie = allCookies[i].split("="); // ["username", "smith"]
				var cookieName = eachCookie[0]; // "username"
				var cookieValue = eachCookie[1]; // "smith"
				if(cookieName == name){
					valor = cookieValue;
				}
			}
			return valor;
		}
		
		function foc(){
			valor = getValueCookie("foc");
			
			if(valor == "true"){
				$("#feec").attr('src', 'img/feec_onfire.gif');
				
			} else{
				$("#feec").attr('src', 'img/feec.jpg');
			}
		}
		
		function changeFoc(){
			valor = getValueCookie("foc");
			var now = new Date();
			var time = now.getTime();
			time += 5*60; //5 min
			now.setTime(time);
			if(valor == "true"){
				document.cookie="foc=false";
				valor = getValueCookie("foc");
				$("#feec").attr('src', 'img/feec.jpg');	
			} else{
				document.cookie="foc=true";
				valor = getValueCookie("foc");
				$("#feec").attr('src', 'img/feec_onfire.gif');
			} 
			
		}
		
		function loadJSON(data)
		{
			text = (JSON.stringify(data));
			$.ajax({
			  method: "POST",
			  url: "ajax.php?mode=json",
			  data: { data: text},
			})
		}
		
		function registre(){
			window.location.href="index.php?registre=";
		}
		
		function registreBis(){
			alert("HEU ESTAT REGISTRATS AMB ÈXIT!\n\n Ja podeu procedir al login");
		}
		
		function updateUser() {
			var xmlhttp;
			var txt,xx,x,i;
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
																	
					txt=xmlDoc.getElementsByTagName("NOM")[0].childNodes[0].nodeValue;
					$("#nom").val(txt);
					$("#top_username").text(txt.toUpperCase());
					
					txt=xmlDoc.getElementsByTagName("COGNOMS")[0].childNodes[0].nodeValue;
					$("#cognoms").val(txt);
					
					txt=xmlDoc.getElementsByTagName("USERNAME")[0].childNodes[0].nodeValue;
					$("#username").val(txt);
					
					txt=xmlDoc.getElementsByTagName("EMAIL")[0].childNodes[0].nodeValue;
					$("#email").val(txt);
					
					$("#canvis").before("<br />");
					$("#canvis").text('\nCanvis efectuats correctament');
				}
			}
			xmlhttp.open("GET","ajax.php?mode=xml",true);
			xmlhttp.send();
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
						
						
						x=xmlDoc.getElementsByTagName("RESERVA");
						if (str == "totes"){
							m = x.length;
						}
						n = x.length;
						txt="<table id=\"taula_reserves\"><tr><th>Dia</th><th>Persones</th><th>Habitació</th><th>Sopar</th><th>Esmorzar</th><th>Picnic</th></tr>";
						for (i=0;i<x.length;i++)
						  {
						  txt=txt + "<tr id=\""+i+"\">";
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
						
						xx=xmlDoc.getElementsByTagName("SOPAR");
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
						
						xx=xmlDoc.getElementsByTagName("ESMORZAR");
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
						
						xx=xmlDoc.getElementsByTagName("PICNIC");
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
						txt=txt + "<td><img onclick=\"confirmarCancelarReserva("+i+")\"  style=\"padding-left: 40px; padding-top: 7px;\"src=\"img/cancela.jpg\"></td></tr>";
						}
						txt=txt + "</table>";
						
						if(x.length>0){
							document.getElementById('txtHint2').innerHTML=txt;
						} else {
							document.getElementById('txtHint2').innerHTML="";
						}
						
					}
				}
				xmlhttp.open("GET","getreserva.php?habitacio="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	
	
</head>

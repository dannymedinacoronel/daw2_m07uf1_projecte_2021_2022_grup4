// Documentació:
// https://www.w3schools.com/xml/ajax_intro.asp
// https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/readyState

function esbUsuari() {
	// Variables locals
	var urlCodi = "http://localhost/projecte1/EsbUsr.php?q=";
	var metode = "DELETE";
	// Dades rebudes d'HTML
	var nomUsuari = document.forms['frmEsbUsr'].elements["nomUsr"].value;
	// Enviament dades a PHP
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) { 
			if ((xhttp.status == 200) || (xhttp.status == 403) || (xhttp.status == 404) || (xhttp.status == 405)){ 
				document.getElementById("resp").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open(metode,urlCodi + nomUsuari,true);
	xhttp.send();				
}

function netForm() {
	document.getElementById("resp").innerHTML ="";
	document.forms['frmEsbUsr'].elements["nomUsr"].value ="";
	location.reload();
}

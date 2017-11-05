function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function MostrarConsulta(datos){
	divResultado = document.getElementById('resultado');

	ajax=objetoAjax();
	ajax.open("POST", datos);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}

	unidad = document.getElementById('unidad').value
	empresa = document.getElementById('empresa').value

	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   	//enviando los valores
  	ajax.send("unidad="+unidad+"&empresa="+empresa)
}

function mostrarFormFecha() {
	opcion = document.getElementById('opcion').value;
	busqueda = document.getElementById('busqueda');
	if (opcion == 'fecha') {
		busqueda.type = 'date'
	} else {
		busqueda.type = 'text'
	}
}
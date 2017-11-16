window.addEventListener('load', function () {
	document.getElementById('btnAceptar').onclick = function () {
		alert('No olvides revisar el SIM');
	};

	document.getElementById('txtEmpresa').addEventListener('change', function() {
		mostrarConsulta('consulta.php');
	});
});

function mostrarConsulta(datos){
	divResultado = document.getElementById('resultado');

	ajax=objetoAjax();
	ajax.open("POST", datos);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}

	unidad = document.getElementById('txtUnidad').value
	idEmpresa = document.getElementById('txtEmpresa').value

	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   	//enviando los valores
  	ajax.send("unidad="+unidad+"&idEmpresa="+idEmpresa)
}
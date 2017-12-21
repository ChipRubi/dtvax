window.addEventListener('load', function() {
	document.getElementById('opcion').addEventListener('change', function() {
		cambiarBuscador();
	});
});

function cambiarBuscador() {
	opcion = document.getElementById('opcion').value;

	fecha = document.getElementById('txtFecha');
	unidad = document.getElementById('txtUnidad');
	empresa = document.getElementById('txtEmpresa');

	if (opcion == 'fecha') {
		fecha.style.display = "inline"
		unidad.style.display = "none"
		empresa.style.display = "none"
		
	} else if (opcion == 'unidad') {
		fecha.style.display = "none"
		unidad.style.display = "inline"
		empresa.style.display = "inline"

	} else if (opcion == 'todo') {
		fecha.style.display = "none"
		unidad.style.display = "none"
		empresa.style.display = "none"
	}
}
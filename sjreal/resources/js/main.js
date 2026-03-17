let form = document.querySelector('form');
if (form) {
    form.addEventListener('submit', function(event) {
        let id = document.getElementById('id_doc_huesped');
        let tipoDoc = document.getElementById('tipo_doc_huesped');
        let nacionalidad = document.getElementById('nacionalidad_huesped');
        let nombre = document.getElementById('nombre_huesped');
        let apellido = document.getElementById('apellido_huesped');
        let telefono = document.getElementById('telefono_huesped');
        

        if (!id.value ||
            !tipoDoc.value || 
            !nacionalidad.value || 
            !nombre.value ||
            !apellido.value || 
            !telefono.value) {
            event.preventDefault();
            alert('Por favor, completa todos los campos obligatorios.');
        }
    });
}

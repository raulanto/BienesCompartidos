window.addEventListener('DOMContentLoaded', function() {
    // Obtener referencia al formulario y al input
    var form = document.getElementById('myForm');
    var input = document.getElementById('CURP');
  
    // Agregar evento de escucha al input
    input.addEventListener('input', function() {
      // Obtener el valor actual del input
      var value = this.value;
  
      // Verificar si la longitud es mayor a 18
      if (value.length > 18) {
        // Recortar el valor para que tenga máximo 18 caracteres
        this.value = value.slice(0, 18);
      }
    });


    // Agregar evento de escucha al formulario
    form.addEventListener('submit', function(event) {
      // Obtener el valor actual del input
      var value = input.value;
  
      // Verificar si la longitud no es igual a 18
      if (value.length !== 18) {
        // Prevenir el envío del formulario
        event.preventDefault();
        alert('El valor debe tener exactamente 18 caracteres.');
      }
    });
  });


  function validarFormulario() {
    var telefonoInput = document.getElementById("telefono");
    var telefonoValue = telefonoInput.value;

    // Eliminar espacios en blanco al inicio y al final del número de teléfono
    telefonoValue = telefonoValue.trim();

    // Eliminar guiones o paréntesis del número de teléfono
    telefonoValue = telefonoValue.replace(/[-()]/g, "");

    // Verificar si el número de teléfono tiene 10 dígitos
    if (telefonoValue.length !== 10) {
      alert("El número de teléfono debe tener 10 dígitos.");
      return false; // Evita enviar el formulario
    }

    // Si se pasa la validación, puedes realizar otras acciones o enviar el formulario
    return true;
  }

  function validarInput(event) {
    var input = event.target;
    var valor = input.value;
  
    // Remover caracteres no alfabéticos utilizando una expresión regular
    var valorSoloLetras = valor.replace(/[^a-zA-Z\s]/g, '');
  
    // Si el valor ha cambiado, actualizar el valor del input
    if (valor !== valorSoloLetras) {
      input.value = valorSoloLetras;
    }
  }




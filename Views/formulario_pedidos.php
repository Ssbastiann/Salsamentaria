<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hoja de Pedidos</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>

  <div class="contenedor">
    <div class="encabezado">
      <div>
        <button>Formulario de pedidos</button>
      </div>
      <div>
        <select>
          <option disabled selected>Seleccionar Usuario</option>
          <option>Cajero</option>
          <option>Administrador</option>
          <option>Desarrollador</option>
        </select>
      </div>
      <div>
        <input type="date">
      </div>
      <div>
        <select>
          <option>Proveedor: Seleccionar Prov.</option>
        </select>
      </div>
    </div>

    <table id="tabla-pedidos">
      <thead>
        <tr>
          <th>Código de Producto</th>
          <th>Descripción Producto</th>
          <th>Cant.</th>
          <th>Unid.</th>
          <th>Observaciones</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td><button class="eliminar-btn" onclick="eliminarFila(this)">🗑</button></td>
        </tr>
      </tbody>
    </table>

    <div class="botones">
      <button class="boton-rojo" onclick="agregarFila()">Agregar Fila</button>

      <button class="boton-rojo" onclick="enviarCotizacion()">Enviar cotización 
        <img src="whatsapp-icon.png" alt="WhatsApp" class="icono">
        <img src="gmail-icon.png" alt="Gmail" class="icono">
      </button>

      <button class="boton-rojo" onclick="generarPDF()">Generar PDF 
        <img src="pdf-icon.png" alt="PDF" class="icono">
      </button>

      <button class="boton-volver" onclick="window.location.href='index.php'">
        Volver al Inicio
      </button>
    </div>
  </div>

  <script>
    function agregarFila() {
      const tabla = document.getElementById("tabla-pedidos").getElementsByTagName('tbody')[0];
      const nuevaFila = tabla.insertRow();

      for (let i = 0; i < 5; i++) {
        let celda = nuevaFila.insertCell(i);
        celda.contentEditable = "true";
        celda.innerText = "";
      }

      // Botón eliminar
      let celdaEliminar = nuevaFila.insertCell(5);
      celdaEliminar.innerHTML = '<button class="eliminar-btn" onclick="eliminarFila(this)">🗑</button>';
    }

    function eliminarFila(btn) {
      let fila = btn.parentNode.parentNode;
      fila.parentNode.removeChild(fila);
    }

    function enviarCotizacion() {
      const mensaje = "Hola, adjunto la solicitud de materiales desde el sistema de pedidos.";
      const numero = "573103113212"; // Cambiar por número real
      window.open(`https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`, '_blank');

      // Simular Gmail con mailto
      setTimeout(() => {
        window.location.href = `mailto:proveedor@ejemplo.com?subject=Cotización&body=${encodeURIComponent(mensaje)}`;
      }, 1000);
    }

    function generarPDF() {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      doc.text("Formulario de Pedidos", 10, 10);

      let filas = document.querySelectorAll("#tabla-pedidos tbody tr");
      let y = 20;

      filas.forEach(fila => {
        let columnas = fila.querySelectorAll("td");
        let texto = "";
        for (let i = 0; i < columnas.length - 1; i++) {
          texto += columnas[i].innerText + " | ";
        }
        doc.text(texto, 10, y);
        y += 10;
      });

      doc.save("pedido.pdf");
    }
  </script>

</body>
</html>

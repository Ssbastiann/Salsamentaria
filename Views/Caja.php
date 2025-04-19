<?php
try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=localhost;dbname=salsamentaria_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recuperación de los productos de la base de datos
    $query = $pdo->query("SELECT * FROM Productos LIMIT 3"); // Ejemplo: sólo 3 productos

    $totalGeneral = 0;

    // Mostrar productos en la tabla
    while ($producto = $query->fetch(PDO::FETCH_ASSOC)) {
        $subtotal = $producto['precio_unitario'] * 1; // Se usa '1' como cantidad para ejemplo
        $totalGeneral += $subtotal;

        echo "<tr>
                <td>{$producto['codigo_barra']}</td>
                <td>{$producto['nombre']}</td>
                <td>" . number_format($producto['precio_unitario'], 0, ',', '.') . " L</td>
                <td>1</td>
                <td>" . number_format($subtotal, 0, ',', '.') . "</td>
                <td class='acciones'>
                    <button onclick='actualizarCantidad({$producto['id_producto']}, -1)'>-</button>
                    <button onclick='actualizarCantidad({$producto['id_producto']}, 1)'>+</button>
                </td>
            </tr>";
    }

    echo "<script>document.getElementById('totalFinal').innerText = '" . number_format($totalGeneral, 0, ',', '.') . "';</script>";

    // Guardar la venta al hacer el pago (se debe hacer mediante un formulario)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuarioId = 1; // El id del usuario (Cajero) debe ser dinámico
        $metodoPago = $_POST['metodo_pago'];
        $tipoFactura = 1; // Tipo 'Cliente' por ejemplo
        $observaciones = $_POST['observaciones'] ?? '';

        // Insertar la factura
        $stmt = $pdo->prepare("INSERT INTO Factura (id_usuario, id_metodo_pago, id_tipo_factura, total, observaciones) 
                               VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$usuarioId, $metodoPago, $tipoFactura, $totalGeneral, $observaciones]);
        $facturaId = $pdo->lastInsertId();

        // Insertar los detalles de la factura
        foreach ($_POST['productos'] as $productoId => $cantidad) {
            $producto = $pdo->query("SELECT * FROM Productos WHERE id_producto = $productoId")->fetch(PDO::FETCH_ASSOC);
            $precioUnitario = $producto['precio_unitario'];
            $subtotal = $precioUnitario * $cantidad;

            // Insertar en detalle de factura
            $stmt = $pdo->prepare("INSERT INTO Factura_Detalle (id_factura, id_producto, cantidad, precio_unitario, subtotal) 
                                   VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$facturaId, $productoId, $cantidad, $precioUnitario, $subtotal]);

            // Actualizar stock
            $stmt = $pdo->prepare("UPDATE Productos SET stock_actual = stock_actual - ? WHERE id_producto = ?");
            $stmt->execute([$cantidad, $productoId]);

            // Registrar movimiento de stock
            $stmt = $pdo->prepare("INSERT INTO Movimientos_Stock (id_producto, tipo_movimiento, cantidad, motivo) 
                                   VALUES (?, 'Egreso', ?, 'Venta')");
            $stmt->execute([$productoId, $cantidad]);
        }

        // Mostrar mensaje de éxito
        echo "<script>alert('Venta registrada correctamente');</script>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Caja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a8fdf5;
            margin: 0;
            padding: 20px;
        }

        .venta {
            background-color: #ff3c3c;
            padding: 20px;
            border-radius: 25px;
            max-width: 900px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 2px solid #000;
        }

        th {
            background-color: #111;
        }

        .acciones button {
            background-color: #000;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 16px;
            cursor: pointer;
        }

        .metodos {
            margin-top: 20px;
            display: flex;
            gap: 20px;
        }

        .metodos img {
            width: 70px;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>VENTA 1 ➕</h2>

    <div class="venta">
        <table>
            <thead>
                <tr>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>PRECIO X UND</th>
                    <th>CANTIDAD</th>
                    <th>TOTAL</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody id="tabla-productos">
                <!-- Aquí se cargan los productos con PHP -->
                <?php include 'mostrar_productos.php'; ?>
            </tbody>
        </table>
    </div>

    <div class="metodos">
        <img src="nequi.png" alt="Nequi">
        <img src="daviplata.png" alt="Daviplata">
        <img src="efectivo.png" alt="Efectivo">
    </div>

    <div class="total">
        TOTAL: <span id="totalFinal">$0.00</span>
    </div>

    <form method="POST">
        <input type="hidden" name="productos" id="productos" value="">
        <select name="metodo_pago" required>
            <option value="1">Nequi</option>
            <option value="2">Daviplata</option>
            <option value="3">Efectivo</option>
        </select>
        <textarea name="observaciones" placeholder="Observaciones"></textarea>
        <button type="submit">Finalizar Venta</button>
    </form>

    <script>
        function actualizarCantidad(productoId, cambio) {
            // Lógica para actualizar la cantidad de productos
            // Aquí puedes hacer que se incremente o disminuya la cantidad de un producto específico
        }
    </script>
</body>
</html>

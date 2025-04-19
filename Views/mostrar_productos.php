<?php
// Conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=localhost;dbname=salsamentaria_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los productos (puedes añadir más filtros si lo necesitas)
    $query = $pdo->query("SELECT * FROM Productos");

    // Generación de filas para cada producto
    while ($producto = $query->fetch(PDO::FETCH_ASSOC)) {
        // Calculamos el subtotal de cada producto
        $subtotal = $producto['precio_unitario'] * 1; // Asumimos cantidad = 1 para simplificación

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

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

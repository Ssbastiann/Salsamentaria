<?php
include '../Clases/Modelos.php';

$db = new SalsamentariaDB($pdo);
$productos = $db->obtenerProductos()->fetchAll(PDO::FETCH_ASSOC);

// Añadir método faltante si no está definido
if (!method_exists($db, 'obtenerProductoPorId')) {
    class_alias('SalsamentariaDB', 'SalsamentariaDBOriginal');
    class SalsamentariaDB extends SalsamentariaDBOriginal {
        public function obtenerProductoPorId($id_producto) {
            $stmt = $this->pdo->prepare("SELECT * FROM Productos WHERE id_producto = ?");
            $stmt->execute([$id_producto]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    $db = new SalsamentariaDB($pdo); // Reiniciar para usar clase extendida
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['realizar_pedido'])) {
    $productos_seleccionados = $_POST['producto'];
    $resumen_pedidos = [];

    foreach ($productos_seleccionados as $item) {
        if (empty($item['cantidad']) || empty($item['precio'])) continue;

        $id_producto = $item['id_producto'];
        $cantidad = $item['cantidad'];
        $precio = $item['precio'];

        $producto = $db->obtenerProductoPorId($id_producto);
        $id_proveedor = $producto['id_proveedor'];

        if (!isset($resumen_pedidos[$id_proveedor])) {
            $db->crearPedidoProveedor($id_proveedor, date('Y-m-d'), 'Pendiente', 'Pedido generado automáticamente.');
            $id_pedido = $pdo->lastInsertId();
            $resumen_pedidos[$id_proveedor] = $id_pedido;
        } else {
            $id_pedido = $resumen_pedidos[$id_proveedor];
        }

        $db->crearPedidoProducto($id_pedido, $id_producto, $cantidad, $precio);
    }

    echo "<p style='color: green;'>✅ Pedidos generados correctamente por proveedor.</p>";
}
?>

<h2>Realizar Pedido Distribuido por Proveedor</h2>
<form method="POST">
    <table border="1">
        <tr>
            <th>Seleccionar</th>
            <th>Producto</th>
            <th>Proveedor</th>
            <th>Cantidad</th>
            <th>Precio Estimado</th>
        </tr>
        <?php foreach ($productos as $index => $prod): ?>
            <tr>
                <td>
                    <input type="checkbox" name="producto[<?= $index ?>][incluir]" value="1">
                    <input type="hidden" name="producto[<?= $index ?>][id_producto]" value="<?= $prod['id_producto'] ?>">
                </td>
                <td><?= $prod['nombre'] ?></td>
                <td><?= $prod['id_proveedor'] ?></td>
                <td><input type="number" step="0.01" name="producto[<?= $index ?>][cantidad]"></td>
                <td><input type="number" step="0.01" name="producto[<?= $index ?>][precio]"></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button type="submit" name="realizar_pedido">Realizar Pedido</button>
</form>

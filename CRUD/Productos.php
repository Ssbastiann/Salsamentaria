<?php
include '../Clases/Modelos.php';
$db = new SalsamentariaDB($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        $db->crearProducto($_POST['id_proveedor'], $_POST['nombre'], $_POST['codigo_barra'], $_POST['precio_unitario'], $_POST['peso_unitario'], $_POST['stock_actual'], $_POST['stock_minimo']);
    } elseif (isset($_POST['actualizar'])) {
        $db->actualizarProducto($_POST['id_producto'], $_POST['id_proveedor'], $_POST['nombre'], $_POST['codigo_barra'], $_POST['precio_unitario'], $_POST['peso_unitario'], $_POST['stock_actual'], $_POST['stock_minimo']);
    } elseif (isset($_POST['eliminar'])) {
        $db->eliminarProducto($_POST['id_producto']);
    }
}

$productos = $db->obtenerProductos();
$proveedores = $db->obtenerProveedores();
$db->crearProducto(...);
$db->actualizarProducto(...); // ✅ llamado al método de la clase
$db->eliminarProducto(...);
?>

<h2>Productos</h2>
<form method="POST">
    <select name="id_proveedor" required>
        <option value="">Seleccionar Proveedor</option>
        <?php while ($p = $proveedores->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?= $p['id_proveedor'] ?>"><?= $p['nombre'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="codigo_barra" placeholder="Código de Barra">
    <input type="number" step="0.01" name="precio_unitario" placeholder="Precio Unitario" required>
    <input type="number" step="0.01" name="peso_unitario" placeholder="Peso Unitario">
    <input type="number" name="stock_actual" placeholder="Stock Actual" required>
    <input type="number" name="stock_minimo" placeholder="Stock Mínimo">
    <button name="crear">Crear</button>
</form>

<table border="1"> 
    <tr>
        <th>ID</th><th>Proveedor</th><th>Nombre</th><th>Cod. Barra</th><th>Precio</th><th>Peso</th><th>Stock</th><th>Min.</th><th>Acciones</th>
    </tr>
    <?php foreach ($productos as $pr): ?>
    <tr>
        <form method="POST">
            <td><?= $pr['id_producto'] ?><input type="hidden" name="id_producto" value="<?= $pr['id_producto'] ?>"></td>
            <td><?= $pr['nombre_proveedor'] ?><input type="hidden" name="id_proveedor" value="<?= $pr['id_proveedor'] ?>"></td>
            <td><input type="text" name="nombre" value="<?= $pr['nombre'] ?>"></td>
            <td><input type="text" name="codigo_barra" value="<?= $pr['codigo_barra'] ?>"></td>
            <td><input type="number" step="0.01" name="precio_unitario" value="<?= $pr['precio_unitario'] ?>"></td>
            <td><input type="number" step="0.01" name="peso_unitario" value="<?= $pr['peso_unitario'] ?>"></td>
            <td><input type="number" name="stock_actual" value="<?= $pr['stock_actual'] ?>"></td>
            <td><input type="number" name="stock_minimo" value="<?= $pr['stock_minimo'] ?>"></td>
            <td>
                <button name="actualizar">Actualizar</button>
                <button name="eliminar">Eliminar</button>
            </td>
        </form>
    </tr>
    <?php endforeach; ?>
</table>

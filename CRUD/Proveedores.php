<?php
include '../Clases/Modelos.php';
$db = new SalsamentariaDB($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        $db->crearProveedor($_POST['nombre'], $_POST['nit'], $_POST['telefono'], $_POST['direccion'], $_POST['correo']);
    } elseif (isset($_POST['actualizar'])) {
        $db->actualizarProveedor($_POST['id_proveedor'], $_POST['nombre'], $_POST['nit'], $_POST['telefono'], $_POST['direccion'], $_POST['correo']);
    } elseif (isset($_POST['eliminar'])) {
        $db->eliminarProveedor($_POST['id_proveedor']);
    }
}

$proveedores = $db->obtenerProveedores();
$db->crearProveedor(...);
$db->actualizarProveedor(...); // ✅ llamado al método de la clase
$db->eliminarProveedor(...);
?>

<h2>Proveedores</h2>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="nit" placeholder="NIT">
    <input type="text" name="telefono" placeholder="Teléfono">
    <input type="text" name="direccion" placeholder="Dirección">
    <input type="email" name="correo" placeholder="Correo">
    <button name="crear">Crear</button>
</form>

<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>NIT</th><th>Teléfono</th><th>Dirección</th><th>Correo</th><th>Acciones</th>
    </tr>
    <?php while ($p = $proveedores->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <form method="POST">
            <td><?= $p['id_proveedor'] ?><input type="hidden" name="id_proveedor" value="<?= $p['id_proveedor'] ?>"></td>
            <td><input type="text" name="nombre" value="<?= $p['nombre'] ?>"></td>
            <td><input type="text" name="nit" value="<?= $p['nit'] ?>"></td>
            <td><input type="text" name="telefono" value="<?= $p['telefono'] ?>"></td>
            <td><input type="text" name="direccion" value="<?= $p['direccion'] ?>"></td>
            <td><input type="email" name="correo" value="<?= $p['correo'] ?>"></td>
            <td>
                <button name="actualizar">Actualizar</button>
                <button name="eliminar">Eliminar</button>
            </td>
        </form>
    </tr>
    <?php endwhile; ?>
</table>

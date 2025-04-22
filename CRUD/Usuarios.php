<?php
include '../Clases/Modelos.php';

$db = new SalsamentariaDB($pdo);

// Acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        $db->crearUsuario($_POST['nombre_usuario'], $_POST['contrasena'], $_POST['rol']);
    } elseif (isset($_POST['actualizar'])) {
        $db->actualizarUsuario($_POST['id_usuario'], $_POST['nombre_usuario'], $_POST['contrasena'], $_POST['rol']);
    } elseif (isset($_POST['eliminar'])) {
        $db->eliminarUsuario($_POST['id_usuario']);
    }
}


$usuarios = $db->obtenerUsuarios();
$db->crearUsuario(...);
$db->actualizarUsuario(...); // ✅ llamado al método de la clase
$db->eliminarUsuario(...);

?>

<h2>Creación de Usuarios</h2>
<form method="POST">
    <input type="hidden" name="id_usuario" value="">
    <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <select name="rol">
        <option value="Administrador">Administrador</option>
        <option value="Cajero">Cajero</option>
    </select>
    <button name="crear">Crear</button>
</form>

<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Rol</th><th>Acciones</th>
    </tr>
    <?php while ($u = $usuarios->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <form method="POST">
            <td><?= $u['id_usuario'] ?><input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>"></td>
            <td><input type="text" name="nombre_usuario" value="<?= $u['nombre_usuario'] ?>"></td>
            <td>
                <select name="rol">
                    <option value="Administrador" <?= $u['rol'] == 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                    <option value="Cajero" <?= $u['rol'] == 'Cajero' ? 'selected' : '' ?>>Cajero</option>
                </select>
            </td>
            <td>
                <input type="password" name="contrasena" placeholder="Nueva clave">
                <button name="actualizar">Actualizar</button>
                <button name="eliminar">Eliminar</button>
            </td>
        </form>
    </tr>
    <?php endwhile; ?>
</table>

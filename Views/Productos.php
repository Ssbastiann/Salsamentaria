<?php 
include '../Modelo/conexion.php' 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>

</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="crear.php">Agregar nuevo producto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Stock</th>
            <th>Stock Mínimo</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM Productos";
        $result = $cnn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_producto']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['codigo_barra']}</td>
                    <td>{$row['precio_unitario']}</td>
                    <td>{$row['peso_unitario']}</td>
                    <td>{$row['stock_actual']}</td>
                    <td>{$row['stock_minimo']}</td>
                    <td>{$row['fecha_registro']}</td>
                    <td>
                        <a href='editar.php?id={$row['id_producto']}'>Editar</a> | 
                        <a href='eliminar.php?id={$row['id_producto']}' onclick=\"return confirm('¿Seguro que deseas eliminar este producto?')\">Eliminar</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    <!-- Botón en la parte superior -->
    <button id="openModalBtn">Agregar producto</button>
</body>
</html>
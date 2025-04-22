<?php
include ("conexion.php");

class SalsamentariaDB {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /** USUARIOS */
    public function crearUsuario($nombre, $clave, $rol) {
        $sql = "INSERT INTO Usuarios (nombre_usuario, contraseña, rol) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $clave, $rol]);
    }

    public function obtenerUsuarios() {
        return $this->pdo->query("SELECT * FROM Usuarios");
    }

    public function actualizarUsuario($id, $nombre, $clave, $rol) {
        $sql = "UPDATE Usuarios SET nombre_usuario=?, contraseña=?, rol=? WHERE id_usuario=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $clave, $rol, $id]);
    }

    public function eliminarUsuario($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Usuarios WHERE id_usuario=?");
        return $stmt->execute([$id]);
    }

    /** PROVEEDORES */
    public function crearProveedor($nombre, $nit, $telefono, $direccion, $correo) {
        $sql = "INSERT INTO Proveedores (nombre, nit, telefono, direccion, correo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $nit, $telefono, $direccion, $correo]);
    }

    public function obtenerProveedores() {
        return $this->pdo->query("SELECT * FROM Proveedores");
    }

    public function actualizarProveedor($id, $nombre, $nit, $telefono, $direccion, $correo) {
        $sql = "UPDATE Proveedores SET nombre=?, nit=?, telefono=?, direccion=?, correo=? WHERE id_proveedor=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $nit, $telefono, $direccion, $correo, $id]);
    }

    public function eliminarProveedor($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Proveedores WHERE id_proveedor=?");
        return $stmt->execute([$id]);
    }

    /** PRODUCTOS */
    public function crearProducto($id_proveedor, $nombre, $codigo_barra, $precio_unitario, $peso_unitario, $stock_actual, $stock_minimo) {
        $sql = "INSERT INTO Productos (id_proveedor, nombre, codigo_barra, precio_unitario, peso_unitario, stock_actual, stock_minimo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_proveedor, $nombre, $codigo_barra, $precio_unitario, $peso_unitario, $stock_actual, $stock_minimo]);
    }

    public function obtenerProductos() {
        return $this->pdo->query(
        "SELECT p.*, pr.nombre AS nombre_proveedor 
        FROM Productos p
        INNER JOIN Proveedores pr ON p.id_proveedor = pr.id_proveedor
        ORDER BY id_producto ASC");

    }

    public function actualizarProducto($id, $id_proveedor, $nombre, $codigo_barra, $precio_unitario, $peso_unitario, $stock_actual, $stock_minimo) {
        $sql = "UPDATE Productos SET id_proveedor=?, nombre=?, codigo_barra=?, precio_unitario=?, peso_unitario=?, stock_actual=?, stock_minimo=? WHERE id_producto=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_proveedor, $nombre, $codigo_barra, $precio_unitario, $peso_unitario, $stock_actual, $stock_minimo, $id]);
    }

    public function eliminarProducto($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Productos WHERE id_producto=?");
        return $stmt->execute([$id]);
    }

    /** PEDIDOS A PROVEEDOR */

    public function obtenerProductoPorId($id_producto) {
        $stmt = $this->pdo->prepare("SELECT * FROM Productos WHERE id_producto = ?");
        $stmt->execute([$id_producto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function crearPedidoProveedor($id_proveedor, $fecha_pedido, $estado, $observaciones) {
        $sql = "INSERT INTO Pedidos_Proveedor (id_proveedor, fecha_pedido, estado, observaciones) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_proveedor, $fecha_pedido, $estado, $observaciones]);
    }

    public function obtenerPedidosProveedor() {
        return $this->pdo->query("SELECT * FROM Pedidos_Proveedor");
    }

    public function actualizarPedidoProveedor($id, $id_proveedor, $fecha_pedido, $estado, $observaciones) {
        $sql = "UPDATE Pedidos_Proveedor SET id_proveedor=?, fecha_pedido=?, estado=?, observaciones=? WHERE id_pedido=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_proveedor, $fecha_pedido, $estado, $observaciones, $id]);
    }

    public function eliminarPedidoProveedor($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Pedidos_Proveedor WHERE id_pedido=?");
        return $stmt->execute([$id]);
    }

    /** DETALLE DEL PEDIDO */
    public function crearPedidoProducto($id_pedido, $id_producto, $cantidad, $precio_estimado) {
        $sql = "INSERT INTO Pedido_Producto (id_pedido, id_producto, cantidad, precio_estimado) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_pedido, $id_producto, $cantidad, $precio_estimado]);
    }

    public function obtenerDetallePedido($id_pedido) {
        $sql = "SELECT * FROM Pedido_Producto WHERE id_pedido=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_pedido]);
        return $stmt;
    }

    public function eliminarPedidoProducto($id_detalle) {
        $stmt = $this->pdo->prepare("DELETE FROM Pedido_Producto WHERE id_detalle=?");
        return $stmt->execute([$id_detalle]);
    }
}
?>
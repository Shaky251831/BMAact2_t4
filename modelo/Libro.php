<?php
require_once "configuracion/conexion.php";

class Libro {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    // Leer. 
    public function obtenerTodos() {
        $query = $this->db->query("SELECT * FROM libros");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Crear
    public function insertar($titulo, $autor, $editorial, $anio, $precio) {
        $sql = "INSERT INTO libros (titulo, autor, editorial, anio_publicacion, precio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$titulo, $autor, $editorial, $anio, $precio]);
    }

    // Obtener un libro
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM libros WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Actualizar
    public function actualizar($id, $titulo, $autor, $editorial, $anio, $precio) {
        $sql = "UPDATE libros SET titulo = ?, autor = ?, editorial = ?, anio_publicacion = ?, precio = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$titulo, $autor, $editorial, $anio, $precio, $id]);
    }

    // Eliminar
    public function eliminar($id) {
        $sql = "DELETE FROM libros WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
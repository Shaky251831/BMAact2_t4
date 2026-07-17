<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $db = "biblioteca_db";
        $user = "root";
        $password = "251831"; 
        $charset = "utf8mb4";

        try {
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
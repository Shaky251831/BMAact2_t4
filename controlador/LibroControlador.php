<?php
require_once "modelo/Libro.php";

class LibroControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Libro();
    }
    public function index() {
        $mensaje = "";
        if (isset($_POST["btnregistrar"])) {
            if (!empty($_POST["titulo"]) && !empty($_POST["autor"]) && !empty($_POST["editorial"]) && !empty($_POST["anio_publicacion"]) && !empty($_POST["precio"])) {
                $this->modelo->insertar(
                    $_POST["titulo"],
                    $_POST["autor"],
                    $_POST["editorial"],
                    $_POST["anio_publicacion"],
                    $_POST["precio"]
                );
                $mensaje = "<div class='alert alert-success'>Libro registrado correctamente</div>";
            } else {
                $mensaje = "<div class='alert alert-warning'>Alguno de los campos está vacío</div>";
            }
        }
        // Si se solicitó eliminar un libro
        if (isset($_GET["eliminar_id"])) {
            $this->modelo->eliminar($_GET["eliminar_id"]);
            header("Location: index.php");
            exit();
        }
        // Traemos todos los libros para listarlos
        $libros = $this->modelo->obtenerTodos();
        
        // Cargamos la vista principal unificada
        require_once "vista/listar.php";
    }
    // Acción para la pantalla de edición.
    public function editar() {
        $id = $_GET['id'];
        $libro = $this->modelo->obtenerPorId($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->modelo->actualizar(
                $id,
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['editorial'],
                $_POST['anio_publicacion'],
                $_POST['precio']
            );
            header("Location: index.php");
            exit();
        }
        require_once "vista/modificar.php";
    }
}
<?php
class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "kidschool";
    private $conn;

    public function conectar() {
        
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, database: $this->db);

        if (!$this->conn) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }

        return $this->conn;
    }

    public function desconectar() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}
?>

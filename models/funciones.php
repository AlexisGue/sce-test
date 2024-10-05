<?php
class Procesos
{
    private $pdo;

    public function __construct()
    {
        $modelo = new ConexionBD();
        $this->pdo = $modelo->getConexion();
    }
    public function isdu($query, $accion)
    {
        $rows = null;
        $stmt = $this->pdo->prepare($query);
        if ($accion == "I" || $accion == "i" || $accion == "U" || $accion == "u" || $accion == "D" || $accion == "d") {
            if (!$stmt) {
                return 0;
            } else {
                $stmt->execute();
                return 1;
            }
        } else {
            $stmt->execute();
            while ($result = $stmt->fetch()) {
                $rows[] = $result;
            }
            return $rows;
        }
    }
    public function GetDataUser($user, $tabla, $campo)
    {
        $row = NULL;
        $arg = ":" . $campo;
        $query = "SELECT * FROM $tabla WHERE $campo=$arg";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindparam($arg, $user);
        $stmt->execute();
        while ($result = $stmt->fetch()) {
            $row[] = $result;
        }
        return $row;
    }
}

<?php
require_once('Model.php');
class People extends Model
{
    private $id;
    private $dni;
    private $nombres;
    private $apellidos;

    public function __construct()
    {
    }

    public function getPeople()
    {
        $conn = (new MySqlConnection())->getConnection();
        $sql = "SELECT * FROM personas.people ORDER BY nombres ASC;";

        $response = array();
        foreach ($conn->query($sql) as $row) {
            $p = array();
            $p['id'] = $row['id'];
            $p['nombres'] = $row['nombres'];
            $p['apellidos'] = $row['apellidos'];
            $p['dni'] = $row['dni'];

            array_push($response, $p);
        }
        return json_encode($response);
    }

    public function savePerson()
    {
        $connection = new MySqlConnection();
        if ($connection) {
            $pdo = $connection->getConnection();
            $sql = "INSERT INTO personas.people (nombres, apellidos, dni) VALUES (?, ?, ?);";
            $pdo->prepare($sql)->execute([
                $this->nombres,
                $this->apellidos,
                $this->dni
            ]);
            return true;
        } else {
            return false;
        }
    }

    /* Getters and Setters */
    public function setNombres($nombres = null)
    {
        $this->nombres = $nombres;
    }
    public function setApellidos($ape = null)
    {
        $this->apellidos = $ape;
    }
    public function setDni($dni = null)
    {
        $this->dni = $dni;
    }
}

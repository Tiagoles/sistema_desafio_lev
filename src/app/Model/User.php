<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "/home/tiagoles/Documents/sistema_desafio_lev/config/db.php";

class User
{
    public $conn;
    private $table;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnectionDatabase();
        $this->table = "users";
    }
    public function getConnectionDatabase()
    {
        return $this->conn;
    }
    public function findAllUsers()
    {
        $query = "SELECT * FROM users ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function store($data)
    {
        echo "user.php";
        $query = "INSERT INTO " . $this->table . " (nome, email, telefone, data_nascimento) values (:name,:email, :phone, :birth)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $data["name"]);
        $stmt->bindParam(":email", $data["email"]);
        $stmt->bindParam(":phone", $data["phone"]);
        $stmt->bindParam(":birth", $data["birth"]);
        return $stmt->execute();
    }
}

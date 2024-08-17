<?php
class Database
{
    private $serverName ;
    private $dbName ;
    private $user ;
    private $password;
    private $dsn ;
    private $options ;
    public function __construct()
    {
        $this->serverName= "localhost";
        $this->dbName = "teste_lev";
        $this->user = "root";
        $this->password = "";
        $this->dsn= "mysql:host=$this->serverName;dbname=$this->dbName;charset=utf8";
        $this->options= [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }
    public function getConnectionDatabase()
    {
        try {

            $conn = new PDO($this->dsn, $this->user, $this->password, $this->options);
        } catch (PDOException $e) {
            echo "falha na conexão" . $e->getMessage();
        }
        return $conn;
    }
}

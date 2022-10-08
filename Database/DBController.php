<?php

class DBController
{
    //Database Connection Properties
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $dbName = "ecommerce_php";

    //Connection Property
    public $conn = null;

    //Call Constructor
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);

        if ($this->conn->connect_error) {
            echo "Fail" . $this->conn->connect_error;
        }
    }

    //Close Connection
    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection()
    {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;

        }
    }
}

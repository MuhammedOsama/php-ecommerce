<?php

//Fetch Product Data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($this->conn)) return null;
        $this->db = $db;
    }

    //Get Data
    public function getData($table = 'product')
    {
        $result = $this->db->conn->query("SELECT * FROM {$table}");
        $resultArray = [];

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getProduct($item_id = null, $table = 'product')
    {
        if (isset($item_id)) {
            $result = $this->db->conn->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
            $resultArray = [];

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
}

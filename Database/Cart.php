<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //Insert Into Cart Table
    public function insertIntoCart($params = null, $table = "cart")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    // To Get user_id and item_id and Insert Into Cart Table
    public function addToCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            $result = $this->insertIntoCart($params);
            if ($result) {
                header("LOCATION:" . $_SERVER['PHP_SELF']);
            }
        }
    }

    //Delete cart_item Using Cart item_id
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header("LOCATION:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //Calculate Sub Total
    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    //Get item_it Of Shopping Cart List
    public function getCartId($cartArray = null, $key = "item_id")
    {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    //Save For Later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart")
    {
        if ($item_id != null) {
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            $result = $this->db->con->multi_query($query);

            if ($result) {
                header("LOCATION:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}

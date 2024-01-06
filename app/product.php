<?php
require_once('database.php');
class ProductModel
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function productRegistration($productName, $amount, $value)
    {
        $stmt = $this->connect->prepare("INSERT INTO produtos (nome, quantidade, valor) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sdd", $productName, $amount, $value);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }

    public function registeredProducts()
    {
        $stmt = $this->connect->prepare("SELECT * FROM produtos");

        if ($stmt) {
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result;
        } else {
            return false;
        }
    }
}
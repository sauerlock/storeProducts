<?php

require_once('database.php');
require_once ('productcontroller.php');
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
    public function productUpdate($id, $productName, $amount, $value)
    {
        $stmt = $this->connect->prepare("UPDATE produtos SET nome=?, quantidade=?, valor=? WHERE id=?");

        if ($stmt === false) {  
            die('Error preparing statement: ' . $this->connect->error);
        }

        if ($stmt) {
                $stmt->bind_param("sdsi", $productName, $amount, $value, $id);
                $stmt->execute();
                $stmt->close();
        } else {
            echo "Error updating data: " . $stmt->error;
        }
    }

    public function deleteProduct($id) {
        $stmt = $this->connect->prepare("DELETE FROM produtos WHERE id=?");
    
        if ($stmt !== false) {
            $stmt->bind_param("i", $id);  // "i" indica que $id é um inteiro
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            echo "Error preparing statement: " . $this->connect->error;
            return false;
        }
    }
    
    }

<?php
include_once('./product.php');
require_once('database.php');

class ProductController
{
    private $productModel;

    public function __construct($productModel)
    {
        $this->productModel = $productModel;
    }

    public function storeProduct($productName, $amount, $value)
    {
        return $this->productModel->productRegistration($productName, $amount, $value);
    }

    public function showProduct()
    {
        return $this->productModel->registeredProducts();
    }

    public function updateProduct($id, $productName, $amount, $value)
    {
        return $this->productModel->productUpdate($id, $productName, $amount, $value);
    }

    public function deleteProduct($id) 
    {
        return $this->productModel->deleteProduct($id);
        
    }
}

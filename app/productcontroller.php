<?php
include_once('./product.php');

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
}

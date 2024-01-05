<?php
require_once('database.php');
require_once('productcontroller.php');
require_once('product.php');

// Crie instâncias dos objetos necessários
$productModel = new ProductModel($connect);
$selectProducts = new ProductController($productModel);

// Chame o método para mostrar produtos
$showProduct = $selectProducts->showProduct();

// Verifique se há produtos para mostrar
function showProducts(){
    global $showProduct;
    if ($showProduct->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Product Name</th><th>Amount</th><th>Value UN</th></tr>";
    while ($row = $showProduct->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td>
            <td>{$row['nome']}</td>  
            <td>{$row['quantidade']}</td>  
            <td>{$row['valor']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No products found.";
}
}

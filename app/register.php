<?php
global $connect;
include_once('./database.php');
require_once('./product.php');
require_once('./productcontroller.php');


// Get form data
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$productName = $_POST['productName'];
$amount = $_POST['amount'];
$value = $_POST['value'];

// Create instances of the model and controller
$productModel = new ProductModel($connect);
$productController = new ProductController($productModel);
    ;
    // Call the product registration method
    $result = $productController->storeProduct($productName, $amount, $value);

    // Display success or error message
    if ($result === TRUE) {
        echo "Registration Successful!";
    } else {
        echo "Error in the product registration. Please try again later.";
    }

}
// Close the database connection
$connect->close();

// Redirect after processing the form
$url = "./index.php";
header('Location: '.$url);
exit();

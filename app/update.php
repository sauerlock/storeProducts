<?php
global $connect;
require_once('database.php');
require_once('productcontroller.php');
require_once('product.php');
require_once('productTable.php');

try {
    $productModel = new ProductModel($connect);

    if (isset($productModel)) {
        $productController = new ProductController($productModel);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verifica se as chaves do array estão definidas
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $productName = isset($_POST['nome']) ? $_POST['nome'] : null;
            $amount = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : null;
            $valor = isset($_POST['valor']) ? $_POST['valor'] : null;

            // Verifica se todas as chaves necessárias estão definidas
            if ($id !== null && $productName !== null && $amount !== null && $value !== 0.0) {
                $update = $productController->updateProduct($id, $productName, $amount, $value);

                if ($update === true) {
                    echo "Update Successful!";
                } else {
                    echo "Error in the product update. Please try again later.";
                }

                $url = "./index.php";
                header('Location: ' . $url);
                exit();
            } else {
                echo "Invalid request or missing parameters.";
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $deleteId = $_POST['id'];

        $delete = $productController->deleteProduct($deleteId);
        if (!$delete) {
            echo "Error deleting product";
        } else {
            echo "Product successfully deleted";
        }
    }
    
} catch (Exception $e) {
    // Handle the exception
    echo "Caught exception: " . $e->getMessage();
}



?>

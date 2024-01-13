<?php
require_once('database.php');
require_once('productcontroller.php');
require_once('product.php');
require_once('update.php');

// Create instances of the necessary objects
$productModel = new ProductModel($connect);
$selectProducts = new ProductController($productModel);

// Call the method to show products
$showProduct = $selectProducts->showProduct();

// Check if there are products to display
function showProducts()
{
    global $showProduct;

    if ($showProduct->num_rows > 0) {
        echo "<table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Value (R$)</th>
                <th>Action</th>
            </tr>";

        while ($row = $showProduct->fetch_assoc()) {
            // Defina as variáveis dentro do loop
            $id = $row['id'];
            $productName = $row['nome'];
            $amount = $row['quantidade'];
            $value = $row['valor'];

            echo "<tr>
                    <form action='update.php' method='post'>
                        <td><input type='text' name='nome' value='$productName'></td>
                        <td><input type='text' name='quantidade' value='$amount'></td>
                        <td><input type='text' name='valor' value='$value'></td>
                        <td>
                            <input type='hidden' name='id' value='$id'>
                            <input type='submit' value='Save Changes'>
                            <input type='button' onclick='deleteData($id)' value='Delete'>
                        </td>
                    </form>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No products found.";
    }
}
?>

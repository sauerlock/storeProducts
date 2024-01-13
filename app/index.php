<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Store Product System</title>
</head>
<body>
    <h1>Store Product System</h1>

    <!-- Product registration form -->
    <form action="" method="POST">
        <label>Product Name:</label>
        <input type="text" name="productName">

        <label>Amount:</label>
        <input type="number" min="0" name="amount">

        <label>Value UN.</label>
        <input type="number" min="0" name="value">

        <input type="submit" value="Register Product">
    </form>

    <!-- Product table -->
    <?php
    require_once('productTable.php');
    require_once('productController.php');
    if ($showProduct->num_rows > 0) {
        echo "<table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Value (R$)</th>
                <th>Action</th>
            </tr>";

        while ($row = $showProduct->fetch_assoc()) {
            // Definindo as variáveis necessárias
            $id = $row['id'];
            $productName = $row['nome'];
            $amount = $row['quantidade'];
            $value = $row['valor'];

            echo "<tr>
                    <td id='productName_{$id}'>{$productName}</td>
                    <td id='amount_{$id}'>{$amount}</td>
                    <td id='value_{$id}'>R$ {$value}</td>
                    <td> 
                        <button class='material-icons' onclick='updateData({$id})'>update</button>
                        <button class='material-icons' onclick='deleteData({$id})'>delete</button>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No products found.";
    }
    ?>

<script src='index.js'></script>
</body>
</html>

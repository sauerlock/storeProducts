<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewwport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title> Store Product System</title>
</head>
<body>
    <h1> Store Product System </h1>
    <form action="register.php" method="POST">
        <label> Product Name:</label>
        <input type="text" name="productName">

        <label> Amount: </label>
        <input type="number" min="0" name="amount">

        <label> Value UN.</label>
        <input type="number" min="0" name="value">

        <input type="submit" value="Register Product">
    </form>
    <?php
        require_once('productTable.php');
        showProducts();
    ?>
</body>
</html>
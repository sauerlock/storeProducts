function updateData(id) {
        const productName = $('#productName_' + id).text();
        const amount = $('#amount_' + id).text();
        const value = $('#value_' + id).text();

        const updatedProductName = prompt('Update Product Name:', productName);
        const updatedAmount = prompt('Update Amount:', amount);
        const updatedValue = prompt('Update Value:', value);

        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: {
                id: id,
                nome: updatedProductName,
                quantidade: updatedAmount,
                valor: updatedValue
            },
            success: function (response) {
                console.log(response);
                location.reload();
            },
            error: function (response) {
                console.log(response, 'There is an error in updating data.');
            }
        });
    }
        function deleteData(id) {
        const productName = $("#productName_" + id).text();
        const deleteProductName = confirm("You really want to delete the product: " + productName + "?");

        if (deleteProductName) {
            $.ajax({
                type: 'POST',
                url: 'update.php',
                data: {
                    delete: true,  // Verifique isso em update.php
                    id: id
                },
                success: function (response) {
                    console.log(response);
                    location.reload();
                },
                error: function (response) {
                    console.log(response, 'There is an error deleting data.')
                }
            });
        }

    console.log('Delete clicked for ID: ' + id);
}
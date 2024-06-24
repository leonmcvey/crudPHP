<?php
require __DIR__ . '/../helpers/fetchProducts.php';

$products = fetchProducts();
?>

<?php
require __DIR__ . ("/../includes/header.php")
    ?>

<body>
    <h1>Product Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                    <td>
                        <form action="../../helpers/updateProduct.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
                            <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
                            <button type="submit">Update</button>
                        </form>
                        <form action="/../helpers/deleteProduct.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/../helpers/exportProducts.php?format=csv">Export Products as CSV</a>
    <a href="/../helpers/exportProducts.php?format=xml">Export Products as XML</a>


    <h2>Add New Product</h2>
    <form action="/../helpers/createProduct.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        <button type="submit">Add Product</button>
    </form>
</body>

<?php
require __DIR__ . ("/../includes/footer.php")
    ?>
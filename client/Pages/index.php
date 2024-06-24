<?php
require_once __DIR__ . '/../helpers/fetchProducts.php';




$products = fetchProducts();

?>

<?php
require __DIR__ . ("/../includes/header.php")
    ?>

<body>
    <main>

        <div class="product-list--page">
            <div>
                <input type="hidden" id="currentOrgId" value="1">

                <div class="row-box">
                    <div class="col-boxes-1">
                        <div class="col-table">
                            <div class="table-section">
                                <div class="header-table">
                                    <h2>Produkter</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br /><br />
                <table class="tabulator-table">
                    <tbody>
                        <?php
                        foreach ($products as $product) {
                            ?>
                            <tr class="product-container">
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td><?php echo $product['category'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>


<?php
require __DIR__ . ("/../includes/footer.php")
    ?>
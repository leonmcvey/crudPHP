<?php

require "fetchProducts.php";

function productsToCSV($products)
{
    $filename = "products.csv";
    $file = fopen($filename, "w");

    fputcsv($file, array("ID", "Name", "Price", "Category"));

    foreach ($products as $product) {
        fputcsv($file, array($product["id"], $product["name"], $product["price"], $product["category"]));
    }

    fclose($file);
    return $filename;
}

function productsToXML($products)
{
    $xml = new SimpleXMLElement("<products/>");

    foreach ($products as $product) {
        $productElement = $xml->addChild("product");
        $productElement->addChild("id", $product["id"]);
        $productElement->addChild("name", $product["name"]);
        $productElement->addChild("price", $product["price"]);
        $productElement->addChild("category", $product["category"]);
    }

    $filename = "products.xml";
    $xml->asXML($filename);
    return $filename;
}

if (isset($_GET['format'])) {
    $format = $_GET['format'];
    $products = fetchProducts();

    if ($format === 'csv') {
        $filename = productsToCSV($products);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filename);
        unlink($filename); // Delete the file after download
        exit();
    } elseif ($format === 'xml') {
        $filename = productsToXML($products);
        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filename);
        unlink($filename); // Delete the file after download
        exit();
    } else {
        echo "Invalid format specified.";
    }
} else {
    echo "No format specified.";
}

?>
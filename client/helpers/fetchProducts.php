<?php
function fetchProducts()
{
    $url = 'http://localhost:3001/api/products';

    $options = array(
        'http' => array(
            'method' => 'GET',
            'header' => 'Content-Type: application/json'
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        return array();
    } else {
        $products = json_decode($result, true);

        return $products;
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $data = json_encode(['name' => $name, 'price' => $price, 'category' => $category]);

    $ch = curl_init('http://localhost:3001/api/products');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );

    $result = curl_exec($ch);
    if ($result === false) {
        die('Error adding product: ' . curl_error($ch));
    }
    curl_close($ch);

    header('Location: ../pages/dashboard.php');
    exit();
}
?>
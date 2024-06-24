<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $data = json_encode(['name' => $name, 'price' => $price]);

    $ch = curl_init("http://localhost:3001/api/products/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
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
        die('Error updating product: ' . curl_error($ch));
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 200 && $httpCode < 300) {
        header('Location: /../pages/dashboard.php');
    } else {
        echo "Error updating product. HTTP Status Code: $httpCode";
    }
    exit();
}
?>
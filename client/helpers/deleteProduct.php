<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $ch = curl_init("http://localhost:3001/api/products/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    if ($result === false) {
        die('Error deleting product: ' . curl_error($ch));
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 200 && $httpCode < 300) {
        header('Location: /../pages/dashboard.php');
    } else {
        echo "Error deleting product. HTTP Status Code: $httpCode";
    }
    exit();
}
?>
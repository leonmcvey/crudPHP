<?php
require __DIR__ . ("/../../includes/header.php")

    ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    header("Location: ../dashboard.php");
    exit();
}

?>

<main>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username or Email:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</main>


<?php
require __DIR__ . ("/../../includes/footer.php")
    ?>
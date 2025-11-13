<?php
include 'products.php';

$id = $_GET['id'] ?? null;

if (!$id || !isset($products[$id])) {
    echo "<h2>Product not found!</h2>";
    exit;
}

$product = $products[$id];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name'] ?> | KM Music Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">

    <div class="card mx-auto" style="max-width: 500px;">
        <img src="<?= $product['img'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $product['name'] ?></h5>
            <p class="card-text"><?= $product['desc'] ?></p>
            <h6 class="card-subtitle mb-3 text-muted">Price: $<?= $product['price'] ?></h6>
            <a href="index.php" class="btn btn-primary">⬅ Back to Store</a>
        </div>
    </div>

</div>

<!-- Bootstrap JS (optional, for buttons, modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
require 'config.php';
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC LIMIT 3")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sweet Bite Bakery</title><link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header"><a class="logo" href="index.php">🍰 Sweet Bite</a>
<nav><a href="index.php">Home</a><a href="menu.php">Our Menu</a><a href="order.php">Order Now</a></nav></header>
<section class="hero"><div class="hero-content"><p class="eyebrow">Freshly baked with love</p><h1>A little sweetness<br>makes life better.</h1>
<p>Delicious cakes, cupcakes and treats made fresh every day.</p><a class="btn" href="menu.php">Explore Our Menu</a></div></section>
<section class="section"><div class="section-heading"><p class="eyebrow">Our favourites</p><h2>Customer favourites</h2><p>Fresh treats for every happy moment.</p></div>
<div class="product-grid">
<?php foreach ($products as $p): ?>
<article class="product-card"><img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
<div class="product-info"><h3><?= htmlspecialchars($p['name']) ?></h3><p><?= htmlspecialchars($p['description']) ?></p>
<strong>Rs. <?= number_format((float)$p['price'], 0) ?></strong><a class="text-link" href="order.php?product=<?= (int)$p['id'] ?>">Order this →</a></div></article>
<?php endforeach; ?>
</div><div class="center"><a class="btn btn-light" href="menu.php">View all products</a></div></section>
<section class="banner"><h2>Made with love, served with a smile.</h2><p>Celebrate birthdays, special days and everyday moments with Sweet Bite.</p><a class="btn" href="order.php">Place an order</a></section>
<footer>© <?= date('Y') ?> Sweet Bite Bakery · Made fresh every day</footer>
</body></html>
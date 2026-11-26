<?php
require 'config.php';
$products = $pdo->query("SELECT id, name, price FROM products ORDER BY name")->fetchAll();
$selected = isset($_GET['product']) ? (int)$_GET['product'] : 0;
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['customer_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $productId = (int)($_POST['product_id'] ?? 0);
    $quantity = (int)($_POST['quantity'] ?? 1);
    $notes = trim($_POST['notes'] ?? '');
    $stmt = $pdo->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->execute([$productId]); $product = $stmt->fetch();
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $phone && $address && $product && $quantity >= 1 && $quantity <= 20) {
        $total = $product['price'] * $quantity;
        $insert = $pdo->prepare("INSERT INTO orders (customer_name,email,phone,address,product_id,quantity,total,notes) VALUES (?,?,?,?,?,?,?,?)");
        $insert->execute([$name,$email,$phone,$address,$productId,$quantity,$total,$notes]);
        $message = "Thank you, " . htmlspecialchars($name) . "! Your order has been received. Your total is Rs. " . number_format($total, 0) . ".";
    } else { $message = "Please complete all required fields correctly. Quantity must be between 1 and 20."; }
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Place an Order | Sweet Bite</title><link rel="stylesheet" href="style.css"><script defer src="script.js"></script></head><body>
<header class="site-header"><a class="logo" href="index.php">🍰 Sweet Bite</a><nav><a href="index.php">Home</a><a href="menu.php">Our Menu</a><a href="order.php">Order Now</a></nav></header>
<section class="page-intro"><p class="eyebrow">Fresh treats are waiting</p><h1>Place your order</h1><p>Fill in the form and we will contact you to confirm.</p></section>
<main class="form-wrap"><?php if ($message): ?><div class="notice"><?= $message ?></div><?php endif; ?>
<form method="POST" action="order.php" class="order-form" onsubmit="return validateOrderForm()">
<label>Full name<input type="text" name="customer_name" required maxlength="100" placeholder="Your name"></label>
<label>Email address<input type="email" name="email" required placeholder="you@example.com"></label>
<label>Phone number<input type="tel" name="phone" required placeholder="03xx-xxxxxxx"></label>
<label>Delivery address<textarea name="address" required rows="3" placeholder="Enter your complete address"></textarea></label>
<label>Select a product<select name="product_id" id="product" required><option value="">Choose a treat</option><?php foreach ($products as $p): ?><option value="<?= (int)$p['id'] ?>" data-price="<?= htmlspecialchars($p['price']) ?>" <?= $selected === (int)$p['id'] ? 'selected' : '' ?>><?= htmlspecialchars($p['name']) ?> — Rs. <?= number_format((float)$p['price'],0) ?></option><?php endforeach; ?></select></label>
<label>Quantity<input type="number" name="quantity" id="quantity" min="1" max="20" value="1" required></label>
<p class="total-preview">Estimated total: <strong id="total">Select a product</strong></p>
<label>Extra instructions (optional)<textarea name="notes" rows="3" placeholder="Cake message, preferred delivery time, etc."></textarea></label>
<button class="btn" type="submit">Submit Order</button></form></main>
<footer>© <?= date('Y') ?> Sweet Bite Bakery</footer></body></html>
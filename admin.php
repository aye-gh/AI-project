<?php
// Basic classroom demo page. Add authentication before using on a public website.
require 'config.php';
$orders = $pdo->query("SELECT o.*, p.name AS product_name FROM orders o JOIN products p ON o.product_id=p.id ORDER BY o.created_at DESC")->fetchAll();
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Orders | Sweet Bite</title><link rel="stylesheet" href="style.css"></head><body>
<header class="site-header"><a class="logo" href="index.php">🍰 Sweet Bite</a><nav><a href="index.php">Home</a><a href="menu.php">Our Menu</a><a href="order.php">Order Now</a></nav></header>
<section class="page-intro"><p class="eyebrow">Bakery management</p><h1>Customer orders</h1><p>Demo admin page for viewing submitted orders.</p></section>
<main class="section table-wrap"><table><thead><tr><th>Order</th><th>Customer</th><th>Product</th><th>Qty</th><th>Total</th><th>Date</th></tr></thead><tbody>
<?php foreach ($orders as $o): ?><tr><td>#<?= (int)$o['id'] ?></td><td><?= htmlspecialchars($o['customer_name']) ?><br><small><?= htmlspecialchars($o['phone']) ?></small></td><td><?= htmlspecialchars($o['product_name']) ?></td><td><?= (int)$o['quantity'] ?></td><td>Rs. <?= number_format((float)$o['total'],0) ?></td><td><?= htmlspecialchars($o['created_at']) ?></td></tr><?php endforeach; ?>
<?php if (!$orders): ?><tr><td colspan="6">No orders have been received yet.</td></tr><?php endif; ?></tbody></table></main><footer>Keep this page private in a real project.</footer></body></html>
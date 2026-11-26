function validateOrderForm() {
  const quantity = Number(document.getElementById('quantity').value);
  if (!Number.isInteger(quantity) || quantity < 1 || quantity > 20) {
    alert('Please enter a quantity between 1 and 20.');
    return false;
  }
  return true;
}

document.addEventListener('DOMContentLoaded', () => {
  const product = document.getElementById('product');
  const quantity = document.getElementById('quantity');
  const total = document.getElementById('total');
  function updateTotal() {
    if (!product || !quantity || !total) return;
    const option = product.options[product.selectedIndex];
    const price = Number(option?.dataset.price || 0);
    const qty = Number(quantity.value || 0);
    total.textContent = price && qty ? 'Rs. ' + (price * qty).toLocaleString('en-PK') : 'Select a product';
  }
  product?.addEventListener('change', updateTotal);
  quantity?.addEventListener('input', updateTotal);
  updateTotal();
});

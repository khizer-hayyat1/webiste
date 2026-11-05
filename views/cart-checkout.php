<?php
$pageTitle = 'KHIZU | Satchel & Checkout';
require __DIR__ . '/layouts/header.php';

$cart = Cart::get();
?>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <div class="mb-space-lg">
    <div class="inline-flex items-center gap-space-xs text-primary font-label-sm uppercase tracking-wider mb-1">
      <a href="/" class="hover:underline">Home</a>
      <span>/</span>
      <span>Satchel & Checkout</span>
    </div>
    <h1 class="font-headline-xl text-headline-xl text-on-surface">Your Stationery Satchel</h1>
    <p class="font-body-md text-body-md text-on-surface-variant">Review items, configure delivery address, and place Cash on Delivery orders.</p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">

    <!-- Left 7 Cols: Cart Items Table -->
    <div class="lg:col-span-7 space-y-space-md">
      <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg">

        <div class="flex items-center justify-between pb-space-md border-b border-outline-variant/20 mb-space-md">
          <span class="font-headline-sm text-[20px] text-on-surface font-semibold">Satchel Items</span>
          <span id="items-badge-count" class="font-label-sm px-space-sm py-1 bg-surface-container text-tertiary rounded uppercase font-bold">
            <?= (int)$cart['count'] ?> Items
          </span>
        </div>

        <div id="cart-items-container" class="space-y-space-md">
          <?php if (empty($cart['items'])): ?>
            <div id="empty-cart-msg" class="py-12 text-center text-on-surface-variant">
              <span class="material-symbols-outlined text-[48px] mb-2 text-on-surface-variant/50">shopping_basket</span>
              <p class="font-headline-sm text-[18px]">Your satchel is currently empty</p>
              <p class="font-body-sm text-[13px] mt-1">Discover handcrafted registers and precision notebooks in our shop.</p>
              <a href="/shop" class="mt-4 inline-block px-space-lg py-2 bg-tertiary text-on-tertiary font-label-md rounded font-bold">Browse Catalog</a>
            </div>
          <?php else: ?>
            <?php foreach ($cart['items'] as $item): ?>
              <div class="cart-line-item flex flex-col sm:flex-row items-center justify-between gap-space-md bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20"
                   id="cart-item-<?= htmlspecialchars($item['key']) ?>">

                <div class="flex items-center gap-space-md w-full sm:w-auto">
                  <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-16 h-16 object-contain rounded bg-surface-container p-1 shrink-0"/>
                  <div>
                    <h4 class="font-title-md text-[16px] text-on-surface font-semibold"><?= htmlspecialchars($item['title']) ?></h4>
                    <div class="text-[12px] text-on-surface-variant space-x-2">
                      <span>Ruling: <strong class="text-on-surface"><?= htmlspecialchars($item['ruling']) ?></strong></span>
                      <span>•</span>
                      <span>PKR <?= number_format($item['price']) ?> / unit</span>
                    </div>
                  </div>
                </div>

                <div class="flex items-center justify-between sm:justify-end gap-space-lg w-full sm:w-auto pt-2 sm:pt-0 border-t sm:border-0 border-outline-variant/20">
                  <!-- Stepper -->
                  <div class="inline-flex items-center bg-surface-container border border-outline-variant/30 rounded p-0.5">
                    <button type="button" onclick="modifyCartItemQty('<?= htmlspecialchars($item['key']) ?>', -1)" class="w-7 h-7 flex items-center justify-center text-on-surface hover:bg-surface-bright rounded">
                      <span class="material-symbols-outlined text-[16px]">remove</span>
                    </button>
                    <span class="w-8 text-center font-bold text-on-surface text-[14px]" id="qty-val-<?= htmlspecialchars($item['key']) ?>"><?= (int)$item['quantity'] ?></span>
                    <button type="button" onclick="modifyCartItemQty('<?= htmlspecialchars($item['key']) ?>', 1)" class="w-7 h-7 flex items-center justify-center text-on-surface hover:bg-surface-bright rounded">
                      <span class="material-symbols-outlined text-[16px]">add</span>
                    </button>
                  </div>

                  <!-- Line Total -->
                  <div class="text-right min-w-[90px]">
                    <div class="font-headline-sm text-[16px] text-on-surface font-bold">
                      PKR <?= number_format($item['price'] * $item['quantity']) ?>
                    </div>
                  </div>

                  <!-- Remove item -->
                  <button type="button" onclick="removeCartItem('<?= htmlspecialchars($item['key']) ?>')" class="text-on-surface-variant hover:text-error transition-colors p-1" title="Remove from satchel">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                  </button>
                </div>

              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      </div>

      <!-- Trust Badges -->
      <div class="grid grid-cols-3 gap-space-md text-center">
        <div class="bg-surface-container-low p-space-md rounded-xl border border-outline-variant/20">
          <span class="material-symbols-outlined text-primary text-[24px]">local_shipping</span>
          <p class="font-label-sm text-[11px] text-on-surface uppercase font-bold mt-1">2-4 Days Delivery</p>
          <span class="text-[10px] text-on-surface-variant">Trax & TCS Express</span>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-xl border border-outline-variant/20">
          <span class="material-symbols-outlined text-tertiary text-[24px]">payments</span>
          <p class="font-label-sm text-[11px] text-on-surface uppercase font-bold mt-1">Cash on Delivery</p>
          <span class="text-[10px] text-on-surface-variant">Pay when parcel arrives</span>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-xl border border-outline-variant/20">
          <span class="material-symbols-outlined text-secondary text-[24px]">support_agent</span>
          <p class="font-label-sm text-[11px] text-on-surface uppercase font-bold mt-1">WhatsApp Support</p>
          <span class="text-[10px] text-on-surface-variant">+92 300 1234567</span>
        </div>
      </div>
    </div>

    <!-- Right 5 Cols: Checkout Form & Summary -->
    <div class="lg:col-span-5 bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg space-y-space-md shadow-2xl">

      <h3 class="font-headline-sm text-headline-sm text-on-surface pb-space-xs border-b border-outline-variant/20">Delivery & Checkout</h3>

      <!-- Order Summary Card -->
      <div class="bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20 space-y-2 text-body-sm">
        <div class="flex items-center justify-between text-on-surface-variant">
          <span>Subtotal</span>
          <span id="summary-subtotal" class="font-bold text-on-surface">PKR <?= number_format($cart['subtotal']) ?></span>
        </div>
        <div class="flex items-center justify-between text-on-surface-variant">
          <span>Flat Nationwide Shipping</span>
          <span id="summary-shipping" class="text-on-surface">PKR <?= number_format($cart['shipping']) ?></span>
        </div>
        <div class="pt-2 border-t border-outline-variant/20 flex items-center justify-between text-headline-sm text-[18px] font-bold text-on-surface">
          <span>Total Order Value</span>
          <span id="summary-total" class="text-tertiary">PKR <?= number_format($cart['total']) ?></span>
        </div>
      </div>

      <!-- Customer Checkout Form -->
      <form id="checkout-form" onsubmit="handleCheckoutSubmission(event)" class="space-y-3">
        <div>
          <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Full Name *</label>
          <input type="text" id="cust-name" required placeholder="e.g. Asad Ali" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">WhatsApp / Phone *</label>
            <input type="tel" id="cust-phone" required placeholder="0300 1234567" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
          </div>
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Email Address</label>
            <input type="email" id="cust-email" placeholder="name@example.com" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">City *</label>
            <input type="text" id="cust-city" required placeholder="e.g. Lahore / Karachi / Islamabad" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
          </div>
          <div>
            <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Payment Method</label>
            <select id="cust-payment-method" class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary">
              <option value="cod">Cash On Delivery (COD)</option>
              <option value="bank_transfer">Direct Bank Transfer</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Complete Delivery Address *</label>
          <textarea id="cust-address" required rows="2" placeholder="House/Flat number, Street, Sector or Landmark..." class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"></textarea>
        </div>

        <div>
          <label class="block font-label-sm text-[11px] text-on-surface-variant uppercase mb-1">Order Notes (Optional)</label>
          <input type="text" id="cust-notes" placeholder="Special delivery instructions or gift packaging..." class="w-full bg-surface-container-lowest text-on-surface text-body-sm px-3.5 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary"/>
        </div>

        <button type="submit" id="checkout-submit-btn" class="w-full py-3.5 bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-lg font-bold rounded-lg shadow-lg hover:shadow-tertiary/20 transition-all flex items-center justify-center gap-2 mt-4">
          <span class="material-symbols-outlined text-[20px]">local_shipping</span>
          <span>Confirm Cash on Delivery Order</span>
        </button>
      </form>

    </div>

  </div>

</div>

<!-- Order Success Modal -->
<div id="order-success-modal" class="fixed inset-0 z-50 bg-surface/85 backdrop-blur-md hidden flex items-center justify-center p-4">
  <div class="bg-surface-container-high border border-outline-variant/30 rounded-2xl max-w-lg w-full p-space-xl shadow-2xl space-y-space-md text-center">
    <div class="w-16 h-16 rounded-full bg-tertiary text-on-tertiary flex items-center justify-center mx-auto shadow-lg shadow-tertiary/20">
      <span class="material-symbols-outlined text-[36px]">verified</span>
    </div>

    <div>
      <h3 class="font-headline-lg text-headline-lg text-on-surface">Order Dispatched to Queue!</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Thank you for patronizing KHIZU Fine Stationery.</p>
    </div>

    <div class="bg-surface-container-lowest p-space-md rounded-lg text-left text-body-sm space-y-2 border border-outline-variant/20">
      <div class="flex justify-between">
        <span class="text-on-surface-variant">Order Number:</span>
        <span id="modal-order-number" class="text-tertiary font-mono font-bold">-</span>
      </div>
      <div class="flex justify-between">
        <span class="text-on-surface-variant">Recipient:</span>
        <span id="modal-customer-name" class="text-on-surface font-semibold">-</span>
      </div>
      <div class="flex justify-between">
        <span class="text-on-surface-variant">Delivery Address:</span>
        <span id="modal-address" class="text-on-surface">-</span>
      </div>
      <div class="flex justify-between">
        <span class="text-on-surface-variant">Cash on Delivery:</span>
        <span id="modal-amount" class="text-tertiary font-bold text-[16px]">-</span>
      </div>
    </div>

    <div class="flex gap-space-sm pt-2">
      <a id="modal-receipt-link" href="#" class="flex-1 py-2.5 bg-primary-container text-primary font-label-md rounded-lg border border-primary/30 font-semibold hover:bg-primary-container/80 transition-colors">
        View Order Receipt
      </a>
      <a href="/shop" class="flex-1 py-2.5 bg-tertiary text-on-tertiary font-label-md rounded-lg font-bold hover:bg-tertiary-fixed transition-colors">
        Continue Shopping
      </a>
    </div>
  </div>
</div>

<script>
  async function modifyCartItemQty(key, delta) {
    const qtySpan = document.getElementById(`qty-val-${key}`);
    if (!qtySpan) return;
    const current = parseInt(qtySpan.textContent) || 1;
    const next = Math.max(1, current + delta);

    const res = await apiUpdateCart(key, next);
    if (res.success) {
      window.location.reload();
    }
  }

  async function removeCartItem(key) {
    const res = await apiRemoveFromCart(key);
    if (res.success) {
      window.location.reload();
    }
  }

  async function handleCheckoutSubmission(e) {
    e.preventDefault();
    const btn = document.getElementById('checkout-submit-btn');
    btn.disabled = true;
    btn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">refresh</span> Processing Order...';

    const payload = {
      name: document.getElementById('cust-name').value,
      phone: document.getElementById('cust-phone').value,
      email: document.getElementById('cust-email').value,
      city: document.getElementById('cust-city').value,
      address: document.getElementById('cust-address').value,
      payment_method: document.getElementById('cust-payment-method').value,
      notes: document.getElementById('cust-notes').value
    };

    try {
      const resp = await fetch('/api/checkout', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      const data = await resp.json();

      if (data.success) {
        document.getElementById('modal-order-number').textContent = data.order_number;
        document.getElementById('modal-customer-name').textContent = payload.name;
        document.getElementById('modal-address').textContent = `${payload.address}, ${payload.city}`;
        document.getElementById('modal-amount').textContent = document.getElementById('summary-total').textContent;
        document.getElementById('modal-receipt-link').href = `/order-confirmation/${data.order_number}`;

        document.getElementById('order-success-modal').classList.remove('hidden');
        updateNavCartCount(0);
      } else {
        alert(data.error || 'Checkout could not be completed.');
        btn.disabled = false;
        btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">local_shipping</span><span>Confirm Cash on Delivery Order</span>';
      }
    } catch (err) {
      alert('Network or server error during checkout.');
      btn.disabled = false;
      btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">local_shipping</span><span>Confirm Cash on Delivery Order</span>';
    }
  }
</script>

<?php require __DIR__ . '/layouts/footer.php'; ?>

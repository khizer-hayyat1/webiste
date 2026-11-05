<?php
$pageTitle = 'KHIZU | Order Receipt #' . ($order ? htmlspecialchars($order['order_number']) : 'Not Found');
require __DIR__ . '/layouts/header.php';
?>

<div class="max-w-4xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <?php if (!$order): ?>
    <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-xl text-center">
      <span class="material-symbols-outlined text-[48px] text-error mb-2">search_off</span>
      <h2 class="font-headline-lg text-headline-lg text-on-surface">Order Not Found</h2>
      <p class="font-body-md text-on-surface-variant mt-1">Please check your tracking number or contact our concierge.</p>
      <a href="/shop" class="mt-4 inline-block px-space-lg py-2 bg-tertiary text-on-tertiary font-label-md rounded font-bold">Go to Shop</a>
    </div>
  <?php else: ?>

    <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-xl shadow-2xl space-y-space-lg">

      <!-- Top Receipt Header -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pb-space-lg border-b border-outline-variant/20 gap-space-md">
        <div>
          <span class="font-label-sm text-label-sm text-tertiary uppercase tracking-widest">Confirmed Order Receipt</span>
          <h1 class="font-headline-lg text-headline-lg text-on-surface font-mono"><?= htmlspecialchars($order['order_number']) ?></h1>
          <p class="text-body-sm text-on-surface-variant">Placed on <?= date('F j, Y, g:i A', strtotime($order['created_at'])) ?></p>
        </div>
        <div class="flex items-center gap-2">
          <span class="px-space-md py-1 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-label-sm uppercase font-bold">
            <?= htmlspecialchars($order['status']) ?>
          </span>
          <button onclick="window.print()" class="px-3 py-1.5 bg-surface-container hover:bg-surface-bright text-on-surface text-body-sm rounded border border-outline-variant/30 flex items-center gap-1">
            <span class="material-symbols-outlined text-[16px]">print</span>
            <span>Print</span>
          </button>
        </div>
      </div>

      <!-- Recipient & Shipping Information Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20">
        <div>
          <h4 class="font-label-md text-on-surface uppercase font-bold mb-1">Customer Details</h4>
          <p class="font-body-sm text-on-surface"><?= htmlspecialchars($order['customer_name']) ?></p>
          <p class="font-body-sm text-on-surface-variant"><?= htmlspecialchars($order['customer_phone']) ?></p>
          <?php if (!empty($order['customer_email'])): ?>
            <p class="font-body-sm text-on-surface-variant"><?= htmlspecialchars($order['customer_email']) ?></p>
          <?php endif; ?>
        </div>

        <div>
          <h4 class="font-label-md text-on-surface uppercase font-bold mb-1">Shipping Destination</h4>
          <p class="font-body-sm text-on-surface"><?= nl2br(htmlspecialchars($order['shipping_address'])) ?></p>
          <p class="font-body-sm text-primary font-medium"><?= htmlspecialchars($order['city']) ?>, Pakistan</p>
          <p class="font-body-sm text-tertiary text-[12px] font-bold mt-1">Payment Method: <?= strtoupper($order['payment_method']) ?></p>
        </div>
      </div>

      <!-- Order Items Table -->
      <div>
        <h4 class="font-label-lg text-on-surface uppercase font-bold mb-space-sm">Purchased Stationery Items</h4>
        <div class="divide-y divide-outline-variant/20 border border-outline-variant/20 rounded-lg overflow-hidden">
          <?php foreach ($order['items'] as $item): ?>
            <div class="p-space-md flex items-center justify-between bg-surface-container-lowest">
              <div>
                <h5 class="font-title-md text-[16px] text-on-surface font-semibold"><?= htmlspecialchars($item['product_title']) ?></h5>
                <p class="text-[12px] text-on-surface-variant">Ruling: <?= htmlspecialchars($item['ruling']) ?> • <?= (int)$item['quantity'] ?> units @ PKR <?= number_format($item['unit_price']) ?></p>
              </div>
              <div class="font-headline-sm text-[16px] text-on-surface font-bold">
                PKR <?= number_format($item['total_price']) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Financial Totals -->
      <div class="bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20 max-w-sm ml-auto space-y-2 text-body-sm">
        <div class="flex justify-between text-on-surface-variant">
          <span>Subtotal</span>
          <span class="text-on-surface">PKR <?= number_format($order['subtotal']) ?></span>
        </div>
        <div class="flex justify-between text-on-surface-variant">
          <span>Nationwide COD Shipping</span>
          <span class="text-on-surface">PKR <?= number_format($order['shipping_fee']) ?></span>
        </div>
        <div class="pt-2 border-t border-outline-variant/20 flex justify-between font-headline-sm text-[18px] font-bold text-on-surface">
          <span>Payable Amount</span>
          <span class="text-tertiary">PKR <?= number_format($order['total_amount']) ?></span>
        </div>
      </div>

      <div class="pt-space-md text-center">
        <a href="/shop" class="inline-flex items-center gap-2 px-space-xl py-3 bg-tertiary text-on-tertiary font-label-lg rounded-lg font-bold">
          <span class="material-symbols-outlined text-[18px]">shopping_bag</span>
          <span>Order More Fine Stationery</span>
        </a>
      </div>

    </div>

  <?php endif; ?>

</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>

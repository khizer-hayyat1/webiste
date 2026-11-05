<?php
$pageTitle = 'KHIZU | Executive Storefront Portal & Operations';
require __DIR__ . '/layouts/header.php';
?>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <div class="mb-space-lg flex flex-col md:flex-row md:items-end justify-between gap-space-md">
    <div>
      <div class="inline-flex items-center gap-space-xs text-primary font-label-sm uppercase tracking-wider mb-1">
        <a href="/" class="hover:underline">Home</a>
        <span>/</span>
        <span>Management Operations</span>
      </div>
      <h1 class="font-headline-xl text-headline-xl text-on-surface">Store Operations & Dispatch Portal</h1>
      <p class="font-body-md text-body-md text-on-surface-variant">Live overview of orders, inventory stocks, and customer communications.</p>
    </div>
    <div class="flex items-center gap-2">
      <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
      <span class="text-on-surface font-label-sm uppercase text-[12px] font-bold">Database Synchronized</span>
    </div>
  </div>

  <!-- Operational Metrics Counters -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter mb-space-xl">
    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30">
      <div class="flex items-center justify-between text-primary mb-1">
        <span class="font-label-sm uppercase font-bold text-[11px]">Total Orders</span>
        <span class="material-symbols-outlined text-[20px]">receipt_long</span>
      </div>
      <div class="font-display-lg text-[32px] font-bold text-on-surface"><?= count($orders) ?></div>
      <span class="text-[12px] text-on-surface-variant">Dispatched nationwide</span>
    </div>

    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30">
      <div class="flex items-center justify-between text-tertiary mb-1">
        <span class="font-label-sm uppercase font-bold text-[11px]">Catalog Volumes</span>
        <span class="material-symbols-outlined text-[20px]">inventory_2</span>
      </div>
      <div class="font-display-lg text-[32px] font-bold text-on-surface"><?= count($products) ?></div>
      <span class="text-[12px] text-on-surface-variant">Active SKUs</span>
    </div>

    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30">
      <div class="flex items-center justify-between text-secondary mb-1">
        <span class="font-label-sm uppercase font-bold text-[11px]">Customer Inquiries</span>
        <span class="material-symbols-outlined text-[20px]">chat</span>
      </div>
      <div class="font-display-lg text-[32px] font-bold text-on-surface"><?= count($inquiries) ?></div>
      <span class="text-[12px] text-on-surface-variant">Logged in database</span>
    </div>

    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30">
      <div class="flex items-center justify-between text-emerald-400 mb-1">
        <span class="font-label-sm uppercase font-bold text-[11px]">Dispatch System</span>
        <span class="material-symbols-outlined text-[20px]">check_circle</span>
      </div>
      <div class="font-headline-sm text-[24px] font-bold text-on-surface">ONLINE</div>
      <span class="text-[12px] text-emerald-400 font-medium">SQLite & MySQL PDO Ready</span>
    </div>
  </div>

  <!-- Section 1: Live Customer Orders -->
  <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg mb-space-xl shadow-xl">
    <div class="flex items-center justify-between mb-space-md">
      <div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Recent Customer Orders</h3>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Manage order status and view line-item specifications.</p>
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left text-body-sm">
        <thead class="bg-surface-container-lowest text-on-surface-variant font-label-sm uppercase text-[11px] border-b border-outline-variant/30">
          <tr>
            <th class="p-3">Order #</th>
            <th class="p-3">Customer</th>
            <th class="p-3">City</th>
            <th class="p-3">Items</th>
            <th class="p-3">Total (PKR)</th>
            <th class="p-3">Status</th>
            <th class="p-3">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-outline-variant/20">
          <?php if (empty($orders)): ?>
            <tr>
              <td colspan="7" class="p-6 text-center text-on-surface-variant">No orders placed yet. Place a test order from the shop!</td>
            </tr>
          <?php else: ?>
            <?php foreach ($orders as $ord): ?>
              <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                <td class="p-3 font-mono font-bold text-tertiary">
                  <a href="/order-confirmation/<?= htmlspecialchars($ord['order_number']) ?>" class="hover:underline">
                    <?= htmlspecialchars($ord['order_number']) ?>
                  </a>
                </td>
                <td class="p-3">
                  <div class="font-semibold text-on-surface"><?= htmlspecialchars($ord['customer_name']) ?></div>
                  <div class="text-[12px] text-on-surface-variant"><?= htmlspecialchars($ord['customer_phone']) ?></div>
                </td>
                <td class="p-3 text-on-surface"><?= htmlspecialchars($ord['city']) ?></td>
                <td class="p-3">
                  <span class="px-2 py-0.5 rounded bg-surface-container text-[12px]">
                    <?= count($ord['items']) ?> line(s)
                  </span>
                </td>
                <td class="p-3 font-bold text-on-surface">PKR <?= number_format($ord['total_amount']) ?></td>
                <td class="p-3">
                  <span class="px-2 py-1 rounded text-[11px] uppercase font-bold <?= $ord['status'] === 'delivered' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-primary-container text-primary' ?>">
                    <?= htmlspecialchars($ord['status']) ?>
                  </span>
                </td>
                <td class="p-3">
                  <select onchange="updateOrderStatus('<?= htmlspecialchars($ord['order_number']) ?>', this.value)" class="bg-surface-container text-body-sm text-on-surface px-2 py-1 rounded border border-outline-variant/30 text-[12px]">
                    <option value="confirmed" <?= $ord['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                    <option value="shipped" <?= $ord['status'] === 'shipped' ? 'selected' : '' ?>>Shipped</option>
                    <option value="delivered" <?= $ord['status'] === 'delivered' ? 'selected' : '' ?>>Delivered</option>
                    <option value="cancelled" <?= $ord['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                  </select>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Section 2: Inventory & Real-time Stock Management -->
  <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg mb-space-xl shadow-xl">
    <div class="flex items-center justify-between mb-space-md">
      <div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Stationery Inventory & Stock Balances</h3>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Update stock levels in real time to reflect in product listings.</p>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-md">
      <?php foreach ($products as $prod): ?>
        <div class="bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20 flex flex-col justify-between">
          <div class="flex items-center gap-space-md mb-2">
            <img src="<?= htmlspecialchars($prod['image_url']) ?>" alt="<?= htmlspecialchars($prod['title']) ?>" class="w-12 h-12 object-contain bg-surface-container rounded p-1"/>
            <div>
              <h4 class="font-title-md text-[14px] text-on-surface font-semibold line-clamp-1"><?= htmlspecialchars($prod['title']) ?></h4>
              <span class="text-[11px] text-on-surface-variant font-mono"><?= htmlspecialchars($prod['sku'] ?? 'KHZ-SKU') ?> • PKR <?= number_format($prod['price']) ?></span>
            </div>
          </div>

          <div class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
            <span class="text-[12px] text-on-surface-variant">Available Stock:</span>
            <div class="flex items-center gap-2">
              <input type="number" id="stock-val-<?= $prod['id'] ?>" value="<?= (int)$prod['stock'] ?>" class="w-16 bg-surface-container text-on-surface text-center py-1 rounded border border-outline-variant/30 text-[13px]"/>
              <button onclick="saveStockLevel(<?= $prod['id'] ?>)" class="px-2.5 py-1 bg-tertiary text-on-tertiary font-label-sm uppercase font-bold rounded text-[11px] hover:bg-tertiary-fixed transition-colors">
                Save
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Section 3: Inquiries Received -->
  <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg shadow-xl">
    <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Client Messages & Inquiries</h3>
    <div class="space-y-space-sm">
      <?php if (empty($inquiries)): ?>
        <p class="text-on-surface-variant text-body-sm py-4">No inquiries submitted yet.</p>
      <?php else: ?>
        <?php foreach ($inquiries as $inq): ?>
          <div class="bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20 space-y-1">
            <div class="flex items-center justify-between">
              <span class="font-label-md text-on-surface font-bold"><?= htmlspecialchars($inq['full_name']) ?> (<?= htmlspecialchars($inq['email']) ?> - <?= htmlspecialchars($inq['phone'] ?? '') ?>)</span>
              <span class="text-[11px] text-on-surface-variant"><?= htmlspecialchars($inq['created_at']) ?></span>
            </div>
            <span class="inline-block px-2 py-0.5 rounded bg-surface-container text-[11px] text-tertiary font-bold"><?= htmlspecialchars($inq['subject'] ?? 'General') ?></span>
            <p class="font-body-sm text-on-surface-variant mt-1"><?= nl2br(htmlspecialchars($inq['message'])) ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

</div>

<script>
  async function updateOrderStatus(orderNumber, newStatus) {
    try {
      const resp = await fetch('/api/admin/order-status', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ order_id: orderNumber, status: newStatus })
      });
      const data = await resp.json();
      if (data.success) {
        showToast('Order Status Updated', `Order ${orderNumber} transitioned to ${newStatus}.`);
      } else {
        alert('Could not update status');
      }
    } catch (err) {
      alert('Error updating order');
    }
  }

  async function saveStockLevel(productId) {
    const val = parseInt(document.getElementById(`stock-val-${productId}`).value) || 0;
    try {
      const resp = await fetch('/api/admin/update-stock', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ product_id: productId, stock: val })
      });
      const data = await resp.json();
      if (data.success) {
        showToast('Stock Synchronized', `Product stock updated to ${val} units.`);
      } else {
        alert('Could not update stock');
      }
    } catch (err) {
      alert('Error updating stock');
    }
  }
</script>

<?php require __DIR__ . '/layouts/footer.php'; ?>

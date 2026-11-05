<?php
$pageTitle = htmlspecialchars($product['title']) . ' | KHIZU Fine Stationery';
require __DIR__ . '/layouts/header.php';

$gallery = !empty($product['gallery_images']) ? $product['gallery_images'] : [$product['image_url']];
$rulings = !empty($product['ruling_options']) ? $product['ruling_options'] : ['Single Line / Ruled'];
$features = !empty($product['features']) ? $product['features'] : [];
?>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <!-- Breadcrumb -->
  <div class="inline-flex items-center gap-space-xs text-primary font-label-sm uppercase tracking-wider mb-space-lg">
    <a href="/" class="hover:underline">Home</a>
    <span>/</span>
    <a href="/shop" class="hover:underline">Shop</a>
    <span>/</span>
    <span class="text-on-surface-variant"><?= htmlspecialchars($product['title']) ?></span>
  </div>

  <!-- Main Product Detail Split -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start mb-space-xl">

    <!-- Left 7 Cols: Image Gallery Showcase -->
    <div class="lg:col-span-7 space-y-space-md">

      <!-- Big Display Viewport -->
      <div class="relative w-full h-[460px] md:h-[520px] bg-surface-container-lowest rounded-xl border border-outline-variant/30 flex items-center justify-center p-8 overflow-hidden shadow-2xl group">
        <img id="main-product-display"
             src="<?= htmlspecialchars($gallery[0]) ?>"
             alt="<?= htmlspecialchars($product['title']) ?>"
             class="max-h-full max-w-full object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.8)] transition-all duration-300"/>

        <?php if (!empty($product['badge'])): ?>
          <span class="absolute top-4 left-4 px-space-md py-1 bg-tertiary text-on-tertiary font-label-sm text-label-sm uppercase font-bold rounded">
            <?= htmlspecialchars($product['badge']) ?>
          </span>
        <?php endif; ?>

        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-body-sm text-on-surface-variant bg-surface/70 backdrop-blur-md px-3 py-1.5 rounded-lg border border-outline-variant/20">
          <span id="current-view-title" class="font-label-sm uppercase tracking-wider text-tertiary">Precision View</span>
          <span class="font-body-sm text-[12px]"><?= htmlspecialchars($product['paper_gsm']) ?> • <?= htmlspecialchars($product['page_count']) ?></span>
        </div>
      </div>

      <!-- Thumbnail Selector Row -->
      <div class="grid grid-cols-4 gap-space-sm">
        <?php foreach ($gallery as $idx => $imgUrl): ?>
          <button type="button"
                  onclick="swapDetailImage('<?= htmlspecialchars($imgUrl) ?>', <?= $idx ?>)"
                  class="thumb-btn h-24 bg-surface-container-lowest rounded-lg p-2 border border-outline-variant/30 hover:border-tertiary flex items-center justify-center transition-all <?= $idx === 0 ? 'ring-2 ring-tertiary bg-surface-bright' : '' ?>">
            <img src="<?= htmlspecialchars($imgUrl) ?>" alt="Thumbnail <?= $idx + 1 ?>" class="max-h-full object-contain"/>
          </button>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- Right 5 Cols: Product Configurator & Purchasing Box -->
    <div class="lg:col-span-5 bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-lg space-y-space-md shadow-xl">

      <!-- Brand & Title -->
      <div class="space-y-1">
        <div class="flex items-center justify-between">
          <span class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wider">
            <?= htmlspecialchars($product['category_name'] ?? 'Executive Collection') ?>
          </span>
          <span class="inline-flex items-center gap-1 font-label-sm text-[11px] <?= $product['stock'] > 15 ? 'text-emerald-400' : 'text-amber-400' ?>">
            <span class="w-1.5 h-1.5 rounded-full <?= $product['stock'] > 15 ? 'bg-emerald-400' : 'bg-amber-400' ?> animate-pulse"></span>
            <?= $product['stock'] > 15 ? 'In Stock (' . $product['stock'] . ' available)' : 'Low Stock (' . $product['stock'] . ' remaining)' ?>
          </span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface"><?= htmlspecialchars($product['title']) ?></h1>
        <p class="font-body-sm text-body-sm text-on-surface-variant"><?= htmlspecialchars($product['tagline'] ?? '') ?></p>
      </div>

      <!-- Price Box -->
      <div class="p-space-md bg-surface-container-lowest rounded-lg border border-outline-variant/20 flex items-center justify-between">
        <div>
          <span class="font-display-lg text-[32px] font-bold text-on-surface">PKR <?= number_format($product['price']) ?></span>
          <?php if (!empty($product['compare_price'])): ?>
            <span class="ml-2 font-body-md text-on-surface-variant line-through">PKR <?= number_format($product['compare_price']) ?></span>
          <?php endif; ?>
        </div>
        <span class="text-tertiary font-label-sm uppercase font-bold tracking-wider bg-tertiary/10 px-2 py-1 rounded">
          COD Available
        </span>
      </div>

      <!-- Ruling Options Selector -->
      <div class="space-y-space-xs">
        <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Select Ruling Pattern:</label>
        <div class="grid grid-cols-2 gap-2" id="ruling-selector-group">
          <?php foreach ($rulings as $rIdx => $rulingName): ?>
            <button type="button"
                    onclick="selectRulingOption(this, '<?= htmlspecialchars(addslashes($rulingName)) ?>')"
                    class="ruling-btn text-left p-space-sm rounded-lg border border-outline-variant/30 text-body-sm transition-all flex items-center justify-between <?= $rIdx === 0 ? 'bg-surface-container-high border-tertiary text-on-surface' : 'bg-surface-container text-on-surface-variant hover:text-on-surface' ?>">
              <span class="truncate"><?= htmlspecialchars($rulingName) ?></span>
              <span class="indicator-dot w-2 h-2 rounded-full <?= $rIdx === 0 ? 'bg-tertiary' : 'bg-transparent' ?>"></span>
            </button>
          <?php endforeach; ?>
        </div>
        <input type="hidden" id="selected-ruling-input" value="<?= htmlspecialchars($rulings[0] ?? 'Standard') ?>"/>
      </div>

      <!-- Quantity Stepper -->
      <div class="space-y-space-xs">
        <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Quantity (Satchel Units):</label>
        <div class="flex items-center gap-space-sm">
          <div class="inline-flex items-center bg-surface-container-lowest border border-outline-variant/30 rounded-lg p-1">
            <button type="button" onclick="changeDetailQty(-1)" class="w-9 h-9 rounded flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors">
              <span class="material-symbols-outlined text-[18px]">remove</span>
            </button>
            <span id="detail-qty" class="w-12 text-center font-bold text-on-surface font-headline-sm text-[18px]">1</span>
            <button type="button" onclick="changeDetailQty(1)" class="w-9 h-9 rounded flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors">
              <span class="material-symbols-outlined text-[18px]">add</span>
            </button>
          </div>
          <span class="text-[12px] text-on-surface-variant">Packed in rigid waterproof corrugated sleeve.</span>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="space-y-space-sm pt-space-xs">
        <button type="button"
                onclick="submitProductToCart(<?= (int)$product['id'] ?>)"
                class="w-full py-3.5 bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-lg font-bold rounded-lg shadow-lg hover:shadow-tertiary/20 transition-all flex items-center justify-center gap-2">
          <span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
          <span>Add to Satchel</span>
        </button>

        <button type="button"
                onclick="buyNowProduct(<?= (int)$product['id'] ?>)"
                class="w-full py-3 bg-secondary-container hover:bg-secondary-container/80 text-on-secondary-container font-label-lg rounded-lg transition-all flex items-center justify-center gap-2">
          <span class="material-symbols-outlined text-[20px]">flash_on</span>
          <span>Buy Now (Cash on Delivery)</span>
        </button>
      </div>

      <!-- Specifications Checklist -->
      <div class="pt-space-md border-t border-outline-variant/20 space-y-2 text-body-sm text-on-surface-variant">
        <div class="flex items-center justify-between">
          <span>Binding Method</span>
          <span class="text-on-surface font-medium"><?= htmlspecialchars($product['binding']) ?></span>
        </div>
        <div class="flex items-center justify-between">
          <span>Paper Weight</span>
          <span class="text-on-surface font-medium"><?= htmlspecialchars($product['paper_gsm']) ?> Woodfree</span>
        </div>
        <div class="flex items-center justify-between">
          <span>Page Extent</span>
          <span class="text-on-surface font-medium"><?= htmlspecialchars($product['page_count']) ?></span>
        </div>
        <div class="flex items-center justify-between">
          <span>Nationwide Dispatch</span>
          <span class="text-emerald-400 font-medium">Within 24 Hours</span>
        </div>
      </div>

    </div>

  </div>

  <!-- Product Full Description & Key Features -->
  <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-xl mb-space-xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
      <div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm">Archival Grade Engineering</h3>
        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          <?= nl2br(htmlspecialchars($product['description'])) ?>
        </p>
      </div>
      <div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm">Signature Highlights</h3>
        <ul class="space-y-space-xs font-body-sm">
          <?php foreach ($features as $feat): ?>
            <li class="flex items-start gap-2 text-on-surface">
              <span class="material-symbols-outlined text-tertiary text-[18px] shrink-0 mt-0.5">check_circle</span>
              <span><?= htmlspecialchars($feat) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

  <!-- Customer Reviews -->
  <div class="bg-surface-container-low rounded-xl border border-outline-variant/30 p-space-xl">
    <div class="flex items-center justify-between mb-space-md">
      <div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Verified Customer Testimonials</h3>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Real feedback from students, accountants, and writers across Pakistan.</p>
      </div>
      <div class="flex items-center gap-1 text-tertiary">
        <span class="material-symbols-outlined text-[20px] fill-current">star</span>
        <span class="material-symbols-outlined text-[20px] fill-current">star</span>
        <span class="material-symbols-outlined text-[20px] fill-current">star</span>
        <span class="material-symbols-outlined text-[20px] fill-current">star</span>
        <span class="material-symbols-outlined text-[20px] fill-current">star</span>
        <span class="text-on-surface font-bold ml-1">5.0 / 5</span>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
      <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $rev): ?>
          <div class="bg-surface-container-lowest p-space-md rounded-lg border border-outline-variant/20">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-md text-on-surface font-semibold"><?= htmlspecialchars($rev['customer_name']) ?></span>
              <span class="text-xs text-emerald-400 flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">verified</span> Verified Order
              </span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant italic">"<?= htmlspecialchars($rev['comment']) ?>"</p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="font-body-sm text-on-surface-variant col-span-2">First batch of reviews pending approval.</p>
      <?php endif; ?>
    </div>
  </div>

</div>

<script>
  let detailQty = 1;

  function swapDetailImage(url, idx) {
    document.getElementById('main-product-display').src = url;
    const thumbs = document.querySelectorAll('.thumb-btn');
    thumbs.forEach((t, i) => {
      if (i === idx) {
        t.classList.add('ring-2', 'ring-tertiary', 'bg-surface-bright');
      } else {
        t.classList.remove('ring-2', 'ring-tertiary', 'bg-surface-bright');
      }
    });
  }

  function selectRulingOption(btn, rulingName) {
    document.getElementById('selected-ruling-input').value = rulingName;
    document.querySelectorAll('.ruling-btn').forEach(b => {
      b.classList.remove('bg-surface-container-high', 'border-tertiary', 'text-on-surface');
      b.classList.add('bg-surface-container', 'text-on-surface-variant');
      const dot = b.querySelector('.indicator-dot');
      if (dot) dot.classList.replace('bg-tertiary', 'bg-transparent');
    });

    btn.classList.remove('bg-surface-container', 'text-on-surface-variant');
    btn.classList.add('bg-surface-container-high', 'border-tertiary', 'text-on-surface');
    const activeDot = btn.querySelector('.indicator-dot');
    if (activeDot) activeDot.classList.replace('bg-transparent', 'bg-tertiary');
  }

  function changeDetailQty(delta) {
    detailQty = Math.max(1, detailQty + delta);
    document.getElementById('detail-qty').textContent = detailQty;
  }

  async function submitProductToCart(productId) {
    const ruling = document.getElementById('selected-ruling-input').value;
    const res = await apiAddToCart(productId, detailQty, ruling);
    if (res.success) {
      showToast('Item Added to Satchel', `${detailQty}x configured unit added. Cash on delivery ready.`);
    }
  }

  async function buyNowProduct(productId) {
    const ruling = document.getElementById('selected-ruling-input').value;
    const res = await apiAddToCart(productId, detailQty, ruling);
    if (res.success) {
      window.location.href = '/cart';
    }
  }
</script>

<?php require __DIR__ . '/layouts/footer.php'; ?>

<?php
$pageTitle = 'KHIZU | Stationery & Register Shop Collection';
require __DIR__ . '/layouts/header.php';
?>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <!-- Header Title & Description -->
  <div class="mb-space-lg">
    <div class="inline-flex items-center gap-space-xs text-primary font-label-sm uppercase tracking-wider mb-1">
      <a href="/" class="hover:underline">Home</a>
      <span>/</span>
      <span>Shop Catalog</span>
    </div>
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
      <div>
        <h1 class="font-headline-xl text-headline-xl text-on-surface">Fine Stationery & Notebooks</h1>
        <p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
          Engineered for scholars, writers, and executives. Select by binding style, paper grammage, and ruling format.
        </p>
      </div>
      <div class="flex items-center gap-2">
        <span class="text-tertiary font-bold"><?= count($products) ?></span>
        <span class="text-on-surface-variant font-label-md">Products in Archive</span>
      </div>
    </div>
  </div>

  <!-- Search & Sorting Filter Bar -->
  <div class="bg-surface-container-low border border-outline-variant/30 rounded-xl p-space-md mb-space-xl flex flex-col md:flex-row items-center justify-between gap-space-md">

    <!-- Real-time Search Input -->
    <div class="relative w-full md:w-96">
      <span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-[20px]">search</span>
      <input type="text" id="catalog-search"
             value="<?= htmlspecialchars($searchQuery) ?>"
             placeholder="Search notebooks, registers, GSM..."
             class="w-full bg-surface-container-lowest text-on-surface text-body-sm pl-10 pr-4 py-2.5 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary focus:ring-1 focus:ring-tertiary transition-colors"/>
    </div>

    <!-- Category Pills Filter -->
    <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
      <a href="/shop" class="filter-pill px-space-md py-1.5 rounded-lg font-label-sm transition-all whitespace-nowrap <?= ($activeCategory === 'all' || empty($activeCategory)) ? 'bg-primary-container text-primary font-bold border border-primary/30' : 'bg-surface-container-lowest text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>">
        All Volumes
      </a>
      <?php foreach ($categories as $cat): ?>
        <a href="/shop?category=<?= urlencode($cat['slug']) ?>"
           class="filter-pill px-space-md py-1.5 rounded-lg font-label-sm transition-all whitespace-nowrap <?= ($activeCategory === $cat['slug'] || $activeCategory == $cat['id']) ? 'bg-primary-container text-primary font-bold border border-primary/30' : 'bg-surface-container-lowest text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>">
          <?= htmlspecialchars($cat['name']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Sort Dropdown -->
    <div class="w-full md:w-auto flex items-center justify-end gap-2">
      <label for="catalog-sort" class="text-[12px] font-label-sm text-on-surface-variant uppercase whitespace-nowrap">Sort:</label>
      <select id="catalog-sort" onchange="applySorting(this.value)" class="bg-surface-container-lowest text-on-surface text-body-sm px-3 py-2 rounded-lg border border-outline-variant/40 focus:outline-none focus:border-tertiary">
        <option value="featured" <?= $sortOption === 'featured' ? 'selected' : '' ?>>Curated Featured</option>
        <option value="price-asc" <?= $sortOption === 'price-asc' ? 'selected' : '' ?>>Price: Low to High</option>
        <option value="price-desc" <?= $sortOption === 'price-desc' ? 'selected' : '' ?>>Price: High to Low</option>
        <option value="pages" <?= $sortOption === 'pages' ? 'selected' : '' ?>>Page Count: Highest</option>
      </select>
    </div>

  </div>

  <!-- Product Catalog Grid -->
  <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
    <?php if (empty($products)): ?>
      <div class="col-span-full py-16 text-center bg-surface-container-low rounded-xl border border-outline-variant/30">
        <span class="material-symbols-outlined text-[48px] text-on-surface-variant mb-2">inventory_2</span>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">No Products Match Your Criteria</h3>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Try resetting the keyword or selecting another collection category.</p>
        <a href="/shop" class="mt-4 inline-block px-space-lg py-2 bg-tertiary text-on-tertiary font-label-md rounded font-bold">Clear Filters</a>
      </div>
    <?php else: ?>
      <?php foreach ($products as $prod): ?>
        <div class="product-item-card bg-primary-container/25 hover:bg-primary-container/50 border border-outline-variant/25 rounded-xl p-space-md flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:border-primary/40 group"
             data-name="<?= htmlspecialchars(strtolower($prod['title'])) ?>"
             data-category="<?= htmlspecialchars(strtolower($prod['category_name'] ?? '')) ?>"
             data-price="<?= (float)$prod['price'] ?>">

          <div>
            <!-- Image Area -->
            <div class="relative w-full h-64 bg-surface-container-lowest rounded-lg p-5 flex items-center justify-center overflow-hidden mb-space-md">
              <a href="/product/<?= $prod['id'] ?>" class="w-full h-full flex items-center justify-center">
                <img src="<?= htmlspecialchars($prod['image_url']) ?>"
                     alt="<?= htmlspecialchars($prod['title']) ?>"
                     class="max-h-56 object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-md"/>
              </a>
              <?php if (!empty($prod['badge'])): ?>
                <span class="absolute top-3 left-3 px-space-sm py-0.5 bg-tertiary text-on-tertiary font-label-sm text-[10px] uppercase font-bold rounded">
                  <?= htmlspecialchars($prod['badge']) ?>
                </span>
              <?php endif; ?>
              <span class="absolute top-3 right-3 px-space-sm py-0.5 bg-surface-container text-on-surface-variant font-label-sm text-[10px] rounded border border-outline-variant/30">
                <?= htmlspecialchars($prod['page_count']) ?>
              </span>
            </div>

            <!-- Metadata -->
            <div class="space-y-1.5">
              <div class="flex items-center justify-between text-[11px] font-label-sm uppercase">
                <span class="text-primary font-bold"><?= htmlspecialchars($prod['category_name'] ?? 'Register') ?></span>
                <span class="text-tertiary"><?= htmlspecialchars($prod['paper_gsm']) ?></span>
              </div>
              <h3 class="font-title-md text-title-md text-on-surface font-semibold group-hover:text-primary transition-colors">
                <a href="/product/<?= $prod['id'] ?>"><?= htmlspecialchars($prod['title']) ?></a>
              </h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2"><?= htmlspecialchars($prod['tagline'] ?? $prod['description']) ?></p>
            </div>
          </div>

          <!-- Bottom Price & Actions -->
          <div class="pt-space-md mt-space-md border-t border-outline-variant/20 flex items-center justify-between">
            <div>
              <div class="font-headline-sm text-headline-sm text-on-surface font-bold">PKR <?= number_format($prod['price']) ?></div>
              <?php if (!empty($prod['compare_price'])): ?>
                <span class="text-[12px] text-on-surface-variant line-through">PKR <?= number_format($prod['compare_price']) ?></span>
              <?php endif; ?>
            </div>
            <div class="flex items-center gap-1.5">
              <a href="/product/<?= $prod['id'] ?>" class="p-2 rounded bg-surface-container hover:bg-surface-bright text-on-surface transition-colors" title="View Specifications">
                <span class="material-symbols-outlined text-[18px]">visibility</span>
              </a>
              <button onclick="quickAddToCart(<?= (int)$prod['id'] ?>, '<?= htmlspecialchars(addslashes($prod['title'])) ?>', <?= (float)$prod['price'] ?>)" class="px-space-md py-2 bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-md rounded font-bold shadow transition-all flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
                <span>Satchel</span>
              </button>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

</div>

<script>
  function applySorting(sortVal) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', sortVal);
    window.location.href = url.toString();
  }
</script>

<?php require __DIR__ . '/layouts/footer.php'; ?>

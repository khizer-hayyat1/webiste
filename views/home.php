<?php
$pageTitle = 'KHIZU | Inspiring Creativity, One Page at a Time';
require __DIR__ . '/layouts/header.php';
?>

<!-- SECTION 1: HERO SHOWCASE -->
<section class="relative w-full overflow-hidden bg-surface py-space-xl lg:py-24 border-b border-outline-variant/10">
  <div class="absolute -top-40 right-0 w-[550px] h-[550px] rounded-full bg-secondary-container/15 blur-[120px] pointer-events-none"></div>
  <div class="absolute bottom-0 left-10 w-[420px] h-[420px] rounded-full bg-tertiary/10 blur-[130px] pointer-events-none"></div>

  <div class="w-full px-margin-mobile md:px-margin max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">

      <!-- Left Column: Typographic Narrative -->
      <div class="lg:col-span-7 flex flex-col items-start gap-space-lg z-10">
        <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs bg-surface-container rounded-full shadow-sm border border-outline-variant/30">
          <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
          <span class="font-label-sm text-label-sm text-tertiary uppercase tracking-wider">Mastery in Every Binding</span>
          <span class="text-on-surface-variant text-[11px]">•</span>
          <span class="font-label-sm text-label-sm text-on-surface-variant">Made in Pakistan</span>
        </div>

        <div class="space-y-space-sm">
          <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface tracking-tight leading-tight">
            Inspiring Creativity, <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-tertiary">
              One Page at a Time.
            </span>
          </h1>
          <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
            Where traditional archival bookbinding meets contemporary precision. Explore our 80–120 GSM bleed-resistant notebooks, hardbound registers, and drafting journals.
          </p>
        </div>

        <div class="flex flex-wrap items-center gap-space-md pt-space-xs">
          <a href="/shop" class="px-space-xl py-space-md bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-lg rounded-lg shadow-lg hover:shadow-tertiary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-space-xs">
            <span>Explore Collection</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </a>
          <a href="/about-us" class="px-space-lg py-space-md bg-surface-container-high hover:bg-surface-bright text-on-surface font-label-lg rounded-lg border border-outline-variant/30 transition-all flex items-center gap-space-xs">
            <span class="material-symbols-outlined text-[18px]">menu_book</span>
            <span>Our Craftsmanship</span>
          </a>
        </div>

        <!-- Metric highlights -->
        <div class="grid grid-cols-3 gap-space-lg pt-space-lg border-t border-outline-variant/20 w-full max-w-lg">
          <div>
            <div class="font-headline-sm text-headline-sm text-primary font-bold">80+ GSM</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase">Bleed-proof Stock</div>
          </div>
          <div>
            <div class="font-headline-sm text-headline-sm text-tertiary font-bold">180°</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase">True Lay-Flat</div>
          </div>
          <div>
            <div class="font-headline-sm text-headline-sm text-on-surface font-bold">COD</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase">All Pakistan</div>
          </div>
        </div>
      </div>

      <!-- Right Column: Featured Hero Product 3D Card -->
      <div class="lg:col-span-5 relative flex justify-center">
        <div class="w-full max-w-md bg-surface-container-high rounded-xl p-space-lg border border-outline-variant/30 shadow-[0_20px_50px_rgba(0,0,0,0.6)] group">
          <div class="relative overflow-hidden rounded-lg bg-surface-container-lowest p-6 mb-space-md flex items-center justify-center min-h-[340px]">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWYwtqBYXf5lgijDcLvtkuELPAJVvjkFO0zH55nCZkjJC6CoTAvB8S7bl87ML4I76CXHleZbYp3kawyOzG9m8KdL0ypWAmDvGHfqqlyWBMwzOYpDy_0Xp7qwL4dlmSjU_RlotNQUTCoN6XdSjaSBMBuahWInNoO7ZV38BY3qNXoPjK-k0BBqAdRKILntNqTLhBWsassKeNTc6vZI8tFUyDS56ISdpgJCVg3dFDcGEHnYgROWSSBaB2"
                 alt="KHIZU Executive Register"
                 class="h-72 object-contain group-hover:scale-105 transition-transform duration-500 drop-shadow-[0_15px_25px_rgba(0,0,0,0.7)]"/>
            <span class="absolute top-3 left-3 px-space-sm py-0.5 bg-tertiary text-on-tertiary text-[11px] font-bold uppercase rounded">
              Flagship
            </span>
          </div>

          <div class="space-y-space-xs">
            <div class="flex items-center justify-between">
              <span class="font-label-sm text-label-sm text-tertiary uppercase tracking-wider">Hardcover Register</span>
              <span class="font-label-md text-label-md text-secondary font-bold">200 Pages</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface">KHIZU Executive Register</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Precision thread sewn binding with water-resistant laminate cover.</p>
            <div class="flex items-center justify-between pt-space-sm border-t border-outline-variant/20">
              <div>
                <span class="font-headline-sm text-headline-sm text-on-surface font-bold">PKR 450</span>
                <span class="font-body-sm text-body-sm text-on-surface-variant line-through ml-2">PKR 520</span>
              </div>
              <button onclick="quickAddToCart(1, 'KHIZU Executive Register', 450)" class="px-space-md py-space-xs bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-md rounded font-bold shadow transition-all flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                <span>Add to Cart</span>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- SECTION 2: CURATED COLLECTION SHOWCASE -->
<section class="py-space-xl max-w-7xl mx-auto px-margin-mobile md:px-margin">
  <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-space-md">
    <div>
      <span class="font-label-sm text-label-sm uppercase tracking-widest text-tertiary">Precision Crafted</span>
      <h2 class="font-headline-xl text-headline-xl text-on-surface">Signature Stationery Products</h2>
    </div>
    <a href="/shop" class="text-primary hover:text-secondary font-label-lg inline-flex items-center gap-1 group">
      <span>Browse Full Catalog</span>
      <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
    </a>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
    <?php foreach ($featuredProducts as $product): ?>
      <div class="bg-primary-container/30 hover:bg-primary-container/60 border border-outline-variant/25 rounded-xl p-space-md flex flex-col justify-between transition-all duration-300 hover:shadow-2xl hover:border-primary/40 group">

        <div>
          <!-- Card Image & Badge -->
          <div class="relative w-full h-56 bg-surface-container-lowest rounded-lg p-4 flex items-center justify-center overflow-hidden mb-space-md">
            <a href="/product/<?= $product['id'] ?>" class="w-full h-full flex items-center justify-center">
              <img src="<?= htmlspecialchars($product['image_url']) ?>"
                   alt="<?= htmlspecialchars($product['title']) ?>"
                   class="max-h-48 object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-md"/>
            </a>
            <?php if (!empty($product['badge'])): ?>
              <span class="absolute top-2.5 left-2.5 px-space-sm py-0.5 bg-tertiary text-on-tertiary font-label-sm text-[10px] uppercase font-bold rounded">
                <?= htmlspecialchars($product['badge']) ?>
              </span>
            <?php endif; ?>
            <span class="absolute top-2.5 right-2.5 px-space-sm py-0.5 bg-surface-container text-on-surface-variant font-label-sm text-[10px] rounded border border-outline-variant/30">
              <?= htmlspecialchars($product['page_count']) ?>
            </span>
          </div>

          <!-- Product Details -->
          <div class="space-y-1">
            <span class="font-label-sm text-label-sm text-primary uppercase"><?= htmlspecialchars($product['category_name'] ?? 'Stationery') ?></span>
            <h3 class="font-title-md text-title-md text-on-surface font-semibold group-hover:text-primary transition-colors">
              <a href="/product/<?= $product['id'] ?>"><?= htmlspecialchars($product['title']) ?></a>
            </h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2"><?= htmlspecialchars($product['tagline'] ?? $product['description']) ?></p>
          </div>
        </div>

        <!-- Footer / Price & Add to Cart -->
        <div class="pt-space-md mt-space-md border-t border-outline-variant/20 flex items-center justify-between">
          <div>
            <div class="font-headline-sm text-headline-sm text-on-surface font-bold">PKR <?= number_format($product['price']) ?></div>
            <?php if (!empty($product['compare_price'])): ?>
              <span class="text-[12px] text-on-surface-variant line-through">PKR <?= number_format($product['compare_price']) ?></span>
            <?php endif; ?>
          </div>
          <div class="flex items-center gap-1.5">
            <a href="/product/<?= $product['id'] ?>" class="p-2 rounded bg-surface-container hover:bg-surface-bright text-on-surface transition-colors" title="View Specifications">
              <span class="material-symbols-outlined text-[18px]">visibility</span>
            </a>
            <button onclick="quickAddToCart(<?= (int)$product['id'] ?>, '<?= htmlspecialchars(addslashes($product['title'])) ?>', <?= (float)$product['price'] ?>)" class="px-space-md py-2 bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-md rounded font-bold shadow transition-all flex items-center gap-1">
              <span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
              <span>Satchel</span>
            </button>
          </div>
        </div>

      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- SECTION 3: CRAFTSMANSHIP & VALUE PROPOSITIONS -->
<section class="py-space-xl bg-surface-container-lowest border-y border-outline-variant/20">
  <div class="max-w-7xl mx-auto px-margin-mobile md:px-margin">
    <div class="text-center max-w-2xl mx-auto mb-space-xl">
      <span class="font-label-sm text-label-sm text-tertiary uppercase tracking-widest">Heritage Engineering</span>
      <h2 class="font-headline-xl text-headline-xl text-on-surface mt-1">Built to Withstand Decades of Thought</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">

      <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/20">
        <div class="w-12 h-12 rounded-lg bg-primary-container text-primary flex items-center justify-center mb-space-md">
          <span class="material-symbols-outlined text-[26px]">ink_pen</span>
        </div>
        <h4 class="font-headline-sm text-[18px] text-on-surface font-semibold mb-1">Bleed-Resistant Stock</h4>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Calendered 80 to 120 GSM paper specifically balanced for fountain, dip, gel, and ballpoint pens.</p>
      </div>

      <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/20">
        <div class="w-12 h-12 rounded-lg bg-primary-container text-primary flex items-center justify-center mb-space-md">
          <span class="material-symbols-outlined text-[26px]">auto_stories</span>
        </div>
        <h4 class="font-headline-sm text-[18px] text-on-surface font-semibold mb-1">180° Lay-Flat Thread</h4>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Section-sewn casebound binding allows pages to open flat without gutter curvature or page loosening.</p>
      </div>

      <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/20">
        <div class="w-12 h-12 rounded-lg bg-primary-container text-primary flex items-center justify-center mb-space-md">
          <span class="material-symbols-outlined text-[26px]">verified</span>
        </div>
        <h4 class="font-headline-sm text-[18px] text-on-surface font-semibold mb-1">Water-Resistant Lamination</h4>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Rigid front and back covers shielded by thermal matte film that withstands spills, backpacks, and daily commute.</p>
      </div>

      <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/20">
        <div class="w-12 h-12 rounded-lg bg-primary-container text-primary flex items-center justify-center mb-space-md">
          <span class="material-symbols-outlined text-[26px]">local_shipping</span>
        </div>
        <h4 class="font-headline-sm text-[18px] text-on-surface font-semibold mb-1">Cash on Delivery</h4>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Reliable logistics partners delivering across Karachi, Lahore, Islamabad, Peshawar, Quetta, and nationwide.</p>
      </div>

    </div>
  </div>
</section>

<!-- SECTION 4: CALL TO ACTION -->
<section class="py-space-xl max-w-7xl mx-auto px-margin-mobile md:px-margin text-center">
  <div class="bg-gradient-to-r from-primary-container via-surface-container-high to-primary-container p-space-xl md:p-16 rounded-2xl border border-outline-variant/30 shadow-2xl relative overflow-hidden">
    <div class="relative z-10 max-w-2xl mx-auto space-y-space-md">
      <span class="font-label-sm text-label-sm uppercase tracking-widest text-tertiary">Institutional & Academic Supply</span>
      <h2 class="font-headline-xl text-headline-xl text-on-surface">Equip Your University, School, or Corporate Team</h2>
      <p class="font-body-md text-body-md text-on-surface-variant">
        We offer customized foil-stamped crests, bulk educational discounts, and institutional billing for universities, coaching institutes, and corporate firms.
      </p>
      <div class="pt-space-sm flex flex-wrap justify-center gap-space-md">
        <a href="/contact" class="px-space-xl py-space-md bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-lg rounded-lg font-bold shadow transition-all">
          Request Institutional Quotation
        </a>
        <a href="/shop" class="px-space-lg py-space-md bg-surface-container hover:bg-surface-bright text-on-surface font-label-lg rounded-lg border border-outline-variant/30 transition-all">
          Browse Store Catalog
        </a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/layouts/footer.php'; ?>

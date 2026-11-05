<?php
$pageTitle = 'KHIZU | Heritage & Bookbinding Discipline';
require __DIR__ . '/layouts/header.php';
?>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin py-space-xl">

  <div class="mb-space-lg text-center max-w-3xl mx-auto">
    <div class="inline-flex items-center gap-space-xs text-primary font-label-sm uppercase tracking-wider mb-1">
      <a href="/" class="hover:underline">Home</a>
      <span>/</span>
      <span>Our Story</span>
    </div>
    <h1 class="font-headline-xl text-headline-xl text-on-surface">The Discipline of Fine Paper Goods</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant mt-2 leading-relaxed">
      Founded in Pakistan with an uncompromising respect for archival stationery, KHIZU bridges centuries-old bookbinding traditions with modern digital ergonomics.
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter my-space-xl">

    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30 space-y-space-sm">
      <div class="w-12 h-12 rounded-lg bg-primary-container text-primary flex items-center justify-center font-headline-sm font-bold">
        01
      </div>
      <h3 class="font-headline-sm text-[20px] text-on-surface">Precision Milling</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
        We source responsibly managed FSC-certified woodfree fibers. Each sheet is surface-calendered to provide tactile tooth that guides fountain pen nibs without feathering or bleeding.
      </p>
    </div>

    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30 space-y-space-sm">
      <div class="w-12 h-12 rounded-lg bg-primary-container text-tertiary flex items-center justify-center font-headline-sm font-bold">
        02
      </div>
      <h3 class="font-headline-sm text-[20px] text-on-surface">Thread Sewn Durability</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
        Unlike adhesive perfect-bound notebooks that disintegrate with age, KHIZU registers feature section-sewn signatures stitched with reinforced tensile thread for lifetime archiving.
      </p>
    </div>

    <div class="bg-surface-container-low p-space-lg rounded-xl border border-outline-variant/30 space-y-space-sm">
      <div class="w-12 h-12 rounded-lg bg-primary-container text-secondary flex items-center justify-center font-headline-sm font-bold">
        03
      </div>
      <h3 class="font-headline-sm text-[20px] text-on-surface">Made with Pride</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
        Designed, bound, and quality-inspected locally in Pakistan. We ensure each register provides maximum utility for engineers, doctors, jurists, and university scholars nationwide.
      </p>
    </div>

  </div>

  <div class="bg-surface-container-lowest rounded-xl p-space-xl border border-outline-variant/20 flex flex-col md:flex-row items-center justify-between gap-space-lg">
    <div class="space-y-1">
      <h3 class="font-headline-sm text-headline-sm text-on-surface">Ready to upgrade your daily writing desk?</h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant">Explore our full line of hardcover registers, notebooks, and drafting pads.</p>
    </div>
    <a href="/shop" class="px-space-xl py-3.5 bg-tertiary hover:bg-tertiary-fixed text-on-tertiary font-label-lg font-bold rounded-lg shadow-lg">
      Browse the Collection
    </a>
  </div>

</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>

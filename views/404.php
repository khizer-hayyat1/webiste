<?php
$pageTitle = 'KHIZU | Page Not Found (404)';
require __DIR__ . '/layouts/header.php';
?>

<div class="max-w-4xl mx-auto px-margin-mobile md:px-margin py-28 text-center">
  <div class="w-20 h-20 rounded-full bg-primary-container text-primary flex items-center justify-center mx-auto mb-space-md border border-primary/30">
    <span class="material-symbols-outlined text-[44px]">menu_book</span>
  </div>
  <span class="font-label-sm text-label-sm text-tertiary uppercase tracking-widest">Archive Notice 404</span>
  <h1 class="font-headline-xl text-headline-xl text-on-surface mt-1">This Page Does Not Exist</h1>
  <p class="font-body-md text-body-md text-on-surface-variant max-w-md mx-auto mt-2">
    The volume or registry ledger you requested could not be located in our archives.
  </p>
  <div class="mt-space-lg flex justify-center gap-space-md">
    <a href="/" class="px-space-xl py-3 bg-tertiary text-on-tertiary font-label-md rounded-lg font-bold">Return Home</a>
    <a href="/shop" class="px-space-lg py-3 bg-surface-container text-on-surface font-label-md rounded-lg border border-outline-variant/30">Browse Shop</a>
  </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>

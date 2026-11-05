<?php
// Toast & Alert Notification Component
?>
<div id="cart-toast" class="fixed bottom-6 right-6 z-50 transform translate-y-32 opacity-0 transition-all duration-300 pointer-events-none">
  <div class="bg-primary-container text-on-primary-container px-space-lg py-space-md rounded-xl shadow-2xl flex items-center gap-space-md max-w-md border border-outline-variant/30 backdrop-blur-md">
    <div id="toast-icon-wrapper" class="w-8 h-8 rounded-full bg-tertiary text-on-tertiary flex items-center justify-center shrink-0">
      <span class="material-symbols-outlined text-[18px]">check</span>
    </div>
    <div class="flex flex-col">
      <span class="font-label-lg text-label-lg text-on-surface" id="toast-title">Added to your satchel</span>
      <span class="font-body-sm text-body-sm text-on-surface-variant" id="toast-desc">Cash on delivery available nationwide</span>
    </div>
    <button class="text-on-surface-variant hover:text-on-surface transition-colors ml-space-sm" onclick="dismissToast()">
      <span class="material-symbols-outlined text-[18px]">close</span>
    </button>
  </div>
</div>

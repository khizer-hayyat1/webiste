/**
 * KHIZU Fine Stationery - Client-Side Real-time Architecture
 */

// Mobile Navigation Toggle
function toggleMobileMenu() {
  const menu = document.getElementById('mobile-menu');
  if (menu) {
    menu.classList.toggle('hidden');
  }
}

// Notification Toast System
let toastTimer = null;

function showToast(title, desc = 'Cash on delivery nationwide') {
  const toast = document.getElementById('cart-toast');
  const tTitle = document.getElementById('toast-title');
  const tDesc = document.getElementById('toast-desc');

  if (toast && tTitle && tDesc) {
    tTitle.textContent = title;
    tDesc.textContent = desc;

    toast.classList.remove('translate-y-32', 'opacity-0', 'pointer-events-none');
    toast.classList.add('translate-y-0', 'opacity-100');

    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      dismissToast();
    }, 4000);
  }
}

function dismissToast() {
  const toast = document.getElementById('cart-toast');
  if (toast) {
    toast.classList.add('translate-y-32', 'opacity-0', 'pointer-events-none');
    toast.classList.remove('translate-y-0', 'opacity-100');
  }
}

// Update Top Navigation Cart Counter Badge
function updateNavCartCount(count) {
  const badge = document.getElementById('nav-cart-count');
  if (badge) {
    badge.textContent = count;
    badge.classList.add('scale-125');
    setTimeout(() => {
      badge.classList.remove('scale-125');
    }, 200);
  }
}

// Real-time API: Add to Cart
async function apiAddToCart(productId, quantity = 1, ruling = 'Standard') {
  try {
    const response = await fetch('/api/cart/add', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ product_id: productId, quantity: quantity, ruling: ruling })
    });
    const result = await response.json();
    if (result.success && result.cart) {
      updateNavCartCount(result.cart.count);
    }
    return result;
  } catch (error) {
    console.error('Add to cart failed:', error);
    return { success: false, error: error.message };
  }
}

// Quick Add To Cart from Home or Catalog
async function quickAddToCart(productId, productName, price) {
  const res = await apiAddToCart(productId, 1, 'Single Line / Ruled');
  if (res.success) {
    showToast(`${productName} added to satchel`, `PKR ${price.toLocaleString()} • Cash on Delivery`);
  } else {
    showToast('Failed to add item', res.error || 'Server error');
  }
}

// Real-time API: Update Quantity
async function apiUpdateCart(itemKey, quantity) {
  try {
    const response = await fetch('/api/cart/update', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ item_key: itemKey, quantity: quantity })
    });
    const result = await response.json();
    if (result.success && result.cart) {
      updateNavCartCount(result.cart.count);
    }
    return result;
  } catch (error) {
    console.error('Update cart failed:', error);
    return { success: false, error: error.message };
  }
}

// Real-time API: Remove Item
async function apiRemoveFromCart(itemKey) {
  try {
    const response = await fetch('/api/cart/remove', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ item_key: itemKey })
    });
    const result = await response.json();
    if (result.success && result.cart) {
      updateNavCartCount(result.cart.count);
    }
    return result;
  } catch (error) {
    console.error('Remove item failed:', error);
    return { success: false, error: error.message };
  }
}

// Real-time Live Search on Catalog Page
document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('catalog-search');
  if (searchInput) {
    let debounceTimer;
    searchInput.addEventListener('input', (e) => {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => {
        const query = e.target.value.toLowerCase().trim();
        const cards = document.querySelectorAll('.product-item-card');
        let matchCount = 0;

        cards.forEach(card => {
          const name = card.getAttribute('data-name') || '';
          const category = card.getAttribute('data-category') || '';
          if (name.includes(query) || category.includes(query)) {
            card.style.display = 'flex';
            matchCount++;
          } else {
            card.style.display = 'none';
          }
        });
      }, 200);
    });
  }
});

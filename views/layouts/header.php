<?php
$pageTitle = $pageTitle ?? 'KHIZU | Luxury Stationery & Notebooks';
$activePage = $activePage ?? 'home';
$cartData = $cartData ?? Cart::get();
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="KHIZU Luxury Stationery, Registers, Archival Books & Notebooks. Made with pride in Pakistan."/>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "surface": "#061327",
            "surface-dim": "#061327",
            "surface-bright": "#2d3a4e",
            "surface-container-lowest": "#020e21",
            "surface-container-low": "#0f1c2f",
            "surface-container": "#132033",
            "surface-container-high": "#1e2a3e",
            "surface-container-highest": "#29354a",
            "surface-variant": "#29354a",
            "on-surface": "#d6e3fe",
            "on-surface-variant": "#c4c6d0",
            "primary": "#adc7fe",
            "on-primary": "#122f5e",
            "primary-container": "#022452",
            "on-primary-container": "#738dc0",
            "secondary": "#b3c5ff",
            "on-secondary": "#002b75",
            "secondary-container": "#014cc1",
            "on-secondary-container": "#b7c8ff",
            "tertiary": "#fabd0d",
            "on-tertiary": "#402d00",
            "tertiary-container": "#322300",
            "on-tertiary-container": "#b38500",
            "outline": "#8e909a",
            "outline-variant": "#44474f",
            "error": "#ffb4ab",
            "on-error": "#690005"
          },
          borderRadius: {
            "DEFAULT": "0.125rem",
            "lg": "0.25rem",
            "xl": "0.5rem",
            "full": "0.75rem"
          },
          spacing: {
            "space-xs": "0.25rem",
            "space-sm": "0.5rem",
            "space-md": "1rem",
            "space-lg": "1.5rem",
            "space-xl": "2.5rem",
            "margin-mobile": "1rem",
            "margin": "3rem",
            "gutter-mobile": "0.75rem",
            "gutter": "1.5rem"
          },
          fontFamily: {
            "display-lg": ["Outfit"],
            "headline-xl": ["Outfit"],
            "headline-lg": ["Outfit"],
            "headline-sm": ["Outfit"],
            "title-md": ["Outfit"],
            "body-lg": ["Manrope"],
            "body-md": ["Manrope"],
            "body-sm": ["Manrope"],
            "label-lg": ["Manrope"],
            "label-md": ["Manrope"],
            "label-sm": ["Manrope"]
          }
        }
      }
    };
  </script>
  <style>
    @layer base {
      html, body { margin:0; padding:0; }
      body { overscroll-behavior: none; }
    }
    ::-webkit-scrollbar { display:none; }
  </style>
  <link rel="stylesheet" href="/public/assets/css/app.css"/>
</head>
<body class="bg-surface text-on-surface font-body-md text-body-md antialiased min-h-screen flex flex-col justify-between">

  <!-- Fixed Top Header -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-surface/90 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_1px_8px_rgba(0,0,0,0.35)]">
    <div class="h-20 w-full px-margin-mobile md:px-margin flex items-center justify-between">

      <!-- Brand Logo -->
      <div class="flex items-center gap-space-lg">
        <a class="flex items-center gap-space-sm group" href="/">
          <div class="w-9 h-9 rounded-lg bg-primary-container border border-primary/20 flex items-center justify-center text-primary group-hover:scale-105 transition-transform">
            <span class="material-symbols-outlined text-[22px]">history_edu</span>
          </div>
          <span class="font-headline-sm text-headline-sm tracking-tight text-on-surface group-hover:text-primary transition-colors">KHIZU</span>
        </a>
        <span class="hidden lg:inline-block h-4 w-px bg-surface-variant"></span>
        <span class="hidden lg:inline-block font-label-sm text-label-sm uppercase tracking-widest text-tertiary">Fine Stationery</span>
      </div>

      <!-- Navigation Links -->
      <nav class="hidden md:flex items-center gap-space-sm">
        <a class="px-space-md py-space-xs font-label-lg rounded-lg transition-all <?= ($activePage === 'home') ? 'bg-primary-container text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" href="/">Home</a>
        <a class="px-space-md py-space-xs font-label-lg rounded-lg transition-all <?= ($activePage === 'shop') ? 'bg-primary-container text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" href="/shop">Shop / Products</a>
        <a class="px-space-md py-space-xs font-label-lg rounded-lg transition-all <?= ($activePage === 'about-us') ? 'bg-primary-container text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" href="/about-us">About Us</a>
        <a class="px-space-md py-space-xs font-label-lg rounded-lg transition-all <?= ($activePage === 'contact') ? 'bg-primary-container text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" href="/contact">Contact</a>
        <a class="px-space-md py-space-xs font-label-lg rounded-lg transition-all <?= ($activePage === 'admin') ? 'bg-primary-container text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" href="/admin">Portal</a>
      </nav>

      <!-- Right Utility Actions -->
      <div class="flex items-center gap-space-sm sm:gap-space-md">
        <div class="hidden sm:flex items-center gap-space-xs px-space-sm py-space-xs bg-surface-container-low rounded-lg border border-outline-variant/30">
          <span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
          <span class="font-label-sm text-label-sm text-on-surface uppercase">PKR • COD</span>
        </div>

        <!-- Search Button (redirects to shop search) -->
        <a aria-label="Search catalog" class="w-10 h-10 rounded-lg flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" href="/shop">
          <span class="material-symbols-outlined text-[20px]">search</span>
        </a>

        <!-- Shopping Cart Bag -->
        <a aria-label="Shopping Cart" class="relative w-10 h-10 rounded-lg flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" href="/cart">
          <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
          <span id="nav-cart-count" class="absolute top-1.5 right-1.5 min-w-[16px] h-4 px-1 rounded-full bg-tertiary text-on-tertiary font-label-sm text-[10px] leading-4 text-center font-bold">
            <?= (int)$cartData['count'] ?>
          </span>
        </a>

        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-btn" aria-label="Open navigation menu" class="md:hidden w-10 h-10 rounded-lg flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" type="button" onclick="toggleMobileMenu()">
          <span class="material-symbols-outlined text-[22px]">menu</span>
        </button>
      </div>

    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden md:hidden bg-surface-container-low border-b border-outline-variant/30 px-margin-mobile py-space-md space-y-space-xs">
      <a class="block px-space-md py-space-sm rounded-lg font-label-lg text-on-surface hover:bg-surface-container" href="/">Home</a>
      <a class="block px-space-md py-space-sm rounded-lg font-label-lg text-on-surface hover:bg-surface-container" href="/shop">Shop / Products</a>
      <a class="block px-space-md py-space-sm rounded-lg font-label-lg text-on-surface hover:bg-surface-container" href="/about-us">About Us</a>
      <a class="block px-space-md py-space-sm rounded-lg font-label-lg text-on-surface hover:bg-surface-container" href="/contact">Contact</a>
      <a class="block px-space-md py-space-sm rounded-lg font-label-lg text-on-surface hover:bg-surface-container" href="/cart">Satchel Cart</a>
      <a class="block px-space-md py-space-sm rounded-lg font-label-lg text-tertiary hover:bg-surface-container" href="/admin">Executive Admin</a>
    </div>
  </header>

  <!-- Notification Toast Container -->
  <?php require __DIR__ . '/toast.php'; ?>

  <!-- Main Content Wrapper -->
  <main class="w-full pt-20 bg-surface flex-grow">

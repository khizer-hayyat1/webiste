# KHIZU Fine Stationery - Full-Stack E-Commerce Storefront

A complete, production-grade e-commerce application for **KHIZU Fine Stationery**, built with clean architecture, real-time features, clean URL routing, multi-database support (SQLite & MySQL), and Cash on Delivery (COD) order management.

---

## 🌟 Key Features

1. **Clean URLs (Without `.html` Extension)**:
   - `/` or `/home` — Storefront homepage with hero showcase, featured registers, and craftsmanship story.
   - `/shop` — Catalog with real-time live search, dynamic category filtering, and sorting.
   - `/product/{id}` — Product specifications, interactive multi-angle high-res gallery, ruling selection, and verified reviews.
   - `/cart` — Dynamic satchel with quantity stepper, subtotal calculation, flat shipping fee, and checkout form.
   - `/order-confirmation/{order_number}` — Order receipt and invoice lookup.
   - `/contact` — Real-time inquiry dispatch and customer support form.
   - `/about-us` — Brand craftsmanship and bookbinding heritage.
   - `/admin` — Operations portal for managing orders, order statuses, inventory stock levels, and inquiries.

2. **Real-time Client & Backend Features**:
   - Universal shopping cart state synchronized across all pages via asynchronous Fetch API.
   - Live search with instant debounced product filtering.
   - Automatic inventory deduction upon order placement.
   - Order tracking and receipt generation.
   - Interactive toast notifications for user actions.

3. **Multi-Database Support (Zero Configuration SQLite + MySQL Ready)**:
   - **SQLite**: Works instantly without installing or configuring a database server. Auto-initializes schema and seed data on first run in `database/khizu.sqlite`.
   - **MySQL**: Full support with pre-configured toggle in `config/db.php` or environment variables. Complete SQL schema and seed files provided in `database/schema.sql` and `database/seed.sql`.

4. **Live Server & Localhost Ready**:
   - Apache / cPanel / Shared Hosting ready via `.htaccess` with `mod_rewrite`.
   - Nginx ready via standard `try_files $uri $uri/ /index.php?$query_string;`.
   - Localhost ready via PHP built-in server, XAMPP, WAMP, MAMP, or Laragon.

---

## 📁 Project Structure

```
├── .htaccess                     # Apache URL rewriting & security headers for clean URLs
├── index.php                     # Front controller & clean URL router
├── config/
│   └── db.php                    # Multi-DB PDO connector (SQLite & MySQL)
├── controllers/                  # Controller handlers
├── database/
│   ├── schema.sql                # Complete database schema
│   ├── seed.sql                  # Seed data with luxury stationery products
│   └── khizu.sqlite              # Initialized SQLite database
├── models/
│   ├── Product.php               # Product catalog, categories & stock operations
│   ├── Order.php                 # Orders & order items processing
│   ├── Inquiry.php               # Customer inquiry management
│   └── Cart.php                  # Session cart manager with calculations
├── public/
│   └── assets/
│       ├── css/app.css           # Custom styles & design tokens
│       └── js/app.js             # Real-time cart sync, toast system, live search
├── tests/
│   └── test_app.php              # Automated test suite
├── views/
│   ├── 404.php                   # 404 Not Found template
│   ├── about-us.php              # About page
│   ├── admin.php                 # Storefront operations portal
│   ├── cart-checkout.php         # Satchel & checkout page
│   ├── contact.php               # Contact & corporate inquiries
│   ├── home.php                  # Homepage
│   ├── order-confirmation.php    # Order receipt tracking
│   ├── product-detail.php        # Product view & gallery
│   ├── shop.php                  # Catalog & filtering
│   └── layouts/
│       ├── header.php            # Navigation header & cart counter
│       ├── footer.php            # Executive footer
│       └── toast.php             # Dynamic toast notification
└── README.md                     # Documentation
```

---

## 🚀 How to Run Locally

### Option 1: PHP Built-in Server (Fastest, No Setup Required)
Make sure PHP (8.0+) is installed. Run the following command in the project root:

```bash
php -S localhost:8000 index.php
```

Then open your browser and visit:
👉 **`http://localhost:8000`**

### Option 2: XAMPP / WAMP / MAMP / Laragon
1. Move or clone this project folder into your web root (e.g., `C:/xampp/htdocs/khizu` or `/var/www/html/khizu`).
2. If accessing via a subfolder (e.g. `http://localhost/khizu/`), Apache's `mod_rewrite` in `.htaccess` handles the clean routes automatically.
3. Access:
   - Storefront: `http://localhost/` (or `http://localhost/khizu/`)
   - Admin Portal: `http://localhost/admin`

---

## 🌐 How to Deploy to a Live Server (cPanel / VPS / Shared Hosting)

### Deploying to cPanel / Apache Shared Hosting:
1. Upload all files into the `public_html/` folder (or your subdomain folder) using cPanel File Manager or FTP.
2. Ensure the `.htaccess` file is uploaded (enable "Show Hidden Files" in cPanel).
3. Ensure the `database/` directory has write permissions (`chmod 775` or `chmod 777`) so SQLite can write new orders and inquiries.
4. Clean URLs will work immediately without `.html` extension!

### Deploying with MySQL:
If you prefer MySQL on your live server:
1. Open cPanel **phpMyAdmin** or MySQL command line and create a database named `khizu_stationery`.
2. Import `database/schema.sql`, then import `database/seed.sql`.
3. Open `config/db.php` and set:
   ```php
   private static $driver = 'mysql';
   private static $mysqlHost = '127.0.0.1'; // or localhost
   private static $mysqlDb   = 'khizu_stationery';
   private static $mysqlUser = 'your_cpanel_db_user';
   private static $mysqlPass = 'your_cpanel_db_password';
   ```
   Or set environment variables `DB_DRIVER=mysql`, `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.

### Deploying to Nginx:
Add the following block to your Nginx server configuration:
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/khizu;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
    }

    location ~ /\.(ht|sql|sqlite|env) {
        deny all;
    }
}
```

---

## 🧪 Testing

An automated test suite is included to verify all database queries, catalog search, cart sessions, stock deduction, and order processing:

```bash
php tests/test_app.php
```

All tests run and pass with 100% assertions.

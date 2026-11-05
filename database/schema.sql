-- KHIZU Fine Stationery Database Schema
-- Compatible with SQLite and MySQL (5.7+, 8.0+)

CREATE TABLE IF NOT EXISTS categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    category_id INTEGER,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    sku VARCHAR(64) UNIQUE,
    tagline VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    compare_price DECIMAL(10, 2) DEFAULT NULL,
    stock INTEGER NOT NULL DEFAULT 50,
    page_count VARCHAR(50) DEFAULT '200 Pages',
    paper_gsm VARCHAR(50) DEFAULT '80 GSM',
    binding VARCHAR(100) DEFAULT 'Casebound Thread Sewn',
    ruling_options TEXT, -- JSON array of ruling options, e.g. ["Single Line / Ruled", "Four Line", "Grid / Squared"]
    description TEXT,
    features TEXT, -- JSON array or newline separated
    image_url TEXT NOT NULL,
    gallery_images TEXT, -- JSON array of image URLs
    badge VARCHAR(50) DEFAULT 'Featured',
    is_featured INTEGER DEFAULT 1,
    status VARCHAR(20) DEFAULT 'in_stock', -- in_stock, low_stock, preorder, out_of_stock
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    order_number VARCHAR(64) NOT NULL UNIQUE,
    customer_name VARCHAR(150) NOT NULL,
    customer_phone VARCHAR(50) NOT NULL,
    customer_email VARCHAR(150),
    shipping_address TEXT NOT NULL,
    city VARCHAR(100) NOT NULL,
    notes TEXT,
    payment_method VARCHAR(50) DEFAULT 'cod', -- cod, bank_transfer
    subtotal DECIMAL(10, 2) NOT NULL,
    shipping_fee DECIMAL(10, 2) NOT NULL DEFAULT 150.00,
    total_amount DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) DEFAULT 'pending', -- pending, confirmed, shipped, delivered, cancelled
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS order_items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    order_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
    product_title VARCHAR(255) NOT NULL,
    ruling VARCHAR(100) DEFAULT 'Standard',
    unit_price DECIMAL(10, 2) NOT NULL,
    quantity INTEGER NOT NULL DEFAULT 1,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS inquiries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(50),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'unread', -- unread, read, replied
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    product_id INTEGER,
    customer_name VARCHAR(100) NOT NULL,
    rating INTEGER NOT NULL DEFAULT 5,
    comment TEXT,
    verified_purchase INTEGER DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS settings (
    `key` VARCHAR(100) PRIMARY KEY,
    `value` TEXT,
    description VARCHAR(255)
);

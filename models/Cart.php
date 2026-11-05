<?php
/**
 * Cart Manager (Session-based + API sync)
 */
class Cart {
    public static function init() {
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            @session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public static function get() {
        self::init();
        $items = $_SESSION['cart'];
        $subtotal = 0;
        $totalCount = 0;

        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            $totalCount += $item['quantity'];
        }

        $shipping = $totalCount > 0 ? 150.00 : 0.00;
        $total = $subtotal > 0 ? $subtotal + $shipping : 0.00;

        return [
            'items' => array_values($items),
            'count' => $totalCount,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total
        ];
    }

    public static function add($productId, $quantity = 1, $ruling = 'Standard') {
        self::init();
        require_once __DIR__ . '/Product.php';

        $product = Product::findById($productId);
        if (!$product) {
            return ['success' => false, 'error' => 'Product not found'];
        }

        $itemKey = $productId . '_' . md5($ruling);

        if (isset($_SESSION['cart'][$itemKey])) {
            $_SESSION['cart'][$itemKey]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$itemKey] = [
                'key' => $itemKey,
                'id' => (int)$product['id'],
                'title' => $product['title'],
                'slug' => $product['slug'],
                'price' => (float)$product['price'],
                'quantity' => (int)$quantity,
                'ruling' => $ruling,
                'image_url' => $product['image_url'],
                'page_count' => $product['page_count'],
                'paper_gsm' => $product['paper_gsm']
            ];
        }

        return ['success' => true, 'cart' => self::get()];
    }

    public static function update($itemKey, $quantity) {
        self::init();
        if (isset($_SESSION['cart'][$itemKey])) {
            if ($quantity <= 0) {
                unset($_SESSION['cart'][$itemKey]);
            } else {
                $_SESSION['cart'][$itemKey]['quantity'] = (int)$quantity;
            }
        }
        return ['success' => true, 'cart' => self::get()];
    }

    public static function remove($itemKey) {
        self::init();
        if (isset($_SESSION['cart'][$itemKey])) {
            unset($_SESSION['cart'][$itemKey]);
        }
        return ['success' => true, 'cart' => self::get()];
    }

    public static function clear() {
        self::init();
        $_SESSION['cart'] = [];
        return ['success' => true, 'cart' => self::get()];
    }
}

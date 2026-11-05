<?php
/**
 * KHIZU Fine Stationery - Front Controller & Clean URL Router
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/models/Product.php';
require_once __DIR__ . '/models/Order.php';
require_once __DIR__ . '/models/Inquiry.php';
require_once __DIR__ . '/models/Cart.php';

// Parse clean URL path
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$parsedUrl = parse_url($requestUri);
$path = trim($parsedUrl['path'] ?? '/', '/');

// Serve static assets if running PHP built-in server
$filePath = __DIR__ . '/' . $path;
if (!empty($path) && file_exists($filePath) && !is_dir($filePath) && (str_starts_with($path, 'public/') || str_starts_with($path, 'stitch_khizu'))) {
    $mime = mime_content_type($filePath);
    if (str_ends_with($filePath, '.css')) $mime = 'text/css';
    if (str_ends_with($filePath, '.js')) $mime = 'application/javascript';
    header("Content-Type: $mime");
    readfile($filePath);
    exit;
}

// REST API Router
if (str_starts_with($path, 'api/')) {
    header('Content-Type: application/json; charset=utf-8');
    $apiRoute = substr($path, 4); // strip 'api/'
    $method = $_SERVER['REQUEST_METHOD'];

    $rawInput = file_get_contents('php://input');
    $inputData = json_decode($rawInput, true) ?? $_POST;

    // API: GET /api/products
    if ($apiRoute === 'products') {
        $cat = $_GET['category'] ?? null;
        $search = $_GET['q'] ?? null;
        $sort = $_GET['sort'] ?? 'featured';
        $products = Product::getAll($cat, $search, $sort);
        echo json_encode(['success' => true, 'products' => $products]);
        exit;
    }

    // API: GET /api/product/{id}
    if (preg_match('#^product/([a-zA-Z0-9_-]+)$#', $apiRoute, $matches)) {
        $product = Product::findById($matches[1]);
        if ($product) {
            $reviews = Product::getReviews($product['id']);
            echo json_encode(['success' => true, 'product' => $product, 'reviews' => $reviews]);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'error' => 'Product not found']);
        }
        exit;
    }

    // API: Cart endpoints
    if ($apiRoute === 'cart') {
        echo json_encode(['success' => true, 'cart' => Cart::get()]);
        exit;
    }

    if ($apiRoute === 'cart/add' && $method === 'POST') {
        $productId = $inputData['product_id'] ?? null;
        $qty = (int)($inputData['quantity'] ?? 1);
        $ruling = $inputData['ruling'] ?? 'Standard';
        $res = Cart::add($productId, $qty, $ruling);
        echo json_encode($res);
        exit;
    }

    if ($apiRoute === 'cart/update' && $method === 'POST') {
        $itemKey = $inputData['item_key'] ?? '';
        $qty = (int)($inputData['quantity'] ?? 1);
        $res = Cart::update($itemKey, $qty);
        echo json_encode($res);
        exit;
    }

    if ($apiRoute === 'cart/remove' && $method === 'POST') {
        $itemKey = $inputData['item_key'] ?? '';
        $res = Cart::remove($itemKey);
        echo json_encode($res);
        exit;
    }

    if ($apiRoute === 'cart/clear' && $method === 'POST') {
        $res = Cart::clear();
        echo json_encode($res);
        exit;
    }

    // API: Checkout
    if ($apiRoute === 'checkout' && $method === 'POST') {
        $cart = Cart::get();
        if (empty($cart['items'])) {
            echo json_encode(['success' => false, 'error' => 'Your satchel is empty.']);
            exit;
        }

        $name = trim($inputData['name'] ?? '');
        $phone = trim($inputData['phone'] ?? '');
        $address = trim($inputData['address'] ?? '');
        $city = trim($inputData['city'] ?? '');

        if (!$name || !$phone || !$address || !$city) {
            echo json_encode(['success' => false, 'error' => 'Please fill in all required shipping fields.']);
            exit;
        }

        $orderData = [
            'name' => $name,
            'phone' => $phone,
            'email' => $inputData['email'] ?? '',
            'address' => $address,
            'city' => $city,
            'notes' => $inputData['notes'] ?? '',
            'payment_method' => $inputData['payment_method'] ?? 'cod',
            'subtotal' => $cart['subtotal'],
            'shipping_fee' => $cart['shipping'],
            'total' => $cart['total'],
            'items' => $cart['items']
        ];

        $res = Order::create($orderData);
        if ($res['success']) {
            Cart::clear();
        }
        echo json_encode($res);
        exit;
    }

    // API: Track Order
    if (preg_match('#^order/([a-zA-Z0-9_-]+)$#', $apiRoute, $matches)) {
        $order = Order::findByNumber($matches[1]);
        if ($order) {
            echo json_encode(['success' => true, 'order' => $order]);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'error' => 'Order not found']);
        }
        exit;
    }

    // API: Contact inquiry
    if ($apiRoute === 'contact' && $method === 'POST') {
        $name = trim($inputData['full_name'] ?? '');
        $email = trim($inputData['email'] ?? '');
        $message = trim($inputData['message'] ?? '');

        if (!$name || !$email || !$message) {
            echo json_encode(['success' => false, 'error' => 'Name, email and message are required.']);
            exit;
        }

        $ok = Inquiry::create($inputData);
        echo json_encode(['success' => (bool)$ok, 'message' => 'Thank you. Your inquiry has been dispatched to KHIZU concierge.']);
        exit;
    }

    // API: Admin stats and actions
    if ($apiRoute === 'admin/orders') {
        $orders = Order::getAll();
        echo json_encode(['success' => true, 'orders' => $orders]);
        exit;
    }

    if ($apiRoute === 'admin/order-status' && $method === 'POST') {
        $orderId = $inputData['order_id'] ?? '';
        $status = $inputData['status'] ?? 'confirmed';
        $res = Order::updateStatus($orderId, $status);
        echo json_encode(['success' => (bool)$res]);
        exit;
    }

    if ($apiRoute === 'admin/update-stock' && $method === 'POST') {
        $productId = (int)($inputData['product_id'] ?? 0);
        $stock = (int)($inputData['stock'] ?? 0);
        $res = Product::updateStock($productId, $stock);
        echo json_encode(['success' => (bool)$res]);
        exit;
    }

    http_response_code(404);
    echo json_encode(['success' => false, 'error' => 'API endpoint not found']);
    exit;
}

// Clean Web Routes
$cartData = Cart::get();
$categories = Product::getCategories();

// Routing Table
switch ($path) {
    case '':
    case 'home':
        $featuredProducts = Product::getAll(null, null, 'featured');
        $activePage = 'home';
        require_once __DIR__ . '/views/home.php';
        break;

    case 'shop':
    case 'products':
        $activeCategory = $_GET['category'] ?? 'all';
        $searchQuery = $_GET['q'] ?? '';
        $sortOption = $_GET['sort'] ?? 'featured';
        $products = Product::getAll($activeCategory, $searchQuery, $sortOption);
        $activePage = 'shop';
        require_once __DIR__ . '/views/shop.php';
        break;

    case 'cart':
    case 'checkout':
        $activePage = 'cart';
        require_once __DIR__ . '/views/cart-checkout.php';
        break;

    case 'contact':
    case 'contact-us':
        $activePage = 'contact';
        require_once __DIR__ . '/views/contact.php';
        break;

    case 'about':
    case 'about-us':
        $activePage = 'about-us';
        require_once __DIR__ . '/views/about-us.php';
        break;

    case 'admin':
        $orders = Order::getAll();
        $inquiries = Inquiry::getAll();
        $products = Product::getAll();
        $activePage = 'admin';
        require_once __DIR__ . '/views/admin.php';
        break;

    default:
        // Check for /product/{id or slug}
        if (preg_match('#^product(?:s)?/([a-zA-Z0-9_-]+)$#', $path, $matches)) {
            $product = Product::findById($matches[1]);
            if ($product) {
                $reviews = Product::getReviews($product['id']);
                $relatedProducts = Product::getAll($product['category_id']);
                $activePage = 'shop';
                require_once __DIR__ . '/views/product-detail.php';
                exit;
            }
        }

        // Check for /order-confirmation/{order_number}
        if (preg_match('#^order-confirmation/([a-zA-Z0-9_-]+)$#', $path, $matches)) {
            $order = Order::findByNumber($matches[1]);
            $activePage = 'cart';
            require_once __DIR__ . '/views/order-confirmation.php';
            exit;
        }

        // 404 Fallback
        http_response_code(404);
        $activePage = '';
        require_once __DIR__ . '/views/404.php';
        break;
}

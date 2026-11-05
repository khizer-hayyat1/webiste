<?php
/**
 * Automated Test Suite for KHIZU Fine Stationery Full-Stack Application
 */

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Inquiry.php';
require_once __DIR__ . '/../models/Cart.php';

function assertEq($actual, $expected, $msg) {
    if ($actual === $expected) {
        echo " [PASS] $msg\n";
    } else {
        echo " [FAIL] $msg (Expected: " . json_encode($expected) . ", Got: " . json_encode($actual) . ")\n";
        throw new Exception("Assertion Failed: $msg");
    }
}

function assertTrue($condition, $msg) {
    if ($condition) {
        echo " [PASS] $msg\n";
    } else {
        echo " [FAIL] $msg\n";
        throw new Exception("Assertion Failed: $msg");
    }
}

echo "=== Running KHIZU Test Suite ===\n\n";

// Test 1: Database connection & Seeding
echo "1. Testing Database Connection & Seeding:\n";
$pdo = Database::getConnection();
assertTrue($pdo instanceof PDO, "PDO connection successfully established.");

$products = Product::getAll();
assertTrue(count($products) >= 6, "At least 6 initial seeded products loaded.");
echo "   Total products found: " . count($products) . "\n";

$categories = Product::getCategories();
assertTrue(count($categories) >= 4, "At least 4 categories seeded.");

// Test 2: Product queries & filtering
echo "\n2. Testing Product Search and Filtering:\n";
$filtered = Product::getAll('registers');
assertTrue(count($filtered) >= 1, "Category filtering for registers returns products.");

$searched = Product::getAll(null, 'Spiral');
assertTrue(count($searched) >= 1, "Keyword search for 'Spiral' finds matching notebook.");

$singleProd = Product::findById(1);
assertTrue(!empty($singleProd), "Product #1 retrieved successfully.");
assertEq($singleProd['title'], 'KHIZU Executive Register (200 Pages)', "Product #1 title matches.");
assertTrue(is_array($singleProd['ruling_options']), "Product ruling options parsed into JSON array.");
assertTrue(count($singleProd['ruling_options']) >= 3, "Product has ruling options.");

// Test 3: Cart Session Operations
echo "\n3. Testing Real-time Cart Operations:\n";
Cart::clear();
$cart = Cart::get();
assertEq($cart['count'], 0, "Initial cart is empty.");

$addRes = Cart::add(1, 2, 'Single Line / Ruled');
assertTrue($addRes['success'], "Product #1 added to cart.");
$cart = Cart::get();
assertEq($cart['count'], 2, "Cart count is now 2.");
assertEq($cart['subtotal'], 900.0, "Cart subtotal correctly calculated (2 * 450 = 900).");
assertEq($cart['shipping'], 150.0, "Shipping fee applied (PKR 150).");
assertEq($cart['total'], 1050.0, "Cart total correct (900 + 150 = 1050).");

$itemKey = $cart['items'][0]['key'];
Cart::update($itemKey, 3);
$cart = Cart::get();
assertEq($cart['count'], 3, "Cart quantity updated to 3.");
assertEq($cart['subtotal'], 1350.0, "Subtotal updated for 3 units.");

// Test 4: Checkout & Order Creation
echo "\n4. Testing Checkout & Order Creation:\n";
$initialStock = Product::findById(1)['stock'];

$orderRes = Order::create([
    'name' => 'Taimur Khan',
    'phone' => '+92 321 9876543',
    'email' => 'taimur@example.com',
    'address' => 'House 14, Street 9, F-7/2',
    'city' => 'Islamabad',
    'notes' => 'Please leave with reception if unavailable.',
    'payment_method' => 'cod',
    'subtotal' => $cart['subtotal'],
    'shipping_fee' => $cart['shipping'],
    'total' => $cart['total'],
    'items' => $cart['items']
]);

assertTrue($orderRes['success'], "Order successfully placed via COD.");
$orderNum = $orderRes['order_number'];
echo "   Generated Order Number: $orderNum\n";

$order = Order::findByNumber($orderNum);
assertTrue(!empty($order), "Order retrieved by order number.");
assertEq($order['customer_name'], 'Taimur Khan', "Customer name matches.");
assertEq((float)$order['total_amount'], 1500.0, "Total amount stored matches.");
assertTrue(count($order['items']) >= 1, "Order items linked correctly.");

// Verify stock deduction
$updatedStock = Product::findById(1)['stock'];
assertEq($updatedStock, $initialStock - 3, "Inventory stock properly deducted after order.");

// Test 5: Inquiries
echo "\n5. Testing Customer Inquiry Logging:\n";
$inquiryRes = Inquiry::create([
    'full_name' => 'Sara Ahmed',
    'email' => 'sara@iba.edu.pk',
    'phone' => '0300 1122334',
    'subject' => 'Institutional Order',
    'message' => 'We require 200 units of custom foil-embossed registers for IBA students.'
]);
assertTrue($inquiryRes, "Customer inquiry recorded.");
$inquiries = Inquiry::getAll();
assertTrue(count($inquiries) >= 1, "Inquiry list retrieved.");
assertEq($inquiries[0]['full_name'], 'Sara Ahmed', "Inquiry record matches.");

echo "\n ALL UNIT & BACKEND TESTS PASSED SUCCESSFULLY! \n";

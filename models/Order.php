<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/Product.php';

class Order {
    public static function create($data) {
        $pdo = Database::getConnection();
        $pdo->beginTransaction();

        try {
            $orderNumber = 'KHZ-' . strtoupper(substr(uniqid(), 7, 6)) . '-' . rand(100, 999);
            $stmt = $pdo->prepare("
                INSERT INTO orders (order_number, customer_name, customer_phone, customer_email, shipping_address, city, notes, payment_method, subtotal, shipping_fee, total_amount, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'confirmed')
            ");

            $stmt->execute([
                $orderNumber,
                $data['name'],
                $data['phone'],
                $data['email'] ?? '',
                $data['address'],
                $data['city'],
                $data['notes'] ?? '',
                $data['payment_method'] ?? 'cod',
                $data['subtotal'],
                $data['shipping_fee'] ?? 150.00,
                $data['total']
            ]);

            $orderId = $pdo->lastInsertId();

            // Insert items and deduct stock
            $itemStmt = $pdo->prepare("
                INSERT INTO order_items (order_id, product_id, product_title, ruling, unit_price, quantity, total_price)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");

            foreach ($data['items'] as $item) {
                $itemStmt->execute([
                    $orderId,
                    $item['id'],
                    $item['title'],
                    $item['ruling'] ?? 'Standard',
                    $item['price'],
                    $item['quantity'],
                    $item['price'] * $item['quantity']
                ]);

                // Deduct stock
                $prod = Product::findById($item['id']);
                if ($prod) {
                    $newStock = max(0, $prod['stock'] - $item['quantity']);
                    Product::updateStock($prod['id'], $newStock);
                }
            }

            $pdo->commit();

            return [
                'success' => true,
                'order_number' => $orderNumber,
                'order_id' => $orderId
            ];
        } catch (Exception $e) {
            $pdo->rollBack();
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public static function findByNumber($orderNumber) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_number = ?");
        $stmt->execute([$orderNumber]);
        $order = $stmt->fetch();

        if ($order) {
            $itemStmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = ?");
            $itemStmt->execute([$order['id']]);
            $order['items'] = $itemStmt->fetchAll();
        }

        return $order;
    }

    public static function getAll($limit = 50) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM orders ORDER BY id DESC LIMIT ?");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        $orders = $stmt->fetchAll();

        foreach ($orders as &$order) {
            $itemStmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = ?");
            $itemStmt->execute([$order['id']]);
            $order['items'] = $itemStmt->fetchAll();
        }

        return $orders;
    }

    public static function updateStatus($orderId, $status) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ? OR order_number = ?");
        return $stmt->execute([$status, $orderId, $orderId]);
    }
}

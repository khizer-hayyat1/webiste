<?php
require_once __DIR__ . '/../config/db.php';

class Product {
    public static function getAll($categoryId = null, $search = null, $sort = 'featured') {
        $pdo = Database::getConnection();
        $query = "SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE 1=1";
        $params = [];

        if ($categoryId && $categoryId !== 'all') {
            $query .= " AND (p.category_id = ? OR c.slug = ?)";
            $params[] = $categoryId;
            $params[] = $categoryId;
        }

        if ($search) {
            $query .= " AND (p.title LIKE ? OR p.tagline LIKE ? OR p.description LIKE ?)";
            $searchTerm = '%' . $search . '%';
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        switch ($sort) {
            case 'price-asc':
                $query .= " ORDER BY p.price ASC";
                break;
            case 'price-desc':
                $query .= " ORDER BY p.price DESC";
                break;
            case 'pages':
                $query .= " ORDER BY CAST(p.page_count AS INTEGER) DESC";
                break;
            case 'newest':
                $query .= " ORDER BY p.id DESC";
                break;
            case 'featured':
            default:
                $query .= " ORDER BY p.is_featured DESC, p.id ASC";
                break;
        }

        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $products = $stmt->fetchAll();

        foreach ($products as &$p) {
            $p['ruling_options'] = json_decode($p['ruling_options'] ?? '[]', true);
            $p['gallery_images'] = json_decode($p['gallery_images'] ?? '[]', true);
            $p['features'] = json_decode($p['features'] ?? '[]', true);
        }

        return $products;
    }

    public static function findById($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ? OR p.slug = ?");
        $stmt->execute([$id, $id]);
        $product = $stmt->fetch();

        if ($product) {
            $product['ruling_options'] = json_decode($product['ruling_options'] ?? '[]', true);
            $product['gallery_images'] = json_decode($product['gallery_images'] ?? '[]', true);
            $product['features'] = json_decode($product['features'] ?? '[]', true);
        }

        return $product;
    }

    public static function getCategories() {
        $pdo = Database::getConnection();
        return $pdo->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll();
    }

    public static function getReviews($productId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM reviews WHERE product_id = ? ORDER BY id DESC");
        $stmt->execute([$productId]);
        return $stmt->fetchAll();
    }

    public static function updateStock($productId, $newStock) {
        $pdo = Database::getConnection();
        $status = $newStock <= 0 ? 'out_of_stock' : ($newStock <= 15 ? 'low_stock' : 'in_stock');
        $stmt = $pdo->prepare("UPDATE products SET stock = ?, status = ? WHERE id = ?");
        return $stmt->execute([$newStock, $status, $productId]);
    }
}

<?php
require_once __DIR__ . '/../config/db.php';

class Inquiry {
    public static function create($data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO inquiries (full_name, email, phone, subject, message)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['full_name'],
            $data['email'],
            $data['phone'] ?? '',
            $data['subject'] ?? 'General Inquiry',
            $data['message']
        ]);
    }

    public static function getAll($limit = 50) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM inquiries ORDER BY id DESC LIMIT ?");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

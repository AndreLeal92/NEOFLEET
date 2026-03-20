<?php

require_once __DIR__ . '/../../config/Database.php';

class User {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // 🔍 Buscar por email (login)
    public function findByEmail($email) {
        $stmt = $this->db->prepare("
            SELECT * FROM users 
            WHERE email = ? 
            LIMIT 1
        ");
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔍 Buscar usuário por ID (com tenant)
    public function findById($id, $tenantId) {
        $stmt = $this->db->prepare("
            SELECT * FROM users 
            WHERE id = ? AND company_id = ?
            LIMIT 1
        ");
        $stmt->execute([$id, $tenantId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 👥 Listar usuários da empresa (multi-tenant)
    public function allByTenant($tenantId) {
        $stmt = $this->db->prepare("
            SELECT id, name, email, is_admin, created_at 
            FROM users 
            WHERE company_id = ?
            ORDER BY id DESC
        ");
        $stmt->execute([$tenantId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ➕ Criar usuário
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO users (company_id, name, email, password, is_admin)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['company_id'],
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['is_admin'] ?? 0
        ]);
    }

    // ❌ Deletar usuário (seguro por tenant)
    public function delete($id, $tenantId) {
        $stmt = $this->db->prepare("
            DELETE FROM users 
            WHERE id = ? AND company_id = ?
        ");

        return $stmt->execute([$id, $tenantId]);
    }

    // ✏️ Atualizar usuário
    public function update($id, $tenantId, $data) {
        $stmt = $this->db->prepare("
            UPDATE users 
            SET name = ?, email = ?, is_admin = ?
            WHERE id = ? AND company_id = ?
        ");

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['is_admin'],
            $id,
            $tenantId
        ]);
    }
}
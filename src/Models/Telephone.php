<?php
namespace Apps\Models;

use Apps\Database;
use PDO;
use PDOException;

class Telephone {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM kontak");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nama, $telepon) {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO kontak (nama, telepon) VALUES (:nama_person, :nomor_telepon)");
            $stmt->execute([
                ':nama_person' => $nama,
                ':nomor_telepon' => $telepon
            ]);
            
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("Terjadi Kesalahan Saat Menyimpan Data: " . $e->getMessage());
        }
    }

    public function edit($id, $nama, $telepon) {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("UPDATE kontak SET nama = :nama_person, telepon = :nomor_telepon WHERE id = :id");
            $stmt->execute([
                ':id' => $id,
                ':nama_person' => $nama,
                ':nomor_telepon' => $telepon
            ]);

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("Terjadi Kesalahan Saat Mengedit Data: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("DELETE FROM kontak WHERE id = :id_person");
            $stmt->execute([
                ':id_person' => $id
            ]);
            
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("Terjadi Kesalahan Saat Menghapus Data: " . $e->getMessage());
        }
    }
}

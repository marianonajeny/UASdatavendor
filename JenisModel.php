<?php
class JenisModel {
    private $table = 'jenis';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function getAllJenis() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getJenisById($id) {
       $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
       $this->db->bind('id' ,$id);
       return $this->db->single();
    }
    public function tambahJenis($data) {
        $query = "INSERT INTO jenis (jenis_usaha) VALUES(:jenis_usaha)";
        $this->db->query($query);
        $this->db->bind('jenis_usaha' ,$data['jenis_usaha']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateDataJenis($data) {
        $query = "UPDATE jenis SET jenis_usaha=:jenis_usaha WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('jenis_usaha' ,$data['jenis_usaha']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteJenis($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id' ,$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariJenis() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE jenis_usaha LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
?>
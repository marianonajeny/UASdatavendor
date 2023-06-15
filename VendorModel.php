<?php
class VendorModel {
    private $table = 'vendor';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function getAllVendor() {
        $this->db->query("SELECT vendor.*, jenis.jenis_usaha FROM " . $this->table . " JOIN jenis ON jenis.id = vendor.jenis_perusahaan");
        return $this->db->resultSet();
    }
    public function getVendorById($id) {
       $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
       $this->db->bind('id' ,$id);
       return $this->db->single();
    }
    public function tambahVendor($data) {
        $query = "INSERT INTO vendor (nama_perusahaan, alamat, kota, provinsi, jenis_perusahaan, kode) VALUES(:nama_perusahaan, :alamat, :kota, :provinsi, :jenis_perusahaan, :kode)";
        $this->db->query($query);
        $this->db->bind('nama_perusahaan' ,$data['nama_perusahaan']);
        $this->db->bind('alamat' ,$data['alamat']);
        $this->db->bind('kota' ,$data['kota']);
        $this->db->bind('provinsi' ,$data['provinsi']);
        $this->db->bind('jenis_perusahaan' ,$data['jenis_perusahaan']);
        $this->db->bind('kode' ,$data['kode']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateDataVendor($data) {
        $query = "UPDATE vendor SET nama_perusahaan=:nama_perusahaan, alamat=:alamat, kota=:kota, provinsi=:provinsi, jenis_perusahaan=:jenis_perusahaan, kode=:kode WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_perusahaan' ,$data['nama_perusahaan']);
        $this->db->bind('alamat' ,$data['alamat']);
        $this->db->bind('kota' ,$data['kota']);
        $this->db->bind('provinsi' ,$data['provinsi']);
        $this->db->bind('jenis_perusahaan' ,$data['jenis_perusahaan']);
        $this->db->bind('kode' ,$data['kode']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteVendor($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id' ,$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariVendor() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE judul LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
?>
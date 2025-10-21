<?php
class Matakuliah_model {
    private $table = 'matakuliah'; //database handler
    private $db; //statement yang digunakan untuk menyimpan query
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        $this->db->query ('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
    
   public function getMatakuliahById($id) {
    $this->db->query("SELECT * FROM matakuliah WHERE id=:id");
    $this->db->bind(':id', $id);
    return $this->db->single(); // kembalikan 1 record
}


    public function tambahDataMatakuliah($data)
    {
        $query = "INSERT INTO $this->table (kode_mk, nama_mk, jns_mk, sks)
                    VALUES (:kode_mk, :nama_mk, :jns_mk, :sks)";

        $this->db->query($query);
        $this->db->bind('kode_mk', $data['kode_mk']);
        $this->db->bind('nama_mk', $data['nama_mk']);
        $this->db->bind('jns_mk', $data['jns_mk']);
        $this->db->bind('sks', $data['sks']);

        $this->db->execute();

        return $this->db->rowCount();   
    }

    public function hapusDataMatakuliah($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMatakuliah($data) {
    $this->db->query("UPDATE matakuliah SET
        kode_mk = :kode_mk,
        nama_mk = :nama_mk,
        jns_mk = :jns_mk,
        sks = :sks
        WHERE id = :id
    ");

    $this->db->bind(':kode_mk', $data['kode_mk']);
    $this->db->bind(':nama_mk', $data['nama_mk']);
    $this->db->bind(':jns_mk', $data['jns_mk']);
    $this->db->bind(':sks', $data['sks']);
    $this->db->bind(':id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
}

}
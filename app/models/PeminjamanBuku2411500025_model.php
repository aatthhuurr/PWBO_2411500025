<?php
class PeminjamanBuku2411500025_model
{
    private $table = 'peminjaman_2411500025'; //database handler
    private $db; //statement yang digunakan untuk menyimpan query

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPeminjamanById($kd)
    {
        $this->db->query("SELECT * FROM peminjaman_2411500025 WHERE kd=:kd");
        $this->db->bind(':kd', $kd);
        return $this->db->single(); // kembalikan 1 record
    }


    public function tambahDataPeminjaman($data)
    {
        $query = "INSERT INTO $this->table (Kode Pinjam, NIM, Tanggal Pinjam, Jumlah Pinjam, Judul Buku, Tanggal Kembali)
                    VALUES (:Kd_pinjam025, :NimMhs025, :TglPinjam025, :JmlPinjam025, :JudulBuku025, :TglKembali025)";

        $this->db->query($query);
        $this->db->bind('Kd_pinjam025', $data['Kd_pinjam025']);
        $this->db->bind('NimMhs025', $data['NimMhs025']);
        $this->db->bind('TglPinjam025', $data['TglPinjam025']);
        $this->db->bind('JmlPinjam025', $data['JmlPinjam025']);
        $this->db->bind('JudulBuku025', $data['JudulBuku025']);
        $this->db->bind('TglKembali025', $data['TglKembali025']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPeminjaman($kd)
    {
        $query = "DELETE FROM $this->table WHERE kd = :kd";
        $this->db->query($query);
        $this->db->bind('kd', $kd);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPeminjaman($data)
    {
        $this->db->query("UPDATE peminjaman_2411500025 SET
        Kode Pinjam = :Kd_pinjam025,
        NIM = :NimMhs025,
        Tanggal Pinjam = :TglPinjam025,
        Jumlah Pinjam = :JmlPinjam025,
        Judul Buku = :JudulBuku025,
        Tanggal Kembali = :TglKembali025
        WHERE id = :id
    ");

        $this->db->bind('Kd_pinjam025', $data['Kd_pinjam025']);
        $this->db->bind('NimMhs025', $data['NimMhs025']);
        $this->db->bind('TglPinjam025', $data['TglPinjam025']);
        $this->db->bind('JmlPinjam025', $data['JmlPinjam025']);
        $this->db->bind('JudulBuku025', $data['JudulBuku025']);
        $this->db->bind('TglKembali025', $data['TglKembali025']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

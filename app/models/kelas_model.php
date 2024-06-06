<?php
class Kelas_model
{
    private $table = 'classes';
    private $db;
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllClass()
    {
        $this->stmt = 'SELECT * FROM ' . $this->table; 
                    
        $this->db->query($this->stmt);
        return $this->db->result();
    }

    public function getKelas($id)
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function addKelas($data)
    {
        $this->stmt = 'INSERT INTO classes (class_name,teacher_id) VALUES(?,?)';
        $this->db->query($this->stmt);
        $this->db->bind(1, $data['nama_kelas']);
        $this->db->bind(2, $data['id_guru']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updtKelas($data)
    {
        $this->stmt = 'UPDATE classes SET class_name = :nama_kelas WHERE id = :id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $data['id_kelas']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function delKelas($id)
    {
        $this->stmt = 'DELETE FROM classes WHERE id=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

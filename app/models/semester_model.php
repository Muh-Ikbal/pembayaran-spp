<?php

class Semester_model
{
    private $stmt;
    private $db;
    private $table = 'semesters';

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllSemester()
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' ORDER BY id_semester';
        $this->db->query($this->stmt);
        return $this->db->result();
    }
    public function addSemester($data)
    {
        $this->stmt = 'INSERT INTO ' . $this->table . ' (semester,tenggat_waktu) VALUES(:semester,:tenggat)';
        $this->db->query($this->stmt);
        $this->db->bind('semester', $data['semester']);
        $this->db->bind('tenggat', $data['due_date']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delSemester($id)
    {
        try {
            $this->stmt = 'DELETE FROM ' . $this->table . ' WHERE id_semester=:id';
            $this->db->query($this->stmt);
            $this->db->bind('id', $id);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getSemester($id)
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE id_semester=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getTenggatWaktu($id)
    {
        $this->stmt = 'SELECT tenggat_waktu FROM ' . $this->table . ' WHERE id_semester=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updtSemester($data)
    {
        try {
            $this->stmt = 'UPDATE ' . $this->table . ' SET semester=:semester WHERE id_semester=:id';
            $this->db->query($this->stmt);
            $this->db->bind('semester', $data['semester']);
            $this->db->bind('id', $data['id_semester']);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

<?php
class Siswa_model
{
    private $table = 'students';
    private $db;
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllSiswa()
    {
        $this->db->query('SELECT students.*, classes.* FROM ' . $this->table . ' LEFT JOIN classes on students.class_id = classes.id ORDER BY nis');
        return $this->db->result();
    }
    public function getSiswa($id)
    {
        $this->db->query('SELECT students.*, classes.* FROM ' . $this->table . ' LEFT JOIN classes on students.class_id = classes.id WHERE id_student = :id_student ORDER BY nis');
        $this->db->bind('id_student', $id);
        return $this->db->single();
    }
    public function addSiswa($data)
    {
        $this->stmt = 'INSERT INTO ' . $this->table . ' (nis,name,username,password,class_id,no_telp,SPP) VALUES(?,?,?,?,?,?,?)';
        $this->db->query($this->stmt);
        $this->db->bind(1, $data['nis']);
        $this->db->bind(2, $data['nama']);
        $this->db->bind(3, $data['username']);
        $this->db->bind(4, password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind(5, (int)$data['id_kelas']);
        $this->db->bind(6, $data['no_telp']);
        $this->db->bind(7, $data['spp']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function delSiswa($id)
    {
        $this->stmt = 'DELETE from ' . $this->table . ' WHERE id_student = :id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    // public function updtSiswa($id,$data){
    //     $this->stmt = 'UPDATE '.$this->table.' WHERE id = :id';
    //     $this->db->query($this->stmt);
    //     $this->db->bind('id',$id);
    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }
    public function updtSiswa($data)
    {
        // try {
        $this->stmt = 'UPDATE ' . $this->table . ' SET
                nis = :nis,
                name = :name,
                username = :username,
                password = :password,
                no_telp = :no_telp,
                SPP = :spp,
                class_id = :id_kelas
                WHERE id_student = :id
            ';
        $this->db->query($this->stmt);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('name', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind('id_kelas', (int)$data['id_kelas']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('spp', $data['spp']);
        $this->db->bind('id', $data['id_student']);
        $this->db->execute();
        return $this->db->rowCount();
        // } catch (PDOException $th) {
        //     if ($th->getCode() == 23000) {
        //         Flasher::setFlasher('Primary-Key Double', 'gagal ditambahkan', 'danger');
        //     } else {
        //         Flasher::setFlasher('Gagal', $th->getMessage(), 'danger');
        //     }
        // }
    }

    public function getUserSiswa($user)
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE username=:user';
        $this->db->query($this->stmt);
        $this->db->bind('user', $user);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return []; // Return an empty array if no results
        }
    }
}

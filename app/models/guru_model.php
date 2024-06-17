<?php

class Guru_model
{
    private $table = 'teachers';
    private $db;
    private $stmt;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllGuru()
    {
        $query = 'SELECT * FROM ' . $this->table . ' JOIN users on teachers.id_user = users.id_user JOIN classes on teachers.class_id=classes.id';
        $this->db->query($query);
        return $this->db->result();
    }

    public function addGuru($data)
    {
        try {
            $this->stmt = 'INSERT INTO ' . $this->table . ' (id_user,nip,class_id) VALUES(:id_user,:nip,:class_id)';
            $this->db->query($this->stmt);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->bind('nip', $data['nip']);
            $this->db->bind('class_id', $data['id_class']);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delGuru($id)
    {
        try {
            $this->stmt = 'DELETE FROM ' . $this->table . ' WHERE id_teacher=:id';
            $this->db->query($this->stmt);
            $this->db->bind('id', $id);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getGuru($id){
        try{
        $this->stmt = 'SELECT * FROM '.$this->table.' WHERE id_teacher=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id',$id);
        return $this->db->single();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function updtGuru($data){
        try{
            // $att = $this->getGuru($data['id_teacher']);
            $this->stmt = 'UPDATE '.$this->table.' SET id_user=:id_user,nip=:nip,class_id=:class_id WHERE id_teacher=:id';
            $this->db->query($this->stmt);
            $this->db->bind('id_user',$data['id_user']);
            $this->db->bind('nip',$data['nip']);
            $this->db->bind('class_id',$data['id_class']);
            $this->db->bind('id',$data['id_teacher']);
            $this->db->execute();
            return $this->db->rowCount();
            
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getGuruByClassId($class_id){
        try{
            $this->stmt = 'SELECT * FROM '.$this->table. ' JOIN users on teachers.id_user = users.id_user WHERE class_id = :classid';
            $this->db->query($this->stmt);
            $this->db->bind('classid',$class_id);
            return $this->db->single();
        }catch(Exception $e){
            return $e->getMessage();    
        }
    }
    public function getGuruByUserId($user_id){
        try{
            $this->stmt = 'SELECT * FROM '.$this->table. ' WHERE id_user=:user_id';
            $this->db->query($this->stmt);
            $this->db->bind('user_id',$user_id);
            return $this->db->single();
        }catch(Exception $e){
            return $e->getMessage();    
        }
    }
}

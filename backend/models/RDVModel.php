<?php

class RDVModel
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getRDVs($date)
    {
        $this->db->query("SELECT * FROM  reservation  where reserv_date = :date ORDER BY reserv_id ASC ");
        $this->db->bind(':date', $date);
        return $this->db->all();
    }
    
    public function RDVInfo($id)
    {
        $this->db->query("SELECT * FROM slots WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function RDVInfoByRef($rdv)
    {
        $this->db->query("SELECT * FROM slots WHERE refenrence_id = :rdv");
        $this->db->bind(':rdv', $rdv);
        return $this->db->single();
    }

    
    
    public function getRDVsByDate($date)
    {
        $this->db->query("SELECT * FROM slots WHERE date = :date");
        $this->db->bind(':date', $date);
        return $this->db->single();
    }


    public function add($data, $reference)
    {
        try {
            $this->db->query("INSERT INTO
                reservation
            SET
                reserv_date = :reserv_date,
                slot = :slot,
                reference = :reference
            ");
            
            $this->db->bind(':reserv_date', $data->reserv_date);
            $this->db->bind(':slot', $data->slot);
            $this->db->bind(':reference', $reference);
            $this->db->single();
        } catch (\PDOExeption $err) {
            return $err->getMessage();
            die();
        }
        return true;
    }

    public function delete($data)
    {
        $this->db->query('DELETE FROM slots WHERE id=:id');
        $this->db->bind(':id', $data->id);
        $this->db->execute();
    }




}

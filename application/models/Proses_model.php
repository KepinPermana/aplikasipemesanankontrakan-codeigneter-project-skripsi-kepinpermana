<?php

class Proses_model extends CI_Model
{


    public function get($id = null)
    {
        $this->db->from('tb_invoice');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
	}

	}

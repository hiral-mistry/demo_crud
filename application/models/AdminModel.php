<?php

class AdminModel extends CI_Model{
    
    function insert_data($table, $data)
	{
		if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
			return false;
		}
    }

    function edit_data($table, $data, $where)
	{
        $this->db->where($where);
		if ($this->db->update($table, $data)) {
            return true;
        } else {
			return false;
		}
    }

    
    function deleteWhereData($table, $where)
	{
        $this->db->where($where);
		if ($this->db->delete($table)) {
            
            return true;
        } else {
			return false;
		}
    }

    function getWhereData($table, $where)
	{

		$this->db->where($where);
		$result = $this->db->get($table);
		//echo $this->db->last_query();
		return $result->row_array();
    }

    function GetData($table)
	{
		$result = $this->db->get($table);
		return $result->result_array();
    }
    
}
?>
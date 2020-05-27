<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LoginModel extends CI_Model {
	
		function validasi($username, $password, $table)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->where('status', 'Aktif');
			$this->db->limit(1);
			return $this->db->get();
			
		}
	
	}
	
	/* End of file LoginModel.php */
	/* Location: ./application/models/LoginModel.php */
 ?>
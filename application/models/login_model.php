<?php
class login_model extends CI_Model{
	function login($email,$pass){
		$p=md5($pass);
		$ps=$this->db->escape_str($p);
		$query = $this->db->select('*')
							->from('user')
							->where('email',$email)
							->where('password',$ps)
							->limit(1)
							->get();
		if($query->num_rows()==1){
			return $query->result_object();
		}else{
			return false;
		}
	}
}
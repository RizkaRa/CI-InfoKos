<?php
class my_model extends CI_Model{
	public function tampildata($nama_table,$urut_id){
		return $this->db->from($nama_table)
						->order_by($urut_id, 'DESC')
						->get('');
	}
	public function simpandata($nama_table,$data){
		date_default_timezone_set("Asia/jakarta");
		return $this->db->insert($nama_table,$data);
	}
	public function hapusdata($nama_table,$id,$idkey){
		return $this->db->delete($nama_table,array($idkey=>$id));
	}
	public function formeditdata($nama_table,$idkey,$id){
		return $this->db->get_where($nama_table, array($idkey=>$id))->row();
	}
	public function editdata($nama_table,$idkey,$id,$data){
		$query = $this->db->where($idkey,$id)->update($nama_table,$data);
		return $query;
	}

	public function tampilkos(){
		return $this->db->query("SELECT * FROM data_kos WHERE email='".$this->session->userdata('email')."'");
	}
	public function tampilpesanan(){
		return $this->db->query("SELECT * FROM data_kos AS dk JOIN data_order AS do ON dk.id_kos = do.id_kos WHERE dk.email='".$this->session->userdata('email')."' ORDER BY waktu DESC");
	}

	//tapil data user
	public function userpencari(){
		return $this->db->query("SELECT * FROM user WHERE id_level = 2 ");
	}
	public function userpemilik(){
		return $this->db->query("SELECT * FROM user WHERE id_level = 3 ");
	}

	/* Detail Kos*/
	public function tampiljoin($id){
		$this->db->select('*');
		$this->db->from('data_kos as dk');
		$this->db->join('user as us' ,'us.email = dk.email ');
		$this->db->where('dk.id_kos ', $id);
		$result = $this->db->get();
		return $result;
	}

	public function carikoslk(){
		$this->db->select('*');
		$this->db->from('data_kos as dk');
		$this->db->join('user as us' ,'us.email = dk.email ');
		$this->db->where('dk.id_kos ', $id);
		$result = $this->db->get();
		return $result;
	}



}

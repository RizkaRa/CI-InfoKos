<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Pencari extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('my_model');
		if(empty($this->session->userdata('email')) AND empty($this->session->userdata('password'))){
			redirect('login/index');
		}elseif($this->session->userdata('level')==1){
			redirect('admin/index');
		}elseif($this->session->userdata('level')==3){
			redirect('pemilik/index');
		}
	}
	public function index(){
	$this->load->view('pencari/index');
	}

	//edit profile
	public function editpemilik(){
		$data=array(
			'nama' 		=> $_POST['nama'],
			'no_hp'		=> $_POST['no_hp'],
			'gender'	=> $_POST['gender'],
			'alamat' 	=> $_POST['alamat'],
			'tgl_lahir'	=> date('Y-m-d', strtotime($_POST['tgl_lahir'])),
			'tmpt_lahir'=> $_POST['tmpt_lahir']
		);
		$this->db->where('id_user', $_POST['id_user']);
		$this->db->update('user',$data);
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil mengubah profile dan silahkan login kembali!!!');
			redirect('pencari');
		}else{
			$this->session->set_flashdata('info','Gagal mngedit.');
			redirect('pencai');
		}
	}
	public function editpassword(){
		$data = array('password' => MD5($_POST['password']));
		$this->db->where('id_user',$_POST['id_user']);
		$this->db->update('user',$data);
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil mengubah Password dan silahkan login kembali!!!');
			redirect('pencari');
		}else{
			$this->session->set_flashdata('info','Gagal mngedit.');
			redirect('pencari');
		}
	}
}

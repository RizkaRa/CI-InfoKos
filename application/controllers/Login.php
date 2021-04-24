<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('my_model');
	}
	public function index(){
		$this->load->view('login');
	}
	public function proses_login(){
		$email=$this->input->post('email');
		$pass=$this->input->post('password');

		$ceklogin = $this->login_model->login($email, $pass);

		if($ceklogin){
			foreach($ceklogin as $row);
			$this->session->set_userdata('id_user',$row->id_user);
			$this->session->set_userdata('email',$row->email);
			$this->session->set_userdata('level',$row->id_level);
			$this->session->set_userdata('nama',$row->nama);
			$this->session->set_userdata('no_hp',$row->no_hp);
			$this->session->set_userdata('gender',$row->gender);
			$this->session->set_userdata('tgl_lahir',$row->tgl_lahir);
			$this->session->set_userdata('alamat',$row->alamat);
			$this->session->set_userdata('tmpt_lahir',$row->tmpt_lahir);

			if($this->session->userdata('level')==1){
				redirect('admin/index');
			}elseif($this->session->userdata('level')==2){
				redirect('pencari/index');
			}elseif($this->session->userdata('level')==3){
				redirect('pemilik/index');
			}
		}else{
			$data = $this->session->set_flashdata('info','Email atau password salah!');
			$this->load->view('login',$data);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('../');
	}
	public function logoutlogin(){
		$this->session->sess_destroy();
		redirect('login');
	}
	public function register(){
		$this->load->view('register');
	}
	public function tambahuser(){
		$data=array(
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			'password'=>md5($_POST['password']),
			'no_hp'=>$this->input->post('no_hp'),
			'gender'=>$this->input->post('gender'),
			'tgl_lahir'=>date('Y-m-d', strtotime($_POST['tgl_lahir'])),
			'tmpt_lahir'=>$this->input->post('tmpt_lahir'),
			'id_level'=>$this->input->post('level')
			);
		$email = $this->input->post('email');
		$sql = $this->db->query("SELECT * FROM user WHERE email='$email'")->num_rows();

		if($sql > 0){
			$data = $this->session->set_flashdata('info','Email sudah terdaftar!!');
			redirect('login/register',$data);
		}else{
			$this->my_model->simpandata('user',$data);
			redirect('login');
		}
		
	}
}
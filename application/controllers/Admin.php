<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('my_model');
		if(empty($this->session->userdata('email')) AND empty($this->session->userdata('password'))){
			redirect('login/index');
		}elseif($this->session->userdata('level')==2){
			redirect('pencari/index');
		}elseif($this->session->userdata('level')==3){
			redirect('pemilik/index');
		}
	}
	public function index(){
		$data['user']=$this->db->get('user')->num_rows();
		$data['fasilitas']=$this->db->get('fasilitas')->num_rows();
		$data['datakos']=$this->db->get('data_kos')->num_rows();
		$data['iklan']=$this->db->get('iklan')->num_rows();
		$this->load->view('admin/index',$data);
	}
	public function fasilitas(){
		$data['dfasilitas']=$this->my_model->tampildata('fasilitas','id_fasilitas');
		$this->load->view('admin/data-fasilitas',$data);
	}
	public function hapusfasilitas($id){
		$this->my_model->hapusdata('fasilitas',$id,'id_fasilitas');
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil terhapus.');
			redirect('Admin/fasilitas');
		}else{
			$this->session->set_flashdata('info','Gagal terhapus.');
			redirect('Admin/fasilitas');
		}
	}
	public function simpanfasilitas(){
		$data = array('nama_fasilitas'=>$this->input->post('nama_fasilitas'));
		$query = $this->my_model->simpandata('fasilitas',$data);
		if($query){
			$this->session->set_flashdata('info','Berhasil menambah data');
			redirect('admin/fasilitas');
		}else{
			$this->sssion->set_flashdata('info','Gagal menambah data');
			redirect('admin/fasilitas');
		}
	}
	public function formeditfasilitas($id){
		$data['editfasilitas']=$this->my_model->formeditdata('fasilitas','id_fasilitas',$id);
		$this->load->view('admin/data-fasilitas',$data);
	}
	public function editfasilitas(){
		$data = array("nama_fasilitas"=>$_POST['nama_fasilitas'],);
		$this->db->where('id_fasilitas', $_POST['id_fasilitas']);
		$this->db->update('fasilitas',$data);
		$this->session->set_flashdata('info',"Data Berhasil Diedit");
		redirect('admin/fasilitas');
	}

	// data user
	public function user(){
		$data['userpemilik']=$this->my_model->userpemilik();
		$data['userpencari']=$this->my_model->userpencari();
		$this->load->view('admin/data-user',$data);
	}
	public function hapususer($id){
		$this->my_model->hapusdata('user',$id,'id_user');
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil terhapus.');
			redirect('Admin/user');
		}else{
			$this->session->set_flashdata('info','Gagal terhapus.');
			redirect('Admin/user');
		}
	}

	// data iklan
	public function iklan(){
		$data['dataiklan']=$this->my_model->tampildata('iklan','id_iklan');
		$this->load->view('admin/iklan',$data);
	}
	public function tambahiklan(){
		
		$gambar= $_FILES['gmb_iklan']['name'];
		if($gambar=''){}{
			$config['upload_path']	= './assets/img/iklan';
			$config['allowed_types']= 'gif|jpg|png';
			$config['overwrite'] 	= true;
			$config['max_size'] 	= 1024; // 1MB
			//$config['max_width'] 	= 1024;
			//$config['max_height'] = 768;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gmb_iklan')){
				$this->session->set_flashdata('info','Silahkan isi gambar iklan.');
				redirect('Admin/iklan');
			}else{
				$gambar = $this->upload->data('file_name');
			}
			$data = array(
				'nama_iklan'=>$this->input->post('nama_iklan'),
				'gmb_iklan'=> $_FILES['gmb_iklan']['name']
			);
			$query = $this->my_model->simpandata('iklan',$data);
			if($query){
				$this->session->set_flashdata('info','Berhasil menambah data');
				redirect('admin/iklan');
			}else{
				$this->sssion->set_flashdata('info','Gagal menambah data');
				redirect('admin/iklan');
			}
		}

	}
	public function hapusiklan($id){
		$this->my_model->hapusdata('iklan',$id,'id_iklan');
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil terhapus.');
			redirect('Admin/iklan');
		}else{
			$this->session->set_flashdata('info','Gagal terhapus.');
			redirect('Admin/iklan');
		}
	}

}
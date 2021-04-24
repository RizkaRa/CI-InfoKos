<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Pemilik extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('my_model');
		if(empty($this->session->userdata('email')) AND empty($this->session->userdata('password'))){
            redirect('login');
        }elseif($this->session->userdata('level')==1){
			redirect('admin/index');
		}elseif($this->session->userdata('level')==2){
			redirect('pencari/index');
		}
	}
	public function index(){
		$this->load->view('pemilik/index');
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
			$this->session->set_flashdata('info','Berhasil mengubah data dan silahkan login kembali!!!');
			redirect('pemilik');
		}else{
			$this->session->set_flashdata('info','Gagal mngedit.');
			redirect('pemilik');
		}

		redirect('Login/logout');
	}
	public function editpassword(){
		$data = array('password' => MD5($_POST['password']));
		$this->db->where('id_user',$_POST['id_user']);
		$this->db->update('user',$data);
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil mengubah Password dan silahkan login kembali!!!');
			redirect('pemilik');
		}else{
			$this->session->set_flashdata('info','Gagal mngedit.');
			redirect('pemilik');
		}

	}

	// Data Kos
	public function datakos(){
		$data['datakos']=$this->my_model->tampilkos();
		$this->load->view('pemilik/data-kos',$data);
	}
	public function hapusdatakos($id){
		$this->my_model->hapusdata('data_kos',$id,'id_kos');
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil terhapus.');
			redirect('pemilik/datakos');
		}else{
			$this->session->set_flashdata('info','Gagal terhapus.');
			redirect('pemilik/datakos');
		}
	}
	public function formkos(){
		$data['dfasilitas']=$this->my_model->tampildata('fasilitas','id_fasilitas');
		$this->load->view('pemilik/tambah-kos',$data);
	}
	public function simpankos(){
		
		$gambar= $_FILES['gmb_kos']['name'];
		if($gambar=''){}{
			$config['upload_path']	= './assets/img/kos';
			$config['allowed_types']= 'gif|jpg|png';
			$config['overwrite'] 	= true;
			$config['max_size'] 	= 5120; // 1MB
			//$config['max_width'] 	= 1024;
			//$config['max_height'] = 768;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gmb_kos')){
				echo "gagal";die();
			}else{
			$gambar = $this->upload->data('file_name');
			}
			$data = array(
				'nama_kos'=>$this->input->post('nama_kos'),
				'deskripsi'=>$this->input->post('deskripsi'),
				'alamat_kos'=>$this->input->post('alamat_kos'),
				'untuk'=>$this->input->post('untuk'),
				'harga'=>$this->input->post('harga'),
				'jml_kamar'=>$this->input->post('jml_kamar'),
				'luas'=>$this->input->post('luas'),
				'km'=>$this->input->post('km'),
				'fasilitas'=>$this->input->post('data_fasilitas'),
				'email'=>$this->input->post('email'),
				'gmb_kos'=> $_FILES['gmb_kos']['name']
			);
			$query = $this->my_model->simpandata('data_kos',$data);
			if($query){
				$this->session->set_flashdata('info','Berhasil menambah data');
				redirect('pemilik/datakos');
			}else{
				$this->session->set_flashdata('info','Gagal menambah data');
				redirect('pemilik/datakos');
			}
		}

	}
	public function formeditkos($id){
		$data['datakos']=$this->my_model->formeditdata('data_kos','id_kos',$id);
		$data['dfasilitas']=$this->my_model->tampildata('fasilitas','id_fasilitas');
		$this->load->view('pemilik/edit-data-kos',$data);
	}
	public function editdatakos(){
		$gambar= $_FILES['gmb_kos']['name'];
		if($gambar=''){}{
			$config['upload_path']	= './assets/img/kos';
			$config['allowed_types']= 'gif|jpg|png';
			$config['overwrite'] 	= true;
			$config['max_size'] 	= 5120; // 1MB
			//$config['max_width'] 	= 1024;
			//$config['max_height'] = 768;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gmb_kos')){
				echo "gagal";die();
			}else{
			$gambar = $this->upload->data('file_name');
			}
			$data=array(
				'email' 	=> $_POST['email'],
				'nama_kos' 	=> $_POST['nama_kos'],
				'deskripsi' => $_POST['deskripsi'],
				'alamat_kos'=> $_POST['alamat_kos'],
				'untuk'		=> $_POST['untuk'],
				'harga' 	=> $_POST['harga'],
				'jml_kamar' => $_POST['jml_kamar'],
				'luas' 		=> $_POST['luas'],
				'km' 		=> $_POST['km'],
				'fasilitas' => $_POST['fasilitas'],
				'gmb_kos'=> $_FILES['gmb_kos']['name']
			);
			$id = $this->input->post('id');
			$query = $this->my_model->editdata('data_kos','id_kos',$id,$data);
			if($query){
				$this->session->set_flashdata('info','Berhasil mengedit data');
				redirect('pemilik/datakos');
			}else{
				$this->session->set_flashdata('info','Gagal mengedit data');
				redirect('pemilik/datakos');
			}
		}

	}
	// data pesanan
	public function pesanan(){
		$data['dpesanan']=$this->my_model->tampilpesanan();
		$this->load->view('pemilik/data-pemesanan',$data);
	}
	public function hapuspesanan($id){
		$this->my_model->hapusdata('data_order',$id,'id_order');
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info','Berhasil terhapus.');
			redirect('pemilik/pesanan');
		}else{
			$this->session->set_flashdata('info','Gagal terhapus.');
			redirect('pemilik/pesanan');
		}
	}
}
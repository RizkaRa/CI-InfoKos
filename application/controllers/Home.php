<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('my_model');
	}
	public function index(){
		$data['diklan']=$this->my_model->tampildata('iklan','id_iklan');
		//$data['dkos']=$this->my_model->tampildata('data_kos','id_kos');
		$data['dkos']=$this->db->query('SELECT * FROM data_kos LIMIT 4');
		$this->load->view('index',$data);
	}
	public function detail($id){
		$data['detailkos']=$this->my_model->tampiljoin($id);
		$this->load->view('detail/detail',$data);
	}
	public function tambahpesan(){
		$data = array(
			'id_kos'=>$this->input->post('id'),
			'namapemesan'=>$this->input->post('nama'),
			'no_hp'=>$this->input->post('no_hp'),
			'waktu'=>date('Y-m-d H:i:s'),
			'comment'=>$this->input->post('comment')

		);
		$query = $this->my_model->simpandata('data_order',$data);
		if($query){
			$this->session->set_flashdata('info','Berhasil memesan kos ');
			redirect('../');
		}else{
			$this->sssion->set_flashdata('info','Gagal menambah data');
			redirect('../');
		}
	}
	public function lk(){
		$data['kos'] = $this->db->query("SELECT * FROM data_kos AS dk INNER JOIN user on dk.email = user.email WHERE dk.untuk='Laki-laki'");
		$this->load->view('carikos',$data);

	}
	public function pr(){
		$data['kos'] = $this->db->query("SELECT * FROM data_kos AS dk INNER JOIN user on dk.email = user.email WHERE dk.untuk='Perempuan'");
		$this->load->view('carikos',$data);
	}
	public function cmp(){
		$data['kos'] = $this->db->query("SELECT * FROM data_kos AS dk INNER JOIN user on dk.email = user.email WHERE dk.untuk='Campur'");
		$this->load->view('carikos',$data);
	}
	public function semua(){
		$data['kos'] = $this->db->query("SELECT * FROM data_kos");
		$this->load->view('carikos',$data);	
	}
}
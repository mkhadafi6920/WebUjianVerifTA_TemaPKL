<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dosen extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();

        $this->load->model('m_global');

        
    }

	public function index()
	{
        $tabel="tb_dosen";
		$data['tampildata']=$this->m_global->tampildata($tabel);
	
		$this->load->view('template/header',$data);
		$this->load->view('dosen/v_dosen',$data);
		$this->load->view('template/footer');

	}

	public function tambahdosen()
	{
		$this->load->view('template/header');
		$this->load->view('dosen/v_dosen_tambah');
		$this->load->view('template/footer');
	}

	public function simpandata()
	{
		$this->form_validation->set_rules('nidn', 'NIDN', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('nama', 'NAMADOSEN', 'trim|required');
		

		$nidn = $this->input->post('nidn');
		$namadosen = $this->input->post('nama');
       
		
		if($this->form_validation->run() != false){
		$data = array(
			'nidn' => $nidn,
			'nama_dosen' => $namadosen,
			
			);
            $carinidn=$this->db->query("SELECT * FROM tb_dosen WHERE nidn = '$nidn'")->num_rows();
        if ($carinidn > 0) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-danger d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		data gagal disimpan
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>');redirect('C_dosen');
        }else{
		$this->m_global->input_data($data,'tb_dosen');
		$this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		data berhasil disimpan
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>');
		redirect('C_dosen');}}
		else {
			$this->load->view('template/header');
			$this->load->view('dosen/v_dosen_tambah');
			$this->load->view('template/footer');

		}
	}

        function lihat($id){
		$where = array('nidn' => $id);
		$data['tampil'] = $this->m_global->tampiledit($where,'tb_dosen')->result();
		$this->load->view('template/header');
			$this->load->view('dosen/v_dosen_lihat',$data);
			$this->load->view('template/footer');

	}

    function hapus($id){
		$where = array('nidn' => $id);
		$this->m_global->hapus_data($where,'tb_dosen');
		$this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		  data berhasil dihapus
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('C_dosen');
	}

    function edit($id){
		$where = array('nidn' => $id);
		$data['tampil'] = $this->m_global->tampiledit($where,'tb_dosen')->result();
		$this->load->view('template/header');
			$this->load->view('dosen/v_dosen_edit',$data);
			$this->load->view('template/footer');

	}

	public function simpanedit()
	{
		$this->form_validation->set_rules('nidn', 'NIDN', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$nidn = $this->input->post('nidn');
		$id = $this->input->post('id');

		$nama = $this->input->post('nama');
		
		if($this->form_validation->run() != false){
		$data = array(
			'nidn' => $nidn,
			'nama_dosen' => $nama,
			

			);
			$where = array(
				'nidn' => $id
			);
			$this->m_global->update_data($where,$data,'tb_dosen');
		redirect('C_dosen');}
		else {
            $where = array('nidn' => $id);
            $data['tampil'] = $this->m_global->tampiledit($where,'tb_dosen')->result();
			$this->load->view('template/header');
			$this->load->view('dosen/v_dosen_edit',$data);
			$this->load->view('template/footer');

		}
	}

		


}

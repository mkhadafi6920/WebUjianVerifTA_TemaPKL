<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

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
        $tabel="tb_mahasiswa";
		$data['tampildata']=$this->m_global->tampildata($tabel);
        $data['tampil']=$this->db->query("SELECT tb_mahasiswa.* , tb_prodi.program_studi from tb_mahasiswa,tb_prodi where tb_mahasiswa.id_programstudi = tb_prodi.id_programstudi")->result();
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/v_mahasiswa',$data);
		$this->load->view('template/footer');

	}

	public function tambahmahasiswa()
	{
        $tabel="tb_prodi";
		$data['tampildata']=$this->m_global->tampildata($tabel);
		$this->load->view('template/header');
		$this->load->view('mahasiswa/v_mahasiswa_tambah',$data);
		$this->load->view('template/footer');
	}

	public function simpandata()
	{
	
		$this->form_validation->set_rules('nama', 'namamahasiswa', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
		$this->form_validation->set_rules('npm', 'npm', 'trim|required');
		$this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
		$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');


		

	
		$alamat = $this->input->post('alamat');
		$nama = $this->input->post('nama');
		$npm = $this->input->post('npm');
		$prodi = $this->input->post('prodi');
		$ttl = $this->input->post('ttl');
		$nohp = $this->input->post('nohp');
		
       
		
		if($this->form_validation->run() != false){
		$data = array(
			
			'nama' => $nama,
			'npm' => $npm,
			'alamat' => $alamat,
			'ttl' => $ttl,
			'id_programstudi' => $prodi,
			'no_hp' => $nohp,
			
			);
            
            $carinidn=$this->db->query("SELECT * FROM tb_mahasiswa WHERE npm = '$npm'")->num_rows();
            if ($carinidn > 0) {
                $this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            data gagal disimpan
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');redirect('c_mahasiswa');
            }else{
		$this->m_global->input_data($data,'tb_mahasiswa');
		$this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		data berhasil disimpan
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>');
		redirect('c_mahasiswa');}}
		else {
			$this->load->view('template/header');
			$this->load->view('mahasiswa/v_mahasiswa_tambah');
			$this->load->view('template/footer');

		}
	}

        function lihat($id){
            $data['tampil']=$this->db->query("SELECT tb_mahasiswa.* , tb_prodi.program_studi from tb_mahasiswa,tb_prodi where tb_mahasiswa.id_programstudi = tb_prodi.id_programstudi AND tb_mahasiswa.npm='$id' ")->row();
		$this->load->view('template/header');
			$this->load->view('mahasiswa/v_mahasiswa_lihat',$data);
			$this->load->view('template/footer');

	}

    function hapus($id){
		$where = array('npm' => $id);
		$this->m_global->hapus_data($where,'tb_mahasiswa');
		$this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		  data berhasil dihapus
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('c_mahasiswa');
	}

    function edit($id){
        $data['tampil']=$this->db->query("SELECT tb_mahasiswa.* , tb_prodi.program_studi from tb_mahasiswa,tb_prodi where tb_mahasiswa.id_programstudi = tb_prodi.id_programstudi AND tb_mahasiswa.npm='$id' ")->row();
        $tabel="tb_prodi";
		$data['tampildata']=$this->m_global->tampildata($tabel);
		$this->load->view('template/header');
			$this->load->view('mahasiswa/v_mahasiswa_edit',$data);
			$this->load->view('template/footer');

	}

	public function simpanedit()
	{
		
		$this->form_validation->set_rules('nama', 'namamahasiswa', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
		$this->form_validation->set_rules('npm', 'npm', 'trim|required');
		$this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
		$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');


		

	
		$alamat = $this->input->post('alamat');
		$nama = $this->input->post('nama');
		$npm = $this->input->post('npm');
		$prodi = $this->input->post('prodi');
		$ttl = $this->input->post('ttl');
		$nohp = $this->input->post('nohp');
		$id = $this->input->post('id');
        
		
		if($this->form_validation->run() != false){
		$data = array(
			
			'nama' => $nama,
			'npm' => $npm,
			'alamat' => $alamat,
			'ttl' => $ttl,
			'id_programstudi' => $prodi,
			'no_hp' => $nohp,

			);
			$where = array(
				'npm' => $id
			);

            

			$this->m_global->update_data($where,$data,'tb_mahasiswa');
		    redirect('c_mahasiswa');}
		else {
            $data['tampil']=$this->db->query("SELECT tb_mahasiswa.* , tb_prodi.program_studi from tb_mahasiswa,tb_prodi where tb_mahasiswa.id_programstudi = tb_prodi.id_programstudi AND tb_mahasiswa.npm='$id' ")->row();
        $tabel="tb_prodi";
		$data['tampildata']=$this->m_global->tampildata($tabel);
			$this->load->view('template/header');
			$this->load->view('mahasiswa/v_mahasiswa_edit',$data);
			$this->load->view('template/footer');

		}
	}

		


}

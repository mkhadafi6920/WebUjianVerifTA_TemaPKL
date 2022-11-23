<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pkl extends CI_Controller {

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
        
        $data['tampil']=$this->db->query("SELECT tb_pkl.*, tb_mahasiswa.`npm`,tb_mahasiswa.`nama`, tb_prodi.`program_studi`,tb_tempat_pkl.`nama_tempat`,tb_dosen.`nama_dosen`
        FROM tb_mahasiswa, tb_tempat_pkl, tb_prodi, tb_dosen,tb_pkl
        WHERE
        tb_pkl.`npm` = tb_mahasiswa.`npm` AND tb_pkl.`id_tempat`= tb_tempat_pkl.`id_tempat` AND tb_pkl.`nidn` =tb_dosen.`nidn` AND
        tb_pkl.`id_programstudi` = tb_prodi.`id_programstudi`")->result();
		$this->load->view('template/header',$data);
		$this->load->view('pkl/v_pkl',$data);
		$this->load->view('template/footer');

	}

	public function tambahpkl()
	{
       
		$data['mahasiswa']=$this->db->query("SELECT * FROM tb_mahasiswa
        WHERE tb_mahasiswa.npm NOT IN(SELECT	npm FROM tb_pkl) ")->result();
        $tabel2="tb_tempat_pkl";
		$data['tempat']=$this->m_global->tampildata($tabel2);
        $tabel3="tb_dosen";
		$data['dosen']=$this->m_global->tampildata($tabel3);
		$this->load->view('template/header');
		$this->load->view('pkl/v_pkl_tambah',$data);
		$this->load->view('template/footer');
	}

	public function simpandata()
	{
	
		$this->form_validation->set_rules('mhs', 'MAHASISWA', 'trim|required');
		$this->form_validation->set_rules('tempat', 'TEMPAT', 'trim|required');
		$this->form_validation->set_rules('dosen', 'DOSEN', 'trim|required');



		

	
	
		$mhs = $this->input->post('mhs');
		$tempat = $this->input->post('tempat');
		$dosen = $this->input->post('dosen');
		
        $cariprodi=$this->db->query("SELECT id_programstudi FROM tb_mahasiswa
        WHERE npm = '$mhs' ")->row();
        
       
		
		if($this->form_validation->run() != false){
		$data = array(
			
			'npm' => $mhs,
			'id_tempat' => $tempat,
			'nidn' => $dosen,
            'id_programstudi'=>$cariprodi->id_programstudi
			
			
			);
            
            
		$this->m_global->input_data($data,'tb_pkl');
		$this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		data berhasil disimpan
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>');
		redirect('c_pkl');}
		else {
			$this->load->view('template/header');
			$this->load->view('pkl/v_pkl_tambah');
			$this->load->view('template/footer');

		}
	}

        function lihat($id){
            $data['tampil']=$this->db->query("SELECT tb_pkl.*, tb_mahasiswa.`npm`,tb_mahasiswa.`nama`, tb_prodi.`program_studi`,tb_tempat_pkl.`nama_tempat`,tb_dosen.`nama_dosen`
            FROM tb_mahasiswa, tb_tempat_pkl, tb_prodi, tb_dosen,tb_pkl
            WHERE
            tb_pkl.`npm` = tb_mahasiswa.`npm` AND tb_pkl.`id_tempat`= tb_tempat_pkl.`id_tempat` AND tb_pkl.`nidn` =tb_dosen.`nidn` AND
            tb_pkl.`id_programstudi` = tb_prodi.`id_programstudi` AND id_pkl = '$id' ")->row();
		$this->load->view('template/header');
			$this->load->view('pkl/v_pkl_lihat',$data);
			$this->load->view('template/footer');

	}

    function hapus($id){
		$where = array('id_pkl' => $id);
		$this->m_global->hapus_data($where,'tb_pkl');
		$this->session->set_flashdata('message_name', '<div class="alert alert-dismissible alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		  data berhasil dihapus
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('c_pkl');
	}

    function edit($id){
        $data['tampil']=$this->db->query("SELECT tb_pkl.*, tb_mahasiswa.`npm`,tb_mahasiswa.`nama`, tb_prodi.`program_studi`,tb_tempat_pkl.`nama_tempat`,tb_dosen.`nama_dosen`
        FROM tb_mahasiswa, tb_tempat_pkl, tb_prodi, tb_dosen,tb_pkl
        WHERE
        tb_pkl.`npm` = tb_mahasiswa.`npm` AND tb_pkl.`id_tempat`= tb_tempat_pkl.`id_tempat` AND tb_pkl.`nidn` =tb_dosen.`nidn` AND
        tb_pkl.`id_programstudi` = tb_prodi.`id_programstudi` AND id_pkl = '$id' ")->row();
   
       $tabel2="tb_tempat_pkl";
       $data['tempat']=$this->m_global->tampildata($tabel2);
       $tabel3="tb_dosen";
       $data['dosen']=$this->m_global->tampildata($tabel3);
		$this->load->view('template/header');
			$this->load->view('pkl/v_pkl_edit',$data);
			$this->load->view('template/footer');

	}

	public function simpanedit()
	{
		
		$this->form_validation->set_rules('mhs', 'MAHASISWA', 'trim|required');
		$this->form_validation->set_rules('tempat', 'TEMPAT', 'trim|required');
		$this->form_validation->set_rules('dosen', 'DOSEN', 'trim|required');



		

	
	
		$mhs = $this->input->post('mhs');
		$tempat = $this->input->post('tempat');
		$dosen = $this->input->post('dosen');
		$id = $this->input->post('id');

		
        $cariprodi=$this->db->query("SELECT id_programstudi FROM tb_mahasiswa
        WHERE npm = '$mhs' ")->row();
        
		
		if($this->form_validation->run() != false){
		$data = array(
			
			'npm' => $mhs,
			'id_tempat' => $tempat,
			'nidn' => $dosen,
            'id_programstudi'=>$cariprodi->id_programstudi
			

			);
			$where = array(
				'id_pkl' => $id
			);

            

			$this->m_global->update_data($where,$data,'tb_pkl');
		    redirect('c_pkl');}
		else {
            $data['tampil']=$this->db->query("SELECT tb_pkl.*, tb_mahasiswa.`npm`,tb_mahasiswa.`nama`, tb_prodi.`program_studi`,tb_tempat_pkl.`nama_tempat`,tb_dosen.`nama_dosen`
            FROM tb_mahasiswa, tb_tempat_pkl, tb_prodi, tb_dosen,tb_pkl
            WHERE
            tb_pkl.`npm` = tb_mahasiswa.`npm` AND tb_pkl.`id_tempat`= tb_tempat_pkl.`id_tempat` AND tb_pkl.`nidn` =tb_dosen.`nidn` AND
            tb_pkl.`id_programstudi` = tb_prodi.`id_programstudi` AND id_pkl = '$id' ")->row();
       
           $tabel2="tb_tempat_pkl";
           $data['tempat']=$this->m_global->tampildata($tabel2);
           $tabel3="tb_dosen";
           $data['dosen']=$this->m_global->tampildata($tabel3);
			$this->load->view('template/header');
			$this->load->view('pkl/v_pkl_edit',$data);
			$this->load->view('template/footer');

		}
	}

		


}

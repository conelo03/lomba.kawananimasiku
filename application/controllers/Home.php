<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$config['base_url'] = site_url('Home/index'); //site url
		$config['total_rows'] = $this->db->get('tb_lomba')->num_rows(); //total row
		$config['per_page'] = 8;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 3;
 
        // Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['lomba'] = $this->db->order_by('tanggal_lomba', 'ASC')->get('tb_lomba', $config["per_page"], $data['page'])->result_array();         

		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('front/home', $data);
	}

	public function detail_lomba($id_lomba)
	{
		$data['title'] = 'Home';
		$data['lomba']		= $this->M_lomba->get_by_id($id_lomba);
		$this->db->select('*');
		$this->db->from('tb_detail_lomba');
		$this->db->join('tb_guru', 'tb_guru.id_guru=tb_detail_lomba.id_guru');
		$this->db->where('tb_detail_lomba.id_lomba', $id_lomba);
		$data['peserta']		= $this->db->get()->result_array();
		$data['jml_peserta'] = $this->db->get_where('tb_detail_lomba', ['id_lomba' => $id_lomba])->num_rows();
		$this->load->view('front/detail_lomba', $data);
	}

	public function hasil_karya($id_lomba)
	{
		$data['title'] = 'Hasil Karya Guru';
		
		$data['search'] = '';
		
		$config['base_url'] = site_url('Home/hasil_karya/'.$id_lomba); //site url
		$this->db->select('*');
		$this->db->from('tb_detail_lomba');
		$this->db->where('id_lomba', $id_lomba);
		$this->db->where('url_youtube !=', NULL);
		$config['total_rows'] = $this->db->get()->num_rows(); //total row
		$config['per_page'] = 8;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 3;
 
        // Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$this->db->where('id_lomba', $id_lomba);
		$this->db->where('url_youtube !=', NULL);
		$this->db->order_by('tanggal_upload', 'DESC');
		$data['png'] = $this->db->get('tb_detail_lomba', $config["per_page"], $data['page'])->result_array();

		$data['lomba'] = $this->db->get_where('tb_lomba', ['id_lomba' => $id_lomba])->row_array();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('front/hasil_karya', $data);
	}

	public function login()
	{
		$data['title'] = 'Pendaftaran Lomba';
		$this->load->view('front/login', $data);
	}

	public function proses_login($id_lomba = null)
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$password = htmlspecialchars($this->input->post('password', true));
		
		$user = $this->M_login->get_guru($email);
		if($user->num_rows() > 0)
		{
			$get_user = $user->row_array();
			if(password_verify($password, $get_user['password']))
			{
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('id_guru', $get_user['id_guru']);
				$this->session->set_userdata('nama_guru', $get_user['nama_guru']);
				$this->session->set_userdata('email', $get_user['email']);
				$this->session->set_userdata('level', 'guru');

				$this->session->set_flashdata('msg', 'login-success');
				if($id_lomba != null){
					redirect('detail-lomba/'.$id_lomba);
				}else{
					redirect('');
				}
				
				
			}
			else 
			{
				$this->session->set_flashdata('msg', 'wrong-password');
				redirect('');
			}
		} 
		else 
		{
			$this->session->set_flashdata('msg', 'email-not-registered');
			redirect('');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('id_guru');
		$this->session->unset_userdata('nama_guru');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('msg', 'logout-success');
		redirect('');
	}

	public function daftar_lomba($id_lomba)
	{
		$id_guru = $this->session->userdata('id_guru');

		$lomba		= $this->M_lomba->get_by_id($id_lomba);

		$this->db->select('*');
		$this->db->from('tb_detail_lomba');
		$this->db->join('tb_guru', 'tb_guru.id_guru=tb_detail_lomba.id_guru');
		$this->db->where('tb_detail_lomba.id_lomba', $id_lomba);
		$this->db->where('tb_detail_lomba.id_guru', $id_guru);
		$cek_guru		= $this->db->get();

		$guru = $this->db->get_where('tb_guru', ['id_guru' => $id_guru])->row_array();

		$jenjang_lomba = explode(',', $lomba['jenjang_sekolah']);

		if($cek_guru->num_rows() > 0){
			$this->session->set_flashdata('msg', 'already-join');
			redirect('detail-lomba/'.$id_lomba);
		}

		if(!in_array($guru['jenjang_sekolah'], $jenjang_lomba)){
			$this->session->set_flashdata('msg', 'not-match');
			redirect('detail-lomba/'.$id_lomba);
		}

		$data = [
			'id_lomba' => $id_lomba,
			'id_guru' => $id_guru,
			'tanggal_daftar' => date('Y-m-d')
		];
		$this->db->insert('tb_detail_lomba', $data);

		$this->session->set_flashdata('msg', 'register-success');
		redirect('detail-lomba/'.$id_lomba);
	}

	public function upload_hasil_lomba($id_lomba)
	{
		$id_guru = $this->session->userdata('id_guru');
		$lomba		= $this->M_lomba->get_by_id($id_lomba);
		$data;
		if ($lomba['kategori_lomba'] == 'Lomba Video Animasi') {
			$data = [
				'tanggal_upload' => date('Y-m-d H:i:s'),
				'url_drive' => $this->input->post('file'),
				'url_youtube' => $this->input->post('video'),
			];
		} elseif ($lomba['kategori_lomba'] == 'Lomba MPI') {
			if (empty($_FILES['video']['name'])) {
				$video = $data['video_old'];
			}else{
				$video = $this->upload_file();
			}
			$data = [
				'tanggal_upload' => date('Y-m-d H:i:s'),
				'url_drive' => $this->input->post('file'),
				'url_youtube' => $video,
			];
		}

		$this->db->where('id_lomba', $id_lomba);
		$this->db->where('id_guru', $id_guru);
		$q = $this->db->update('tb_detail_lomba', $data);

		if($q){
			$this->session->set_flashdata('msg', 'upload-success');
		}else{
			$this->session->set_flashdata('msg', 'upload-error');
		}

		redirect('detail-lomba/'.$id_lomba);
	}

	private function upload_file()
	{
		$config['upload_path'] = '../public_html/assets/upload/lomba_mpi';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 5000;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('video'))
		{
			return '';
		}

		return $this->upload->data('file_name');
	}

	public function hitung() {
		$expire = 30 * 86400;
		if (!isset($_COOKIE['counter'])) {
			//cookie kosong dan tambahkan jumlah pengunjung
			$data = $this->db->get_where('tb_visitor', ['type' => 2])->row_array();
			$nilaibaru = $data['visitor'] + 1; //tambahkan nilai +1
			//simpan nilai baru
			$this->db->where('type', 2);
			$this->db->update('tb_visitor', ['visitor' => $nilaibaru]);
			setcookie('counter', time(), time() + $expire); //tambahkan cookie dengan nilai tanggal sekarang
		}
		return true;
	}

	public function test(){
		$a = $this->db->get('tb_detail_lomba')->result_array();

		foreach ($a as $key) {
			if($key['url_youtube'] != NULL){
				$url_youtube = $key['url_youtube'];
				$pch = explode('/', $url_youtube);
				if(count($pch) == 5){
					$url_youtube = $key['url_youtube'];
				} else if(count($pch) == 4) {
					if($pch[2] == 'youtu.be'){
						$url_youtube = $pch[0].'/'.$pch[1].'/www.youtube.com/embed/'.$pch[3];
					}elseif($pch[2] == 'www.youtube.com'){
						$url_youtube = $pch[0].'/'.$pch[1].'/'.$pch[2].'/embed/'.$pch[3];
					}
				}else{

				}
				$this->db->where('id_detail_lomba', $key['id_detail_lomba']);
				$this->db->update('tb_detail_lomba', ['url_youtube' => $url_youtube]);
			}
		}
	}

}

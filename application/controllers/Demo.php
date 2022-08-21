<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->helper('download');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->load->view('demo');
	}

	public function broadcast_email($offset = 0)
	{
    $guru = $this->db->get('tb_guru', 50, $offset)->result_array();

		foreach ($guru as $key) {
			$this->load->library('email');

			$config = [
				'mailtype'  => 'text',
				'charset'   => 'utf-8',
				'protocol'  => 'smtp',
				'smtp_host' => 'mail.kawananimasiku.id',
				'smtp_user' => 'admin@kawananimasiku.id',  // Email gmail
				'smtp_pass'   => 'conelo031999',  // Password gmail
				'smtp_crypto' => 'ssl',
				'smtp_port'   => 465,
				'crlf'    => "\r\n",
				'newline' => "\r\n"
			];

			// Load library email dan konfigurasinya
			$this->load->library('email', $config);

			// Email dan nama pengirim
			$this->email->from('admin@kawananimasiku.id', 'Admin Kawananimasiku.id');

			// Email penerima
			$this->email->to($key['email']); // Ganti dengan email tujuan

			// Lampiran email, isi dengan url/path file
			//$this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

			// Subject email
			$this->email->subject('Pemutakhiran Data');

			// Isi email
			$message = "Selamat Malam\r\n \r\nUntuk pemutakhiran data atau up-to-date data profile, silahkan edit ulang data dan pengisian Jenis PTK, Status Kepegawaian / Ketenagaan serta Golongan Pangkat. \r\nMohon untuk sebelum pengisian dibaca petunjuk dan contoh pengisiannya. \r\nUntuk photo yg masih menggunakan photo bebas mohon diganti menjadi photo resmi.\r\n \r\nTerima Kasih\r\n \r\nRegrads Kawananimasiku team";
			$this->email->message($message);
			if($this->email->send()){
				echo $key['email']." Sukses dikirim";
				echo "<br>";
				echo $key['nama_guru'];
				echo "<br>";
				echo "<br>";
			}else{
				echo $key['email']." Gagal dikirim";
				echo "<br>";
				echo $key['nama_guru'];
				echo "<br>";
				echo "<br>";
			}
		}

		
	}

	public function get_slug()
	{
		$materi = $this->db->get('tb_materi')->result_array();

		foreach ($materi as $key) {
			$slug = str_replace(' ', '-', strtolower($key['judul_materi']));
			$slug = str_replace('&', 'dan', $slug);
			$slug = str_replace(',', '', $slug);
			$slug = str_replace("'", '', $slug);
			$slug = str_replace('?', '', $slug);
			$slug = str_replace('!', '', $slug);
			$data = [
				'id_materi' => $key['id_materi'],
				'slug' => $slug,
			];

			$this->db->where('id_materi', $key['id_materi']);
			$this->db->update('tb_materi', $data);
		}
	}
}

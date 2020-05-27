<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('LoginModel');
		}
	
		public function index()
		{
			$this->load->view('siswa/login');
		}

		public function masuk()
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$table		= 'siswa';

			$result = $this->LoginModel->validasi($username, $password, $table);

			if ($result->num_rows() > 0) {
				foreach ($result->result() as $rs) {
					$data_session = array(
						'username'		=> $username,
						'nama_lengkap' 	=> $rs->nama_siswa,
						'id'			=> $rs->id,
						'foto'			=> $rs->foto,
						'email'			=> $rs->email,
						'nama_akses'	=> "Siswa",
						'link'			=> "siswa",
						'status' 		=> "login"
					);
					

					$this->session->set_userdata($data_session);
				};
				$response = array(
					'status' => 'sukses',
					'message' => 'Anda Berhasil Login',
					'redirect' => base_url($this->session->userdata('link').'/Dashboard'),
					);
			}else{
				$response = array(
					'status' => 'gagal',
					'message' => 'Username Atau Password yang anda masukan salah !',
					'redirect' => base_url('login')
					);
			};

			echo json_encode($response);
		}

	
	}
	
	/* End of file login.php */
	/* Location: ./application/controllers/admin/login.php */
?>
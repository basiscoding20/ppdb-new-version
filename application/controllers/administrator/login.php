<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		public function login_page()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navigation');
			$this->load->view('_partials/main');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
		}
	
	}
	
	/* End of file login.php */
	/* Location: ./application/controllers/admin/login.php */
?>
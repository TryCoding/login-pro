<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		use Mailgun\Mailgun;

class Auth extends CI_Controller {

	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$this->load->view('login');
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'admin');
			}
			else if($st=='user')
			{
				header('location:'.base_url().'user');
			}
		}
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function register_akun()
	{
		$simpan["nama_user"] 	= $this->input->post("nama_user");
		$simpan["email_user"] 	= $this->input->post("email_user");
		$simpan["hp_user"] 		= $this->input->post("hp_user");

		$simpan["id_user"] = $this->input->post("id_user");
		if($this->masterlogin_model->cekIdUserMax($simpan["email_user"])==0)
		{
			$reg['username'] 	= $this->input->post("id_user");
			$reg['password'] 	= md5($reg['username']);
			$reg['stts'] 		= "user";

			$this->masterlogin_model->insertData('tblogin',$reg);
			$this->masterlogin_model->insertData('tbuser',$simpan);
			?><?php
			{
				header('location:'.base_url().'auth/notif');
			}
			?><?php
		}
		else
		{
			header('location:'.base_url().'auth/register');
				$this->session->set_flashdata("daftar","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Gagal! Maaf anda gagal terdaftar. </div>");
		}
	}

	public function notif()
	{
		# Try running this locally.
		# Include the Autoloader (see "Libraries" for install instructions)
		require 'vendor/autoload.php';
		# Instantiate the client.
		$mgClient = new Mailgun('key-f51bd76886563efe679fd7b7b4d4e60a');
		$domain = "sandboxddfe7013154b4d528d2e8c711a50aa5d.mailgun.org";

		# Make the call to the client.
		$result = $mgClient->sendMessage("$domain",
		  array('from'    => 'Najih Da <postmaster@sandboxddfe7013154b4d528d2e8c711a50aa5d.mailgun.org>',
		        'to'      => 'Dilla <dillaalmakhzumi@gmail.com>',
		        'subject' => 'Hello Indigital',
		        'text'    => 'Selamat! Anda telah terdaftar. Kunungi halaman ini untuk melanjutkan verifikasi -> LINK'));

		$this->load->view('notifikasi');
	}
	
	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$this->masterlogin_model->getLoginData($u,$p);
	}

	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'');
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.base_url().'');
		}
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/login.php */

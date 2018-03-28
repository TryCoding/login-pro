<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -
	 * 		http://example.com/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  	public function index()
 	{
    	$cek = $this->session->userdata('logged_in'); $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
      		$bc['nama'] = $this->session->userdata('nama_admin');
			$this->load->view('dash_admin',$bc);
		}
		else { header('location:'.base_url().''); }
 	}
}

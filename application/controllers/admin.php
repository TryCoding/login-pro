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
	  public function __construct()
    {
        parent::__construct();
        $this->load->model('masterlogin_model', '', TRUE);
        $this->load->helper(array('form', 'url'));        
    }


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

	           
		public function Duser() 
	{

	   $df = array( 1 => 'nama_user', 2 => 'email_user');	   
	   $this->masterlogin_model->kabeh('tbuser',$df);

       $fetch_data = $this->masterlogin_model->make_datatables_user();
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->nama_user;
            $sub_array[] = $row->email_user;
            $sub_array[] = $row->hp_user;            
            $data[] = $sub_array;
       }
       $output = array(
            "draw" =>intval($_POST["draw"]),
            "recordsTotal"=>$this->masterlogin_model->get_all_data(),
            "recordsFiltered"=>$this->masterlogin_model->get_filtered_data_user(),
            "data"=>$data
       );
       echo json_encode($output);
	 }
}

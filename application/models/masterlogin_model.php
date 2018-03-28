<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Model untuk
*
* @package Siakad Najih
* @link http:www.najih.id
*/
class Masterlogin_model extends CI_Model {

	//model login user
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));

		$q_cek_login = $this->db->get_where('tblogin', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach ($q_cek_login->result() as $qck)
			{
				if($qck->stts=='user')
				{
					$q_ambil_data = $this->db->get_where('tbuser', array('id_user' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['id_user'] 	= $qad->id_user;
						$sess_data['nama_user'] = $qad->nama_user;
						$sess_data['email_user']= $qad->email_user;
						$sess_data['hp_user'] 	= $qad->hp_user;
						$sess_data['stts'] 		= 'user';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'user');
				}
				else if($qck->stts=='admin')
				{
					$q_ambil_data = $this->db->get_where('tbadmin', array('id_admin' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']		= 'yes';
						$sess_data['id_admin'] 		= $qad->id_admin;
						$sess_data['nama_admin']	= $qad->nama_admin;
						$sess_data['email_admin']	= $qad->email_admin;
						$sess_data['hp_admin']		= $qad->hp_admin;
						$sess_data['stts'] 			= 'admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				}
			}
		}
		else
		{
			header('location:'.base_url().'');
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible fade in" role="alert">Username atau Password salah..! </div>');
		}
	}

	//query untuk mengecek kode staf yang ada di dalam database
	function cekIdUserMax($id)
	{
		$q = $this->db->query("SELECT * from tbuser where id_user='".$id."'");
		$hasil = 0; if($q->num_rows()>0) {$hasil = 1;} return $hasil;
	}
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}


}

/* End of file web_app_model.php */
/* Location: ./application/model/web_app_model.php */

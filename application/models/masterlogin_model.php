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


  private $tab;
  private $da;


  public function kabeh($tab,$da)
  {
      $this->tab = $tab;
      $this->da = $da;   
  }

  public function get_tab() {
    return $this->tab;
  }

  public function get_da($no) {
   $all = $this->da;
   return $all[$no];
  }

  public function make_query_user()
    {
       $this->db->select('*');
       $this->db->from($this->get_tab());    

       if(isset($_POST["search"]["value"]))
       {
            $this->db->like($this->get_da(1), $_POST["search"]["value"]);
            $this->db->or_like($this->get_da(2), $_POST["search"]["value"]);
       }

       if(isset($_POST["order"]))
       {
            $this->db->order_by($this->get_da(1), $this->get_da(2)
              [$_POST['order']['0']['column']], 
              $_POST['order']['0']['dir']);
       }
       else
       {
            $this->db->order_by($this->get_da(1), 'ASC');
       }
    }

   public function make_datatables_user()
    {
         $this->make_query_user();
         if($_POST["length"] != -1)
         {
              $this->db->limit($_POST['length'], $_POST['start']);
         }
         $query = $this->db->get();
         return $query->result();
    }

   public function get_filtered_data_user()
    {
         $this->make_query_user();
         $query = $this->db->get();
         return $query->num_rows();
    }


     function get_all_data()
      {
           $this->db->select("*");
           $this->db->from($this->get_tab());
           return $this->db->count_all_results();
      }


}

/* End of file web_app_model.php */
/* Location: ./application/model/web_app_model.php */

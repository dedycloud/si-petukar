<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('m_karyawan');
		$this->load->database();
		$this->load->helper(array('form', 'url','directory','path'));	
 
	}

	public function secure(){
	    $this->session->set_userdata('redirect_url', current_url() );
	    if (!$this->ion_auth->logged_in())
	    {
	        redirect('auth/login', 'refresh');
	    }
	    if(!$this->ion_auth->in_group('karyawan') ) { 
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('Page404');
		}
	}
	
	public function index()
	{
		$this->secure();
		 $data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('dashboard');
		$this->load->view('footer');
		}

		public function tampil_task()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_tampil_tugas'] = $this->m_karyawan->tampil_task($id);
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('karyawan/v_tampil_tugas',$data);
		$this->load->view('footer');
		}

		public function detail($id_tugas = 0 ,$status = 0,$id_jenis = 0)
	{

		$this->secure();
		$createby = $this->session->userdata('user_id'); 
if ($status == 'waiting_accept'){
        $givenstatus = 'waiting_accept';}
        else if ($status == 'success'){
        $givenstatus = 'success';}
        else {
        $givenstatus = 'proccess';
        }
		$body = array(
			"status" =>  $givenstatus,
			"update_at" =>  date("Y-m-d h:i:s"),
			"update_by" =>  $createby
			);
		$this->m_karyawan->submit_task($body,$id_tugas,'tbl_tugas');

		$id = $this->session->userdata('user_id'); 
		$data['view_detail_tugas'] = $this->m_karyawan->detail_task($id, $id_tugas);
		$data['view_detail_modul'] = $this->m_karyawan->detail_modul($id, $id_tugas, $id_jenis);
		$data['id_jenis'] = $id_jenis;
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('karyawan/v_detail_tugas',$data);
		$this->load->view('footer');
		}

		public function submit_task()
	{
		$id_task = $this->input->post('id');

		$createby = $this->session->userdata('user_id'); 

		$data = array(
			"status" =>  "waiting_accept",
			"update_at" =>  date("Y-m-d h:i:s"),
			"update_by" =>  $createby
			);
		$this->m_karyawan->submit_task($data,$id_task,'tbl_tugas');
		redirect('karyawan/tampil_task');
		}
	}
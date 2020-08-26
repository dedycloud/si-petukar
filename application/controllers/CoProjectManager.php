<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coprojectmanager extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('m_coprojectmanager');
		$this->load->model('m_karyawan');
			$this->load->model('M_dashboard');
		$this->load->model('M_chart');
		$this->load->database();
		$this->load->helper(array('form', 'url','directory','path'));	
 
	}

	public function secure(){
	    $this->session->set_userdata('redirect_url', current_url() );
	    if (!$this->ion_auth->logged_in())
	    {
	        redirect('auth/login', 'refresh');
	    }
	    if(!$this->ion_auth->in_group('co_project_manager') ) { 
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('Page404');
		}
	}
	
	public function index()
	{
		$this->secure();
				$id = $this->session->userdata('user_id'); 

		$data['success'] = $this->M_dashboard->tampil_all_success_cpo($id);
		$data['reject'] = $this->M_dashboard->tampil_all_reject_cpo($id);
		$data['proccess'] = $this->M_dashboard->tampil_proccess_cpo($id);
		$data['revisi'] = $this->M_dashboard->tampil_all_revisi_Cpo($id);
		$data['charts'] = $this->M_chart->tampil_chart_admin();
		 $data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('dashboard');
				$this->load->view('chart.php',$data);

		$this->load->view('footer');
		}


	public function guide()
	{
		$this->secure();
		 $data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('guide');
		$this->load->view('footer');
		}

		public function tampil_task()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_tampil_tugas'] = $this->m_coprojectmanager->tampil_task($id);
		 $data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('co_pm/v_tampil_tugas',$data);
		$this->load->view('footer');
		}

		public function tampil_accept_task()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['accept_tugas'] = $this->m_coprojectmanager->tampil_accept_task($id);
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('co_pm/v_accept_tugas',$data);
		$this->load->view('footer');
		}

		public function detail_accept_task ($id_tugas = 0,$id_jenis = 0)
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_detail_tugas'] = $this->m_coprojectmanager->detail_accept_task($id, $id_tugas);
		$data['view_detail_modul'] = $this->m_coprojectmanager->detail_modul_task($id, $id_tugas, $id_jenis);
		$data['jenis'] = $id_jenis;
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('co_pm/v_detail_accept',$data);
		$this->load->view('footer');
		}

		public function accept_task()
	{
		$id_task = $this->input->post('id');

		$createby = $this->session->userdata('user_id'); 

		$data = array(
			"status" =>  "success",
			"update_at" =>  date("Y-m-d h:i:s"),
			"update_by" =>  $createby
			);
		$this->m_coprojectmanager->accept_task($data,$id_task,'tbl_tugas');
		redirect('Coprojectmanager/tampil_accept_task');
		}

		public function rejected_task()
	{
		$id_task = $this->input->post('id');
		$komentar = $this->input->post('Komentar');
		$createby = $this->session->userdata('user_id'); 

		$data = array(
			"status" =>  "failed",
			"update_at" =>  date("Y-m-d h:i:s"),
			"update_by" =>  $createby,
			"komentar" =>  $komentar

			);
		$this->m_coprojectmanager->rejected_task($data,$id_task,'tbl_tugas');
		redirect('Coprojectmanager/tampil_accept_task');
		}

		public function detailtugas($id_tugas = 0,$status = 0,$id_jenis = 0)
	{
		$this->secure();
		$createby = $this->session->userdata('user_id'); 
		if ($status == 'waiting_accept'){
        $givenstatus = 'waiting_accept';}
        else if ($status == 'success'){
        $givenstatus = 'success';}
          else if ($status == 'failed'){
        $givenstatus = 'failed';}
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
		$this->load->view('co_pm/v_detail_task',$data);
		$this->load->view('footer');
		}
	}
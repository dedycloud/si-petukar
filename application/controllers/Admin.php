<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('m_admin');
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
		if(!$this->ion_auth->in_group('admin') ) { 
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
				$id = $this->session->userdata('user_id'); 

			$data['allTask'] = $this->M_dashboard->tampil_all_task_admin();
		$data['taskSuccess'] = $this->M_dashboard->tampil_task_success_admin();
		$data['taskInProgress'] = $this->M_dashboard->tampil_task_inProgress_admin();
		$data['taskRejected'] = $this->M_dashboard->tampil_task_rejected_admin();
	$data['charts'] = $this->M_chart->tampil_chart_admin();

		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('dashboard', $data);
		$this->load->view('chart.php',$data);
		$this->load->view('footer');
	}

	public function tampil_user()
	{
		$this->secure();
		$data['view_user'] = $this->m_admin->tampil_data()->result();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/v_tampil_user',$data);
		$this->load->view('footer');
	}

	public function tampil_group()
	{
		$this->secure();
		$data['view_group'] = $this->m_admin->tampil_group()->result();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/v_tampil_group',$data);
		$this->load->view('footer');
	}

	public function tampil_list_bagian()
	{
		$this->secure();
		// masukin nama yang bakal dipanggil di view, masukin nama model, dan nama function nya 
		$data['view_list_bagian'] = $this->m_admin->tampil_list_bagian()->result();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		// nama folder nya, nama view
		$this->load->view('admin/v_tampil_bagian',$data);
		$this->load->view('footer');
	}
}
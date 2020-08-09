<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('M_dashboard');
		$this->load->model('M_chart');
		$this->load->helper(array('form', 'url','directory','path'));	
 
	}

	public function secure(){
	    $this->session->set_userdata('redirect_url', current_url() );
	    if (!$this->ion_auth->logged_in())
	    {
	        redirect('auth/login', 'refresh');
	    }
	}
	
	public function index()
	{
		$this->secure();
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group = $this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
			$id = $this->session->userdata('user_id'); 
		$data['allTask'] = $this->M_dashboard->tampil_all_task($id);
		$data['taskSuccess'] = $this->M_dashboard->tampil_task_success($id);
		$data['taskInProgress'] = $this->M_dashboard->tampil_task_inProgress($id);
		$data['taskRejected'] = $this->M_dashboard->tampil_task_rejected($id);
	$data['charts'] = $this->M_chart->tampil_chart($id);

		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('chart.php',$data);

		$this->load->view('footer');
		}
	}
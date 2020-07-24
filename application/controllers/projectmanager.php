<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projectmanager extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('m_projectmanager');
		$this->load->database();
		$this->load->helper(array('form', 'url','directory','path'));	
 
	}

	public function secure(){
	    $this->session->set_userdata('redirect_url', current_url() );
	    if (!$this->ion_auth->logged_in())
	    {
	        redirect('auth/login', 'refresh');
	    }
	    if(!$this->ion_auth->in_group('project_manager') ) { 
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

		public function tampil_create_task()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_tampil_tugas'] = $this->m_projectmanager->tampil_create_task($id);
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tampil_create_tugas',$data);
		$this->load->view('footer');
		}

		public function tampil_task()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_tampil_tugas'] = $this->m_projectmanager->tampil_task($id);
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tampil_tugas',$data);
		$this->load->view('footer');
		}

		public function tambahtugas()
	{
		$this->secure();
		$data['tujuan'] =$this->m_projectmanager->get_data_tujuan();
		$data['penyetuju'] =$this->m_projectmanager->get_data_penyetuju();
		$data['jenis'] =$this->m_projectmanager->get_data_jenis();
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tambah_tugas');
		$this->load->view('footer');
		}

		public function actiontambahtugas()
	{
		
		$tujuan = $this->input->post('tujuan');
		$penyetuju = $this->input->post('penyetuju');
		$jangka_waktu = $this->input->post('jangka_waktu');
		$judul_tugas = $this->input->post('judul_tugas');
		$deskripsi = $this->input->post('deskripsi');
		$createby = $this->session->userdata('user_id'); 

		$data = array(
			
			'id_tujuan' => $tujuan,
			'jangka_waktu' => $jangka_waktu,
			'judul_tugas' => $judul_tugas,
			'deskripsi_tugas' => $deskripsi,
			'id_jenis' => 1, 
			'status' => 'available',
			'id_penyetuju' => $penyetuju,
			"created_at" =>  date("Y-m-d h:i:s"),
			"created_by" =>  $createby
			);
		$this->m_projectmanager->input_data($data,'tbl_tugas');
		redirect('projectmanager/tampil_create_task');
		}

		public function detail_create_task($id_detail)
	{
		$this->secure();
		$data['view_detail_tugas'] = $this->m_projectmanager->detail_create_task($id_detail);
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_detail_tugas',$data);
		$this->load->view('footer');
		}

		public function edit_task($id_task)
	{
		$this->secure();

		$data['view_edit_tugas'] = $this->m_projectmanager->edit_task($id_task);
		$data['user'] = $this->ion_auth->user()->row();
	    $username=$data['user']->username;
	    $group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_edit_tugas',$data);
		$this->load->view('footer');
		}

		public function actionedittugas()
	{
		
		$tujuan = $this->input->post('tujuan');
		$penyetuju = $this->input->post('penyetuju');
		$jangka_waktu = $this->input->post('jangka_waktu');
		$judul_tugas = $this->input->post('judul_tugas');
		$deskripsi = $this->input->post('deskripsi');
		$updateby = $this->session->userdata('user_id'); 
		$id = $this->input->post('id');
		$data = array(
			
			'id_tujuan' => $tujuan,
			'jangka_waktu' => $jangka_waktu,
			'judul_tugas' => $judul_tugas,
			'deskripsi_tugas' => $deskripsi,
			'id_jenis' => 1,
			'id_penyetuju' => $penyetuju,

			"update_at" =>  date("Y-m-d h:i:s"),
			"update_by" =>  $updateby
			);
		$this->m_projectmanager->update_data($id,$data,'tbl_tugas');
		redirect('projectmanager/tampil_create_task');
		}

		public function hapus_task($id_task)
	{
		$this->secure();
		$this->m_projectmanager->hapus_data($id_task);
		redirect('projectmanager/tampil_create_task');

		}
	}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projectmanager extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('m_projectmanager');
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
		if(!$this->ion_auth->in_group('project_manager') ) { 
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('Page404');
		}
	}
	
	public function index()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['allTaskCreated'] = $this->M_dashboard->tampil_all_task_po($id);
		$data['taskModul'] = $this->M_dashboard->tampil_task_modul_po($id);
		$data['task'] = $this->M_dashboard->tampil_task_po($id);
		$data['AllModul'] = $this->M_dashboard->tampil_all_modul_po($id);
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

	public function tampil_modul()
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_tampil_divisi'] = $this->m_projectmanager->tampil_modul_by_divisi();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tampil_modul_parent',$data);
		$this->load->view('footer');
	}

	public function tampil_modul_child($divisi)
	{
		$this->secure();
		$id = $this->session->userdata('user_id'); 
		$data['view_tampil_modul'] = $this->m_projectmanager->tampil_all_modul_by_divisi($divisi);
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tampil_modul',$data);
		$this->load->view('footer');
	}

	public function tambahtugas()
	{
		$this->secure();
		$data['tujuan'] =$this->m_projectmanager->get_data_tujuan();
		$data['penyetuju'] =$this->m_projectmanager->get_data_penyetuju();
		$data['jenis'] =$this->m_projectmanager->get_data_jenis();
		$data['modul'] =$this->m_projectmanager->get_data_modul();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tambah_tugas',$data);
		$this->load->view('footer');
	}

	public function tambahtugas_bymodul()
	{
		$this->secure();

		$data['tujuan'] =$this->m_projectmanager->get_data_tujuan();
		$data['penyetuju'] =$this->m_projectmanager->get_data_penyetuju();
		$data['jenis'] =$this->m_projectmanager->get_data_jenis();
		$data['modul'] =$this->m_projectmanager->get_data_modul();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tambahtugas_modul',$data);
		$this->load->view('footer',$data);
	}

	public function tambahtugas_modul()
	{
		$this->secure();
		$data['divisi'] =$this->m_projectmanager->tampil_all_divisi();
		$data['modul'] =$this->m_projectmanager->get_data_modul();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_tambah_modul',$data);
		$this->load->view('footer',$data);
	}

	public function actiontambahtugas()
	{
		
		$tujuan = $this->input->post('tujuan');
		$penyetuju = $this->input->post('penyetuju');
		$jangka_waktu = $this->input->post('jangka_waktu');
		$judul_tugas = $this->input->post('judul_tugas');
		$deskripsi = $this->input->post('deskripsi');
		$jenis = $this->input->post('jenis');
		$createby = $this->session->userdata('user_id'); 

		$data = array(
			
			'id_tujuan' => $tujuan,
			'jangka_waktu' => $jangka_waktu,
			'judul_tugas' => $judul_tugas,
			'deskripsi_tugas' => $deskripsi,
			'id_jenis' => $jenis, 
			'status' => 'available',
			'id_penyetuju' => $penyetuju,
			"created_at" =>  date("Y-m-d h:i:s"),
			"created_by" =>  $createby
		);
		$this->m_projectmanager->input_data($data,'tbl_tugas');
		redirect('projectmanager/tampil_create_task');
	}


	public function actiontambahmodul()
	{
		
		$tujuan = $this->input->post('bagian');
		$nama = $this->input->post('judul_modul');
		$deskripsi = $this->input->post('deskripsi');


		$data = array(
			
			'divisi' => $tujuan,
			'nama' => $nama,
			'deskripsi' => $deskripsi,
		
		);
		$this->m_projectmanager->input_data($data,'tbl_modul');
		redirect('projectmanager/tampil_modul');
	}


	public function action_tambahtugas_modul()
	{
		//insert tugas
		$tujuan = $this->input->post('tujuan');
		$penyetuju = $this->input->post('penyetuju');
		$jangka_waktu = $this->input->post('jangka_waktu');
		$judul_tugas = $this->input->post('judul_tugas');
		$deskripsi = $this->input->post('deskripsi');
		$jenis = $this->input->post('jenis');
		$createby = $this->session->userdata('user_id'); 
	

		$data = array(
			
			'id_tujuan' => $tujuan,
			'jangka_waktu' => $jangka_waktu,
			'judul_tugas' => $judul_tugas,
			'deskripsi_tugas' => $deskripsi,
			'id_jenis' => $jenis, 
			'status' => 'available',
			'id_penyetuju' => $penyetuju,
			"created_at" =>  date("Y-m-d h:i:s"),
			"created_by" =>  $createby
		);
		$this->m_projectmanager->input_data($data,'tbl_tugas');

		$id_tugas= $this->m_projectmanager->select_id_by_judul($judul_tugas,$tujuan,$jenis);	
		//insert modul tugas
		 $insertModul = array();
		$index = 0; 
			$modul = $this->input->post('modul');
		foreach($modul as $datamodul){ 
			array_push($insertModul, array(
				'id_tugas'=>$id_tugas->id,
				'id_modul'=>$datamodul,  
				'status'=>'proccess',  
				'file'=> 'not add file',  
			));

			$index++;
		}
		$this->m_projectmanager->input_data_modul($insertModul,'tbl_modul_tugas');

		redirect('projectmanager/tampil_create_task');
	}

	public function detail_create_task($id_detail=0,$status = 0,$id_jenis = 0,$id_tujuan=0)
	{
		$this->secure();
		$data['view_detail_tugas'] = $this->m_projectmanager->detail_create_task($id_detail);
		$data['user'] = $this->ion_auth->user()->row();
		$data['id_jenis'] = $id_jenis;
		$data['status'] = $status;
		$data['view_detail_modul'] = $this->m_projectmanager->detail_modul($id_tujuan, $id_detail, $id_jenis);

		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_detail_tugas',$data);
		$this->load->view('footer');
	}

	public function edit_task($id_task )
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

	public function edit_modul($id_task =0,$divisi =0)
	{
		$this->secure();
		$data['divisi'] =$this->m_projectmanager->tampil_all_divisi();
		$data['view_edit_modul'] = $this->m_projectmanager->edit_modul($id_task,$divisi);
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('project_manager/v_edit_modul',$data);
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

	public function hapus_modul($id_task =0,$divisi = 0)
	{
		$this->secure();
		$this->m_projectmanager->hapus_modul($id_task,$divisi);
		redirect('projectmanager/tampil_modul');

	}
}
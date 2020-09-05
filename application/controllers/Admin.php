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

		public function detail_user($id)
	{
		$this->secure();
		// masukin nama yang bakal dipanggil di view, masukin nama model, dan nama function nya 
		$data['detail_user'] = $this->m_admin->tampil_detail_user($id)->result_array();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		// nama folder nya, nama view
		$this->load->view('admin/v_detail_user',$data);
		$this->load->view('footer');
	}
	public function hapus_groups($id)
	{
		$this->secure();
		$this->m_admin->hapus_groups($id);
				$this->session->set_flashdata('flashdatadelete', 'Data berhasil di hapus');

		redirect('admin/tampil_group');

	}

	public function tampil_tambah_group()
	{
		$this->secure();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/tambah_groups',$data);
		$this->load->view('footer');
	}

	public function tampil_tambah_user()
	{
		$this->secure();
		$data['groups'] = $this->m_admin->tampil_group()->result_array();

	$data['bagian'] = $this->m_admin->tampil_list_bagian()->result_array();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/tambah_user',$data);
		$this->load->view('footer');
	}
	public function tampil_tambah_bagian()
	{
		$this->secure();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/tambah_bagian',$data);
		$this->load->view('footer');
	}


		public function hapus_bagian($id)
	{
		$this->secure();
		$this->m_admin->hapus_bagian($id);
				$this->session->set_flashdata('flashdatadelete', 'Data berhasil di hapus');

		redirect('admin/tampil_list_bagian');

	}


	public function actiontambahgroups()
	{
		
		$nama = $this->input->post('nama_group');
		$deskripsi = $this->input->post('deskripsi');

		$data = array(
			'name' => $nama,
			'description' => $deskripsi,
		
		);
		$this->m_admin->save_data($data,'groups');
		$this->session->set_flashdata('flashdatatambah', 'Data berhasil di tambah');

		redirect('admin/tampil_group');
	}

	public function actiontambahbagian()
	{
		
		$nama = $this->input->post('nama_bagian');

		$data = array(
			'nama_bagian' => $nama		
		);
		$this->m_admin->save_data($data,'tbl_bagian');
		$this->session->set_flashdata('flashdatatambah', 'Data berhasil di tambah');
		redirect('admin/tampil_list_bagian');
	}
	public function actiontambahuser(){

			$groups = $this->input->post('group');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$id_bagian = $this->input->post('bagian');
			$email = $this->input->post('email');
			$additional_data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
			);
        $group = array($groups); // Set Group User.

        $this->ion_auth->register($username, $password, $email,$additional_data, $group);

		$row =$this->m_admin->chek_data_baru();
		$id =$row['id'];

       $data = array(
			'username' => $username,
			'id_bagian' => $id_bagian
		);
		$this->m_admin->update_data($id,$data,'users');
        redirect('admin/tampil_user');
	}

public function update()
{

	$groups = $this->input->post('group');
	$id = $this->input->post('id');

	$data = array(
                // 'nik' => $this->input->post('nik'),
		'username' => $this->input->post('username'),
		'email' => $this->input->post('email'),
		'id_bagian' => $this->input->post('bagian'),
		'first_name' => $this->input->post('firstname'),
		'last_name' => $this->input->post('lastname'),
	);
	$this->ion_auth->update($id, $data);
	$this->ion_auth->remove_from_group(false, $id);
	$this->ion_auth->add_to_group($groups, $id);
	redirect('admin/tampil_user');
}

public function tampil_edit_group($id)
	{
		$this->secure();
		 $data['groups'] = $this->m_admin->get_group_by_id($id);

		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/v_edit_groups',$data);
		$this->load->view('footer');
	}
	public function tampil_edit_bagian($id)
	{
		$this->secure();
		 $data['bagian'] = $this->m_admin->get_bagian_by_id($id);
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/v_edit_bagian',$data);
		$this->load->view('footer');
	}

	public function tampil_edit_user($id)
	{
		$this->secure();
		$data['users'] = $this->m_admin->get_users_by_id($id);
		$data['groups'] = $this->m_admin->tampil_group()->result_array();
		$data['bagian'] = $this->m_admin->tampil_list_bagian()->result_array();
		$data['user'] = $this->ion_auth->user()->row();
		$username=$data['user']->username;
		$group=$this->ion_auth->get_users_groups()->row()->id;
		$data['group']=$group;
		$this->load->view('header',$data);
		$this->load->view('navigation');
		$this->load->view('sidebar',$data);
		$this->load->view('admin/v_edit_users',$data);
		$this->load->view('footer');
	}

	public function actioneditgroup()
	{

		$name = $this->input->post('nama_group');
		$deskripsi = $this->input->post('deskripsi');
		// $updateby = $this->session->userdata('user_id'); 
		$id = $this->input->post('id');
		$data = array(

			'name' => $name,
			'description' => $deskripsi
		);
		$this->m_admin->update_data($id,$data,'groups');
		$this->session->set_flashdata('flashdatatambah', 'Data berhasil di update');

		redirect('admin/tampil_group');
	}

public function actioneditbagian()
	{

		$name = $this->input->post('nama_bagian');
		// $updateby = $this->session->userdata('user_id'); 
		$id = $this->input->post('id');
		$data = array(

			'nama_bagian' => $name
			);
		$this->m_admin->update_data($id,$data,'tbl_bagian');
		$this->session->set_flashdata('flashdatatambah', 'Data berhasil di update');

		redirect('admin/tampil_list_bagian');
	}


public function hapus($id)
{

	$this->ion_auth->delete_user($id);
	redirect('admin/tampil_user'); 
}
public function nonaktif($id)
{
	$this->m_admin->nonaktif($id);
	redirect('admin/tampil_user'); 
}
public function aktif($id)
{
	$this->m_admin->aktif($id);
	redirect('admin/tampil_user'); 
}


}
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
		$this->load->library('form_validation');
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

	public function tambahtugas_bymodul()
	{

		$this->form_validation->set_rules('judul_tugas','this','required');
		$this->form_validation->set_rules('tujuan','this','required');
		$this->form_validation->set_rules('penyetuju','this','required');
		$this->form_validation->set_rules('jangka_waktu','this','required');


		if($this->form_validation->run() === TRUE){
			
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
			// kirim email
			$url = site_url() . 'karyawan/tampil_task';  
			$link = '<a href="' . $url . '">' . 'see task ' . '</a>';   
			$data['user'] = $this->ion_auth->user()->row();
   		$namaemail = $this->m_projectmanager->get_email($tujuan);
			$username=$data['user']->username;
			$message = '';             
			$message .= '<strong> </strong><br>';  
                 //pesan

			$message .= '
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0;">
			<meta name="format-detection" content="telephone=no"/>

			<!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
			https://github.com/konsav/email-templates/  -->

			<style>
			/* Reset styles */ 
			body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
			body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
			table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
			img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
#outlook a { padding: 0; }
			.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

			/* Rounded corners for advanced mail clients only */ 
			@media all and (min-width: 560px) {
				.container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
			}

			/* Set color for auto links (addresses, dates, etc.) */ 
			a, a:hover {
				color: #127DB3;
			}
			.footer a, .footer a:hover {
				color: #999999;
			}

			</style>

			<!-- MESSAGE SUBJECT -->
			<title>TourInc</title>

			</head>

			<!-- BODY -->
			<!-- Set message background color (twice) and text color (twice) -->
			<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
			background-color: #F0F0F0;
			color: #000000;"
			bgcolor="#F0F0F0"
			text="#000000">

			<!-- SECTION / BACKGROUND -->
			<!-- Set message background color one again -->
			<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
			bgcolor="#F0F0F0">

			<!-- WRAPPER -->
			<!-- Set wrapper width (twice) -->
			<table border="0" cellpadding="0" cellspacing="0" align="center"
			width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
			max-width: 560px;" class="wrapper">

			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 20px;
			padding-bottom: 20px;">

			<!-- PREHEADER -->
			<!-- Set text color to background color -->
			<div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
			color: #F0F0F0;" class="preheader">
			Available on&nbsp;GitHub and&nbsp;CodePen. Highly compatible. Designer friendly. More than 50%&nbsp;of&nbsp;total email opens occurred on&nbsp;a&nbsp;mobile device&nbsp;— a&nbsp;mobile-friendly design is&nbsp;a&nbsp;must for&nbsp;email campaigns.</div>

			<a target="_blank" style="text-decoration: none;"
			href="https://github.com/konsav/email-templates/"><img border="0" vspace="0" hspace="0"
			src="https://raw.githubusercontent.com/konsav/email-templates/master/images/logo-black.png"
			width="100" height="30"
			alt="Logo" title="Logo" style="
			color: #000000;
			font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

			</td>
			</tr>

			<!-- End of WRAPPER -->
			</table>

			<!-- WRAPPER / CONTEINER -->
			<!-- Set conteiner background color -->
			<table border="0" cellpadding="0" cellspacing="0" align="center"
			bgcolor="#FFFFFF"
			width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
			max-width: 560px;" class="container">

			<!-- HEADER -->
			<!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
			padding-top: 25px;
			color: #000000;
			font-family: sans-serif;" class="header">

			</td>
			</tr>

			<!-- SUBHEADER -->
			<!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
			padding-top: 5px;
			color: #000000;
			font-family: sans-serif;" class="subheader">
			Tugas Baru
			</td>
			</tr>

			<!-- PARAGRAPH -->
			<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 25px; 
			color: #000000;
			font-family: sans-serif;" class="paragraph">
			Silakan klik link dibawah untuk melakukan melihat tugas kamu .
			</td>
			</tr>

			<!-- BUTTON -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;
			padding-bottom: 5px;" class="button">
			<table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
			bgcolor="#088A08"><a target="_blank" style="text-decoration: none;
			color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
			href=" ' . $url . '">
			lihat tugas 
			</a>
			</td></tr></table>
			</td>
			</tr>

			<!-- LINE -->
			<!-- Set line color -->
			<tr>    
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;" class="line"><hr
			color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
			</td>
			</tr>

			<!-- LIST -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;" class="list-item"><table align="center" border="0" cellspacing="0" cellpadding="0" style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">

			<!-- LIST ITEM -->
			</table></td>
			</tr>

			<!-- PARAGRAPH -->
			<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 20px;
			padding-bottom: 25px;
			color: #000000;
			font-family: sans-serif;" class="paragraph">
			Have a&nbsp;question? <a href="mailto:sekretariat@ptpn7.com" target="_blank" style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">sekretariat@ptpn7.com</a>
			</td>
			</tr>

			<!-- End of WRAPPER -->
			</table>

			<!-- WRAPPER -->
			<!-- Set wrapper width (twice) -->
			<table border="0" cellpadding="0" cellspacing="0" align="center"
			width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
			max-width: 560px;" class="wrapper">

			<!-- SOCIAL NETWORKS -->
			<!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;" class="social-icons"><table
			width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
			<tr>

			<!-- ICON 1 -->
			<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
			href="https://raw.githubusercontent.com/konsav/email-templates/"
			style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
			color: #000000;"
			alt="F" title="Facebook"
			width="44" height="44"
			src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>

			<!-- ICON 2 -->
			<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
			href="https://raw.githubusercontent.com/konsav/email-templates/"
			style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
			color: #000000;"
			alt="T" title="Twitter"
			width="44" height="44"
			src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>             

			<!-- ICON 3 -->
			<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
			href="https://raw.githubusercontent.com/konsav/email-templates/"
			style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
			color: #000000;"
			alt="G" title="Google Plus"
			width="44" height="44"
			src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>      

			<!-- ICON 4 -->
			<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
			href="https://raw.githubusercontent.com/konsav/email-templates/"
			style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
			color: #000000;"
			alt="I" title="Instagram"
			width="44" height="44"
			src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>

			</tr>
			</table>
			</td>
			</tr>

			<!-- FOOTER -->
			<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
			<tr>
			<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
			padding-top: 20px;
			padding-bottom: 20px;
			color: #999999;
			font-family: sans-serif;" class="footer">

			<a href="https://github.com/konsav/email-templates/" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">PT Surveyor Indonesia</a>
			<img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
			src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />

			</td>
			</tr>

			<!-- End of WRAPPER -->
			</table>

			<!-- End of SECTION / BACKGROUND -->
			</td></tr></table>

			</body>
			</html>
			' ;         

           //send to email
			$this->load->library('email');
			$config = Array(  
				'protocol' => 'smtp',  
				'smtp_host' => 'ssl://smtp.googlemail.com',  
				'smtp_port' => 465,  
				'smtp_user' => 'dedyindra120@gmail.com', 
				'smtp_pass' => 'xxxxxxxx',   
				'mailtype' => 'html',   
				'charset' => 'iso-8859-1'  
			);  
			$this->email->initialize($config);  

			$this->email->set_newline("\r\n");  
			$this->email->from('no-reply : ', 'Admin Ptpn7 ');   
			$this->email->to($namaemail->email);   
			$this->email->subject('Tugas Baru ');   
           $this->email->message( $message );  //amil pesan dari token
           if (!$this->email->send()) {  
            // show_error($this->email->print_debugger());   
           	$this->session->set_flashdata('takterkirim', 'email tidak terkrim / koneksi lambat');  

           	redirect('projectmanager/tampil_create_task'); 

           }else{  
           	echo 'Success to send email';
             $this->session->set_flashdata('flashdatatambah', 'Data berhasil di tambah');
           redirect('projectmanager/tampil_create_task');
           }  
           
			// end email

       }else{
       	$this->secure();

       	$data['tujuan'] =$this->m_projectmanager->get_data_tujuan();
       	$data['karyawan'] =$this->m_projectmanager->tampil_karyawan_baru();
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

   public function tambahtugas()
   {
   	$this->load->library('form_validation');

   	$this->form_validation->set_rules('judul_tugas','this','required');
   	$this->form_validation->set_rules('tujuan','this','required');
   	$this->form_validation->set_rules('penyetuju','this','required');
   	$this->form_validation->set_rules('jangka_waktu','this','required');


   	if($this->form_validation->run() === TRUE){

   		$tujuan = $this->input->post('tujuan');
   		$penyetuju = $this->input->post('penyetuju');
   		$jangka_waktu = $this->input->post('jangka_waktu');
   		$judul_tugas = $this->input->post('judul_tugas');
   		$deskripsi = $this->input->post('deskripsi');
   		$jenis = $this->input->post('jenis');
   		$createby = $this->session->userdata('user_id'); 
			// $this->form_validation->set_rules('judul_tugas','Judul','required');
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
			// kirim email to karyawan 
             //build token  
   		$namaemail = $this->m_projectmanager->get_email($tujuan);

   		$url = site_url() . 'karyawan/tampil_task';  
   		$link = '<a href="' . $url . '">' . 'see task ' . '</a>';   
   		$data['user'] = $this->ion_auth->user()->row();

   		$username=$data['user']->username;
   		$message = '';             
   		$message .= '<strong> </strong><br>';  
                 //pesan

   		$message .= '
   		<html xmlns="http://www.w3.org/1999/xhtml">
   		<head>
   		<meta http-equiv="content-type" content="text/html; charset=utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1.0;">
   		<meta name="format-detection" content="telephone=no"/>

   		<!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
   		https://github.com/konsav/email-templates/  -->

   		<style>
   		/* Reset styles */ 
   		body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
   		body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
   		table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
   		img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
#outlook a { padding: 0; }
   		.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
   		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

   		/* Rounded corners for advanced mail clients only */ 
   		@media all and (min-width: 560px) {
   			.container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
   		}

   		/* Set color for auto links (addresses, dates, etc.) */ 
   		a, a:hover {
   			color: #127DB3;
   		}
   		.footer a, .footer a:hover {
   			color: #999999;
   		}

   		</style>

   		<!-- MESSAGE SUBJECT -->
   		<title>TourInc</title>

   		</head>

   		<!-- BODY -->
   		<!-- Set message background color (twice) and text color (twice) -->
   		<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
   		background-color: #F0F0F0;
   		color: #000000;"
   		bgcolor="#F0F0F0"
   		text="#000000">

   		<!-- SECTION / BACKGROUND -->
   		<!-- Set message background color one again -->
   		<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
   		bgcolor="#F0F0F0">

   		<!-- WRAPPER -->
   		<!-- Set wrapper width (twice) -->
   		<table border="0" cellpadding="0" cellspacing="0" align="center"
   		width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
   		max-width: 560px;" class="wrapper">

   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
   		padding-top: 20px;
   		padding-bottom: 20px;">

   		<!-- PREHEADER -->
   		<!-- Set text color to background color -->
   		<div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
   		color: #F0F0F0;" class="preheader">
   		Available on&nbsp;GitHub and&nbsp;CodePen. Highly compatible. Designer friendly. More than 50%&nbsp;of&nbsp;total email opens occurred on&nbsp;a&nbsp;mobile device&nbsp;— a&nbsp;mobile-friendly design is&nbsp;a&nbsp;must for&nbsp;email campaigns.</div>

   		<a target="_blank" style="text-decoration: none;"
   		href="https://github.com/konsav/email-templates/"><img border="0" vspace="0" hspace="0"
   		src="https://raw.githubusercontent.com/konsav/email-templates/master/images/logo-black.png"
   		width="100" height="30"
   		alt="Logo" title="Logo" style="
   		color: #000000;
   		font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

   		</td>
   		</tr>

   		<!-- End of WRAPPER -->
   		</table>

   		<!-- WRAPPER / CONTEINER -->
   		<!-- Set conteiner background color -->
   		<table border="0" cellpadding="0" cellspacing="0" align="center"
   		bgcolor="#FFFFFF"
   		width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
   		max-width: 560px;" class="container">

   		<!-- HEADER -->
   		<!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
   		padding-top: 25px;
   		color: #000000;
   		font-family: sans-serif;" class="header">

   		</td>
   		</tr>

   		<!-- SUBHEADER -->
   		<!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
   		padding-top: 5px;
   		color: #000000;
   		font-family: sans-serif;" class="subheader">
   		Tugas Baru
   		</td>
   		</tr>

   		<!-- PARAGRAPH -->
   		<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
   		padding-top: 25px; 
   		color: #000000;
   		font-family: sans-serif;" class="paragraph">
   		Silakan klik link dibawah untuk melakukan melihat tugas kamu .
   		</td>
   		</tr>

   		<!-- BUTTON -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
   		padding-top: 25px;
   		padding-bottom: 5px;" class="button">
   		<table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
   		bgcolor="#088A08"><a target="_blank" style="text-decoration: none;
   		color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
   		href=" ' . $url . '">
   		lihat tugas 
   		</a>
   		</td></tr></table>
   		</td>
   		</tr>

   		<!-- LINE -->
   		<!-- Set line color -->
   		<tr>    
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
   		padding-top: 25px;" class="line"><hr
   		color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
   		</td>
   		</tr>

   		<!-- LIST -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;" class="list-item"><table align="center" border="0" cellspacing="0" cellpadding="0" style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">

   		<!-- LIST ITEM -->
   		</table></td>
   		</tr>

   		<!-- PARAGRAPH -->
   		<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
   		padding-top: 20px;
   		padding-bottom: 25px;
   		color: #000000;
   		font-family: sans-serif;" class="paragraph">
   		Have a&nbsp;question? <a href="mailto:sekretariat@ptpn7.com" target="_blank" style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">sekretariat@ptpn7.com</a>
   		</td>
   		</tr>

   		<!-- End of WRAPPER -->
   		</table>

   		<!-- WRAPPER -->
   		<!-- Set wrapper width (twice) -->
   		<table border="0" cellpadding="0" cellspacing="0" align="center"
   		width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
   		max-width: 560px;" class="wrapper">

   		<!-- SOCIAL NETWORKS -->
   		<!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
   		padding-top: 25px;" class="social-icons"><table
   		width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
   		<tr>

   		<!-- ICON 1 -->
   		<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
   		href="https://raw.githubusercontent.com/konsav/email-templates/"
   		style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
   		color: #000000;"
   		alt="F" title="Facebook"
   		width="44" height="44"
   		src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>

   		<!-- ICON 2 -->
   		<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
   		href="https://raw.githubusercontent.com/konsav/email-templates/"
   		style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
   		color: #000000;"
   		alt="T" title="Twitter"
   		width="44" height="44"
   		src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>             

   		<!-- ICON 3 -->
   		<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
   		href="https://raw.githubusercontent.com/konsav/email-templates/"
   		style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
   		color: #000000;"
   		alt="G" title="Google Plus"
   		width="44" height="44"
   		src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>      

   		<!-- ICON 4 -->
   		<td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
   		href="https://raw.githubusercontent.com/konsav/email-templates/"
   		style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
   		color: #000000;"
   		alt="I" title="Instagram"
   		width="44" height="44"
   		src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>

   		</tr>
   		</table>
   		</td>
   		</tr>

   		<!-- FOOTER -->
   		<!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
   		<tr>
   		<td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
   		padding-top: 20px;
   		padding-bottom: 20px;
   		color: #999999;
   		font-family: sans-serif;" class="footer">

   		<a href="https://github.com/konsav/email-templates/" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">PT Surveyor Indonesia</a>
   		<img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
   		src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />

   		</td>
   		</tr>

   		<!-- End of WRAPPER -->
   		</table>

   		<!-- End of SECTION / BACKGROUND -->
   		</td></tr></table>

   		</body>
   		</html>
   		' ;         

           //send to email
   		$this->load->library('email');
   		$config = Array(  
   			'protocol' => 'smtp',  
   			'smtp_host' => 'ssl://smtp.googlemail.com',  
   			'smtp_port' => 465,  
   			'smtp_user' => 'dedyindra120@gmail.com', 
   			'smtp_pass' => 'xxxxxxxx',   
   			'mailtype' => 'html',   
   			'charset' => 'iso-8859-1'  
   		);  
   		$this->email->initialize($config);  

   		$this->email->set_newline("\r\n");  
   		$this->email->from('no-reply : ', 'Admin Ptpn7 ');   
   		$this->email->to($namaemail->email);   
   		$this->email->subject('Tugas Baru');   
           $this->email->message( $message );  //amil pesan dari token
           if (!$this->email->send()) {  
            show_error($this->email->print_debugger());   
           	redirect('projectmanager/tampil_create_task'); 

           }else{  
           	echo 'Success to send email';
               // redirect(site_url('auth/Login'),'refresh'); 
           	   $this->session->set_flashdata('flashdatatambah', 'Data berhasil di tambah');
           redirect('projectmanager/tampil_create_task');
           }  
           
			// sampai sini kirim email

        
       }else{
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

   }


   public function actiontambahmodul()
   {

   	$tujuan = $this->input->post('bagian');
   	$nama = $this->input->post('judul_modul');
   	$deskripsi = $this->input->post('deskripsi');


   	$data = array(

   		'bagian' => $tujuan,
   		'nama' => $nama,
   		'deskripsi' => $deskripsi,

   	);
   	$this->m_projectmanager->input_data($data,'tbl_modul');
   	$this->session->set_flashdata('flashdatatambah', 'Data berhasil di tambah');

   	redirect('projectmanager/tampil_modul');
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
	$data['tujuan'] =$this->m_projectmanager->get_data_tujuan();
       	$data['penyetuju'] =$this->m_projectmanager->get_data_penyetuju();
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

  public function actioneditmodul()
   {

    	$tujuan = $this->input->post('bagian');
    	$id= $this->input->post('id');

   	$nama = $this->input->post('judul_modul');
   	$deskripsi = $this->input->post('deskripsi');


   	$data = array(

   		'bagian' => $tujuan,
   		'nama' => $nama,
   		'deskripsi' => $deskripsi,

   	);
   	$this->m_projectmanager->update_data($id,$data,'tbl_modul');
  	$this->session->set_flashdata('flashdatatambah', 'Data berhasil di tambah');

   	redirect('projectmanager/tampil_modul');
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
   	$this->session->set_flashdata('flashdatatambah', 'Data berhasil di update');

   	redirect('projectmanager/tampil_create_task');
   }

   public function hapus_task($id_task)
   {
   	$this->secure();
   	$this->m_projectmanager->hapus_data($id_task);
   	$this->session->set_flashdata('flashdatadelete', 'Data berhasil di hapus');

   	redirect('projectmanager/tampil_create_task');

   }

   public function hapus_modul($id_task =0,$divisi = 0)
   {
   	$this->secure();
   	$this->m_projectmanager->hapus_modul($id_task,$divisi);
   	$this->session->set_flashdata('flashdatadelete', 'Data berhasil di hapus');

   	redirect('projectmanager/tampil_modul');

   }
}
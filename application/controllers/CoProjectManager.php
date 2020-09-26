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
		// kirim email
		$url = site_url() . 'karyawan/tampil_task';  
		$link = '<a href="' . $url . '">' . 'see task ' . '</a>';   
		$data['user'] = $this->ion_auth->user()->row();
$tujuan = $this->input->post('tujuan');

		$namaemail= $this->m_coprojectmanager->get_email($tujuan);
	
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
		Tugas  telah di setujui 
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
			'smtp_pass' => '20121997',   
			'mailtype' => 'html',   
			'charset' => 'iso-8859-1'  
		);  
		$this->email->initialize($config);  

		$this->email->set_newline("\r\n");  
		$this->email->from('no-reply : ', 'Admin Ptpn7 ');   
		$this->email->to($namaemail->email );   
		$this->email->subject('Persetujuan tugas');   
           $this->email->message( $message );  //amil pesan dari token
           if (!$this->email->send()) {  
            // show_error($this->email->print_debugger());   
           	$this->session->set_flashdata('takterkirim', 'email tidak terkrim / koneksi lambat');  

           	redirect('Coprojectmanager/tampil_accept_task'); 

           }else{  
           	echo 'Success to send email';
          $this->session->set_flashdata('flashdataaccept', 'Tugas telah berhasil di verifikasi ');

           redirect('Coprojectmanager/tampil_accept_task'); 
           }  
           
		// end email


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
		// kirim email
       	$url = site_url() . 'karyawan/tampil_task';  
       	$link = '<a href="' . $url . '">' . 'see task ' . '</a>';   
       	$data['user'] = $this->ion_auth->user()->row();
       	$tujuan = $this->input->post('tujuan');
       	$namaemail= $this->m_coprojectmanager->get_email($tujuan);
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
       	Tugas di reject 
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
       		'smtp_pass' => '20121997',   
       		'mailtype' => 'html',   
       		'charset' => 'iso-8859-1'  
       	);  
       	$this->email->initialize($config);  

       	$this->email->set_newline("\r\n");  
       	$this->email->from('no-reply : ', 'Admin Ptpn7 ');   
       	$this->email->to($namaemail->email );   
       	$this->email->subject('verivikasi tugas');   
           $this->email->message( $message );  //amil pesan dari token
           if (!$this->email->send()) {  
            // show_error($this->email->print_debugger());   
           	$this->session->set_flashdata('takterkirim', 'email tidak terkrim / koneksi lambat');  

           	redirect('Coprojectmanager/tampil_accept_task'); 

           }else{  
           	echo 'Success to send email';
             $this->session->set_flashdata('flashdatareject', 'Tugas telah berhasil di reject ');
           redirect('Coprojectmanager/tampil_accept_task');   
           }  
           
		// end email

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
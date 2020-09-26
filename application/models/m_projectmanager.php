<?php 

class M_projectmanager extends CI_Model{
	function tampil_task($id){
		$sql="  SELECT a.*, b.username FROM tbl_tugas as a, users as b where a.id_tujuan = b.id and a.id_tujuan = '$id' and a.status NOT LIKE 'success'";

		$result = $this->db->query($sql);
		return $result->result();	
	}

	function tampil_modul_by_divisi(){
		$sql=" 	SELECT * FROM `tbl_modul`as a, tbl_bagian as b WHERE a.divisi = b.id GROUP BY a.divisi ";

		$result = $this->db->query($sql);
		return $result->result();	
	}

	function tampil_karyawan_baru(){
		$sql="SELECT m.username, p.nama_bagian FROM users as m ,groups as n, users_groups as o ,tbl_bagian as p  WHERE m.id = o.user_id and n.id =o.group_id and m.email NOT IN(SELECT c.email FROM users as c,tbl_tugas as a WHERE a.id_jenis ='2' AND c.id=a.id_tujuan group BY c.id ) and m.id_bagian = p.id and n.id = 3 GROUP BY m.id ";

		$result = $this->db->query($sql);
		return $result->result();	
	}

	
	function tampil_all_divisi(){
		$sql=" select * from tbl_bagian";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}
		function detail_modul($id, $id_tugas, $id_jenis){
	$sql=" select b.id_tugas as id_tugas, b.id as id, b.status as status, b.file as file , a.judul_tugas as modul ,c.deskripsi as detail_modul from tbl_tugas as a , tbl_modul_tugas as b, tbl_modul as c where a.id_jenis='$id_jenis' and a.id='$id_tugas' and a.id_tujuan ='$id' and a.id=b.id_tugas and  b.id_modul = c.id";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function tampil_all_modul_by_divisi($divisi){
		$sql=" SELECT *,a.id as id_divisi FROM `tbl_modul`as a, tbl_bagian as b WHERE a.divisi = b.id and a.divisi = '$divisi'";

		$result = $this->db->query($sql);
		return $result->result();	
	}



	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function input_data_modul($data,$table){
		$this->db->insert_batch($table,$data);
	}

	function select_id_by_judul($judul,$tujuan,$jenis){
			$sql="SELECT id FROM `tbl_tugas` WHERE judul_tugas = '$judul'and id_tujuan = '$tujuan'  and id_jenis = $jenis and status = 'available'";

		$result = $this->db->query($sql);
		return $result->row();
	}

	function get_email($username){
			$sql="SELECT email FROM `users` WHERE id = '$username' limit 1";
		$result = $this->db->query($sql);
		return $result->row();
	}



	function detail_create_task($id_detail){
		$sql=" SELECT m.*,n.username as penyetuju FROM ( SELECT a.* ,b.username as tujuan FROM (SELECT a.*, b.username as dibuat FROM tbl_tugas as a, users as b where a.created_by = b.id) as a, users as b WHERE a.id_tujuan = b.id) as m, users as n WHERE m.id_penyetuju = n.id and m.id = '$id_detail'";

		$result = $this->db->query($sql);
		return $result->result_array();
	}

	function edit_task($id_task){
		$sql=" select * from tbl_tugas where id = '$id_task'";

		$result = $this->db->query($sql);
		return $result->result_array();
	}

	function edit_modul($id_task,$divisi){
		$sql=" select * from tbl_modul where id = '$id_task' and divisi = $divisi";

		$result = $this->db->query($sql);
		return $result->result_array();
	}

	function update_data($id_task, $data, $table){

		$this->db->where('id', $id_task);
		$this->db->update($table, $data);

	}

	function hapus_data($id_task){

		$sql="delete from tbl_tugas where id=$id_task";
		$result = $this->db->query($sql);
		return $result;

	}
	function hapus_modul($id_task,$divisi){

		$sql="delete from tbl_modul where id=$id_task and divisi = $divisi";
		$result = $this->db->query($sql);
		return $result;

	}
	function tampil_create_task($id){
		$sql=" SELECT m.*,n.username as penyetuju FROM ( SELECT a.* ,b.username as tujuan FROM (SELECT a.*, b.username as dibuat FROM tbl_tugas as a, users as b where a.created_by = b.id) as a, users as b WHERE a.id_tujuan = b.id) as m, users as n WHERE m.id_penyetuju = n.id and m.created_by = '$id'  ORDER BY m.id DESC";

		$result = $this->db->query($sql);
		return $result->result();	
	}
	
	function get_data_tujuan(){
		$sql=" select a.username, a.id from users as a, users_groups as b , groups as c where a. id = b.user_id and b.group_id = c.id and c.id = 3";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}
	
	function get_data_penyetuju(){
		$sql=" select a.username, a.id from users as a, users_groups as b , groups as c where a. id = b.user_id and b.group_id = c.id and c.id = 4";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function get_data_jenis(){
		$sql=" select * from tbl_jenis_tugas ";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function get_data_modul(){
		$sql=" select * from tbl_modul ";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}
}

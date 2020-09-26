<?php 
 
class M_coprojectmanager extends CI_Model{
	function tampil_task($id){
		$sql="  SELECT a.*, b.username FROM tbl_tugas as a, users as b where a.id_tujuan = b.id and a.id_tujuan = '$id' and a.status NOT LIKE 'success' ";

		$result = $this->db->query($sql);
		return $result->result();	
	}

	function tampil_accept_task($id){
		$sql="  SELECT o.*,p.username as dibuat FROM (SELECT m.* ,n.username as tujuan FROM (select a.* ,b.username as penyetuju from tbl_tugas as a,users as b WHERE a.id_penyetuju = b.id) as m, users as n WHERE m.id_tujuan = n.id) as o , users as p WHERE o.created_by = p.id and o.id_penyetuju = '$id' ORDER BY o.status = 'waiting_accept' DESC, o.status = 'proccess' DESC, o.status = 'available' DESC,o.status = 'failed' DESC";

		$result = $this->db->query($sql);
		return $result->result();	
	}
	
	function detail_accept_task($id, $id_tugas){
	$sql=" SELECT o.*,p.username as dibuat FROM (SELECT m.* ,n.username as tujuan FROM (select a.* ,b.username as penyetuju from tbl_tugas as a,users as b WHERE a.id_penyetuju = b.id) as m, users as n WHERE m.id_tujuan = n.id) as o , users as p WHERE o.created_by = p.id and o.id='$id_tugas' and o.id_penyetuju = '$id'";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function detail_modul_task($id, $id_tugas, $id_jenis){
	$sql=" select b.id as id,b.file, b.status as status , a.judul_tugas as modul ,c.deskripsi as detail_modul from tbl_tugas as a , tbl_modul_tugas as b, tbl_modul as c where a.id_jenis='$id_jenis' and a.id='$id_tugas' and a.id_penyetuju ='$id' and a.id=b.id_tugas and  b.id_modul = c.id";
		$result = $this->db->query($sql);
		return $result->result_array();	
	}
		function get_email($username){
			$sql="SELECT email FROM `users` WHERE id = '$username' limit 1";
		$result = $this->db->query($sql);
		return $result->row();
	}


	function accept_task($data, $id_task, $table){
	
	$this->db->where('id', $id_task);
    $this->db->update($table, $data);
	}

	function rejected_task($data, $id_task, $table){
	
	$this->db->where('id', $id_task);
    $this->db->update($table, $data);
	}
}
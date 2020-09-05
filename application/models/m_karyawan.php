<?php 
 
class M_karyawan extends CI_Model{
	function tampil_task($id){
	$sql=" SELECT a.*, b.username ,c.jenis_tugas FROM tbl_tugas as a, users as b ,tbl_jenis_tugas as c where a.id_tujuan = b.id and a.id_tujuan = '$id' and a.status NOT LIKE 'success' and a.id_jenis = c.id  ORDER BY a.id DESC";
		$result = $this->db->query($sql);
		return $result->result();	
	}

function tampil_history_task($id){
	$sql=" SELECT a.*, b.username FROM history_tugas as a, users as b where a.tujuan = b.id and a.tujuan = '$id' and a.status_success NOT LIKE '' or a.status_revisi NOT LIKE '' ";
		$result = $this->db->query($sql);
		return $result->result();	
	}
	function tampil_history_success($id_tugas){
	$sql=" SELECT *, c.username FROM `history_tugas` as a,tbl_jenis_tugas as b, users as c WHERE a.id = '$id_tugas' AND a.status_success = 'success' AND a.id_jenis = b.id AND a.tujuan =c.id";
		$result = $this->db->query($sql);
		return $result->result();	
	}

	function detail_task($id, $id_tugas){
	$sql=" SELECT a.*, b.username, c.jenis_tugas FROM tbl_tugas as a, users as b, tbl_jenis_tugas as c where a.id_jenis = c.id and a.id_tujuan = b.id and a.id ='$id_tugas' and a.id_tujuan = '$id'";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

function check_task_modul($tugas){
			$sql="SELECT COUNT(*) as jmlh FROM `tbl_modul_tugas` WHERE id_tugas = '$tugas' AND file = 'not add file '";
		$result = $this->db->query($sql);
		return $result->row();
	}
	function detail_modul($id, $id_tugas, $id_jenis){
	$sql=" select b.id_tugas as id_tugas, b.id as id, b.status as status, b.file as file , a.judul_tugas as modul ,c.deskripsi as detail_modul from tbl_tugas as a , tbl_modul_tugas as b, tbl_modul as c where a.id_jenis='$id_jenis' and a.id='$id_tugas' and a.id_tujuan ='$id' and a.id=b.id_tugas and  b.id_modul = c.id";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function submit_task($data, $id_task, $table){
	$this->db->where('id', $id_task);
   $this->db->update($table, $data);
	}

	function update_modul_task($data, $id_modul, $table){
	$this->db->where('id', $id_modul);
   $this->db->update($table, $data);
	}
}
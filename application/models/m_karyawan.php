<?php 
 
class M_karyawan extends CI_Model{
	function tampil_task($id){
	$sql=" SELECT a.*, b.username FROM tbl_tugas as a, users as b where a.id_tujuan = b.id and a.id_tujuan = '$id'";
		$result = $this->db->query($sql);
		return $result->result();	
	}

	function detail_task($id, $id_tugas){
	$sql=" SELECT a.*, b.username, c.jenis_tugas FROM tbl_tugas as a, users as b, tbl_jenis_tugas as c where a.id_jenis = c.id and a.id_tujuan = b.id and a.id ='$id_tugas' and a.id_tujuan = '$id'";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function detail_modul($id, $id_tugas, $id_jenis){
	$sql=" select b.id as id, b.status as status , a.judul_tugas as modul ,c.deskripsi as detail_modul from tbl_tugas as a , tbl_modul_tugas as b, tbl_modul as c where a.id_jenis='$id_jenis' and a.id='$id_tugas' and a.id_tujuan ='$id' and a.id=b.id_tugas and  b.id_modul = c.id";

		$result = $this->db->query($sql);
		return $result->result_array();	
	}

	function submit_task($data, $id_task, $table){
// 			print_r($data);
// 				print_r('-----------');
// 					print_r($id_task);
// 						print_r($table
// 					);
// die();
	$this->db->where('id', $id_task);
   $this->db->update($table, $data);
	}
}
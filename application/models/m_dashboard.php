<?php 

class M_dashboard extends CI_Model{
	function tampil_all_task($id){
		$sql=" SELECT COUNT(*) as allTask FROM `tbl_tugas` where id_tujuan = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

	function tampil_task_success($id){
		$sql=" SELECT COUNT(*) as taskSuccess FROM `tbl_tugas` WHERE status LIKE 'success' and id_tujuan = '$id' ";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_task_inProgress($id){
		$sql=" SELECT COUNT(*) as taskInProgress FROM `tbl_tugas` WHERE status NOT LIKE 'success' and status NOT LIKE 'failed' and id_tujuan = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_task_rejected($id){
		$sql=" SELECT COUNT(*) as taskRejected FROM `tbl_tugas` WHERE status LIKE 'failed'and id_tujuan = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}


function tampil_all_task_admin(){
		$sql=" SELECT COUNT(*) as allTask FROM `tbl_tugas`";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

	function tampil_task_success_admin(){
		$sql=" SELECT COUNT(*) as taskSuccess FROM `tbl_tugas` WHERE status LIKE 'success' ";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_task_inProgress_admin(){
		$sql=" SELECT COUNT(*) as taskInProgress FROM `tbl_tugas` WHERE status NOT LIKE 'success' and status NOT LIKE 'failed'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_task_rejected_admin(){
		$sql=" SELECT COUNT(*) as taskRejected FROM `tbl_tugas` WHERE status LIKE 'failed'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}




	function tampil_all_task_po($id){
		$sql=" SELECT COUNT(*) as allTask FROM `tbl_tugas` where created_by = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

	function tampil_task_modul_po($id){
		$sql="SELECT COUNT(*) as taskModul FROM `tbl_tugas` WHERE id_jenis = '2' and created_by = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_task_po($id){
		$sql="SELECT COUNT(*) as task FROM `tbl_tugas` WHERE id_jenis = '1' and created_by = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_all_modul_po(){
		$sql=" SELECT COUNT(*) as allModul FROM `tbl_modul` ";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}





	function tampil_all_success_cpo($id){
		$sql=" SELECT COUNT(*) as success FROM `tbl_tugas` where id_penyetuju = '$id' and status LIKE 'success'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

	function tampil_all_reject_cpo($id){
		$sql="SELECT COUNT(*) as reject FROM `tbl_tugas` WHERE id_penyetuju = '$id' and status LIKE 'failed'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_proccess_cpo($id){
		$sql="SELECT COUNT(*) as proccess FROM `tbl_tugas` WHERE id_penyetuju = '$id' and status LIKE 'proccess'";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}

		function tampil_all_revisi_Cpo($id){
		$sql=" SELECT COUNT(*) as revisi FROM `tbl_tugas` WHERE id_penyetuju = '$id' and status LIKE 'revisi' ";
		$result = $this->db->query($sql);
		return $result->row_array();	
	}


}
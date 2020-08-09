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


}
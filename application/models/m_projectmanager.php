<?php 
 
class M_projectmanager extends CI_Model{
	function tampil_task($id){
	$sql=" select * from tbl_tugas where id_tujuan = '$id'";

		$result = $this->db->query($sql);
		return $result->result();	
		}
		function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function detail_create_task($id_detail){
	$sql=" select * from tbl_tugas where id = '$id_detail'";

		$result = $this->db->query($sql);
		return $result->result_array();
	}

	function edit_task($id_task){
	$sql=" select * from tbl_tugas where id = '$id_task'";

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
	function tampil_create_task($id){
	$sql=" SELECT a.*, b.username FROM tbl_tugas as a, users as b where a.created_by = b.id and a.created_by = '$id'";

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
}
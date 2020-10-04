<?php 
 
class M_admin extends CI_Model{
	function tampil_data(){
		// return $this->db->get('users');
			$sql=" SELECT * ,a.id as id_user from users as a, tbl_bagian as b where a.id_bagian = b.id ";
		$result = $this->db->query($sql);
		return $result;	
	
	}
	function tampil_detail_user($id){
		// return $this->db->get('users');
			$sql=" SELECT * from users as a, tbl_bagian as b where a.id_bagian = b.id and a.id = '$id'";
		$result = $this->db->query($sql);
		return $result;	
	
	}
	function chek_data_baru(){
		// return $this->db->get('users');
			$sql=" SELECT * FROM `users`  ORDER BY id DESC limit 1";
		$result = $this->db->query($sql);
		return $result->row_array();	
	
	}

	function tampil_group(){
		return $this->db->get('groups');
	}

	function tampil_list_bagian(){
		return $this->db->get('tbl_bagian');
	}

	function get_bagian_by_id($id){
		$sql=" SELECT * from tbl_bagian where id = '$id'";
		$result = $this->db->query($sql);
		return $result->result();	
	}
	function get_group_by_id($id){
		$sql="SELECT * from groups where id = '$id'";
		$result = $this->db->query($sql);
		return $result->result();	
	}

	function get_users_by_id($id){
		$sql="SELECT a.*,b.group_id from users as a, users_groups as b where a.id = '$id' and a.id= b.user_id limit 1";
		$result = $this->db->query($sql);
		return $result->result();	
	}


	function hapus_groups($id){
		$sql="delete from groups where id=$id ";
		$result = $this->db->query($sql);
		return $result;
	}
		function hapus_Bagian($id){
		$sql="delete from tbl_bagian where id=$id ";
		$result = $this->db->query($sql);
		return $result;
	}

	function save_data($data,$table){
		$this->db->insert($table,$data);
	}


	function update_data( $id,$data, $table){
	$this->db->where('id', $id);
   $this->db->update($table, $data);
	}

	public function nonaktif($id)
   {
   // date_default_timezone_set('Asia/Jakarta');
    $data = [
        "active" => 0
   ];

   $this->db->where('id', $id);
   $this->db->update('users', $data);
}
public function aktif($id)
   {
   // date_default_timezone_set('Asia/Jakarta');
    $data = [
        "active" => 1
   ];

   $this->db->where('id', $id);
   $this->db->update('users', $data);
}
}
<?php 
 
class M_admin extends CI_Model{
	function tampil_data(){
		return $this->db->get('users');
	}

	function tampil_group(){
		return $this->db->get('groups');
	}

	function tampil_list_bagian(){
		return $this->db->get('tbl_bagian');
	}
}
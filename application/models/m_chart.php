<?php 

class M_chart extends CI_Model{
	function tampil_chart($id){
		$sql="SELECT monthname(jangka_waktu) as bulan,if(status ='success',sum(status = 'success'),sum(status = 'success')) as success ,if(status !='success',sum(status  !='success'),sum(status  !='success')) as work from tbl_tugas where id_tujuan = '$id' and YEAR(jangka_waktu)=YEAR(NOW()) group by month(jangka_waktu) order by month(jangka_waktu)";
		$result = $this->db->query($sql);
		return $result->result();	
	}


	function tampil_chart_Admin(){
		$sql="SELECT monthname(jangka_waktu) as bulan,if(status ='success',sum(status = 'success'),sum(status = 'success')) as success ,if(status !='success',sum(status  !='success'),sum(status  !='success')) as work from tbl_tugas  where YEAR(jangka_waktu)=YEAR(NOW()) group by month(jangka_waktu) order by month(jangka_waktu)";
		$result = $this->db->query($sql);
		return $result->result();	
	}




}
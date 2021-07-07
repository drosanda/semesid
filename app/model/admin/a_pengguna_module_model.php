<?php
//admin
class A_Pengguna_Module_Model extends Sene_Model {
	var $tbl="a_pengguna_module";
	var $tbl_as = "apm";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getUserModules($a_pengguna_id){
		$sql = "SELECT *, COALESCE(`a_modules_identifier`,'') AS module FROM $this->tbl WHERE `a_pengguna_id` = ".$this->db->esc($a_pengguna_id)." ORDER BY a_modules_identifier ASC";
		return $this->db->query($sql);
	}
}

<?php
//admin
class A_Pengguna_Model extends Sene_Model {
	var $tbl = 'a_pengguna';
	var $tbl_as = 'ap';

	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function auth($username){
		$this->db
			->select("*")
      ->where_as("username",$this->db->esc($username),'OR','=',1,0)
			->where_as("email",$this->db->esc($username),'OR','=',0,1);
		return $this->db->get_first('',0); //
	}
	public function update($id,$du){
		$this->db->where('id',$id);
		return $this->db->update($this->tbl,$du);
	}
}

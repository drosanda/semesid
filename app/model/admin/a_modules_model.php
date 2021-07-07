<?php
//admin
class A_Modules_Model extends Sene_Model {
	var $tbl = 'a_modules';
	var $tbl_as = 'amod';

	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
  public function getAllParent(){
    $sql="SELECT * FROM `$this->tbl` WHERE `is_visible` = 1 AND `children_identifier` IS NULL ORDER BY priority ASC, `has_submenu` ASC";
		return $this->db->query($sql);
  }
  public function getChild($children_identifier){
    $sql="SELECT * FROM `$this->tbl` WHERE `is_visible` = 1 AND `children_identifier` LIKE ".$this->db->esc($children_identifier)." ORDER BY priority ASC, `has_submenu` ASC";
    return $this->db->query($sql);
  }
}

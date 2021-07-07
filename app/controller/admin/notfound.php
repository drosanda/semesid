<?php
class Notfound extends JI_Controller{
	public function __constructx(){
    parent::__construct();
		$this->setTheme('admin');
		die('notfound admin');
	}
	public function index(){
		$data = $this->__init();
		$this->setTheme('admin');
		header("HTTP/1.0 404 Not Found");

    $this->setTitle("Tidak ditemukan".$this->config->semevar->site_suffix_admin);
		$this->loadLayout("notfound",$data);
		$this->render();
	}
}

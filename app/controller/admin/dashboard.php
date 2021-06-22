<?php
class Dashboard extends SENE_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
	}
	public function index(){
		$data = array();
		$this->setTitle('Selamat datang di '.$this->config->semevar->site_name);
		$this->setDescription($this->config->semevar->site_name.' merupakan aplikasi berbasis web untuk melakukan tanya jawab seputar pertanyaan sehari-hari');
		$this->setKeyword($this->config->semevar->site_name);
		$this->putThemeContent("dashboard/home",$data);
		$this->putJsContent("dashboard/home_bottom",$data);
		$this->loadLayout("col-1",$data);
		$this->render();
	}
}

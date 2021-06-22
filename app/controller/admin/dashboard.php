<?php
class Dashboard extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'),0);
			return;
		}
		$this->setTitle('Dashboard '.$this->config->semevar->site_suffix_admin);

		$this->putThemeContent("dashboard/home",$data);
		$this->putJsContent("dashboard/home_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
}

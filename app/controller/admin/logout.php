<?php
class Logout extends JI_Controller{
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
	}
	public function index(){
		$data = $this->__init();
		if(isset($data['sess']->admin->id)){
			$sess = $data['sess'];
			$sess->admin = new stdClass();
			$this->login_admin = 0;
			$this->setKey($sess);
		}
		flush();
		redir(base_url_admin("login"),0,1);
	}

}

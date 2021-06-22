<?php
class Login extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->load("admin/a_pengguna_model","apm");
		$this->load("admin/a_pengguna_module_model","apmm");
		$this->load("admin/a_modules_model","amod");
	}

  private function __passGen($password){
		$password = preg_replace('/[^a-zA-Z0-9]/', '', $password);;
    return password_hash($password, PASSWORD_DEFAULT);
  }
  private function __passClear($password){
    return preg_replace('/[^a-zA-Z0-9]/', '', $password);
  }

	public function index(){
		$data = $this->__init();
		if($this->admin_login){
			redir(base_url_admin(),0);
			return;
		}
		$this->setTitle('Selamat datang di '.$this->config->semevar->site_name);
		$this->setDescription($this->config->semevar->site_name.' merupakan aplikasi berbasis web untuk melakukan tanya jawab seputar pertanyaan sehari-hari');
		$this->setKeyword($this->config->semevar->site_name);
		$this->putThemeContent("login/home",$data);
		$this->putJsContent("login/home_bottom",$data);
		$this->loadLayout("login",$data);
		$this->render();
	}
	public function proses(){
		$data = $this->__init();
		$data['reff'] = '';
		if(isset($_SERVER['HTTP_REFERER'])){
			$allowed_host = ($_SERVER['HTTP_HOST']);
			$host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
			if(substr($host, 0 - strlen($allowed_host)) == $allowed_host) {
				$data['reff'] = str_replace("/logout"," ",$_SERVER['HTTP_REFERER']);
			}
		}
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		if(strlen($username)>3 && strlen($password)>3){
			$res = $this->apm->auth($username);
			if(isset($res->id)){
				if(empty($res->is_active)){
					$data['pesan_info'] = 'Akun anda telah dinonaktifkan';

					$this->setTitle('Login '.$this->config->semevar->site_suffix_admin);
					$this->putThemeContent("login/home",$data);
					$this->putJsContent('login/home_bottom',$data);
					$this->loadLayout('col-1',$data);
					$this->render();
					return;
				}

				//check password
				$pv1 = 1;
				$pv2 = 1;
				if(md5($password) != $res->password){
					$pv1=0;
				}
				if(!password_verify($password,$res->password)){
					$pv2=0;
				}
				if(empty($pv1) && empty($pv2)){
					$data['pesan_info'] = 'Kombinasi username atau password tidak cocok';
					$this->putThemeContent("login/home",$data);
					$this->putJsContent('login/home_bottom',$data);
					$this->loadLayout('col-1',$data);
					$this->render();
					return;
				}

				//upgrade password encryption
				if(!empty($pv1) && empty($pv2)){
					$this->apm->update($res->id, array("password"=>$this->__passGen($password)));
				}

				$sess = $data['sess'];
				if(!is_object($sess)) $sess = new stdClass();
				if(!isset($sess->admin)) $sess->admin = new stdClass();
				$sess->admin = $res;
				$sess->admin->modules = $this->apmm->getUserModules($res->id);
				$sess->admin->menus = new stdClass();
				$sess->admin->menus->left = array();

				//get modules
				$modules = $this->amod->getAllParent();
				foreach($modules as &$module){
					$childs = $this->amod->getChild($module->identifier);
					$mos = array();
					if(count($childs)>0){
						foreach($sess->admin->modules as $m){
							foreach($childs as $cs){
								if(empty($m->module) && strtolower($m->rule)=="allowed_except"){
									$mos[] = $cs;
								}else if(($cs->identifier == $m->module) && (strtolower($m->rule)=="allowed")){
									$mos[] = $cs;
								}
							}
						}
					}
					$module->childs = $mos;
				}
				unset($module);

				//set module to session
				$allowed_all = 0;
				foreach($modules as $mo){
					foreach($sess->admin->modules as $m){
						if(empty($m->module) && strtolower($m->rule)=="allowed_except"){
							$allowed_all = 1;
							break;
						}else if(($m->module==$mo->identifier) && (strtolower($m->rule)=="allowed")){
							$sess->admin->menus->left[$mo->identifier] = $mo;
						}
					}
					unset($m);
					if($allowed_all){
						$sess->admin->menus->left[$mo->identifier] = $mo;
					}
				}
				unset($mo);

				$this->setKey($sess);

				$reff = $this->input->request('reff');
				if(strlen($reff)>10){
					redir($reff);
				}else{
					redir(base_url_admin());
				}
				return;
			}else{
				$data['pesan_info'] = '<b>Gagal</b> Username atau password salah';
			}
		}else{
			$data['pesan_info'] = '<b>Gagal</b> Username atau password salah';
		}

		$this->setTitle('Login '.$this->config->semevar->site_suffix_admin);
		$this->putThemeContent("login/home",$data);
		$this->putJsContent('login/home_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
}

<?php
/**
* Main controller: contains about methods and protperties that automtically included after extending in a class
*/
class JI_Controller extends SENE_Controller
{
  public $status = 404;
  public $message = 'Notfound';
  public $user_login = 0;
  public $admin_login = 0;

  public function __construct()
  {
    parent::__construct();
    $this->user_login = 0;
    $this->admin_login = 0;
    $this->status = 404;
    $this->message = 'Notfound';
  }

  public function __init()
  {
    $data = array();
    $sess = $this->getKey();
    if (!is_object($sess)) {
      $sess = new stdClass();
    }
    if (!isset($sess->user)) {
      $sess->user = new stdClass();
    }
    if (isset($sess->user->id)) {
      $this->user_login = 1;
    }

    if (!isset($sess->admin)) {
      $sess->admin = new stdClass();
    }
    if (isset($sess->admin->id)) {
      $this->admin_login = 1;
    }

    $data['sess'] = $sess;
    $data['produk_kategori'] = array();
    return $data;
  }

  /**
  * Output the json formatted string
  * @param  mixed     $dt     input object or array
  * @return string            sting json formatted with its header
  */
  public function __json_out($dt)
  {
    $this->lib('sene_json_engine', 'sene_json');
    $data = array();
    if (isset($_SERVER['SEME_MEMORY_VERBOSE'])) {
      $data["memory"] = round(memory_get_usage()/1024/1024, 5)." MBytes";
    }
    $data["status"]  = (int) $this->status;
    $data["message"] = $this->message;
    $data["data"]  = $dt;
    $this->sene_json->out($data);
    return true;
  }

  /**
  * Abstract layer for bootstraping class or onboarding class
  *   this is *required*
  * @return mixed server respose output
  */
  public function index()
  {
  }
}

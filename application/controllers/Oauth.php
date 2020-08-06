<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oauth extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('alert');
        //CSRF 방지
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('utility');

        $this->load->library('email');
        //기본 Data modal
        $this->load->model('common');
    }


    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function _remap($method)
    {
        if (method_exists($this, $method)) {
            $this->{"{$method}"}();
        }
    }

	public function index()
	{
		$this->load->library("kakao_login");
		$result = $this->kakao_login->get_profile();
		if($result["id"]){
			//세션 생성
			$newdata = array(
//                        'username' => $result->username,
//				'name' => $result->name,
				'user_id'=> $result["id"],
				'logged_in' => TRUE,
				'email' =>$result["kakao_account"]["email"],
//				'is_admin'=>FALSE,
//				'is_root'=>FALSE,
//					'lang_cd'=>$this->input->post('lang_cd'),
			);


			$this->session->set_userdata($newdata);
			$kguse_history_param=array(
				'user_id'=>$result["id"],
				'log_data'=>'로그인',
			);
			$this->common->insert('kguse_history',$kguse_history_param);

		}
		$this->load->view('popup/kakao_login');
//		print_r($result);
	}
	public function stibeewebhook()
	{

	}
}

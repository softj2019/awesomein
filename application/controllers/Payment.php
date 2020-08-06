<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//모델로드
//        $this->load->model('admin_plan');
//        $this->load->model('admin_member');
        $this->load->model('common');
		//CSRF 방지
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->helper('array');
		$this->load->library('payup_api');
		$this->load->library('stibee_api');
	}
	public function _remap($method)
	{
		if (method_exists($this, $method)) {
			$this->{"{$method}"}();
		}
	}
	public function request()
	{
		$data=Array();
		$this->form_validation->set_rules('cardNo', '카드번호', 'required|numeric');
		$this->form_validation->set_rules('expireMonth', '유효기간 월', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('amount', '결재금액', 'required|numeric');
		$this->form_validation->set_rules('quota', '할부개월', 'required|numeric|max_length[2]|less_than_equal_to[24]');
		$this->form_validation->set_rules('birthday', '생년월일', 'required|numeric|max_length[6]');
		$this->form_validation->set_rules('cardPw', '카드비밀번호', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('userName', '이름', 'required');
		$this->form_validation->set_rules('mobileNumber', '전화번호', 'required');
		$this->form_validation->set_rules('userEmail', '이메일', 'required|valid_email');
		$this->form_validation->set_rules('expireYear', '유효기간 년', 'required|numeric|max_length[2]');

		$data['page_title']="구독신청";
		$data['menu_code']="001";
		$better_date = date('Ymd');
		$like=array(
			'orderNumber','ORDER'.$better_date,'after'
		);
		$orderNoMakeSql="ifnull(CONCAT('ORDER',substring(max(orderNumber), 6)+1),CONCAT('ORDER','$better_date' , '00001')) as orderNumber";
		$paymentRow=$this->common->select_row($table='payment',$orderNoMakeSql,$where='',$coding=false,$order_by='',$group_by='',$like);
		//payup rest api 테스트
		$listid = $this->input->post_get('listId');
		$merchantId="free";
		$apiKey="7a5db716382f4491b24da844d0173525";
		$timestamp = date('YmdHis');
		$url = 'https://api.testpayup.co.kr/v2/api/payment/'.$merchantId.'/keyin2';
		$signature = hash ( "sha256", $merchantId."|".$paymentRow->orderNumber."|".$this->input->post("amount")."|".$apiKey."|".$timestamp);
		$param=array(
			"orderNumber"=>$paymentRow->orderNumber,
			"cardNo"=>$this->input->post("cardNo"),
			"expireMonth"=>$this->input->post("expireMonth"),
			"amount"=>$this->input->post("amount"),
			"quota"=>$this->input->post("quota"),
			"birthday"=>$this->input->post("birthday"),
			"cardPw"=>$this->input->post("cardPw"),
			"itemName"=>$this->input->post("itemName"),
			"userName"=>$this->input->post("userName"),
			"mobileNumber"=>$this->input->post("mobileNumber"),
			"userEmail"=>$this->input->post("userEmail"),
			"signature"=>$signature,
			"timestamp"=>$timestamp,
			"expireYear"=>$this->input->post("expireYear"),
		);
		$payupResult = json_decode($this->payup_api->restRequest("POST",$url,$param));
		if($payupResult->responseCode != "0000"){
			$this->form_validation->set_rules('responseCode', $payupResult->responseCode, 'matches['.$payupResult->responseCode.']',
				array('matches' => $payupResult->responseMsg)
			);
		}
		if ($this->form_validation->run() == TRUE) {
			//스티비 요청 URL
			$url ="https://api.stibee.com/v1/lists/".$listid."/subscribers";

			$data = array(
				"eventOccuredBy" => "SUBSCRIBER",
				"confirmEmailYN" => "N",
				"subscribers" =>  array (
					array(
						"email" => $this->input->post("userEmail"),
						"name" => $this->input->post("userName"),
					)
				),
			);
			//결재 완료후 구독 신청
			$this->stibee_api->StibeeRestFul("POST",$url,$data);

			//결재요청
			$param["responseCode"]=$payupResult->responseCode;
			$param["responseMsg"]=$payupResult->responseMsg;
			$this->common->insert("payment",$param);

		}else{
			$this->load->view('layout/header',$data);
			$this->load->view('main/index',$data);
			$this->load->view('layout/footer',$data);
		}

	}
}

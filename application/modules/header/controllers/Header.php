<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends MX_Controller {
	public function __construct() {
		$this->load->library('Main_libs');
		$this->load->model('header/Header_model');
	}

	public function get_district()
	{
		$PROVINCE_ID = 28;
		$AMPHUR_ID = $this->main_libs->set_val($this->input->post('amphur_id'));
		$qstr = array('AMPHUR_ID'=>$AMPHUR_ID, 'PROVINCE_ID'=>$PROVINCE_ID);
		$rs = $this->Header_model->get_data_list('district', $qstr);
		echo json_encode($rs['rs']);
	}

}//end class
<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Report extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
       // $this->load->module('construction/Construction_license');
    }

    public function index()
    {
        $data['content'] = "report/request";
        $this->load->view('header/index', $data);
    }

    public function reportRequest()
    {
        $data['content'] = "report/request";
        $this->load->view('header/index', $data);
    }

    public function reportTypeRequest()
    {
        $data['content'] = "report/typeRequest";
        $this->load->view('header/index', $data);
    }

    public function reportCostCenter()
    {
        $data['content'] = "report/costCenter";
        $this->load->view('header/index', $data);
    }

} //end class

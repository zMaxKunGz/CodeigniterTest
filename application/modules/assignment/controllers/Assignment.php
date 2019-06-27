<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Assignment extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
       // $this->load->module('construction/Construction_license');
    }

    public function index()
    {
        
        $data['content'] = "assignment/main";
        $this->load->view('header/index', $data);
    }

   

} //end class
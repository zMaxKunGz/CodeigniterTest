<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Department extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('department/Department_model');
       // $this->load->module('construction/Construction_license');
    }

    public function index()
    {
        $departmentId = $this->session->userdata('department_id');
        $data['repair_list'] = $this->Department_model->getRepairListByDepartmentId($departmentId);
        //echo json_encode($data['repairList']);
        $data['content'] = "department/worklist";
        $this->load->view('header/index_department', $data);
    }

    public function view($id)
    {
        $data['repair'] = $this->Department_model->getRepairByID($id)[0];
        $data['documentList'] = $this->Department_model->getDocumentByRepairId($id);
        $data['content'] = "department/viewRequestDepartment";
        $this->load->view('header/index_department', $data);
    }


    public function approveRequestRequestForm()
    {
        $approveStatus = $this->input->post('repair_status');
        if ($approveStatus == 1) {
            $data = array(
                'repair_id' => $this->input->post('repair_id'),
                'department_head_id' => $this->session->userdata('staff_id'),
                'dapartment_head_comment' => $this->input->post('dapartment_head_comment'),
                'flow_id' => 3
            );
        }
        else {
            $data = array(
                'repair_id' => $this->input->post('repair_id'),
                'flow_id' => 2
            );
        }
        $this->Department_model->updateRepair($data);
        $page = "department/";
        redirect($page);
    }
 
} //end class

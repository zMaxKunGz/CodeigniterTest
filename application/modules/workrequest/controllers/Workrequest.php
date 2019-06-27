<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Workrequest extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
       // $this->load->module('construction/Construction_license');
        $this->load->library('email');
        $this->load->model('workrequest/Workrequest_model');
    }

    public function index()
    {
        $position = $this->session->userdata('position_id');
        $repairList = $this->Workrequest_model->getRepairList();
        //echo json_encode($repairList);
        if (count($repairList) > 0) {
            $data['repair_list'] = $repairList;
        }
        else {
            $data['repair_list'] = array();
        }
        //echo json_encode($worklist);
        if ($position == 2 || $position == 1) {
            $data['content'] = "workrequest/workrequest_manager";
        }
        else if ($position == 3){
            $data['content'] = "workrequest/workrequest_worker";
        }
        else {

        }
        $this->load->view('header/index', $data);
    }

    public function viewWorkRequest($id)
    {
        $position = $this->session->userdata('position_id');
        if ($position == 2) {
            $data['staffList'] = $this->Workrequest_model->getListRepairStaff();
        }
        else if ($position == 3) {
            $data['statusList'] = $this->Workrequest_model->getWorkStatusList();
            $data['glList'] = $this->Workrequest_model->getGlList();
            $data['costCenterList'] = $this->Workrequest_model->getCostCenterList();
            $data['priorityList'] = $this->Workrequest_model->getPriorityList();
        }
        $data['repair'] = $this->Workrequest_model->getRepairByID($id)[0];
        $data['documentList'] = $this->Workrequest_model->getDocumentByRepairId($id);
        $data['repair_id'] = $id;
        $data['content'] = "workrequest/viewWorkRequest";
        $this->load->view('header/index', $data);
    }
     
    public function approveWorkRequestForm() {
        if ($this->input->post('work_status') == 1) {
            $date = DateTime::createFromFormat('d/m/Y', $this->input->post('duedate'));
            $formData = array(
                'repair_id' => $this->input->post('repair_id'),
                'due_date' => $date->format('Y-m-d'),
                'assign_to_id' => $this->input->post('staff_id'),
                'administrative_manager_id' => $this->session->userdata('staff_id'),
                'administrative_manager_comment' => $this->input->post('work_detail'),
                'flow_id' => 5,
                'assign_date' => date('Y-m-d')
            );
        }
        else {
            $formData = array(
                'repair_id' => $this->input->post('repair_id'),
                'flow_id' => 4,
            );
        }
        $this->Workrequest_model->editRepair($formData);
        $page = 'workrequest';
        redirect($page);    
    }

    public function updateWorkStatusForm() {
        $formData = array(
            'repair_id' => $this->input->post('repair_id'),
            'cost_center_id' => $this->input->post('cost_center_id'),
            'gl_id' => $this->input->post('gl_id'),
            'io' => $this->input->post('io'),
            'price' => $this->input->post('price'),
            'priority_id' => $this->input->post('priority_id'),
            'work_status_id' => $this->input->post('status_id'),
            'worker_description' => $this->input->post('worker_description')
        );
        if ($formData['work_status_id'] == 5) {
            $formData['flow_id'] = 6;
        }
        else if ($formData['work_status_id'] == 6) {
            $formData['flow_id'] = 7;
        }
        $this->Workrequest_model->editRepair($formData);
        $page = 'workrequest';
        redirect($page);
    }

    public function staffWorkList() {
        $worklist = $this->Request_model->getWorkListByStaffID($this->session->userdata('staff_id'));
        if (count($worklist) > 0) {
            $data['worklist'] = $worklist;
        }
        else {
            $data['worklist'] = array();
        }
        //echo json_encode($worklist);
        $data['content'] = "workrequest/workrequest";
        $this->load->view('header/index', $data);
    }

    public function staffWorkListByID($id) {
        $worklist = $this->Request_model->getWorkListByStaffID($id);
        if (count($worklist) > 0) {
            $data['worklist'] = $worklist;
        }
        else {
            $data['worklist'] = array();
        }
        //echo json_encode($worklist);
        $data['content'] = "workrequest/workrequest";
        $this->load->view('header/index', $data);
    }

    public function staffWorkListByMonth($month) {
        $data['month'] = $month;
        $data['month_list']=array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม','มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        $data['year_list']=array('2010', '2011', '2012', '2013', '2014','2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023','2024','2025','2026','2027','2028','2029','2030','2031','2032');
        $worklist = $this->Request_model->getWorkListByMonth($month);
        if (count($worklist) > 0) {
            $data['worklist'] = $worklist;
        }
        else {
            $data['worklist'] = array();
        }
        //echo json_encode($worklist);
        $data['content'] = "workrequest/workrequestmonth";
        $this->load->view('header/index', $data);
    }

    public function staffWorkListByYear($year) {
        $data['year'] = $year;
        $data['month_list']=array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม','มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        $data['year_list']=array('2010', '2011', '2012', '2013', '2014','2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023','2024','2025','2026','2027','2028','2029','2030','2031','2032');
        $worklist = $this->Request_model->getWorkListByYear($year);
        if (count($worklist) > 0) {
            $data['worklist'] = $worklist;
            $done = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $total = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($worklist as $value) {
                $month = $value['inform_date'][5].$value['inform_date'][6];
                $total[(int)$month - 1]++;
                if ($value['percent'] == 100) {
                    $done[(int)$month - 1]++;
                }
            }
        }
        else {
            $done = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $total = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $data['worklist'] = array();
        }
        $data['total'] = $total;
        $data['done'] = $done;
        $data['content'] = "workrequest/workrequestyear";
        $this->load->view('header/index', $data);
    }

    public function staffWorkListReport() {
        $data['worklist'] = $this->Request_model->getWorkStaffReport();
        $data['content'] = "workrequest/reportworklist";
        $this->load->view('header/index', $data);
    }
} //end class

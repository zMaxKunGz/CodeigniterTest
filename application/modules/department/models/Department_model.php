<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

    public function __construct() 
    {
        // parent::__construct();
        $this->load->library('Main_libs');
    }

    public function getRepairListByDepartmentId($id) {
        $this->db->select();//เลือก
        $this->db->from('repair');//เลือกตาราง
        $this->db->join('informer', 'informer.informer_id = repair.informer_id');
        $this->db->join('department', 'department.department_id = informer.department_id');
        $this->db->join('type_problem', 'type_problem.problem_id = repair.problem_id');
        $this->db->join('flow_status', 'flow_status.flow_id = repair.flow_id');
        $this->db->join('work_status', 'repair.work_status_id = work_status.work_status_id', 'left');
        $this->db->join('staff', 'repair.assign_to_id = staff.staff_id', 'left');
        $this->db->join('work_priority', 'repair.priority_id = work_priority.priority_id', 'left');
        $this->db->where('department.department_id', $id);
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array 
        return $results;
    }

    public function getRepairByID($id) {
        $this->db->select();//เลือก
        $this->db->from('repair');//เลือกตาราง
        $this->db->join('informer', 'informer.informer_id = repair.informer_id');
        $this->db->join('department', 'department.department_id = informer.department_id');
        $this->db->join('type_problem', 'type_problem.problem_id = repair.problem_id');
        $this->db->join('flow_status', 'flow_status.flow_id = repair.flow_id');
        $this->db->join('work_status', 'repair.work_status_id = work_status.work_status_id', 'left');
        $this->db->join('staff', 'repair.assign_to_id = staff.staff_id', 'left');
        $this->db->join('work_priority', 'repair.priority_id = work_priority.priority_id', 'left');
        $this->db->where('repair_id', $id);
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
    }

    public function getDocumentByRepairId($id) {
        $this->db->select();//เลือก
        $this->db->from('document_file');//เลือกตาราง
        $this->db->where('repair_id', $id);
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
    }

    public function updateRepair($data) {
        $this->db->where('repair_id', $data['repair_id']);
        $this->db->update('repair', $data); 
        return $this->db->affected_rows();
    }
}
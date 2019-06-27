<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workrequest_model extends CI_Model {

    public function getStaffDepartmentById($id)
	{
        $this->db->select();//เลือก
        $this->db->from('staff_department');//เลือกตาราง
        $this->db->join('department', 'staff_department.department_id = department.department_id');//เชื่อมตาราง
        $this->db->where('staff_id', $id);
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
		return $results;
    }

    public function getStaffById($id) {
        $this->db->select();//เลือก
        $this->db->from('staff');//เลือกตาราง
        $this->db->join('staff_position', 'staff.position_id = staff_position.position_id');
        $this->db->where('staff_id', $id);
        $q =  $this->db->get();//รันคำสั่ง
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
		return $results;
    }
    
    public function getListDept()
	{
        $results = $this->db->select()
            ->where('status',1)
            ->get('department')
            ->result_array();
        return $results;
    }
    
    public function getListProblem() {
        $results = $this->db->select()
            ->where('status',1)
             ->get('type_problem')
            ->result_array();
         return $results;
     }

    public function getListUserDepartment()
	{
        $this->db->select();
        $this->db->from('staff');
        $this->db->join('staff_position', 'staff.position_id = staff_position.position_id');
        $this->db->where('staff_status', 1);
        $q = $this->db->get();
        $results = $q->result_array();
		return $results;
    }

    public function getListRepairStaff() {
        $this->db->select();
        $this->db->from('staff');
        $this->db->where('staff_status', 1);
        $this->db->where('position_id', 3);
        $q = $this->db->get();
        $results = $q->result_array();
        return $results;
    }

    public function getworkTypeList()
	{
        $results = $this->db->select()
            ->where('status',1)
			 ->get('work_status')
			->result_array();

		return $results;
    }

    public function getWorkStatusList() {
        $results = $this->db->select()
            ->where('status',1)
             ->get('work_status')
            ->result_array();

        return $results;
    }

    public function getGlList() {
        $results = $this->db->select()
            ->where('status',1)
             ->get('gl')
            ->result_array();
        return $results;
    }

    public function getCostCenterList() {
        $results = $this->db->select()
            ->where('status',1)
             ->get('cost_center')
            ->result_array();
        return $results;
    }

    public function getPriorityList() {
        $results = $this->db->select()
            ->where('status',1)
             ->get('work_priority')
            ->result_array();
        return $results;
    }

    public function getPositionWork()
	{
        $results = $this->db->select()
            ->where('status',1)
			 ->get('staff_position')
			->result_array();

		return $results;
    }

    

    public function getUserDepartment($id)
	{
        $results = $this->db->select()
            ->where('staff_status',1)
            ->where('staff_id',$id)
			 ->get('staff')
			->result_array();

		return $results;
    }

    public function getUserByName($name) {
        $results = $this->db->select()
            ->where('staff_status',1)
            ->where('staff_name',$name)
			 ->get('staff_department')
			->result_array();

		return $results;
    }

    public function getRepairList() {
        $this->db->select();//เลือก
        $this->db->from('repair');//เลือกตาราง
        $this->db->join('informer', 'informer.informer_id = repair.informer_id');
        $this->db->join('department', 'department.department_id = informer.department_id');
        $this->db->join('type_problem', 'type_problem.problem_id = repair.problem_id');
        $this->db->join('flow_status', 'flow_status.flow_id = repair.flow_id');
        $this->db->join('work_status', 'repair.work_status_id = work_status.work_status_id', 'left');
        $this->db->join('work_priority', 'repair.priority_id = work_priority.priority_id', 'left');
        $this->db->join('gl', 'repair.gl_id = gl.gl_id', 'left');
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
        $this->db->join('work_priority', 'repair.priority_id = work_priority.priority_id', 'left');
        $this->db->join('gl', 'repair.gl_id = gl.gl_id', 'left');
        $this->db->join('cost_center', 'repair.cost_center_id = cost_center.cost_center_id', 'left');
        $this->db->where('repair_id', $id);
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
    }

    public function getWorkListByStaffID($id) {
        $this->db->select();//เลือก
        $this->db->from('worklist');//เลือกตาราง
        $this->db->join('staff_department', 'staff_department.staff_dept_id = worklist.staff_dept_id');
        $this->db->join('department', 'staff_department.department_id = department.department_id');
        $this->db->join('type_problem', 'type_problem.problem_id = worklist.problem_id');
        $this->db->join('work_status', 'work_status.work_status_id = worklist.status_id');
        $this->db->where('staff_id', $id);
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
    }

    public function getWorkListByMonth($month) {
        $this->db->select();//เลือก
        $this->db->from('worklist');//เลือกตาราง
        $this->db->join('staff_department', 'staff_department.staff_dept_id = worklist.staff_dept_id');
        $this->db->join('department', 'staff_department.department_id = department.department_id');
        $this->db->join('type_problem', 'type_problem.problem_id = worklist.problem_id');
        $this->db->join('work_status', 'work_status.work_status_id = worklist.status_id');
        $this->db->where('month(inform_date)', $month);
        $this->db->where('year(inform_date)', '20' . date('y'));
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
    }

    public function getWorkListByYear($year) {
        $this->db->select();//เลือก
        $this->db->from('worklist');//เลือกตาราง
        $this->db->join('staff_department', 'staff_department.staff_dept_id = worklist.staff_dept_id');
        $this->db->join('department', 'staff_department.department_id = department.department_id');
        $this->db->join('type_problem', 'type_problem.problem_id = worklist.problem_id');
        $this->db->join('work_status', 'work_status.work_status_id = worklist.status_id');
        $this->db->where('year(inform_date)', $year);
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

    public function addInformer($input){
        $rs = $this->db->insert("informer",$input);
        return $this->db->insert_id();
    }

    public function addRepair($input){
        $rs = $this->db->insert("repair",$input);
        return $this->db->insert_id();
    }

    public function addDocument($input) {
        $rs = $this->db->insert_batch("document_file",$input);
        return $this->db->insert_id();
    }
    
    public function editRepair($data) {
        $this->db->where('repair_id', $data['repair_id']);
        $this->db->update('repair', $data); 
        return $this->db->affected_rows();
    }

    public function getWorkStaffReport() {
        $rs = $this->db->query('select a.staff_id, staff.staff_name, all_work, undone
            from (select staff_id, count(work_id) as all_work from worklist group by staff_id) as a inner join
            (select staff_id, count(work_id) as undone from worklist where percent < 100 group by staff_id) b 
            on a.staff_id = b.staff_id
            inner join staff on staff.staff_id = a.staff_id;');
        return $rs->result_array();
    }

    public function getWorkType($id)
    {
        $results = $this->db->select()
            ->where('status',1)
            ->where('work_status_id',$id)
             ->get('work_status')
            ->result_array();

        return $results;
    }
    
}
?>
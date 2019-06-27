<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

    public function getListUser()
	{
        $this->db->select();//เลือก
        $this->db->from('staff_department');//เลือกตาราง
        $this->db->join('department', 'staff_department.department_id = department.department_id');//เชื่อมตาราง
        $this->db->where('staff_status',1);//เงื่อนไข
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
		return $results;
    }

    public function getUser($id) {
        $this->db->select();//เลือก
        $this->db->from('staff_department');//เลือกตาราง
        $this->db->join('department', 'staff_department.department_id = department.department_id');//เชื่อมตาราง
        $this->db->where('staff_status',1);//เงื่อนไข
        $this->db->where('staff_dept_id', $id);
        $q =  $this->db->get();//รันคำสั่ง
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
		return $results;
    }
    
    public function getDept($id = -1)
	{
        if ($id < 0) {
            $results = $this->db->select()
                ->where('status',1)
                ->get('department')
                ->result_array();
            return $results;
        }
		else {
            $results = $this->db->select()
                ->where('status',1)
                ->where('department_id', $id)
                ->get('department')
                ->result_array();
            return $results;
        }
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

    public function getworkTypeList()
	{
        $results = $this->db->select()
            ->where('status',1)
			 ->get('work_status')
			->result_array();

		return $results;
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
    

    public function getPositionWork()
	{
        $results = $this->db->select()
            ->where('status',1)
			 ->get('staff_position')
			->result_array();

		return $results;
    }

     public function getProblemlist() {
        $results = $this->db->select()
            ->where('status',1)
			 ->get('type_problem')
			->result_array();
         return $results;
     }

     public function getProblem($id) {
        $results = $this->db->select()
            ->where('status',1)
            ->where('problem_id',$id)
             ->get('type_problem')
             
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
//////////////////////////////////
     
    public function addUser($input) {
        $rs = $this->db->insert("staff_department",$input);
        return $this->db->insert_id();
    }

    public function addProblem($input) {
        $rs = $this->db->insert("type_problem", $input);
        return $this->db->insert_id();
    }

    // public function addDeptName ($input){
    //     $rs = $this->db->query("INSERT INTO type_problem (department_name) VALUES (\"" . $input . "\");");
    //  }
    
     public function addDepartment($input) {
        $rs = $this->db->insert("department",$input);
        return $this->db->insert_id();
    }

    public function addStaff($input) {
        $rs = $this->db->insert("staff",$input);
        return $this->db->insert_id();
    }

    public function addWorktypeList($input) {
        $rs = $this->db->insert("work_status",$input);
        return $this->db->insert_id();
    }

    ////////////////////////// เพิ่มข้อมูล


    public function typeProblemDelete($id){

        $data = array(
            'status' => 0,);

                $this->db->where('problem_id', $id);
                $this->db->update('type_problem', $data); 
    }

    public function workTypeListDelete($id){

        $data = array(
            'status' => 0,);

                $this->db->where('work_status_id', $id);
                $this->db->update('work_status', $data); 
    }

    public function deptListtDelete($id){

        $data = array(
            'status' => 0,);

                $this->db->where('department_id', $id);
                $this->db->update('department', $data); 
    }


    public function userDelete($id){

        $data = array(
            'staff_status' => 0,);
        $this->db->where('staff_dept_id', $id);
        $this->db->update('staff_department', $data); 
        return $this->db->affected_rows();
    }

    public function staffDelete($id){

        $data = array(
            'staff_status' => 0,);
        $this->db->where('staff_id', $id);
        $this->db->update('staff', $data); 
        return $this->db->affected_rows();
    }
    ///////////////////////////ลบข้อมูล

   

    
    // public function workTypeListEdit($id){

    //     $data = array(
    //         'status' => 0,);

    //             $this->db->where('work_status_id', $id);
    //             $this->db->update('work_status', $data); 
    // }

    public function editUser($data) {
        $this->db->where('staff_dept_id', $data['staff_dept_id']);
        $this->db->update('staff_department', $data); 
        return $this->db->affected_rows();
    }

    public function editDept($data) {
        $this->db->where('department_id', $data['department_id']);
        $this->db->update('department', $data); 
        return $this->db->affected_rows();
    }

    public function editProblem($data) {
        $this->db->where('problem_id', $data['problem_id']);
        $this->db->update('type_problem', $data); 
        return $this->db->affected_rows();
    }

    public function editWorktypeList($data) {
        $this->db->where('work_status_id', $data['work_status_id']); //บอกว่าให้แก้ไขบรรทัดที่ 'work_status_id' = ไอดีที่ส่งมา
        $this->db->update('work_status', $data); //เลือกตารางที่จะแก้ไข
        return $this->db->affected_rows();
    }

    public function editStaff($data) {
        $this->db->where('staff_id', $data['staff_id']);//เปรียบเทียบค่าว่าตรงกันไหม
        $this->db->update('staff', $data); 
        return $this->db->affected_rows();
    }



///////////////////////



    
}
?>
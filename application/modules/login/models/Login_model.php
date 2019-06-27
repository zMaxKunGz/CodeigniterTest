<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function get_profile($input)
	{
		$this->db->select('
			user.user_id,
			user.user_no,
			user.username,
			user.user_role,
			user.user_status,
			user.name,
			user.email,
			user.mobile,
			user.user_image,
			user.dep_no,
			dep_name,
			dep_shotname_th,
			dep_zone
			')
				->where('username',$input['username']) 
				->join('department','department.dep_no = user.dep_no','left');
		$query = $this->db->get('user');
		return $query->result_array(); 
	}

	public function get_user($username)
	{
		$this->db->select();//เลือก
        $this->db->from('staff');//เลือกตาราง
        $this->db->where('user', $username);
        $this->db->join('staff_position', 'staff_position.position_id = staff.position_id');
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
	}

	public function getStaffDepartmentByUsername($username) {
		$this->db->select();//เลือก
        $this->db->from('staff_department');//เลือกตาราง
        $this->db->where('username', $username);
        $this->db->where('staff_status', 1);
        $this->db->join('department', 'department.department_id = staff_department.department_id');
        $q =  $this->db->get();//รันคำสั่ง 
        $results = $q->result_array(); //ดึงผลลัพธ์เป็น array
        return $results;
	}
	
}

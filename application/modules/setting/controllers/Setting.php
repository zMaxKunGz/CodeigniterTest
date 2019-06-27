<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Setting extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting/Setting_model');
        
    }

    public function index()
    {
        $data['content'] = "setting/userList";
        $this->load->view('header/index', $data);
    }

    public function user_list()
    {
        $data['user'] = $this->Setting_model->getListUser();
        $data['content'] = "setting/userList";
        $this->load->view('header/index', $data);
    }

    public function dept_list()
    {
        $data['dept'] = $this->Setting_model->getDept();
        $data['content'] = "setting/deptList";
        $this->load->view('header/index', $data);
    } 

    public function problem_list()
    {
        $data['problemList'] = $this->Setting_model->getProblemList();
        $data['content'] = "setting/problemList";
        $this->load->view('header/index', $data);
    } 

    public function workType_list()
    {
        $data['worktypeList'] = $this->Setting_model->getworkTypeList();
        $data['content'] = "setting/workTypeList";
        $this->load->view('header/index', $data);
    } 

    public function staff_list()
    {
        $data['user'] = $this->Setting_model->getListUserDepartment();
        $data['content'] = "setting/staffList";
        $this->load->view('header/index', $data);
    } 

////////////////////////// นำเข้า


public function deleteProblem()
    {
       $id=$this->uri->segment(3);
        $data['problemList'] = $this->Setting_model->typeProblemDelete($id);

        $data['content'] = "setting/problemList";
        //$this->load->view('header/index', $data);
        $this->problem_list();
    } 

    public function deleteWorkTypeList()
    {
       $id=$this->uri->segment(3);
        $data['workTypeList'] = $this->Setting_model->workTypeListDelete($id);
        $data['content'] = "setting/workTypelist";
        //$this->load->view('header/index', $data);
        $this->workType_list();
    } 


    public function deleteDeptList()
    {
       $id=$this->uri->segment(3);
        $data['workTypeList'] = $this->Setting_model->deptListtDelete($id);
        $data['content'] = "setting/deptlist";
        //$this->load->view('header/index', $data);
        $this->dept_list();
    } 

    public function deleteUser($id)
    {
        
        $rs = $this->Setting_model->userDelete($id);
        $data['content'] = "setting/user_list";
        //$this->load->view('header/index', $data);
        $this->user_list();
    } 

    public function deleteStaff()
    {
       $id=$this->uri->segment(3);
        $data['staffList'] = $this->Setting_model->staffDelete($id);
        $data['content'] = "setting/staffList";
        //$this->load->view('header/index', $data);
        $this->staff_list();
    } 


    ////////////////////// ลบข้อมูล




    public function add_user()
    {
        $data['dept'] = $this->Setting_model->getDept();
        $data['content'] = "setting/add_user";
        $this->load->view('header/index', $data);
    }

    public function add_dept()
    {
        $data['dept'] = $this->Setting_model->getDept();
        $data['content'] = "setting/add_department";
        $this->load->view('header/index', $data);
    }

    public function add_staff()
    {
        $data['position'] = $this->Setting_model->getPositionWork();
        $data['content'] = "setting/add_staff";
        $this->load->view('header/index', $data);
    }

    public function add_problem()
    {
        $data['content'] = "setting/add_problem";
        $this->load->view('header/index', $data);
    }

    public function add_worktypelist()
    {
        // $data['worktypelist'] = $this->Setting_model->getWorktypeList();
        $data['content'] = "setting/add_worktypelist";
        $this->load->view('header/index', $data);
    }


    public function addFormUser()
    {
        $input=array(
                        "staff_name"=>$this->input->post("name"),
                        "staff_email"=>$this->input->post("email"),
                        "department_id"=>$this->input->post("department"),
                        "password"=>md5($this->input->post("password")),
                        "staff_status"=>1
                    );
        $rs = $this->Setting_model->addUser($input);
        if($rs > 1){
            redirect('setting/user_list');
        }
        
    }

    public function addFormProblem(){

        $input = array(
            "problem_name"=>$this->input->post("addPromblemName")
        );
        $this->Setting_model->addProblem($input);
        redirect('setting/problem_list');
    }

    public function addFormDept(){
        $input = array(
            "department_code"=>$this->input->post("addDeptCode"),
            "department_name"=>$this->input->post("addDeptName"),
            "status"=>1
        );
        $rs = $this->Setting_model->addDepartment($input);
        redirect('setting/dept_list');
    }


    public function addFormWorkType() {
        $input=array(
            "work_status_name"=>$this->input->post("statusname"),
            "percent"=>$this->input->post("percent"),
            "status"=>1
        );
        $rs = $this->Setting_model->addWorktypeList($input);
        redirect('setting/workType_list');
   }  

       public function addFormStaff(){
        $input = array(
            "staff_name" => $this->input->post("name"),
            "position_id"=>$this->input->post("position"),
            "user"=>$this->input->post("username"),
            "password"=>md5($this->input->post("password")),
            "staff_status"=>1
        );
        $rs = $this->Setting_model->addStaff($input);
        redirect('setting/staff_list');
    } 
    
    //////////////////////////////////////////////////เพิ่มข้อมูลส่วนต่างๆ
  


    public function editFormUser()
    {
        if($this->input->post("password")==null) {
            $input=array(
                "staff_dept_id"=>$this->input->post("id"),
                "staff_name"=>$this->input->post("name"),
                "staff_email"=>$this->input->post("email"),
                "department_id"=>$this->input->post("department"),
                "staff_status"=>1
            );
        }

        else{
            $input=array(
                        "staff_dept_id"=>$this->input->post("id"),
                        "staff_name"=>$this->input->post("name"),
                        "staff_email"=>$this->input->post("email"),
                        "department_id"=>$this->input->post("department"), 
                        "staff_status"=>1,
                        "password"=>md5($this->input->post("password"))
                    );
                }
        $rs = $this->Setting_model->editUser($input);
        redirect('setting/user_list');     
    }


    public function editFormDept(){
        $input = array(
            "department_id"=>$this->input->post("id"),
            "department_code"=>$this->input->post("deptCode"),
            "department_name"=>$this->input->post("deptName")
        );
        $rs = $this->Setting_model->editDept($input);
        redirect('setting/dept_list');
    }

    public function editFormWorkType(){ //ทำงานหลังจาก submit form แก้ไข
        $input=array(
            "work_status_id"=>$this->input->post("id"),
            "work_status_name"=>$this->input->post("name"),
            "percent"=>$this->input->post("percent")
        ); //ดึงข้อมูลมาจาก form แต่ละช่อง
        $rs = $this->Setting_model->editWorktypeList($input);//ทำการเรียกฟังก์ชันเพื่อแก้ไข
        redirect('setting/workType_list');
   }  
    

   public function editFormProblem() {

        $input = array(
            "problem_id"=>$this->input->post("id"),
            "problem_name"=>$this->input->post("editProblemName")
        );
        $this->Setting_model->editProblem($input);
        redirect('setting/problem_list');
    }

    public function editFormStaffDepartment(){
        if ($this->input->post("password") == NULL) { //ตรวจสอบว่าได้ใส่ข้อมูลในช่อง password มามั้ย
            $input = array(
                "staff_id"=>$this->input->post("id"),
                "position_id"=>$this->input->post("position"),
                "staff_name"=>$this->input->post("name"),
                "user"=>$this->input->post("user")
            );
        }
        else {
            $input = array(
                "staff_id"=>$this->input->post("id"),
                "position_id"=>$this->input->post("position"),
                "staff_name"=>$this->input->post("name"),
                "user"=>$this->input->post("user"),
                "password"=>md5($this->input->post("password"))
            );
        }
        $this->Setting_model->editStaff($input);
        redirect('setting/staff_list');//เรียกกลับไปยังหน้าเดิม
    }

   
   /////////////////////////////////
    public function editUser($id)
    {
        $data['user'] = $this->Setting_model->getUser($id)[0];
        $data['dept'] = $this->Setting_model->getDept();
        $data['content'] = "setting/edit_user";
        $this->load->view('header/index', $data);
    }

    public function editDept($id)
    {
        $data['dept'] = $this->Setting_model->getDept($id)[0];
        //echo json_encode($data['dept']);
        $data['content'] = "setting/edit_department";
        $this->load->view('header/index', $data);
    }


    public function editProblem($id)
    {
        $data['problem'] = $this->Setting_model->getProblem($id)[0];
        //echo json_encode($data['problem']);
        $data['content'] = "setting/edit_problem";
        $this->load->view('header/index', $data);
    }

    public function editWorkTypeList($id)
    {
        $data['work'] = $this->Setting_model->getWorkType($id)[0]; //ดึงข้อมูลคนเดียวตามไอดี
        //echo json_encode($data['work']);
        $data['content'] = "setting/edit_worktypelist";//ดึงหน้า view edit มาใส่
        $this->load->view('header/index', $data);
    }

    public function editStaffDepartment($id)
    {
        //echo json_encode($this->Setting_model->getUserDepartment($id)[0]);
        $data['staff'] = $this->Setting_model->getUserDepartment($id)[0];
        $data['position'] = $this->Setting_model->getPositionWork();
        //echo json_encode($data['staff']);
        $data['content'] = "setting/edit_staff";
        $this->load->view('header/index', $data);
    }

    ////////////////////////////////////////////////// แก้ไข


   
    





} //end class

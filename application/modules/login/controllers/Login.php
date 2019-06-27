<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH.'/modules/header/controllers/Header.php';

class Login extends Header {

   public function __construct() 
   {
        parent::__construct();
        $this->load->model('login/Login_model');
   }

    public function index() 
    {
        $data['form_submit'] = 'login/do_login';
        $this->load->view('login', $data);
    }
   
    public function do_login()
    {
        $username = trim($this->input->post('txt_username'));
        $password = $this->input->post('txt_passwords');
        $profile = $this->Login_model->get_user($username);

        if(count($profile) > 0) {
            $check1 = false;
            foreach($profile as $value) {
                if (md5($password) == $value['password']) {
                    $check1 = true;
                    $logged_in = $value;
                    break;
                }
            }
        }
        if ($check1) {
            $user = array(
                'staff_id'=>$logged_in['staff_id'],
                'staff_name'=>$logged_in['staff_name'],
                'position_id'=>$logged_in['position_id'],
                'staff_status'=>$logged_in['staff_status'],
                'user'=>$logged_in['user'],
                'position_name'=>$logged_in['position_name']
            );
            $this->session->set_userdata($logged_in);
            $page='workrequest/index';
            redirect($page);
        }
        else {
            $this->session->set_flashdata('status', 'error');
            $page='/login';
            redirect($page);
        }
        // $qstr=array('username like binary '=>$user, 'status'=>1);

        // $rs = $this->Header_model->get_data_profile($qstr, 'users');
        // // echo '<pre>', print_r($rs);exit();
        // $passwords = (isset($rs['rs'][0]['passwords'])? $rs['rs'][0]['passwords'] : 0);
        
        
        // if (isset($rs['rs'][0]['image'])) {
        //     $rs['rs'][0]['image_url'] = $this->myupload->get_file_urls('files/img_users', $rs['rs'][0]['image']);
        // }

        // // echo "<pre>", print_r($rs['rs'][0]);exit();
        // if (password_verify($txt_passwords, $passwords)) {
        //     $this->session->set_userdata('user_profile', $rs['rs'][0]);
        // $page='dashboard/main';
        // }else {
        //     $page ='login';
        // }

        // redirect($page);
    }

    public function login_department_staff() {
        $id = $this->uri->segment(3,0);
        $data['form_submit'] = 'login/do_login_department_staff/'.$id;
        $this->load->view('login_department_staff', $data);
    }

    public function do_login_department_staff($id) {
        $username = trim($this->input->post('txt_username'));
        $password = $this->input->post('txt_passwords');
        $profile = $this->Login_model->getStaffDepartmentByUsername($username);

        if(count($profile) > 0) {
            $check1 = false;
            foreach($profile as $value) {
                if (md5($password) == $value['password']) {
                    $check1 = true;
                    $logged_in = $value;
                    break;
                }
            }
        }
        if ($check1) {
            $user = array(
                'staff_id'=>$logged_in['staff_id'],
                'staff_name'=>$logged_in['staff_name'],
                'department_id'=>$logged_in['department_id'],
                'department_name'=>$loged_in['department_name'],
                'staff_status'=>$logged_in['staff_status'],
                'username'=>$logged_in['username']
            );
            $this->session->set_userdata($logged_in);
            if ($id == 0) {
                $page='department/';
            }
            else {
                $page='department/view/'.$id;
            }
            redirect($page);
        }
        else {
            $this->session->set_flashdata('status', 'error');
            $page='/login/login_department_staff/'.($id == 0) ? '':$id;
            redirect($page);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $page = "/";
        redirect($page);
    }

    public function logout_dept() {
        $this->session->sess_destroy();
        $page = "/login/login_department_staff/";
        redirect($page);
    }

}//end class
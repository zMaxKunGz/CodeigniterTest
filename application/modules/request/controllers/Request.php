<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Request extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
       // $this->load->module('construction/Construction_license');
        $this->load->model('request/Request_model');
    }

    public function index()
    {
        $repairList = $this->Request_model->getRepairList();
        if (count($repairList) > 0) {
            $data['repair_list'] = $repairList;
        }
        else {
            $data['repair_list'] = array();
        }
        $data['content'] = "request/allRequest";
        $this->load->view('header/index_register', $data);
    }

    public function register()
    {
        $data['dept_list'] = $this->Request_model->getListDept();
        $data['problem_list'] = $this->Request_model->getListProblem();
        $data['content'] = "request/request";
        $this->load->view('header/index_register', $data);
    }  
    
    public function newRequest() {
        $user = array (
            'informer_name' => $this->input->post('name'),
            'informer_tel' => $this->input->post('tel'),
            'informer_email' => $this->input->post('email'),
            'department_id' => $this->input->post('select_department')
        );
        $informerId = $this->Request_model->addInformer($user);
        $work = array (
            'repair_title'=>$this->input->post('repair_title'),
            'repair_description'=>$this->input->post('reapir_description'),
            'informer_id'=>$informerId,
            'problem_id'=>$this->input->post('problem_id'),
            'place_name'=>$this->input->post('place_name')
        );
        $repair_id = $this->Request_model->addRepair($work);
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        if($_FILES['userfile']['name'][0] != '') {
            for($i=0; $i<$cpt; $i++)
            {           
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

                $file_name = date('Y-m-d').'-'.$repair_id.'-'.$i;
                $this->upload->initialize($this->set_upload_options($file_name));
                if ( ! $this->upload->do_upload() )
                {
                    $error = array('error' => $this->upload->display_errors());
                    echo json_encode($error);
                }
                else
                {
                    $dataInfo = $this->upload->data();
                    $imageData[] = array(
                        'repair_id'=>$repair_id,
                        'file_name'=> $dataInfo['file_name'],
                        'file_type'=> $dataInfo['file_ext'],
                        'current_file'=> 'upload/images/'.$dataInfo['file_name'],
                        'image_width'=> $dataInfo['image_width'],
                        'image_height'=> $dataInfo['image_height']
                    );
                }
            }
            $this->Request_model->addDocument($imageData);
        }
        $page = "request/";
        redirect($page);
    }

    public function viewRequest($id) {
        $data['repair'] = $this->Request_model->getRepairByID($id)[0];
        $data['documentList'] = $this->Request_model->getDocumentByRepairId($id);
        $data['content'] = "request/viewRequest";
        $this->load->view('header/index_register', $data);
    }  

    private function set_upload_options($file_name) {   
        //upload an image options
        $config = array();
        $config['file_name'] = $file_name;
        $config['upload_path'] = './upload/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }

    private function sendApproveMail($repair, $status) {
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'pasit.tiwawongrut@gmail.com';
        $config['smtp_pass'] = 'kk0877722688';
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $this->email->from('pasit.tiwawongrut@gmail.com', 'Identification');
        $this->email->to($work['staff_email']);
        $this->email->subject('อัพเดทสถานะงาน');
        if($status == 1) {
            $this->email->message('งาน '.$work['work_name'].' ได้รับการอนุมัติแล้ว');
        }
        else {
            $this->email->message('งาน '.$work['work_name'].' ไม่ผ่านการอนุมัติแล้ว');
        }
        $this->email->send();
    }

} //end class

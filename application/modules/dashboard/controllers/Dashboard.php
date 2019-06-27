<?php
defined('BASEPATH') or exit('No direct script access allowed');

////require_once APPPATH . '/modules/license/controllers/License.php';

class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
       // $this->load->module('construction/Construction_license');
    }

    public function main()
    {
        //echo json_encode($this->session);
        $data['content'] = "dashboard/dashboard";
        $this->load->view('header/index', $data);
    }

    public function mail() {
        $this->load->library('email');
        // $this->load->library('encrypt');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'pasit.tiwawongrut@gmail.com';
        $config['smtp_pass'] = '';
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $this->email->from('pasit.tiwawongrut@gmail.com', 'Identification');
        $this->email->to('orewa_gundam@hotmail.com');
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        if($this->email->send()) {
            echo "success";
        }
        else {
            $this->session->set_flashdata("email_sent","You have encountered an error");
        }
    }

    public function upload() {
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

            $this->upload->initialize($this->set_upload_options());
            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
            else
            {
                echo "success";
                $dataInfo[] = $this->upload->data();
            }
        }
        echo json_encode($dataInfo);
    }

    private function set_upload_options()
    {   
        //upload an image options
        $config = array();
        $config['file_name'] = 'test';
        $config['upload_path'] = './resources/images/upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }

    public function formValidation() {

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = "dashboard/dashboard";
            $this->load->view('header/index', $data);
        }
        else
        {
            $this->load->view('formsuccess');
        }
    }

    private function count_operation_rows()
    {
        // $license = $this->Header_model->get_data_list('licenses', array('status' => 1));
        // $license_rows = $license['rows'];

        // $constructse = $this->Header_model->get_data_list('license_constructs', array('status' => 1));
        // $constructse_rows = $constructse['rows'];

       // return ($license_rows + $constructse_rows);
    }

} //end class

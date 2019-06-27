<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_model extends CI_Model {

    public function __construct() 
    {
        // parent::__construct();
        $this->load->library('Main_libs');
    }

	public function results($qr)
    {
        $rs['rows'] = $qr->num_rows(); 
        $rs['rs'] = $qr->result_array();
        $rs['fields']=$qr->list_fields();

        return $rs;
    }

    public function set_data_format($rs)
    {
   
        foreach ($rs['rs'] as $key => $value) {
            foreach ($rs['fields'] as $key1 => $value1) {

                $rs['rs'][$key][$value1] = $this->main_libs->get_val($value[$value1]);
                
                // set price 0
                if ($value1 =='price') {
                    $rs['rs'][$key][$value1] = $this->main_libs->set_val($value[$value1]);
                }

                //  calculator days
                if ($value1 =='expire_date') {
                    $rs['rs'][$key]['date_amount_expire'] = $this->main_libs->get_date_amount($value[$value1]);
                }else if ($value1 =='acquire_date') {
                    $rs['rs'][$key]['date_amount_acquire'] = $this->main_libs->get_date_amount($value[$value1]);
                }

                // calculartor notice expire days
                if ($value1 =='notice_expire') {
                    $rs['rs'][$key]['notice_expire_amount'] = ($value['notice_expire'] * 30);
                }

                // set date th          
                if ($value1 == 'request_date' || $value1 == 'issue_date' || $value1 == 'expire_date' || $value1 =='issue_date_type_one' || $value1 =='acquire_date' || $value1 =='expire_date_type_one' || $value1 =='issue_date_type_six' || $value1 =='expire_date_type_six' || $value1 =='issue_date_type_six' || $value1 =='date_transfer' || $value1 =='old_last_transfer') {
                    $rs['rs'][$key][$value1] = $this->main_libs->get_date_th($value[$value1]);
                }
                
                // set checked box
                if ($value1 =='type_one' || $value1 =='type_two' || $value1 =='type_three' || $value1 =='type_four' || $value1 =='type_five') {
                    $rs['rs'][$key][$value1] = ($value[$value1]=='' || $value[$value1]=='0'? '' : 'checked');
                }

                // set label status(tb: license_history)
                if ($value1 =='status') {
                    $rs['rs'][$key]['status_label'] = $this->main_libs->set_license_status($value[$value1]);
                    $rs['rs'][$key]['status_deed_label'] = $this->main_libs->set_deed_status($value[$value1]);
                }

                // get deed_category name
                if ($value1 =='dee_cate_id') {
                    $deed_cate = $this->get_data_profile(array('id'=>$value[$value1]), 'deed_category');
                    $rs['rs'][$key]['deed_cate_name'] = (isset($deed_cate['rs'][0]['deed_name_cate'])? $deed_cate['rs'][0]['deed_name_cate'] : '');
                }

                // get amphur name
                if ($value1 =='amphur') {
                    $amphur = $this->get_data_profile(array('AMPHUR_ID'=>$value[$value1]), 'amphur');
                    $rs['rs'][$key]['amphur_name'] = (isset($amphur['rs'][0]['AMPHUR_NAME'])? $amphur['rs'][0]['AMPHUR_NAME'] : '');
                }

                // get district name
                if ($value1 =='district') {
                    $district = $this->get_data_profile(array('DISTRICT_ID'=>$value[$value1]), 'district');
                    $rs['rs'][$key]['district_name'] = (isset($district['rs'][0]['DISTRICT_NAME'])? $district['rs'][0]['DISTRICT_NAME'] : '');
                }

                // get user category
                if ($value1 =='user_cate') {
                    $user_cate_name = $this->get_data_profile(array('id'=>$value[$value1]), 'user_cate');
                    $rs['rs'][$key]['user_cate_name'] = (isset($user_cate_name['rs'][0]['name_cate'])? $user_cate_name['rs'][0]['name_cate'] : ''); 
                }

                // set is_admin 0
                if ($value1 =='is_admin') {
                    $rs['rs'][$key][$value1] = $this->main_libs->set_val($value[$value1]);
                }

            }
        }
        
        return $rs;
    }

    private function verify_is_table($table='')
    {
        if ($table=='') {
            echo 'Please assign your table name !';exit();
        }
    }

    public function get_data_list($table, $qstr='') 
    {
        if (isset($qstr) && $qstr!='') {
            $this->db->where($qstr);
            
        }
 
        $qr = $this->db->from($table)->get();
        $rs = $this->results($qr); 
        $rs = $this->set_data_format($rs);
        return $rs;
    }

    public function set_data_profile($qstr, $table='')
    {
        $this->verify_is_table($table);

        if ($qstr['id']!='0') {
            $rs['query'] = $this->db->where('id', $qstr['id'])->update($table, $qstr);
            $rs['lastID'] = $qstr['id'];
        }else {
            unset($qstr['id']);
            $rs['query'] = $this->db->insert($table, $qstr);
            $rs['lastID'] = $this->db->insert_id();
        }
        
        $this->session->set_flashdata('sess_query', 'OK');

        return $rs;
    }

    public function get_data_profile($qstr, $table='')
    {
        $this->verify_is_table($table);

        $items='*';
        $qr = $this->db->select($items)->from($table)->where($qstr)->get();
        $rs = $this->results($qr);
        $rs = $this->set_data_format($rs);

        return $rs;
    }

    public function remove_data_profile($qstr, $table='')
    {
        $this->verify_is_table($table);

        $rs['query'] = $this->db->delete($table, $qstr);
        $this->session->set_flashdata('sess_query', 'OK');

        return $rs;
    }

    public function remove_attached_construction_docs($id)
    {
        $qstr = array(
            'status'=>0
            , 'lastupdated'=>date('Y-m-d H:i:s')
        );

        $this->db->where('construction_id', $id)->update('construction_attached_files', $qstr);
        $this->session->set_flashdata('sess_query', 'OK');
    }

    public function getUserCo($id){
            $output=[];
             $items='*';
            $qstr = "map_id = ".$id;
            $qr = $this->db->select($items)
                ->from('pic_in_house_map')
                ->where($qstr)->get();
            $rs = $this->results($qr);
           // print_r($rs);
            foreach($rs['rs'] as $key => $value){
                //print_r($value);
                $search  = " dept_in_house_id !=5 and dept_in_house_id !=1 and id = ".$value['pic_in_house_id'];
               // echo  $search ;
                 $rs_email = $this->db->select('*')
                 ->from('pic_in_house_category')
                ->where(   $search )->get();
                $email = $this->results($rs_email);
                if(!empty($email['rs'][0]['email'])){
                    $output[] =  $email['rs'][0]['email']  ;
                }
               
            }
            return $output;
    }

}//end class

 
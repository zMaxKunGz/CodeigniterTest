<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
    
	public function insert_data($table,$input)
    {
       /*
        ex. input 
        $input = array(
            'column_name1' => $input_data1 ,
            'column_name2' => $input_data2 );
        $this->Core_model->insert_data('table_name',$input);
        */ 
        $this->db->trans_start(); // Support Multiple transection
        $this->db->insert($table,$input);   
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false ; // generate an error... or use the log_message() function to log your error
        }else{
            return true;
        }
    }
    public function insert_id($table,$input)
    {
        /*
        ex. input 
        $input = array(
            'column_name1' => $input_data1 ,
            'column_name2' => $input_data2 );
        $this->Core_model->insert_id('table_name',$input);
        */ 
        $this->db->trans_start(); // Support Multiple transection
        $this->db->insert($table,$input);  
        $last_id = $this->db->insert_id();

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false ; // generate an error... or use the log_message() function to log your error
        }else{
            return $last_id;  
        }
       
    }
    public function get_data($table) 
    {
        /*
        ex.  
        $this->Core_model->get_data('table_name');
        */ 
        $query = $this->db->get($table)
                ->result_array();
    
        return $query;
    }
    public function get_data_by_id($table,$id) 
    {
        /*
        ex. input 
        $table = array(
            'table' => 'table_name',
            'primary' => 'column_primary_name' );
        $this->Core_model->get_data_by_id($table,$id);
        */
        $query = $this->db
                    ->where('id',$id)
                    ->get($table)
                    ->result_array();
        return $query ;
    }
    public function get_data_noarray0($table,$id) 
    {
        /*
        ex. input 
        $table = array(
            'table' => 'table_name',
            'primary' => 'column_primary_name' );
        $this->Core_model->get_data_by_id($table,$id);
        */

        $query = $this->db
                    ->where_in($table['id'],$id)
                    ->get($table)
                    ->result_array();
        if(!empty($query)){
            return $query[0];
        }else{
            return NULL ;
        }
    }
    public function update_data($table,$input,$id) 
    {
        /*
        ex.  
        $table = array(
            'table' => 'table_name',
            'primary' => 'column_primary_name' );

        $input = array(
            'column_primary_name' => $id ,
            'name' => $username );
        $this->Core_model->update_data($table,$input,$id);
        */
        $this->db->trans_start(); // Support Multiple transection
        $query = $this->db->where('id',$id)
                    ->update($table,$input);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false ; // generate an error... or use the log_message() function to log your error
        }else{
            return true;
        }
    }

    public function delete_data($table,$id) 
    {
        /*
        ex. input 
        $table = array(
            'table' => 'table_name',
            'primary' => 'column_primary_name' );
        $this->Core_model->delete_data($table,$id);
        */

        $this->db->trans_start(); // Support Multiple transection
        $query = $this->db->where($table['primary'],$id)
                    ->delete($table['table']);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false ; // generate an error... or use the log_message() function to log your error
        }else{
            return true;
        }
    }

    public function delete_data_multi_where($table) 
    {
        /*
        ex. input 
        $table = array(
            'table' => 'table_name',
            'primary' => array('a'=>1,'b'=>2) );
        $this->Core_model->delete_data_multi_where($table);
        */

        $this->db->trans_start(); // Support Multiple transection
        $query = $this->db->where($table['primary'])
                    ->delete($table['table']);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false ; // generate an error... or use the log_message() function to log your error
        }else{
            return true;
        }
    }

    public function month() //เปลี่ยนตัวเลขเป็นเดือน
    {       
        /*
            Ex. 
            // Controller //
            $month = $this->Core_model->month();
            $data['month'] = $month['thaimonth'];

            // view //
            $date = $date[0]['date_exam'] ;
            echo substr($date,8,2).' '.$month[substr($date,5,2)-1].' '.(substr($date,0,4)+543).'&nbsp; เวลา '.substr($date,10,6) .' น.';
        */
        $thaimonth = array(
                            "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน",
                            "พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม",
                            "กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"
                        );
        $thaiMonthShort = array(
                                "ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.",
                                "ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."
                            );
        $monthTH = array(
                            'thaimonth' => $thaimonth,
                            'thaiMonthShort' => $thaiMonthShort
                        );
        return $monthTH;
    }

    public function get_all($arr)
    {
        /*$arr = array(
                        'table' => 'document',
                        'where' => array(
                                            'student_id' => $std_id
                                            , 'status' => 1
                                            , 'type_id' => 1
                                        )
                    );*/
        if (isset($arr['order'])) {
            $this->db->order_by($arr['order'],'DESC');
        }
        $rs=$this->db->where($arr['where'])->get($arr['table'])->result_array();
        return $rs;
    }

}

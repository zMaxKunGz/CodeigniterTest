<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/modules/header/controllers/Header.php';
require_once FCPATH.'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class Email extends Header {
    
    public function __construct() 
    {
        parent::__construct();

        $this->load->module('construction/construction_license');
        $this->load->module('license/License');
        $this->load->model('license/License_model');
    }

    private $prop=array(
                        'charset'=>'utf-8',
                        'smtpauth'=>false,
                        'smtpsecure'=>'',
                        'host'=>'outmail.scg.com',
                        'port'=>25,
                        'subject'=>'แจ้งเตือนจากระบบ - E-license',

                        'username'=>'kleepppa@scg.com',
                        //'username'=>'wisootkh',

                        'password'=>'jan#1118',
                        //'password'=>'tony2017',
                        'account_sender'=>'kleepppa@scg.com',
                        'alias_sender'=>'ระบบ - E-license no-reply',
                        // 'receiver'=>'omonoreply@gmail.com',
                        'receiver'=>'geidtiphong@gmail.com',
                        'email_status'=>'Sent already !',
                        'body'=>"Hello ! \n This is Botx..."
                    );

    private function sendmail($input='')
	{

       // exit;
        $this->prop['body']=(isset($input['body']))? $input['body'] : $this->prop['body'];
        $this->prop['receiver']=(isset($input['receiver']))? $input['receiver'] : $this->prop['receiver'];
 
        $mail = new PHPMailer;
        $mail->CharSet    = $this->prop['charset'];
        $mail->IsSMTP();
        $mail->isHTML(true);
        $mail->SMTPAuth   = $this->prop['smtpauth'];
        $mail->SMTPSecure = $this->prop['smtpsecure'];
        $mail->Host       = $this->prop['host'];
        $mail->Port       = $this->prop['port'];
        $mail->Username   = $this->prop['username'];
        $mail->Password   = $this->prop['password'];
        $mail->SetFrom($this->prop['account_sender'], $this->prop['alias_sender']);
        $mail->Subject    = $this->prop['subject'];
        $mail->Body       = $this->prop['body'];
        $mail->AddAddress($this->prop['receiver']);
    //$mail->AddCC("PRACHCH@SCG.COM");
    //$mail->AddCC("geidtiphong@gmail.com");
    //$mail->AddCC("wanchalermb@gmail.com");

//echo '<pre>', print_r($this->prop['receiver']);


//exit();
print_r($this->prop);
//exit();
        if(!$mail->send()) {
            echo $this->prop['email_status']=$mail->ErrorInfo;
            return 'ERROR';
        }
	}
   
    public function test()
    {
        $this->sendmail();
    }

    public function send_email_to_stakeholders_construction()
    {
        $category = 2;
        $construction_list = $this->Header_model->get_data_list('license_constructs', array('email_status'=>0));
        
        foreach ($construction_list['rs'] as $key => $value) {
            $stakeholders_email = $this->License_model->get_map_stakeholder_list(array('map_id'=>$value['id'], 'category'=>$category));

            foreach ($stakeholders_email['rs'] as $key1 => $value1) {
                $inputs['receiver'] = $value1['email'];
                $inputs['body'] = $this->set_email_body($value, $value1);

                $this->sendmail($inputs);
            }
        }
    }

    private function set_email_body($construcs_profile, $user_profile)
    {
        // echo '<pre>', print_r($construcs_profile);
        // echo '<pre>', print_r($user_profile);
        $hash = session_id();
        $host = site_url('construction/construction_license/form_check_list_docs');
        $link = $host.'/'.$hash.'/'.$construcs_profile['id'].'/'.$user_profile['user_id'];
        $body ='เรียนคุณ&nbsp;'.$user_profile['name'].'<br>';
        $body.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระบบขอแจ้งว่าท่านมีใบขออนุญาตก่อสร้าง&nbsp;[&nbsp;'.$construcs_profile['activity_no'].'&nbsp;]&nbsp;'.$construcs_profile['activity'];
        $body.='ซึ่งได้ดำเนินการขอใบอนุญาตก่อสร้างและทาง&nbsp;'.$construcs_profile['dept_name'];
        $body.='&nbsp;ได้ทำการออกใบขออนุญาตก่อสร้างในวันที่&nbsp;'.$construcs_profile['request_date'];
        $body.='&nbsp;ทั้งนี้ท่านสามารถยืนเอกสารที่เกี่ยวข้องได้ตามลิ้งด้านล่างนี้ค่ะ&nbsp;';
        $body.='<a href='.$link.'>คลิกลิ้งเพื่อดำเนินรายการค่ะ</a><br>';
        return $body;
    }

    public function send_email_licenses_expiring()
    {   
        $users = $this->Header_model->get_data_list('users', array('user_cate !='=>3,'status '=>1));
 
        $license_list = $this->license->get_license_expring();

 

        foreach ($users['rs'] as $key => $value) {
            $body ='เรียนคุณ&nbsp;'.$value['name'].'<br>';
            $body.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระบบขอแจ้งว่ามีใบอนุญาต&nbsp;กำลังจะหมดอายุตามรายการด้านล่างนี้ <br>';
            $body.=$this->set_table_license_expiring($license_list);
           // echo '<pre>', print_r($body);

            $inputs['receiver'] = $value['email'];
            $inputs['body'] = $body;  // 'subject'=>'แจ้งเตือนจากระบบ - E-license',
            $inputs['subject'] = 'แจ้งเตือนจากระบบ - E-license ** ใบอนุญาต **';
            $this->sendmail($inputs);
        }
    }


 



    public function send_email_licenses_constructions_expiring()
    {
        $users = $this->Header_model->get_data_list('users', array('user_cate !='=>3));
        $license_list = $this->construction_license->get_license_construction_expring();

        foreach ($users['rs'] as $key => $value) {
            $body ='เรียนคุณ&nbsp;'.$value['name'].'<br>';
            $body.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระบบขอแจ้งว่ามีใบขออนุญาตก่อสร้าง&nbsp;กำลังจะหมดอายุตามรายการด้านล่างนี้ <br>';
            $body.=$this->set_table_license_expiring($license_list);
            // echo '<pre>', print_r($body);

            $inputs['receiver'] = $value['email'];
            $inputs['body'] = $body;
            $inputs['subject'] = 'แจ้งเตือนจากระบบ - E-license ** ใบอนุญาต ก่อสร้าง **';

            $this->sendmail($inputs);
        }
    }

    private function set_table_license_expiring($qstr)
    {
        // echo "<pre>";
        // print_R($qstr);
        // exit;
        $body='<table border="1">';
        $body.='<tr>';
        $body.='<td>รายการใบอนุญาต</td>';
        $body.='<td>คงเหลือจำนวนวัน</td>';
        $body.='</tr>';

        foreach ($qstr as $key => $value) {
            $this->send_mail_to_co_document( $value);
            $body.='<tr>';
            $body.='<td>[&nbsp;'.$value['activity_no'].'&nbsp;]&nbsp;-&nbsp;'.$value['activity'].'</td>';
            $body.='<td>'.$value['diff_days'].'</td>';
            $body.='</tr>';
        }
        
        $body.='</table>';
        
        return $body;
    }

 
    function send_mail_to_co_document( $data){
 
        $rs = $this->Header_model->getUserCo($data['id']);
     

        $body ='เรียนผู้เกี่ยวข้อง เอกสาร &nbsp;'.$data['activity'].'<br><br>';
        $body.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระบบขอแจ้งว่ามีใบขออนุญาต <b>'.$data['activity'].'</b>&nbsp;กำลังจะหมดอายุตามรายการด้านล่างนี้ <br>';
        // echo '<pre>', print_r($body);
        $body.=" ชื่อใบอนุญาต :".$data['activity']."  วันสิ้นสุดใบอนุญาต :".$data['expire_date']." (".$data['diff_days'] ." วัน ) <br>";
        $body.=" สถานะ : ".$data['status_label'] ;
        $body.=" <br> ขอให้ดำเนินการด้วย " ;

       // $inputs['receiver'] = $data['email'];
        $inputs['body'] = $body;
        $inputs['subject'] = 'แจ้งเตือนจากระบบ - E-license ** ใบอนุญาต ก่อสร้าง **';

        foreach($rs as $value){
            $inputs['receiver'] = $value;

           echo $value."<br>";
        }
    
        echo $body;
       // exit;
         $this->sendmail($inputs);
    }
   

}//end class

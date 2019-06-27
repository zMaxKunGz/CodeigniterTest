<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set("Asia/Bangkok");

class Main_libs {

    function set_date_th($val='0000-00-00') 
    {
        if(!isset($val) || $val =="" || $val =="0000-00-00") {
            $val_date ="0000-00-00";
        }else {
            $val = str_replace('/', '-', $val);
            $date_explod = explode('-', $val);
            $dates_en = $date_explod[0].'-'.$date_explod[1].'-'.($date_explod[2]-543);
            $val_date = date('Y-m-d', strtotime($dates_en));
        }

        return $val_date;
    }

    function get_date_th($val='0000-00-00') 
    {
        if(!isset($val) || $val =="0000-00-00") {
            $val_date ="";
        }else {
            $date_explod = explode('-', $val);
            $val_date = $date_explod[2].'/'.$date_explod[1].'/'.($date_explod[0]+543);
        }

        return $val_date;
    }

    function get_val($val=0) 
    {
        return ($val!='0'? $val : '');
    }

    function set_val($val='') 
    {
        return (isset($val) && $val!=''? $val : 0);
    }

    public function set_license_status($status=0)
    {
        switch($status) {
            case 0 : $rs = "<span class='label label-danger'>ยกเลิกเอกสาร</span>"; break;
            case 1 : $rs = "<span class='label label-info'>ยื่นเอกสารแล้ว</span>"; break;
            case 2 : $rs = "<span class='label label-info'>อยู่ระหว่างการออกใบอนุญาต</span>"; break;
            case 3 : $rs = "<span class='label label-success'>ได้รับใบอนุญาตแล้ว</span>"; break;
            case 4 : $rs = "<span class='label label-default'>ยังไม่ได้ยื่นเอกสาร</span>"; break;
            default: $rs = "<span class='label label-default'>ไม่ได้ระบุ</span>";break;
            // default: $rs = "<span class='label label-danger'>ยกเลิกเอกสาร</span>";break;
        }

        return $rs;
    }

    public function set_deed_status($status=0)
    {
        switch($status){
            case 1 : $rs = "<span class='label label-success'>ปกติ</span>";break;
            default: $rs = "<span class='label label-danger'>ยกเลิก</span>";break;
        }

        return $rs;
    }

    public function get_date_amount($expire)
    {
        $datediff = (strtotime($expire)-time());
        $rs = floor($datediff / (60 * 60 * 24));
        return $rs;
    }

    public function get_total_price($qstr)
    {
        // echo '<pre>', print_r($qstr);exit();
        $rs = 0;
        foreach ($qstr as $key => $value) {
            if (isset($value['price'])) {
                $rs = $rs + $value['price'];
            }
        }

        return number_format($rs, 2);
    }

    public function fillter_license_expiring($val)
    {
        $rs = array();
        if ($val['date_amount_expire'] <= $val['notice_expire_amount']) {
            array_push($rs, $val);
        }

        return $rs;
    }

    public function fillter_license_constructs_expiring($val)
    {
        $rs = array();        
        if ($val['date_amount_acquire'] <= $val['notice_expire_amount']) {
            array_push($rs, $val);
        }

        return $rs;
    }

    public function fillter_license_over_expiring($val)
    {
        $rs = array();
        if ($val['date_amount_expire'] < 0) {
            array_push($rs, $val);
        }

        return $rs;
    }

    public function fillter_constructs_over_expiring($val)
    {
        $rs = array();
        if ($val['date_amount_acquire'] < 0) {
            array_push($rs, $val);
        }

        return $rs;
    }


}//end class
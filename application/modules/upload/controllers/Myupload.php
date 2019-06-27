<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Myupload extends MX_Controller {

	function upload_file($prop)
	{
		$config['upload_path'] = $prop['upload_path'];
        $config['allowed_types'] = $prop['allowed_types'];
        $config['file_name'] = date("YmdHis");

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload($prop['txt_upload'])) {
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            //echo "<pre>", print_r($data);
            if ($data['file_name'] != NULL && $prop['txt_unlink'] != '0' && $prop['txt_unlink'] !='' && $prop['txt_unlink'] != $prop['default_file']) {
                // unlink($prop['upload_path'].$prop['txt_unlink']);
            }
        }else {
            // echo $this->upload->display_errors();
            $file_name = ($prop['txt_unlink'] != NULL)? $prop['txt_unlink'] : '0';
        }
        return $file_name;
	}

	function get_file_urls($path='files', $val='0')
	{
		$image = ($val !='' && $val !='0')? $val : 'default-thumbnail.png';
		$image_link = base_url('files/'.$image);
		$doc_path = $_SERVER["DOCUMENT_ROOT"].'/e-license';

		if (file_exists($doc_path.'/'.$path.'/'.$image))
		{
			$image_link = base_url($path.'/'.$image);
        }
        
        return $image_link;
	}
	
}//class end

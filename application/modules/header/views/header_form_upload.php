<?php

$form_submit = (isset($form_submit)? $form_submit : 'login');
// echo $form_submit;exit();
$arr = array("class" => "form-horizontal myform_submit", 'id'=>'myform', 'autocomplete'=>'off'); 
echo form_open_multipart($form_submit, $arr);
?>
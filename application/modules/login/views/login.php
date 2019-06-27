 <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!-- iOS webapp icons -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/images/ios/fickle-logo-72.png');?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/images/ios/fickle-logo-72.png');?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/images/ios/fickle-logo-114.png');?>" />
    <!-- TODO: Add a favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ico/fab.ico');?>">
    <title>E-E-license</title>

    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins/fullcalendar/fullcalendar.print.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/pace.css');?>">
    <script src="<?php echo base_url('assets/js/pace.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery-1.11.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <!-- Remodal Js Start-->
    <script src="<?php echo base_url('assets/js/jquery.remodal.min.js');?>"></script>
    <!-- Remodal Js Finished-->
    <script src="<?php echo base_url();?>/assets/js/bootbox.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/icheck/skins/all.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jquery.remodal.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/bootstrap-progressbar-3.1.1.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/dndTable.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/tsort.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jquery.datetimepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css');?>">
</head>

<body class="light-green-color" style="background-color: #1FB5AD">

    <input type="hidden" id="login_check" value="<?php echo ($this->session->has_userdata('status'))? 'error':''; ?>">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="login-box">
                        <div class="login-content">
                            <div>
                                <!-- <i class="glyphicon glyphicon-user"></i> -->
                                <img src="<?php echo base_url('files/logo.png');?>" alt="SCG" style="width:200px; hegiht:150px;">
                            </div>
                            <h3>E-BIAM</h3>
                        </div>

                        <div class="login-form">
                            <?php $this->load->view('header/header_form_upload');?>

                                

                                <div class="input-group ls-group-input">
                                    <input type="text" name="txt_username" class="form-control" placeholder="ชื่อเข้าใช้งาน"">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>

                                <div class="input-group ls-group-input">
                                    <input type="password" name="txt_passwords" placeholder="Password" class="form-control">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                </div>

                                <div class="input-group ls-group-input login-btn-box">
                                    <button type="submit" class="btn ls-dark-btn ladda-button col-md-12 col-sm-12 col-xs-12" data-style="slide-down">
                                        <span class="ladda-label"><i class="fa fa-key"></i>&nbsp;ล๊อกอิน</span>
                                    </button>

                                    <!--<a class="forgot-password" href="javascript:void(0)">ลืมรหัสผ่าน&nbsp;?</a>-->
                                </div>
                            <?php echo form_close();?>
                        </div>

                        <!--<div class="forgot-pass-box">
                            <form action="#" class="form-horizontal ls_form">
                                <div class="input-group ls-group-input">
                                    <input class="form-control" type="text" placeholder="someone@mail.com">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                </div>
                                <div class="input-group ls-group-input login-btn-box">
                                    <button class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">
                                        <i class="fa fa-rocket"></i> Send
                                    </button>

                                    <a class="login-view" href="javascript:void(0)">Login</a> & <a class="" href="registration.html">Registration</a>

                                </div>
                            </form>
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script type="text/javascript">
        $(document).ready(function() {
            console.log($('#login_check').val());
            if(<?php echo $this->session->has_userdata('status'); ?>) {
                bootbox.alert('Username หรือ Password ผิด กรุณาลองใหม่อีกครั้ง');
            }
        });
    </script>
</body>
</html>
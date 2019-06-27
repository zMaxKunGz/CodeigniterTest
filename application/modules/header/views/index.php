 
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
    <title>E-MILL SERVICE</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/pace.css');?>">        
    <script src="<?php echo base_url('assets/js/pace.min.js');?>"></script>

    <!-- CORE jQuery -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery-1.11.min.js');?>"></script>
    
    <!-- CORE bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/bootstrap-progressbar-3.1.1.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jquery-jvectormap.css');?>">
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    
    <link href="<?php echo base_url('assets/css/plugins/humane_themes/bigbox.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/humane_themes/libnotify.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/humane_themes/jackedup.css');?>" rel="stylesheet">


    <link href="<?php echo base_url('assets/css/bootstrap.min.css" rel="stylesheet');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/custom_smart_wizard.css'); ?>">


    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/fullcalendar/fullcalendar.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/fullcalendar/fullcalendar.print.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/dndTable.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/tsort.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jquery.datetimepicker.css');?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jquery.minicolors.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/bootstrap-datepicker-thai/css/datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/icheck/skins/all.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/fileinput.min.css');?>"> 

    <!--AmaranJS Css Start-->
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/jquery.amaran.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/all-themes.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/awesome.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/default.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/blur.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/user.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/rounded.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/readmore.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/amaranjs/theme/metro.css');?>" rel="stylesheet">
    <!--AmaranJS Css End -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/jquery.remodal.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/selectize.bootstrap3.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">

</head>

<body style="font-family: 'Kanit', sans-serif; font-size: 14px;">
<?php
$user_profile = $this->session->userdata('user_profile');
// $is_admin = $user_profile['is_admin'];
// echo "<pre>",print_r($user_profile);exit();
// if (empty($user_profile)) {
//     redirect('login');
// }
?>
<!--Navigation Top Bar Start-->
<nav class="navigation">
<div class="container-fluid">
<!--Logo text start-->
<div class="header-logo">
    <a href="<?php echo site_url('/workrequest/index');?>" title="">
        <!-- <h1>E-BAIM</h1>  -->
        <img src="<?php echo base_url('/files/logo.png');?> " width=100>
    </a>
</div>
<!--Logo text End-->
<div style="position: absolute; left: 50%;">
    <h1 style="margin-top: 12px;">
        ระบบแจ้งซ่อม
    </h1>
</div>

<div class="top-navigation" style="margin-top: 5px;">
<!--Collapse navigation menu icon start -->
<!-- <div class="menu-control hidden-xs">
    <a href="javascript:void(0)">
        <i class="fa fa-bars"></i>
    </a>
</div> -->
<!-- <div class="search-box">
    <ul>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                <span class="fa fa-search"></span>
            </a>
            <div class="dropdown-menu top-dropDown-1">
                <h4>Search</h4>
                <form>
                    <input type="search" placeholder="what you want to see ?">
                </form>
            </div>

        </li>
    </ul>
</div> -->

<!--Collapse navigation menu icon end -->
<!--Top Navigation Start-->

<ul>
    <li class="hidden-xs">
        <?php echo 'ยินดีต้อนรับ &nbsp;:&nbsp;', $this->session->userdata('staff_name');?><br>
        <?php echo 'ตำแหน่ง &nbsp;:&nbsp;', $this->session->userdata('position_name');?>
    </li> 
<!--     <li>
        <a href="<?php  echo site_url('login/logout');?>">
            <i class="fa fa-power-off"></i>
        </a>
    </li> -->
</ul>

<!--Top Navigation End-->
</div>
</div>
</nav>

<section id="main-container">
    <section id="left-navigation">
        <div class="user-image">
        <img src="<?php echo base_url('files/profile.png');?>" alt="E-BIAM" class="img-responsive">
            <?php //if ($user_profile['image'] !='') {?>
                <!-- <img src="<?php //echo $user_profile['image_url'];?>" alt="" class="img-responsive" style="height: 80px;" /> -->
                
            <?php //}else {?>
                <!-- <img src="<?php //echo base_url('assets/images/demo/avatar-80.png');?>" alt="" /> -->
            <?php //}?>
            <!-- <div class="user-online-status"><span class="user-status is-online"></span> </div> -->
        </div>
 
        <?php $this->load->view('menu', ['is_admin'=>$user_profile['is_admin']]);?>
    </section>

    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <?php
                    $sess_query = $this->session->flashdata('sess_query');
                    $this->load->view($content);
                ?>
            </div>
        </div>
    </section>
</section>
 
<!--Right hidden  section end -->
<!--<div id="change-color">
    <div id="change-color-control">
        <a href="javascript:void(0)"><i class="fa fa-magic"></i></a>
    </div>
    <div class="change-color-box">
        <ul>
            <li class="default active"></li>
            <li class="red-color"></li>
            <li class="blue-color"></li>
            <li class="light-green-color"></li>
            <li class="black-color"></li>
            <li class="deep-blue-color"></li>
        </ul>
    </div>
</div>-->
</section>

<!--Layout Script start -->
<script type="text/javascript" src="<?php echo base_url('assets/js/color.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/multipleAccordion.js');?>"></script>

<!--Nano Scroll Script Start -->
<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>
<!--Nano Scroll Script End -->

<!--switchery Script Start -->
<script src="<?php echo base_url('assets/js/switchery.min.js');?>"></script>
<!--switchery Script End -->

<!--bootstrap switch Button Script Start-->
<script src="<?php echo base_url('assets/js/bootstrap-switch.js');?>"></script>
<!--bootstrap switch Button Script End-->

<!--bootstrap-progressbar Library script Start-->
<script src="<?php echo base_url('assets/js/bootstrap-progressbar.min.js');?>"></script>
<!--bootstrap-progressbar Library script End-->

<script type="text/javascript" src="<?php echo base_url('assets/js/pages/layout.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.remodal.min.js');?>"></script>
<!--Layout Script End -->

<script src="<?php echo base_url('assets/js/countUp.min.js');?>"></script>

<!-- skycons script start -->
<script src="<?php echo base_url('assets/js/skycons.js');?>"></script>
<!-- skycons script end   -->

<!--Vector map library start-->
<script src="<?php echo base_url('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!--Vector map library end-->

<!--AmaranJS library script Start -->
<script src="<?php echo base_url('assets/js/jquery.amaran.js');?>"></script>
<!--AmaranJS library script End   -->

<!-- Date & Time Picker Library Script Start -->
<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker-thai/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js');?>"></script>
<!-- Date & Time Picker Library Script End -->

<script src="<?php echo base_url('assets/js/icheck.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/checkboxRadio.js');?>"></script>
<script src="<?php echo base_url('assets/js/editable-table/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.maskedinput.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/fileinput.min.js');?>"></script>



 


<script src="<?php echo base_url('assets/js/notify.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/humane.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/selectize.min.js');?>"></script>

<script src="<?php echo base_url('assets/js/jquery.autosize.js');?>"></script>
<script src="<?php echo base_url('assets/js/pages/sampleForm.js');?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.dataTable').dataTable({ "sPaginationType": "full_numbers" });
    $('.table-expire-date').DataTable({
        "sPaginationType": "full_numbers",
        "order": [[ 3, "asc" ]]
    });

    $('.datePickerOnly').datepicker({language:'th-th',format:'dd/mm/yyyy'});
    $(".datePickerOnly").mask("99/99/9999");

    let sess_query ='<?php echo $sess_query;?>';
    
    if (sess_query!='') {
        notifi_amaran_success();
    }
    
})

function notifi_amaran_success()
{
    $.amaran({
            content:{
                message:'ระบบแจ้งเตือน',
                size:'บันทึกข้อมูลเสร็จค่ะ',
                file:'',
                icon:'fa fa-bell-o'
            },
            theme:'default ok',
            position:'top right',
            inEffect:'slideLeft',
            outEffect:'slideTop'
        });
}

function submit_myform()
{
    $("#myform").submit(function(e) {
        e.preventDefault();
        let form = this;
        
        bootbox.confirm('คุณต้องการทำรายการหรือไม่ ?', function (res) {
            if (res) {
                form.submit();
            }
        });
    });
}
</script>
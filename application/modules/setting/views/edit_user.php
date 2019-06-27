 
 
 
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">แก้ไชผู้ใช้งาน</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">แก้ไชผู้ใช้งาน</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">แก้ไชผู้ใช้งาน </h3>
                        </div>
                        <div class="panel-body">
                        <form class="form-horizontal ls_form ls_form_horizontal" method=post id="form" action="<?php echo base_url();?>/index.php/setting/editFormUser">
                            <input type="hidden" name="id" value="<?php echo $user['staff_dept_id'];?>"/>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">แก้ไข ชื่อ-นามสกุล</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="ชื่อ-นามสกุล ภาษาไทย." name="name" class="form-control"  value="<?php echo $user['staff_name']; ?>" />
                                    <span class="help-block m-b-none">ชื่อ-นามสกุล ภาษาไทย.</span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">แก้ไข Email</label>

                                <div class="col-lg-10">
                                    <input type="email" placeholder="อีเมลล์" name="email" class="form-control"  value="<?php echo $user['staff_email']; ?>" />
                                    <span class="help-block m-b-none">Email.</span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">แก้ไข แผนก</label>

                                <div class="col-lg-10">
                                    <select id="select-country" class="demo-default" name="department" placeholder="เลือกแผนก....." >
                                        <option value="">โปรดเลือกแผนกที่จะแก้ไข...</option>
                                        <?php foreach($dept as $value) { ?>
                                            <?php 
                                                if($value['department_id'] == $user['department_id']) { 
                                            ?>
                                                <option value="<?php echo $value['department_id']; ?> " selected> <?php echo $value['department_name']; ?> </option>
                                            <?php 
                                            }
                                            else { 
                                            ?>
                                                <option value="<?php echo $value['department_id']; ?> "> <?php echo $value['department_name']; ?> </option>
                                            <?php
                                            } 
                                         }  
                                         ?>
                                     </select>
                                   
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-lg-2 control-label">แก้ไข Password</label>

                                <div class="col-lg-10">
                                    <input type="password" placeholder="password" name="password" class="form-control" />
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary"  id="confirmBootBox" type="button">บันทีกข้อมูล</button>
                                
                                    <a href="<?php echo site_url('setting/user_list');?>"><button class="btn ls-red-btn"   type="button">ยกเลิก</button></a>

                                     
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
 


<script type="text/javascript">
$("#confirmBootBox").click(function(){
        bootbox.confirm("คุณต้องการบันทึกข้อมูลหรือไม่?", function(result) {
            var data ="Confirm result: "+result;
            if (result) {
                $('#form').submit();
            }
        });
    });
</script>

    <!--selectize Library start-->
    <script src="<?php echo base_url();?>/assets/js/selectize.min.js"></script>
    <!--selectize Library End-->

    <!--Select & Tag demo start-->
    <script src="<?php echo base_url();?>/assets/js/pages/selectTag.js"></script>
  <!--BootBox script for calender start-->
    <script src="<?php echo base_url();?>/assets/js/bootbox.min.js"></script>
     <!--bootstrap validation Library Script Start-->
     <script src="<?php echo base_url();?>assets/js/bootstrapvalidator/bootstrapValidator.js"></script>
    <!--bootstrap validation Library Script End-->

 
    <script src="assets/js/fileinput.min.js"></script>
 
 
 
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">แก้ไขผู้ปฎิบัติงาน</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">แก้ไขผู้ปฎิบัติงาน</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">แก้ไขผู้ปฎิบัติงาน</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal ls_form ls_form_horizontal" action="<?php echo base_url();?>/index.php/setting/editFormStaffDepartment" method="post">
                                
                                <input type="hidden" name="id" value="<?php echo $staff['staff_id'];?>"/>
                                
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">ชื่อ-นามสกุล</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="text" name="name" value="<?php echo $staff['staff_name']; ?>" class="form-control">
                                        <span class="help-block m-b-none">ชื่อ-นามสกุล ภาษาไทย.</span>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-lg-2 control-label">ตำแหน่ง</label>
                                    <div class="col-lg-10">
                                        <select id="select-country" class="demo-default" placeholder="ตำแหน่ง....." name="position">
                                        <?php foreach($position as $value) { ?>
                                                <?php 
                                                    if($value['position_id'] == $staff['position_id']) { 
                                                ?>
                                                    <option value="<?php echo $value['position_id']; ?> " selected> <?php echo $value['position_name']; ?> </option>
                                                <?php 
                                                }
                                                else { 
                                                ?>
                                                    <option value="<?php echo $value['position_id']; ?> "> <?php echo $value['position_name']; ?> </option>
                                                <?php
                                                } 
                                             }  
                                             ?>
                                         </select>   
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Username</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="text" name="user" class="form-control" value="<?php echo $staff['user']; ?>">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password</label>

                                    <div class="col-lg-10">
                                        <input type="password" placeholder="password" name="password" class="form-control" >
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" id="confirmBootBox"  type="button">บันทีกข้อมูล</button>
                                    
                                        <a href="<?php echo site_url('setting/staff_list');?>"><button class="btn ls-red-btn"   type="button">ยกเลิก</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                $('form').submit();
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

    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">เพิ่มแผนก</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">เพิ่มแผนก</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">เพิ่มแผนก</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal ls_form ls_form_horizontal" action="<?php echo base_url();?>/index.php/setting/addFormDept" method="post">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">รหัสแผนก</label>

                                    <div class="col-lg-10">
                                        <input type="text" placeholder="โปรดระบุรหัสแผนก" name="addDeptCode" class="form-control">
                                    </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">ชื่อแผนก</label>

                                    <div class="col-lg-10">
                                        <input type="text" placeholder="โปรดระบุแผนก" name="addDeptName" class="form-control">
                                    </div>
                                    
                                </div>               
                                 
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="button" id="confirmProblem" >บันทีกข้อมูล</button>
                                    
                                        <a href="<?php echo site_url('setting/dept_list');?>"><button class="btn ls-red-btn"   type="button">ยกเลิก</button></a>
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
$("#confirmProblem").click(function(){
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
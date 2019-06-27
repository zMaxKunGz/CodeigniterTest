
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">เพิ่มสถานะงาน</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">เพิ่มสถานะงาน</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">เพิ่มสถานะงาน</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal ls_form ls_form_horizontal" action="<?php echo base_url();?>/index.php/setting/addFormWorkType" method="post">
                                <input type="hidden" name="id" />
                               
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">สถานะงาน</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="โปรดระบุสถานะงาน" name="statusname" class="form-control" ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">ความคืบหน้าคิดเป็นร้อยละ</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="ร้อยละ" name="percent" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="button" id="confirmProblem" >บันทีกข้อมูล</button>
                                        <a href="<?php echo site_url('setting/workType_list');?>"><button class="btn ls-red-btn"   type="button">ยกเลิก</button></a>
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
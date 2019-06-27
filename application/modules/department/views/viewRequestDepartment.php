 
 
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">รายละเอียดการแจ้ง</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">รายละเอียดการแจ้ง</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">รายละเอียดการแจ้ง</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">เรื่อง</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['repair_title']; ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ผู้แจ้ง</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['informer_name']; ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">รายละเอียดงาน</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['repair_description']; ?></label>
                                    </div>
                                </div>
                            </div>


                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">วันที่แจ้ง</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['request_date']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ประเภทการซ่อม</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['problem_name']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">แผนก</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['department_name']; ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">สถานะของงาน</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['flow_name']; ?></label>
                                    </div>
                                </div>
                            </div> 
                            <!-- <?php
                            if ($repair['repair_status'] == 1) {
                            ?>
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ผู้รับผิดชอบงาน</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $staff['staff_name']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">คำอธิบายงาน</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['repair_detail']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">วันที่แล้วเสร็จ</label>
                                    <div class="col-md-9">
                                    <label class=" control-label"><?php echo $repair['duedate'];; ?></label>
                                    </div>
                                </div>
                            </div> 
                            <?php    
                            }
                            ?> -->
                            
                        </div>
                    </div>
                </div>
                <?php
                    $this->load->view('approveBox');
                ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">รูปภาพ</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                            foreach ($documentList as $value) {    
                            ?>
                            <div class="col-md-12">
                                <img src="<?php echo base_url($value['current_file'])?>" style="max-width:100%;max-height:100%;">
                            </div> 
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <a href="<?php echo site_url('department/') ?>"><div align="center"><button class="btn ls-red-btn"><i class="fa fa-backward"></i> กลับหน้าหลัก </button></div></a>
            </div>

            <div class="row">
                <br>
            </div>
        </div>
    </div>



</section>
  
</div>

<!--BootBox script for calender start-->
<script src="<?php echo base_url();?>/assets/js/bootbox.min.js"></script>
<!--bootstrap validation Library Script Start-->

 
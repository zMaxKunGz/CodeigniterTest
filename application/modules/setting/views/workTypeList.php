<div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">สถานะงาน</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">สถานะงาน</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>

<div class="row">


                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">สถานะงาน </h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12  panel-body right" align="right">
                                    <a href="<?php echo base_url();?>/index.php/setting/add_worktypelist">  <button class="btn ls-red-btn"><i class="fa fa-plus-square-o"></i> เพิ่มสถานะงานใหม่ </button></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                <!--Table Wrapper Start-->
                                <div class="table-responsive ls-table">
                                    <table class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#NO.</th>
                                                    <th  width="65%">ชื่องาน</th>
                                                    <th  width="15%">แก้ไข</th>
                                                    <th width="15%">ลบ</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                foreach($worktypeList as $value){
                                            ?>
                                            <tr>
                                                
                                                <td> <?php echo $value['work_status_id']; ?></td>
                                                <td> <?php echo $value['work_status_name']; ?></td>
                                                <td class="text-center">  <a href="<?php echo base_url();?>/index.php/setting/editWorkTypeList/<?php echo $value['work_status_id']; ?>">  <button class="btn ls-light-blue-btn"><i class="fa  fa-indent"></i> แก้ไข </button></td>
                                                <td  class="text-center">  <button onclick="deleteWorkType(<?php echo $value['work_status_id']; ?>)" class="btn ls-red-btn" id="confirmBootBox"><i class="fa   fa-scissors"></i> ลบ </button></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <!--Table Wrapper Finish-->
                                </div>
                            </div>
                        </div>
                    </div> 



   
<script type="text/javascript">
    function deleteWorkType(id){
        bootbox.confirm("คุณต้องการลบข้อมูลหรือไม่?", function(result) {
            if (result) {
                var url = "<?php echo base_url();?>/index.php/setting/deleteWorkTypeList/" + id;
                $(location).attr("href", url);
            }
        });
    }


    </script>
    <!--BootBox script for calender start-->
    <script src="<?php echo base_url();?>/assets/js/bootbox.min.js"></script>
     <!--bootstrap validation Library Script Start-->
    <script src="<?php echo base_url();?>assets/js/bootstrapvalidator/bootstrapValidator.js"></script>

<div class="row">
<div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">จัดการผู้ใช้งาน</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">จัดการผู้ใช้งาน</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>


                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">จัดการผู้ใช้งาน </h3>
                                </div>
       
 

                                 <div class="row">
                                    <div class="col-md-12  panel-body right" align="right">
                                        <a href="<?php echo site_url('setting/add_user');?>"><button class="btn ls-red-btn"><i class="fa fa-plus-square-o"></i> เพิ่มผู้ใช้งานใหม่ </button></a>
                                    </div>
                                </div> 

                                <div class="panel-body">
                                <!--Table Wrapper Start-->
                                <div class="table-responsive ls-table">
                                    <table class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#NO.</th>
                                                    <th   >ชื่อ</th>
                                                    <th  width="30%">แผนก</th>
                                                    <th  width="15%">แก้ไข</th>
                                                    <th width="15%">ลบ</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                //$i=0;
                                                foreach($user as $value){
                                                //$i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $value['staff_dept_id']; ?></td>
                                                <td><?php echo $value['staff_name'];?></td>
                                                <td><?php echo $value['department_name'];?></td>
                                                <td class="text-center"  >  <a href="<?php echo base_url();?>index.php/setting/editUser/<?php echo $value['staff_dept_id']; ?>"> <button class="btn ls-light-blue-btn"><i class="fa  fa-indent"></i> แก้ไข </button></td>
                                                <td  class="text-center">    <button class="btn ls-red-btn" id="confirmBootBox" onclick="deleteUser(<?php echo $value['staff_dept_id']; ?>)"><i class="fa   fa-scissors"></i> ลบ </button></td>
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
    function deleteUser (id) {
        bootbox.confirm("คุณต้องการลบข้อมูลหรือไม่?", function(result) {
            if (result) {
                var url = "<?php echo base_url();?>/index.php/setting/deleteUser/" + id;
                $(location).attr("href", url);
            }
        });
    }
    function editUser (id) {
        bootbox.confirm("คุณต้องการลบข้อมูลหรือไม่?", function(result) {
            if (result) {
                var url = "<?php echo base_url();?>/index.php/setting/deleteUser/" + id;
                $(location).attr("href", url);
            }
        });
    }
                                

</script>
    <!--BootBox script for calender start-->
    <script src="<?php echo base_url();?>/assets/js/bootbox.min.js"></script>
     <!--bootstrap validation Library Script Start-->
    <script src="<?php echo base_url();?>assets/js/bootstrapvalidator/bootstrapValidator.js"></script>

    
        
    <!--Form Wizard CSS Start-->
    <script src="<?php echo base_url('assets/js/jquery.smartWizard.js');?>"></script>
    <!--Form Wizard CSS End-->
        <!--Demo Wizard Script Start-->
        <script src="<?php echo base_url('assets/js/pages/formWizard.js');?>"></script>
    <!--Demo Wizard Script End-->
        <!--selectize Library start-->
        <script src="<?php echo base_url('assets/js/selectize.min.js');?>"></script>
    <!--selectize Library End-->

    <!--Select & Tag demo start-->
    <script src="<?php echo base_url('assets/js/pages/selectTag.js');?>"></script>
    <!--Select & Tag demo end-->
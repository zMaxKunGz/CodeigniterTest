<div class="row">
        <div class="ls-button-group demo-btn">
                        <div class="col-md-12 " align="right">
                            <a href="<?php echo base_url();?>/index.php/request/register"><button class="btn ls-red-btn"> <i class="fa fa-pencil"></i>  แจ้งซ่อม </button></a>
                        </div>
                    </div>
</div>
<hr>
<div class="row">
 

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">งานแจ้งซ่อมทั้งหมด</h3>
                                </div>
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table table-bordered table-striped dataTable">
                                            <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>วันที่แจ้ง</th>
                                                <th>ชื่องาน</th>
                                                <th>ผู้แจ้ง</th>
                                                <th>หน่วยงาน</th>
                                                <th>ประเภทงาน</th>
                                                <th>สถานะของงาน</th>
                                                <th class="text-center">ดูรายละเอียด</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($repair_list as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['repair_id']; ?></td>
                                                <th><?php echo $value['request_date']; ?></th>
                                                <td><?php echo $value['repair_title']; ?></td>
                                                <td><?php echo $value['informer_name']; ?></td>
                                                <td><?php echo $value['department_code'].'-'.$value['department_name']; ?></td>
                                                <td><?php echo $value['problem_name']; ?></td>
                                                <td><?php echo $value['flow_name'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url('request/viewRequest/').$value['repair_id'];?>" ><button class="btn btn-xs btn-success"><i class="fa fa-search"></i></button></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
 
                                </div>
                            </div>
                        </div>
</div>
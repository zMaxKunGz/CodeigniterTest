<div class="row">
    <div class="col-md-12">
        <h3 class="ls-top-header">รายการแจ้งซ่อมทั้งหมด</h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="active">รายการแจ้งซ่อมทั้งหมด</li>
        </ol>
    </div>
</div>

<div class="row">
 

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">งานแจ้งซ่อมทั้งหมด แผนก : <?php echo $this->session->userdata('department_name') ?></h3>
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
                                                <th>ผู้แจ้งซ่อม</th>
                                                <th>แผนก</th>
                                                <th>ประเภทงาน</th>
                                                <th>สถานะงาน</th>
                                                <th class="text-center">แสดงรายละเอียด</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($repair_list as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['repair_id']; ?></td>
                                                <td><?php echo $value['request_date']; ?></td>
                                                <td><?php echo $value['repair_title']; ?></td>
                                                <td><?php echo $value['informer_name']; ?></td>
                                                <td><?php echo $value['department_code'].'-'.$value['department_name']; ?></td>
                                                <td><?php echo $value['problem_name']; ?></td>
                                                <td><?php echo $value['flow_name'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url('department/view/').$value['repair_id'];?>" ><button class="btn btn-xs btn-success"><i class="fa fa-search"></i></button></a>
                                                </td>
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
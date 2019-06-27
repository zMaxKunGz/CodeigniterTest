<div class="row">
    <div class="col-md-12">
        <h3 class="ls-top-header">รายการแจ้งซ่อมประจำเดือน<?php echo $month_list[(int)$month - 1]; ?></h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="active">รายการแจ้งซ่อมประจำเดือน<?php echo $month_list[(int)$month - 1]; ?></li>
        </ol>
    </div>
</div>
<div class="row">
 

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">รายการแจ้งซ่อมประจำเดือน<?php echo $month_list[(int)$month - 1]; ?></h3>
                                </div>
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-lg-2">
                                                <select id="select-month" class="demo-default" placeholder="เดือน" name="position">
                                                    <option value="">เดือน</option>
                                                    <?php 
                                                        $cnt = count($month_list);
                                                        for($i = 0; $i < $cnt; $i ++) { ?>
                                                        <option value="<?php echo $i; ?> "> <?php echo $month_list[$i]; ?> </option>
                                                    <?php }  ?>
                                                 </select>                                     
                                            </div>
                                            <div class="col-lg-2">
                                                <select id="select-year" class="demo-default" placeholder="ปี" name="position">
                                                    <option value="">ปี</option>
                                                    <?php 
                                                        $cnt = count($month_list);
                                                        foreach($year_list as $value) { ?>
                                                        <option value="<?php echo $value; ?> "> <?php echo $value ?> </option>
                                                    <?php }  ?>
                                                 </select>                                     
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="table-responsive ls-table">
                                        <table class="table table-bordered table-striped dataTable">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>วันที่แจ้ง</th>
                                                <th>ประเภทปัญหา</th>
                                                <th>หัวข้อการแจ้งซ่อม</th>
                                                <th>ผู้แจ้งซ่อม</th>
                                                <th>แผนก</th>
                                                <th class="text-center">สถานะการดำเนินงาน</th>
                                                <th>สถานะของงาน</th>
                                                <th class="text-center">ดูรายละเอียด</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($worklist as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['work_id']; ?></td>
                                                <th><?php echo $value['inform_date']; ?></th>
                                                <td><?php echo $value['problem_name']; ?></td>
                                                <td><?php echo $value['work_name']; ?></td>
                                                <td><?php echo $value['staff_name']; ?></td>
                                                <td><?php echo $value['department_name']; ?></td>
                                                <td class="ls-table-progress">
                                                    <div class="progress progress-striped active">
                                                        <?php
                                                            if ($value['work_status'] == 2) {
                                                        ?>
                                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                                 aria-valuetransitiongoal="100"></div>
                                                        <?php
                                                            }
                                                            elseif ($value['percent'] < 20) {
                                                        ?>
                                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                                 aria-valuetransitiongoal="<?php echo $value['percent'] ?>"></div>
                                                        <?php
                                                            }
                                                            elseif ($value['percent'] < 70) {
                                                        ?>
                                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                                aria-valuetransitiongoal="<?php echo $value['percent'] ?>"></div>
                                                        <?php
                                                            }
                                                            elseif ($value['percent'] <= 100) {
                                                        ?>
                                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                                 aria-valuetransitiongoal="<?php echo $value['percent'] ?>"></div>
                                                        <?php
                                                            }
                                                        ?>

                                                    </div>
                                                </td>
                                                <td><?php echo ($value['work_status'] == 2) ? 'ไม่อนุมัติ':$value['work_status_name']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url('workrequest/viewWorkRequest/').$value['work_id'];?>" ><button class="btn btn-xs btn-success"><i class="fa fa-search"></i></button></a>
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

<!--selectize Library start-->
<script src="<?php echo base_url();?>/assets/js/selectize.min.js"></script>
<!--selectize Library End-->

<script type="text/javascript">
    $('#select-month').change(function() {
        var site_url = "<?php echo site_url('workrequest/staffWorkListByMonth/')?>"; 
        var month = (Number($('#select-month').val())+1);
        window.location.replace(site_url + month);
    })
    $('#select-year').change(function() {
        var site_url = "<?php echo site_url('workrequest/staffWorkListByYear/')?>"; 
        var year = $('#select-year').val();
        window.location.replace(site_url + year);
    })
    function eventHandler(event) {

    }
    var $select = $('#select-month').selectize({
        create: true,
        onChange: eventHandler('onChange'),
        onItemAdd: eventHandler('onItemAdd'),
        onItemRemove: eventHandler('onItemRemove'),
        onOptionAdd: eventHandler('onOptionAdd'),
        onOptionRemove: eventHandler('onOptionRemove'),
        onDropdownOpen: eventHandler('onDropdownOpen'),
        onDropdownClose: eventHandler('onDropdownClose'),
        onInitialize: eventHandler('onInitialize')
    });

    var $select = $('#select-year').selectize({
        create: true,
        onChange: eventHandler('onChange'),
        onItemAdd: eventHandler('onItemAdd'),
        onItemRemove: eventHandler('onItemRemove'),
        onOptionAdd: eventHandler('onOptionAdd'),
        onOptionRemove: eventHandler('onOptionRemove'),
        onDropdownOpen: eventHandler('onDropdownOpen'),
        onDropdownClose: eventHandler('onDropdownClose'),
        onInitialize: eventHandler('onInitialize')
    });
</script>
 
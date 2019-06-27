
<h2>งานเอกสาร</h2>
<div class="current-status-widget">
    <ul>
        <li>
            <a href="<?php echo site_url('license/main');?>">
                <div class="status-box">
                    <div class="status-box-icon label-light-green white">
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-database"></i>
                    </div>
                </div>
                <div class="status-box-content">
                    <h5 id="license_rows"></h5>
                    <p class="lightGreen"><i class="fa fa-file-text"></i>&nbsp;ใบอนุญาต</p>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('construction/construction_license/construction_list');?>">
                <div class="status-box">
                <div class="status-box-icon label-red white">
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-database"></i>
                </div>
                </div>
                <div class="status-box-content">
                    <h5 id="license_constructs_list_rows"></h5>
                    <p class="light-blue"><i class="fa fa-file-text"></i>&nbsp;ใบขอก่อสร้าง</p>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('deed/main');?>">
                <div class="status-box">
                <div class="status-box-icon label-lightBlue white">
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-database"></i>
                </div>
                </div>
                <div class="status-box-content">
                    <h5 id="deed_list_rows"></h5>
                    <p class="light-blue"><i class="fa fa-file-text"></i>&nbsp;โฉนด</p>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        
        <li>
            <div class="status-box">
                <div class="status-box-icon label-light-green white">
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i>
                </div>
            </div>
            <div class="status-box-content">
                <h5 id="total_license_expiring"></h5>
                <p class="lightGreen"><i class="fa fa-file-text"></i>&nbsp;เอกสารต้องต่ออายุ</p>
            </div>
            <div class="clearfix"></div>
        </li>
        <li>
            <div class="status-box">
                <div class="status-box-icon label-success white">
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i>
                </div>
            </div>
            <div class="status-box-content">
                <h5 id="total_license_over_expiring"></h5>
                <p class="text-success"><i class="fa fa-file-text"></i>&nbsp;เอกสารเกินเวลา</p>
            </div>
            <div class="clearfix"></div>
        </li>
        <li>
            <div class="status-box">
                <div class="status-box-icon label-light-green white">
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>
                </div>
            </div>
            <div class="status-box-content">
                <h5 id="license_operation_rows"></h5>
                <p class="lightGreen"><i class="fa fa-file-text"></i>&nbsp;กำลังดำเนินงาน</p>
            </div>
            <div class="clearfix"></div>
        </li>
    </ul>
</div>

<script type="text/javascript">
$(document).ready(function() {
    var countUpOptions = {
        useEasing : true, // toggle easing
        useGrouping : true, // 1,000,000 vs 1000000
        separator : ',', // character to use as a separator
        decimal : '.' // character to use as a decimal
    };
    
    let license_rows = new countUp('license_rows', 0, '<?php echo $license_rows;?>', 0, 9.5, countUpOptions);
    license_rows.start();

    let license_constructs_list_rows = new countUp('license_constructs_list_rows', 0, '<?php echo $license_constructs_list_rows;?>', 0, 9.5, countUpOptions);
    license_constructs_list_rows.start();

    let deed_list_rows = new countUp('deed_list_rows', 0, '<?php echo $deed_list_rows;?>', 0, 9.5, countUpOptions);
    deed_list_rows.start();

    let total_license_expiring = new countUp('total_license_expiring', 0, '<?php echo $total_license_expiring;?>', 0, 9.5, countUpOptions);
    total_license_expiring.start();

    let total_license_over_expiring = new countUp('total_license_over_expiring', 0, '<?php echo $total_license_over_expiring;?>', 0, 9.5, countUpOptions);
    total_license_over_expiring.start();

    let license_operation_rows = new countUp('license_operation_rows', 0, '<?php echo $license_operation_rows;?>', 0, 9.5, countUpOptions);
    license_operation_rows.start();
});
</script>
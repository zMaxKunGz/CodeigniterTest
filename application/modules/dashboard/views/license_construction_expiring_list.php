<h2>ใบอนุญาตก่อสร้างที่ต้องดำเนินการต่ออายุ</h2>
<div class="table-responsive ls-table">
    <table class="table table-bordered table-striped table-responsive table-expire-date">
        <thead>
            <tr>
                <th class="text-center">ชื่อเอกสาร</th>
                <th class="text-center">วันที่ขอใบอนุญาตก่อสร้าง</th>                    
                <th class="text-center">วันที่ได้รับใบอนุญาต</th>
                <th class="text-center">คงเหลือวัน</th>
                <th class="text-center">สถานะ</th>
            </tr>
        </thead>
            
        <tbody>
        <?php foreach ($license_constructs_list as $key => $value) {?>
            <tr>
                <td class="text-left">
                    <strong><?php echo $value['activity_no'], '&nbsp;-&nbsp;', $value['activity'];?></strong>
                </td>
                <td class="text-center"><?php echo $value['request_date'];?></td>
                <td class="text-center"><span class='label label-info'><?php echo $value['acquire_date'];?></span></td>
                <td class="text-center"><?php echo $value['diff_days'];?></td>
                <td class="text-center"><?php echo $value['status_label'];?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="<?php echo site_url('report/excel_license_construction');?>" class="btn btn-sm btn-success" target="_blank">
            <i class="fa fa-print" aria-hidden="true"></i>&nbsp;Excel
        </a>
    </div>
</div>
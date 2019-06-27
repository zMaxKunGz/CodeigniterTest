<h2>ใบอนุญาตที่ต้องดำเนินการต่ออายุ</h2>
<div class="table-responsive ls-table">
    <table class="table table-bordered table-striped table-responsive table-expire-date">
        <thead>
            <tr>
                <th class="text-center">ชื่อเอกสาร</th>
                <th class="text-center">วันเริ่มอนุญาต</th>                    
                <th class="text-center">วันหมดอายุ</th>
                <th class="text-center">คงเหลือวัน</th>
                <th class="text-center">สถานะ</th>
            </tr>
        </thead>
        
        <tbody>
        <?php foreach ($license_list as $key => $value) {?>
            <tr>
                <td class="text-left">
                    <strong><?php echo $value['activity_no'], '&nbsp;-&nbsp;', $value['activity'];?></strong>
                </td>
                <td class="text-center"><?php echo $value['issue_date'];?></td>
                <td class="text-center"><span class='label label-info'><?php echo $value['expire_date'];?></span></td>
                <td class="text-center" ><?php echo $value['diff_days'];?></td>
                <td class="text-center"><?php echo $value['status_label'];?></td>
        <?php }?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="<?php echo site_url('report/excel_license_list');?>" class="btn btn-sm btn-success" target="_blank">
            <i class="fa fa-print" aria-hidden="true"></i>&nbsp;Excel
        </a>
    </div>
</div>
<!-- 
<script>
$(document).ready(function() {
    $('.table-expire-date').DataTable( {
        "destroy": true,
        "order": [[ 3, "asc" ]]
    } );
} );
</script> -->
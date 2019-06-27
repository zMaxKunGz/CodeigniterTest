<?php
    $disable = "";
    if ($repair['flow_id'] != 3) {
        $disable = "disabled";
    }
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">แก้ไขสถานะงาน</h3>
    </div>
    <div class="panel-body">
        <form id="approveForm" method="post" class="form-horizontal ls_form" action="<?php echo site_url('/workrequest/approveWorkRequestForm/');?>"
              enctype="multipart/form-data">
            <input type="hidden" id="work_status" name="work_status" value="1">
            <input type="hidden" id="repair_id" name="repair_id" value="<?php echo $repair_id; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label">วันแล้วเสร็จ</label>
                <div class="col-lg-9">
                    <input id="datePickerOnly" class="form-control" type="text" name="duedate" <?php echo $disable;?>/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">มอบหมายงาน</label>
                <div class="col-lg-9">
                    <select id="select_staff" class="selectpicker" placeholder="เลือกผู้ปฎิบัติงาน" name="staff_id" <?php echo $disable;?>>
                        <option>เลือกผู้ปฎิบัติงาน</option>
                        <?php
                            foreach($staffList as $value) {
                                ?>
                                <option value="<?php echo $value['staff_id'] ?>"><?php echo $value['staff_name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">เหตุผลเพิ่มเติม</label>

                <div class="col-lg-9">
                    <textarea class="animatedTextArea form-control" id="bio" name="work_detail"
                              placeholder="คำอธิบายงาน" <?php echo $disable;?>></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button class="btn btn-success" id="approveButton"  type="button" <?php echo $disable;?>>อนุมัติ</button>
                
                    <button class="btn ls-red-btn"  id="declineButton" type="button" <?php echo $disable;?>>ไม่อนุมัติ</button>
                </div>
            </div>
        </form>
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var $select1 = $('#select_staff').selectize({
            create: false,
            onChange: eventHandler('onChange'),
            onItemAdd: eventHandler('onItemAdd'),
            onItemRemove: eventHandler('onItemRemove'),
            onOptionAdd: eventHandler('onOptionAdd'),
            onOptionRemove: eventHandler('onOptionRemove'),
            onDropdownOpen: eventHandler('onDropdownOpen'),
            onDropdownClose: eventHandler('onDropdownClose'),
            onInitialize: eventHandler('onInitialize')
        });

        $('#datePickerOnly').datetimepicker({
            timepicker: false,
            datepicker:true,
            mask:'39/19/9999',
            format:'d/m/Y'
        });
    });

    $("#approveButton").click(function(){
        bootbox.confirm("คุณต้องการอณุมัติงานนี้หรือไม่?", function(result) {
            var data ="Confirm result: "+result;
            if (result) {
                $('#work_status').val('1');
                $('#approveForm').submit();
            }
        });
    });

    $("#declineButton").click(function(){
        bootbox.confirm("คุณไม่ต้องการอณุมัติงานนี้หรือไม่?", function(result) {
            var data ="Confirm result: "+result;
            if (result) {
                $('#work_status').val('2');
                $('#approveForm').submit();
            }
        });
    });

</script>
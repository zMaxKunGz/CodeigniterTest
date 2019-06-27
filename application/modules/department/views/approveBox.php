<?php
    $disable = "";
    if ($repair['flow_id'] != 1) {
        $disable = "disabled";
    }
    else if ($this->session->userdata('department_id') != $repair['department_id']) {
        $disable = "disabled";
    }
?>
<div class="col-md-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">แก้ไขสถานะงาน</h3>
        </div>
        <div class="panel-body">
            <form id="approveForm" method="post" class="form-horizontal ls_form" action="<?php echo site_url('/department/approveRequestRequestForm/');?>"
                  enctype="multipart/form-data">
                <input type="hidden" id="repair_status" name="repair_status" value="1">
                <input type="hidden" id="repair_id" name="repair_id" value="<?php echo $repair['repair_id']; ?>">

                <div class="form-group">
                    <label class="col-lg-3 control-label">เหตุผลเพิ่มเติม</label>

                    <div class="col-lg-9">
                        <textarea class="animatedTextArea form-control" id="bio" name="dapartment_head_comment"
                                  placeholder="คำอธิบายงาน" <?php echo $disable;?> value=""
                                  ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button class="btn btn-success" id="approveButton" type="button" <?php echo $disable;?>>อนุมัติ</button>
                    
                        <button class="btn ls-red-btn"  id="declineButton" type="button" <?php echo $disable;?>>ไม่อนุมัติ</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
<script type="text/javascript">
$("#approveButton").click(function(){
    bootbox.confirm("คุณต้องการอณุมัติงานนี้หรือไม่?", function(result) {
        var data ="Confirm result: "+result;
        if (result) {
            $('#repair_status').val('1');
            $('#approveForm').submit();
        }
    });
});

$("#declineButton").click(function(){
    bootbox.confirm("คุณไม่ต้องการอณุมัติงานนี้หรือไม่?", function(result) {
        var data ="Confirm result: "+result;
        if (result) {
            $('#repair_status').val('2');
            $('#approveForm').submit();
        }
    });
});
</script>
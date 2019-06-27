<?php
    $disable = "";
    if ($repair['flow_id'] != 5 and $repair['flow_id'] != 6) {
        $disable = "disabled";
    }
    else if ($this->session->userdata('staff_id') != $repair['assign_to_id']) {
        $disable = "disabled";
    }
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">แก้ไขสถานะงาน</h3>
    </div>
    <div class="panel-body">
    <form id="updateForm" method="post" class="form-horizontal ls_form" action="<?php echo site_url('/workrequest/updateWorkStatusForm/');?>"
              enctype="multipart/form-data">

            <input type="hidden" id="repair_id" name="repair_id" value="<?php echo $repair_id; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label">Cost Center</label>
                <div class="col-lg-9">
                    <select id="select_cost_center" <?php echo $disable;?> class="selectpicker" 
                        placeholder="เลือก Cost Center" name="cost_center_id">
                        <option>เลือก Cost Center</option>
                        <?php
                            foreach($costCenterList as $value) {
                                ?>
                                <option value="<?php echo $value['cost_center_id'] ?>"
                                    <?php echo (($repair['cost_center_id'] != NULL and $repair['cost_center_id'] == $value['cost_center_id']) ? 'selected' : '');?>>
                                    <?php echo $value['cost_center_code'] ?>
                                 </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">GL</label>
                <div class="col-lg-9">
                    <select id="select_gl" <?php echo $disable;?> class="selectpicker" 
                        placeholder="เลือก GL" name="gl_id">
                        <option>เลือก GL</option>
                        <?php
                            foreach($glList as $value) {
                                ?>
                                <option value="<?php echo $value['gl_id'] ?>"
                                    <?php echo (($repair['gl_id'] != NULL and $repair['gl_id'] == $value['gl_id']) ? 'selected' : '');?>>
                                    <?php echo $value['gl_code'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">IO</label>
                <div class="col-lg-9">
                    <input type="text" <?php echo $disable;?> name="io" id="io" placeholder="ระบุ IO" 
                    class="form-control" value="<?php echo $repair['io'];?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">ราคา</label>
                <div class="col-lg-9">
                    <input type="text" <?php echo $disable;?> name="price" id="price" 
                    placeholder="ระบุราคา" class="form-control" value="<?php echo $repair['price'];?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">ประเภทงาน</label>
                <div class="col-lg-9">
                    <select id="select_priority" <?php echo $disable;?> class="selectpicker" 
                        placeholder="ประเภทปัญหา" name="priority_id">
                        <option>ประเภทปัญหา</option>
                        <?php
                            foreach($priorityList as $value) {
                                ?>
                                <option value="<?php echo $value['priority_id'] ?>"
                                    <?php echo (($repair['priority_id'] != NULL and $repair['priority_id'] == $value['priority_id']) ? 'selected' : '');?>>
                                    <?php echo $value['priority_name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">สถานะงาน</label>
                <div class="col-lg-9">
                    <select id="select_status" <?php echo $disable;?> class="selectpicker" 
                        placeholder="เลือกสถานะ" name="status_id">
                        <option>เลือกสถานะ</option>
                        <?php
                            foreach($statusList as $value) {
                                ?>
                                <option value="<?php echo $value['work_status_id'] ?>"
                                    <?php echo (($repair['work_status_id'] != NULL and $repair['work_status_id'] == $value['work_status_id']) ? 'selected' : '');?>>
                                    <?php echo $value['work_status_name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">เหตุผลเพิ่มเติม</label>

                <div class="col-lg-9">
                    <textarea class="animatedTextArea form-control" id="bio" name="worker_description"
                              placeholder="คำอธิบายงาน" row="5" <?php echo $disable;?> value="<?php echo $repair['worker_description']; ?>"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button <?php echo $disable;?> class="btn btn-primary" id="updateButton"  type="button">อัพเดทสถานะ</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $("#updateButton").click(function(){
        bootbox.confirm("คุณต้องการแก้ไขงานนี้หรือไม่?", function(result) {
            var data ="Confirm result: "+result;
            if (result) {
                $('#updateForm').submit();
            }
        });
    });

    $(document).ready(function() {
        var $select2 = $('#select_cost_center').selectize({
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

        var $select3 = $('#select_gl').selectize({
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

        var $select4 = $('#select_priority').selectize({
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

        var $select5 = $('#select_status').selectize({
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
    })

</script>
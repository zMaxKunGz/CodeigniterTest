<?php
$link_back = (isset($link_back)? $link_back : 'login');
$btn_remove = (isset($btn_remove)? $btn_remove : 0);
?>
<div class="row">
<div class="col-md-6 text-left">
        <?php if ($id !='' && $btn_remove =='1') {?>
            <a href="javascript:set_license_status('<?php echo $id;?>');" class="btn btn-danger btn_cancel"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;ลบข้อมูล</a>
        <?php }?>
    </div>

    <div class="col-md-6 text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึกข้อมูล</button>
        <a href="<?php echo site_url($link_back);?>" class="btn btn-danger btn_cancel"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;ยกเลิก</a>
    </div>
</div>

<br>
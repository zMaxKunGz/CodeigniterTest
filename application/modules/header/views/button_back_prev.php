<?php
$link_back = (isset($link_back)? $link_back : 'login');
$link_edit = (isset($link_edit)? $link_edit : 'login');
?>

<div class="row">
    <div class="col-md-12 text-right">
        <a href="<?php echo site_url($link_back);?>" class="btn btn-sm btn-warning"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>&nbsp;ย้อนกลับ</a>
        <?php if ($link_edit !='login') {?>
            <a href="<?php echo site_url($link_edit);?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;แก้ไขข้อมูล</a>
        <?php }?>
    </div>
</div>

<br>

<ul class="mainNav">
<!--     <li class="active">
        <a href="<?php echo site_url('dashboard/main');?>">
            <i class="fa fa-dashboard"></i><span>หน้าหลัก</span>
        </a>
    </li> -->
    
    <li>
        <a href="<?php echo site_url('workrequest/index');?>">
            <i class="fa fa-check-square-o"></i><span>รายการแจ้งซ่อมทั้งหมด</span>  
        </a>
    </li>
    
    <?php
        if ($this->session->userdata('position_id') == 3) {
    ?>
    <li>
        <a href="<?php echo site_url('workrequest/staffWorkList');?>">
            <i class="fa fa-briefcase"></i><span>รายการแจ้งซ่อมของตนเอง</span>  
        </a>
    </li>
    <?php
        }
    ?>
     
    <?php
        if ($this->session->userdata('position_id') != 3) {
    ?>
    <li>
        <a href="<?php echo site_url('workrequest/staffWorkListReport');?>">
            <i class="fa fa-users"></i><span>ผู้รับผิดชอบงาน</span>
        </a>
    </li>

    <li>
        <a href="<?php echo site_url('workrequest/staffWorkListByMonth/').date('m'); ?>">
            <i class="fa fa-bar-chart-o"></i><span>งานแต่ละเดือน</span>
        </a>
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o"></i><span>รายงาน</span></a>
        <ul>
            <li><a href="<?php echo site_url('report/reportRequest');?>"><i class="fa fa-file-text"></i> รายงานแจ้งซ่อม ตามช่วงเวลา</a></li>
            <li><a href="<?php echo site_url('report/reportTypeRequest');?>"><i class="fa fa-file-text"></i> ประเภทของงานแจ้งซ่อม </a></li>
            <li><a href="<?php echo site_url('report/reportCostCenter');?>"><i class="fa fa-money"></i>ค่าใช้จ่ายตาม Cost Center</a></li>
 
        </ul>
    </li>
    <?php
        }
    ?>

    <?php
    if ($this->session->userdata('position_id') == 1) {
    ?>
        <li>
            <a href="#"><i class="fa fa-gears"></i><span>ตั้งค่าระบบ</span></a>
            <ul>
                <li><a href="<?php echo site_url('setting/user_list');?>"><i class="fa fa-users"></i>ผู้ใช้งาน</a></li>
                <li><a href="<?php echo site_url('setting/dept_list');?>"><i class="fa fa-reorder"></i>จัดการแผนก</a></li>
                <li><a href="<?php echo site_url('setting/problem_list');?>"><i class="fa fa-question"></i>ประเภทงาน</a></li>
                <li><a href="<?php echo site_url('setting/workType_list');?>"><i class="fa fa-gears"></i>สถานะงาน</a></li>
                <li><a href="<?php echo site_url('setting/staff_list');?>"><i class="fa fa-male"></i>ผู้ปฎิบัติงาน</a></li>
            </ul>
        </li>
    <?php
        }
    ?>

    <li>
        <a href="<?php  echo site_url('login/logout');?>">
            <i class="glyphicon glyphicon-log-out"></i><span>ออกจากระบบ</span>
        </a>
    </li>
</ul>
 
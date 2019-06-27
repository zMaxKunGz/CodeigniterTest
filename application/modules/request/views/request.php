<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ลงทะเบียนร้องขอซ่อม</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ลงทะเบียนผู้ร้องขอซ่อม</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <form id="formid2" class="formular form-horizontal ls_form" method="post" 
                                        action="<?php echo base_url('/index.php/request/newRequest');?>" enctype="multipart/form-data">
                                            <div id="wizard" class="swMain">
                                                <ul>
                                                    <li>
                                                        <a href="#step-Login">
                                                            <span class="stepNumber">1</span>
                                                            <span class="stepDesc">
                                                                Step 1<br/>
                                                                <small>ลงทะเบียนผู้ร้องข้อซ่อม</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-user">
                                                            <span class="stepNumber">2</span>
                                                            <span class="stepDesc">
                                                                Step 2<br/>
                                                                <small>ข้อมูลการแจ้งซ่อม</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-bio">
                                                            <span class="stepNumber">3</span>
                                                            <span class="stepDesc">
                                                                Step 3<br/>
                                                                <small>เสร็จสิ้นการแจ้งซ่อม</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="#step-Agreement">
                                                            <span class="stepNumber">4</span>
                                                            <span class="stepDesc">
                                                                Step 4<br/>
                                                                <small>Agreement</small>
                                                            </span>
                                                        </a>
                                                    </li> -->
                                                </ul>
                                                <div id="step-Login">
                                                    <h2 class="StepTitle">รายละเอียดการแจ้งซ่อม</h2>

                                                    <div class="container-fluid">
                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">ชื่อ-นามสกุล : </label>

                                                                <div class="col-md-10">
                                                                    <input type="text"
                                                                           class="form-control validate[required] text-input"
                                                                           id="name" name="name" placeholder="ชื่อ-นามสกุล">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">เบอร์ติดต่อ : </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="เบอร์ติดต่อ" value=""
                                                                           class="form-control validate[required] text-input"
                                                                           type="text" name="tel" id="tel"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Email : </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="Email" value=""
                                                                           class="form-control validate[required] text-input"
                                                                           type="email" name="email" id="email"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Email Confirm : </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="Enter same email" value=""
                                                                           class="form-control validate[required] text-input"
                                                                           type="email" name="email_confirm" id="email_confirm"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">แผนก : </label>

                                                                <div class="col-md-10">
                                                                <div class="control-group">
                                                                    <select id="select_department" class="demo-default" placeholder="เลือกแผนก" name="select_department">
                                                                        <option value="">เลือกแผนก</option>
                                                                        <?php
                                                                            foreach($dept_list as $value) {
                                                                        ?>
                                                                                <option value="<?php echo $value['department_id'] ?>">
                                                                                    <?php echo $value['department_code'].'-'.$value['department_name'] ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div id="step-user">
                                                    <h2 class="StepTitle">รายละเอียดการแจ้งซ่อม</h2>

                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label"> เรื่องการแจ้งซ่อม : </label>

                                                                <div class="col-md-10">
                                                                    <input type="text"
                                                                           class="form-control validate[required] text-input" id="repair_title"
                                                                           name="repair_title" placeholder="เรื่องที่ต้องการแจ้ง">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">ประเภทงานซ่อม : </label>

                                                                <div class="col-md-10">
                                                                <div class="control-group">
                                                                    <select id="select_problem_type" name="problem_id" class="demo-default" placeholder="เลือกประงานซ่อม">
                                                                        <option value="">เลือกประงานซ่อม</option>
                                                                        <?php
                                                                            foreach($problem_list as $value) {
                                                                        ?>
                                                                                <option value="<?php echo $value['problem_id'] ?>">
                                                                                    <?php echo $value['problem_name'] ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label"> สถานที่ : </label>

                                                                <div class="col-md-10">
                                                                    <input type="text"
                                                                           class="form-control validate[required] text-input" id="place_name"
                                                                           name="place_name" placeholder="สถานที่">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label"> รายละเอียด : </label>

                                                                <div class="col-md-10">
                                                                    <textarea class="animatedTextArea form-control validate[required]" 
                                                                    id="reapir_description" name="reapir_description" placeholder="ใส่คำอธิบายงาน" 
                                                                    style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 54px;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label"> อัพโหลดรูปภาพ : </label>
                                                                <div class="col-md-10">
                                                                    <input id="file-3" name="userfile[]" type="file" class="file" multiple=true data-preview-file-type="any">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="step-bio">


                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <h2 class="StepTitle">เงื่อนไขการแจ้งซ่อม</h2>
                                                          
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                    Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                                    commodo consequat.
                                                                    Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur.
                                                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                                    officia deserunt mollit anim id est laborum.
                                                                </p>
                                                        </div>

 
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                            <!-- End SmartWizard Content -->


                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!--Form Wizard CSS Start-->
<script src="<?php echo base_url('assets/js/jquery.smartWizard.js');?>"></script>
<!--Form Wizard CSS End-->
<!--selectize Library start-->
<script src="<?php echo base_url('assets/js/selectize.min.js');?>"></script>
<!--selectize Library End-->
<!--bootstrap validation Library Script Start-->
<script src="<?php echo base_url('assets/js/bootstrapvalidator/bootstrapValidator.js');?>"></script>
<!--bootstrap validation Library Script End-->
<script>
    function submitForm() {
        bootbox.confirm("คุณต้องการแจ้งซ่อมหรือไม่", function(result) {
            var data ="Confirm result: "+result;
            if (result) {
                $('form').submit();
            }
        });
    }
    var eventHandler = function (name) {
        return function () {
            /*console.log(name, arguments);*/
        };
    };
    $(document).ready(function(){
        $("#test").click(function() {
            console.log($('#file-3')[0].files);
        })
        $("#tel").mask("(999) 999-9999");
        var $select = $('#select_department').selectize({
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
        var $select2 = $('#select-problem').selectize({
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
        var $select3 = $('#select_problem_type').selectize({
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
        $("#file-3").fileinput({
            showCaption: true,
            browseClass: "btn btn-ls",
            showUpload: false
        });
        $('#wizard').smartWizard({
            // Properties
            selected: 0,  // Selected Step, 0 = first step
            keyNavigation: true, // Enable/Disable key navigation(left and right keys are used if enabled)
            enableAllSteps: true,  // Enable/Disable all steps on first load
            transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
            contentURL: null, // specifying content url enables ajax content loading
            contentURLData: null, // override ajax query parameters
            contentCache: true, // cache step contents, if false content is fetched always from ajax url
            cycleSteps: false, // cycle step navigation
            enableFinishButton: false, // makes finish button enabled always
            hideButtonsOnDisabled: true, // when the previous/next/finish buttons are disabled, hide them instead
            errorSteps: [],    // array of step numbers to highlighting as error steps
            labelNext: 'ถัดไป', // label for Next button
            labelPrevious: 'ก่อนหน้า', // label for Previous button
            labelFinish: 'ยืนยัน',  // label for Finish button
            noForwardJumping: false,
            ajaxType: 'POST',
            // Events
            onLeaveStep: null, // triggers when leaving a step
            onShowStep: null,  // triggers when showing a step
            onFinish: submitForm,  // triggers when Finish button is clicked
            includeFinishButton: true   // Add the finish button
        });
    })
</script> 
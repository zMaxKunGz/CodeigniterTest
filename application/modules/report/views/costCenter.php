<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Wizard form</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <form id="formid2" class="formular form-horizontal ls_form" method="post" action="">
                                            <div id="wizard" class="swMain">
                                                <ul>
                                                    <li>
                                                        <a href="#step-Login">
                                                            <span class="stepNumber">1</span>
                                                            <span class="stepDesc">
                                                                Step 1<br/>
                                                                <small>Login info</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-user">
                                                            <span class="stepNumber">2</span>
                                                            <span class="stepDesc">
                                                                Step 2<br/>
                                                                <small>user info</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-bio">
                                                            <span class="stepNumber">3</span>
                                                            <span class="stepDesc">
                                                                Step 3<br/>
                                                                <small>User bio</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-Agreement">
                                                            <span class="stepNumber">4</span>
                                                            <span class="stepDesc">
                                                                Step 4<br/>
                                                                <small>Agreement</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="step-Login">
                                                    <h2 class="StepTitle">Login Information</h2>

                                                    <div class="container-fluid">
                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Username</label>

                                                                <div class="col-md-10">
                                                                    <input type="text"
                                                                           class="form-control validate[required] text-input"
                                                                           id="username1" name="username" placeholder="username">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Password: </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="write your password" value=""
                                                                           class="form-control validate[required] text-input"
                                                                           type="password" name="password" id="password1"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Confirm Password: </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="same password in here" value=""
                                                                           class="form-control validate[required,equals[password]] text-input"
                                                                           type="password" name="password2" id="password12"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="step-user">
                                                    <h2 class="StepTitle">User Information</h2>

                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:* </label>

                                                                <div class="col-md-10">
                                                                    <input type="text"
                                                                           class="form-control validate[required] text-input" id="name1"
                                                                           name="name" placeholder="Your name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Phone:* </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="+88017********" value=""
                                                                           class="validate[required,custom[phone]] form-control"
                                                                           type="text" name="phoneNo" id="phoneNo1"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Email:* </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="someone@nowhere.com" value=""
                                                                           class="validate[required,custom[email]] form-control"
                                                                           type="text" name="email" id="email1"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="step-bio">


                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <h2 class="StepTitle">More Information</h2>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Profile URL:* </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="http://aimmate.com" value=""
                                                                           class="validate[required,custom[url]] form-control"
                                                                           type="text" name="fburl" id="fburl1"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Birthday:* </label>

                                                                <div class="col-md-10">
                                                                    <input placeholder="1985/08/31" value=""
                                                                           class="form-control validate[custom[date]] text-input"
                                                                           type="text" name="bDate" id="bDate1"/>
                                                                    <span class="help_text">YYYY/MM/DD</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Bio:* </label>

                                                                <div class="col-md-10">
                                                                    <textarea class="animatedTextArea form-control validate[required]"
                                                                              id="bio1" name="bio"
                                                                              placeholder="Try something in here"></textarea>
                                                                    <span class="help_text">Write something for your self</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="step-Agreement">


                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h2 class="StepTitle">Agreement</h2>
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

                                                                <p>
                                                                    <input type="checkbox" value="" name="agree"> I agree
                                                                </p>

                                                                <p>
                                                                    <button type="submit" class="btn-primary btn">Create Profile
                                                                    </button>
                                                                </p>
                                                            </div>
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

    
                    <script src="<?php echo base_url('assets/js/jquery.smartWizard.js');?>"></script>
    <!--Form Wizard CSS End-->

    <!--Demo Wizard Script Start-->
            <script src="<?php echo base_url('assets/js/pages/formWizard.js');?>" </script>
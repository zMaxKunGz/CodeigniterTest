<style type="text/css">
  a:link {
    text-decoration:none;
  }
  a:visited {
    text-decoration:none;
  }
</style>
<div class="row">
  <div class="col-md-12"> 
    <!--Top header start-->
    <h3 class="ls-top-header">เหตุฉุกเฉิน</h3>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li class="active">ตั้งค่าเหตุฉุกเฉิน</li>
    </ol>
    <!--Top breadcrumb start --> 
  </div>
</div>
<!-- Main Content Element  Start-->
<div class="row">
  <div class="col-md-12" >
    <div class="panel panel-light-green" >
      <div class="panel-heading">
        <h3 class="panel-title">เหตุฉุกเฉิน</h3>
      </div>
      <div class="panel-body" >
        <div class="row">
          <?php
          foreach ($alert_type as $value) {
          ?>
            <div class="col-md-3 col-sm-3 col-xs-6">
              <a href="#">
                <div class="ls-circle-widget <?php echo $value['color']; ?> active white">
                  <i class="fa <?php echo $value['icon']; ?>" aria-hidden="true"></i>

                  <h1><?php echo $value['alert_type_name']; ?></h1>
                </div>
                <div class="form-group text-center" style="margin-bottom: 25px;"><label></label></div>
              </a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>


    <!-- Main Content Element  End--> 

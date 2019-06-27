 
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">รายละเอียดการแจ้ง</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">รายละเอียดการแจ้ง</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>

<div class="row">


                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ประเภทงาน </h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12  panel-body right" align="right">
                                        <button class="btn ls-red-btn"><i class="fa fa-plus-square-o"></i> เพิ่มประเภทงานใหม่ </button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                <!--Table Wrapper Start-->
                                <div class="table-responsive ls-table">
                                    <table class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#NO.</th>
                                                    <th  width="65%">ชื่องาน</th>
                                                    <th  width="15%">แก้ไข</th>
                                                    <th width="15%">ลบ</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                for($i=1;$i<=100;$i++){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>งานเสร็จ</td>
                                                <td class="text-center"  >   <button class="btn ls-light-blue-btn"><i class="fa  fa-indent"></i> แก้ไข </button></td>
                                                <td  class="text-center">    <button class="btn ls-red-btn"><i class="fa   fa-scissors"></i> ลบ </button></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <!--Table Wrapper Finish-->
                                </div>
                            </div>
                        </div>
                    </div> 
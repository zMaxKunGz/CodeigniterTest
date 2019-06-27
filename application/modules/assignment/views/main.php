<div class="row">


                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">จัดการแผนก </h3>
                                </div>
 
                                <div class="panel-body">
                                <!--Table Wrapper Start-->
                                <div class="table-responsive ls-table">
                                    <table class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#NO.</th>
                                                    <th  >ชื่อพนักงานผู้ปฎิบัติงาน</th>
                                                    <th  width="20%">จำนวนงาน</th>
                                                    <th  width="20%">จำนวนงานยังไม่เสร็จ</th>
                                                    <th  width="15%">ดูสถานะงาน</th>
                                                   
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                for($i=1;$i<=100;$i++){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>ธุรการ</td>
                                                <td>ธุรการ</td>
                                                <td>ธุรการ</td>
                                                <td class="text-center"  >   <button class="btn ls-light-blue-btn"><i class="fa fa-search-plus"></i> แสดงรายละเอียด </button></td>
 
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
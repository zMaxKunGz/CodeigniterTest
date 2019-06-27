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
                                                foreach($worklist as $value){
                                            ?>
                                            <tr>
                                                <td><?php echo $value['staff_id']; ?></td>
                                                <td><?php echo $value['staff_name']; ?></td>
                                                <td><?php echo $value['all_work']; ?></td>
                                                <td><?php echo $value['undone']; ?></td>
                                                <td class="text-center"  >   <a href="<?php echo site_url('workrequest/staffWorkListByID/'.$value['staff_id'])?>"><button class="btn ls-light-blue-btn"><i class="fa fa-search-plus"></i> แสดงรายละเอียด </button></a></td>
 
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
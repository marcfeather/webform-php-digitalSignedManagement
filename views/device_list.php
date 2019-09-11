<div class="">
    <div class="page-title">

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>อุปกรณ์</h2>

                <div class="nav navbar-right panel_toolbox">
                    <button id="btnAddDevice" type="button" class="btn btn-dark" 
                        style="width:100px; height:40px;" >
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;เพิ่ม
                    </button>
                </div>

                <div class="container">
                    <!-- Modal -->
                    <div class="modal fade" id="deviceDetailModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">เพิ่ม อุปกรณ์</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inpDeviceName">
                                            ชื่ออุปกรณ์ <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="inpDeviceName" class="form-control col-md-7 col-xs-12" name="inpDeviceName" maxlength="50" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inpDeviceImei">
                                            หมายเลข IMEI <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="inpDeviceImei" class="form-control col-md-7 col-xs-12 allownumericwithoutdecimal" name="inpDeviceImei" maxlength="15" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            เลือกข้อมูลที่แสดงผล
                                            <!-- <span class="required">*</span> -->
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select id="ddlDeviceGroup" class="form-control"></select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id="btnDelDevice" type="button" class="btn btn-danger" style="float: left; display: none;">ลบข้อมูล</button>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id="btnSaveDevice" type="button" class="btn btn-primary" style="float: right;">บันทึกข้อมูล</button>
                                    <button type="button" class="btn btn-default" style="float: right;" data-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>    
                        </div>
                    </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                </div>
                <div class="x_content">

                <table id="datatable-deviceList" class="table table-striped table-bordered" cellspacing="0" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">ลำดับ</th>
                            <th class="text-left" style="width: 25%">ชื่ออุปกรณ์</th>
                            <th class="text-left" style="width: 20%">หมายเลข IMEI</th>
                            <th class="text-left" style="width: 15%">ข้อมูลที่แสดงผล</th>
                            <th class="text-center" style="width: 10%">สถานะ</th>
                            <th class="text-center" style="width: 15%">วันเวลาที่เพิ่ม</th>
                            <th class="text-center" style="width: 10%">แก้ไข</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
        </div>
    </div>
</div>

<div id="modal_price">
    <?php 
        include("views/price_table_user.php");
    ?>
</div>
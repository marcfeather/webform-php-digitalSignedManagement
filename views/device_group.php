
<div class="">
    <div class="page-title">

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ข้อมูลที่แสดงผล</h2>

                <div class="nav navbar-right panel_toolbox">
                    <button id="btnAddDeviceGroup" type="button" class="btn btn-dark" style="width:100px; height:40px;">
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;เพิ่ม
                    </button>
                </div>

                <div class="container">
                    <!-- Modal -->
                    <div class="modal fade" id="deviceGroupDetailModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">เพิ่มข้อมูลที่แสดงผล</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inpGroupName">
                                            ชื่อข้อมูล <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="inpGroupName" class="form-control col-md-7 col-xs-12" name="inpGroupName" maxlength="50" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            เลือกไฟล์ HTML(zip)<span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select id="ddlContentData" class="form-control"></select>
                                            <a href="#" id="btnAddZipDirect">เพิ่มไฟล์ HTML(zip)</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id="btnDelDeviceGroup" type="button" class="btn btn-danger" style="float: left; display: none;">ลบข้อมูล</button>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button id="btnSaveDeviceGroup" type="button" class="btn btn-primary" style="float: right;">บันทึกข้อมูล</button>
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

                <table id="datatable-deviceGroup" class="table table-striped table-bordered" cellspacing="0" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">ลำดับ</th>
                            <th class="text-left" style="width: 50%">ชื่อข้อมูล</th>
                            <th class="text-left" style="width: 35%">ไฟล์ HTML(zip)</th>
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
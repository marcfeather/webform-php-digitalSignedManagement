<div class="">
    <div class="page-title">

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ไฟล์ HTML(zip)</h2>

                <div class="nav navbar-right panel_toolbox">                    
                    <input type="file" id="zip_file" accept=".zip" style="display: none;">
                    <button id="btnAddZip" type="button" class="btn btn-dark" style="width:100px; height:40px;">
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;เพิ่ม
                    </button>
                </div>

                <div class="clearfix"></div>
                </div>
                <div class="x_content">

                <table id="datatable-zipList" class="table table-striped table-bordered" cellspacing="0" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">ลำดับ</th>
                            <th class="text-left" style="width: 50%">ชื่อไฟล์ HTML(zip)</th>
                            <th class="text-left" style="width: 35%">วันเวลาที่เพิ่ม</th>
                            <th class="text-center" style="width: 10%">ลบ</th>
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
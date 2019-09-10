
<div id="priceUserModal" class="modal fade bs-price-user-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">แพ็คเกจ</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left">

                    <div class="col-md-12">
                        <?php
                            if ($_SESSION['session_package_id'] == 1) {
                                echo '<div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="pricing">
                                        <div class="title">
                                        <h2>ทดลองใช้</h2>
                                        <h1>ฟรี</h1>
                                        </div>
                                        <div class="x_content">
                                        <div class="">
                                            <div class="pricing_features">
                                            <ul class="list-unstyled text-left">
                                                <li><i class="fa fa-check text-success"></i> ใช้ระบบ Client(android) ได้ <strong> 1 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มข้อมูลเครื่อง Client ได้ <strong> 1 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> สร้างกลุ่มของเครื่อง Client ได้ <strong> 1 กลุ่ม</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มไฟล์ HTML ได้ <strong> 1 ไฟล์</strong></li>
                                                <li><i class="fa fa-check text-success"></i> ระยะเวลาใช้งาน <strong> 1 เดือน </strong></li>
                                                <li><i class="fa fa-times text-danger"></i> ให้คำปรึกษา <strong> 8 ชั่วโมง(เวลาราชการ)</strong></li>
                                            </ul>
                                            </div>
                                        </div>
                                        <!--<div class="pricing_footer">
                                            <a onclick="return ChoosePakeage(1)" class="btn btn-success btn-block" role="button" data-dismiss="modal">เปลี่ยน แพ็คเกจ</a>
                                        </div>-->
                                        </div>
                                    </div>
                                </div>';

                            }else if ($_SESSION['session_package_id'] == 2) {
                                echo '<div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="pricing">
                                        <div class="title">
                                        <h2>แพ็คเกจ A</h2>
                                        <h1>9,900 บาท</h1>
                                        <span>ต่อเดือน</span>
                                        </div>
                                        <div class="x_content">
                                        <div class="">
                                            <div class="pricing_features">
                                            <ul class="list-unstyled text-left">
                                                <li><i class="fa fa-check text-success"></i> ใช้ระบบ Client(android) ได้ <strong> 10 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มข้อมูลเครื่อง Client ได้ <strong> 10 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> สร้างกลุ่มของเครื่อง Client ได้ <strong> 5 กลุ่ม</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มไฟล์ HTML ได้ <strong> 5 ไฟล์</strong></li>
                                                <li><i class="fa fa-check text-success"></i> ระยะเวลาใช้งาน <strong> ไม่จำกัด </strong></li>
                                                <li><i class="fa fa-check text-success"></i> ให้คำปรึกษา <strong> 8 ชั่วโมง(เวลาราชการ)</strong></li>
                                            </ul>
                                            </div>
                                        </div>
                                        <!--<div class="pricing_footer">
                                            <a onclick="return ChoosePakeage(1)" class="btn btn-success btn-block" role="button" data-dismiss="modal">เปลี่ยน แพ็คเกจ</a>
                                        </div>-->
                                        </div>
                                    </div>
                                </div>';

                            }else if ($_SESSION['session_package_id'] == 3) {
                                echo '<div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="pricing ui-ribbon-container">
                                        <div class="ui-ribbon-wrapper">
                                        <div class="ui-ribbon">
                                            ลด 20%
                                        </div>
                                        </div>
                                        <div class="title">
                                        <h2>แพ็คเกจ B</h2>
                                        <h1>14,900 บาท</h1>
                                        <span>ต่อเดือน</span>
                                        </div>
                                        <div class="x_content">
                                        <div class="">
                                            <div class="pricing_features">
                                            <ul class="list-unstyled text-left">
                                                <li><i class="fa fa-check text-success"></i> ใช้ระบบ Client(android) ได้ <strong> 50 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มข้อมูลเครื่อง Client ได้ <strong> 50 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> สร้างกลุ่มของเครื่อง Client ได้ <strong> 50 กลุ่ม</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มไฟล์ HTML ได้ <strong> 50 ไฟล์</strong></li>
                                                <li><i class="fa fa-check text-success"></i> ระยะเวลาใช้งาน <strong> ไม่จำกัด </strong></li>
                                                <li><i class="fa fa-check text-success"></i> ให้คำปรึกษา <strong> 8 ชั่วโมง(เวลาราชการ)</strong></li>
                                            </ul>
                                            </div>
                                        </div>
                                        <!--<div class="pricing_footer">
                                            <a onclick="return ChoosePakeage(1)" class="btn btn-success btn-block" role="button" data-dismiss="modal">เปลี่ยน แพ็คเกจ</a>
                                        </div>-->
                                        </div>
                                    </div>
                                </div>';

                            }else if ($_SESSION['session_package_id'] == 4) {
                                echo '<div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="pricing">
                                        <div class="title">
                                        <h2>แพ็คเกจ C</h2>
                                        <h1>19,900 บาท</h1>
                                        <span>ต่อเดือน</span>
                                        </div>
                                        <div class="x_content">
                                        <div class="">
                                            <div class="pricing_features">
                                            <ul class="list-unstyled text-left">
                                                <li><i class="fa fa-check text-success"></i> ใช้ระบบ Client(android) ได้ <strong> 100 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มข้อมูลเครื่อง Client ได้ <strong> 100 เครื่อง</strong></li>
                                                <li><i class="fa fa-check text-success"></i> สร้างกลุ่มของเครื่อง Client ได้ <strong> 100 กลุ่ม</strong></li>
                                                <li><i class="fa fa-check text-success"></i> เพิ่มไฟล์ HTML ได้ <strong> 100 ไฟล์</strong></li>
                                                <li><i class="fa fa-check text-success"></i> ระยะเวลาใช้งาน <strong> ไม่จำกัด </strong></li>
                                                <li><i class="fa fa-check text-success"></i> ให้คำปรึกษา <strong> 8 ชั่วโมง(เวลาราชการ)</strong></li>
                                            </ul>
                                            </div>
                                        </div>
                                        <!--<div class="pricing_footer">
                                            <a onclick="return ChoosePakeage(1)" class="btn btn-success btn-block" role="button" data-dismiss="modal">เปลี่ยน แพ็คเกจ</a>
                                        </div>-->
                                        </div>
                                    </div>
                                </div>';
                            }
                        ?>
                        
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">

            </div> -->

        </div>
    </div>
</div>



<div id='div_session_write'> </div>

<div class="login">
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
            <form>
                <h1>ลงชื่อเข้าใช้งาน</h1>
                <!-- <div>
                    <input id="txtUsername2" type="text" class="form-control" placeholder="Username" maxlength="20" required="" />
                </div>
                <div>
                    <input id="txtPassword2" type="password" class="form-control" placeholder="Password" maxlength="20" required="" />
                </div> -->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtUsername" placeholder="ชื่อผู้ใช้" maxlength="20">                    
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control has-feedback-left" id="txtPassword" placeholder="รหัสผ่าน" maxlength="20">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div>
                    <a class="btn btn-default submit" id="btnLoginSubmit" style="width: 100px; font-size: 14px;">ตกลง</a>
                    <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                <p class="change_link">
                    <a id="createAccount" href="#signup" class="to_register"> ลงทะเบียนใหม่ </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div id="login_footer">
                    <?php
                        include('login_footer.php');
                    ?>
                </div>
                </div>
            </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
            <form>
                <h1>ลงทะเบียน</h1>
                <!-- <div>
                    <input type="text" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="Email" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" required="" />
                </div> -->

                <div>
                    <a class="btn btn-default submit" id="btnChoosePrice" data-toggle="modal" data-target="#priceModal"
                    style="margin:5px 5px 5px 5px; width:95%; font-size:14px;">เลือกแพ็คเกจ</a>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtPackageName" placeholder="ชื่อแพ็คเกจ" readonly="readonly">
                    <span class="fa fa-tags form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left allownumericwithoutdecimal" id="txtPhoneNumRegis" placeholder="เบอร์โทร" maxlength="10">
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtEmailRegis" placeholder="อีเมล์" maxlength="50">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtUsernameRegis" placeholder="ชื่อผู้ใช้" maxlength="20">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control has-feedback-left" id="txtPasswordRegis" placeholder="รหัสผ่าน" maxlength="20">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div>
                    <a class="btn btn-default submit" id="btnRegisSubmit" style="width: 100px; font-size: 14px;">ตกลง</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                <p class="change_link">
                    <a id="toRegister" href="#signin" class="to_register"> ลงชื่อเข้าใช้งาน </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div id="login_footer">
                    <?php
                        include('login_footer.php');
                    ?>
                </div>
                </div>
            </form>

            </section>
        </div>

    </div>
</div>

<div id="modal_price">
    <?php 
        include("views/price_table.php");
    ?>
</div>
<div id='div_session_write'> </div>

<div class="login">
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
            <form>
                <h1>Login Form</h1>
                <!-- <div>
                    <input id="txtUsername2" type="text" class="form-control" placeholder="Username" maxlength="20" required="" />
                </div>
                <div>
                    <input id="txtPassword2" type="password" class="form-control" placeholder="Password" maxlength="20" required="" />
                </div> -->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtUsername" placeholder="Username" maxlength="20">                    
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control has-feedback-left" id="txtPassword" placeholder="Password" maxlength="20">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div>
                    <a class="btn btn-default submit" id="btnLoginSubmit" style="width: 100px; font-size: 14px;">Login</a>
                    <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                <p class="change_link">
                    <a id="createAccount" href="#signup" class="to_register"> Create Account </a>
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
                <h1>Create Account</h1>
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
                    <a class="btn btn-default submit" id="btnChoosePrice" data-toggle="modal" data-target=".bs-price-modal-lg" style="margin:5px 5px 5px 5px; width:95%; font-size:14px;">Choose Package</a>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtPackageName" placeholder="Choose Package" readonly="readonly">
                    <span class="fa fa-tags form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left allownumericwithoutdecimal" id="txtPhoneNumRegis" placeholder="Phone Number" maxlength="10">
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtEmailRegis" placeholder="Email" maxlength="50">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="txtUsernameRegis" placeholder="Username" maxlength="20">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control has-feedback-left" id="txtPasswordRegis" placeholder="Password" maxlength="20">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div>
                    <a class="btn btn-default submit" id="btnRegisSubmit" style="width: 100px; font-size: 14px;">Submit</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                <p class="change_link">Already a member ?
                    <a id="toRegister" href="#signin" class="to_register"> Log in </a>
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
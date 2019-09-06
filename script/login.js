var panel = 1;

$(document).ready(function(){  
    var body = document.body;
    body.classList.remove("nav-md");
    body.classList.add("login");

    var url = window.location.href; 
    if (url.indexOf("signin") >= 0) {
        panel = 1;
    }else if (url.indexOf("signup") >= 0){
        panel = 2;
    }

    $('#createAccount').click(function () {
        panel = 2;
    });
    $('#toRegister').click(function () {
        panel = 1;
    });

    $('#btnLoginSubmit').click(function () {
        if ($('#txtUsername').val() == "") {
            alert("Please Insert Username!");
            $('#txtUsername').focus();
            return;
        }
        if ($('#txtPassword').val() == "") {
            alert("Please Insert Password!");
            $('#txtPassword').focus();
            return;
        }

        UserAuthen();
    });

    $('#btnRegisSubmit').click(function () {
        if ($('#txtPhoneNumRegis').val() == "") {
            alert("Please Insert Phone Number!");
            $('#txtPhoneNumRegis').focus();
            return;
        }else {
            var PhoneNum = $('#txtPhoneNumRegis').val();
            if (PhoneNum.length < 10) {
                alert("Phone Number invalid!");
                $('#txtPhoneNumRegis').focus();
                return;
            }
        }
        if ($('#txtEmailRegis').val() == "") {
            alert("Please Insert Email!");
            $('#txtEmailRegis').focus();
            return;
        }else {
            var mail = $('#txtEmailRegis').val();
            if ((mail.indexOf("@") <= 0) || (mail.indexOf(".") <= 0)) {
                alert("Email invalid!");
                $('#txtEmailRegis').focus();
                return;
            }
        }
        if ($('#txtUsernameRegis').val() == "") {
            alert("Please Insert Username!");
            $('#txtUsernameRegis').focus();
            return;
        }
        if ($('#txtPasswordRegis').val() == "") {
            alert("Please Insert Password!");
            $('#txtPasswordRegis').focus();
            return;
        }
        
        UserRegister();
    });
});

$(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        if (panel == 1) {
            $('#btnLoginSubmit').click();  
        }else {
            $('#btnRegisSubmit').click();  
        }
    }
});

function UserAuthen() {
    var _user = $('#txtUsername').val();
    var _pass = $('#txtPassword').val();

    $.ajax({
        url: "controllers/login_authen.php",
        type: "POST",
        data: { user: _user, pass: _pass},
        dataType: "json",
        success: function (data) {
            if (data == null) { return; }
            
            if (data.result) {
                window.location = "index.php";
            }else {
                alert(data.error);
            }
        }
    });
}

function UserRegister() {
    var _phoneNum = $('#txtPhoneNumRegis').val();
    var _email = $('#txtEmailRegis').val();
    var _user = $('#txtUsernameRegis').val();
    var _pass = $('#txtPasswordRegis').val();

    $.ajax({
        url: "controllers/login_regis.php",
        type: "POST",
        data: { phoneNum: _phoneNum, email: _email, user: _user, pass: _pass},
        dataType: "json",
        success: function (data) {
            if (data == null) { return; }
            
            if (data.result) {
                window.location = "index.php";
            }else {
                alert(data.error);
            }
        }
    });
}

$(document).ready(function(){  
    var body = document.body;
    body.classList.remove("nav-md");
    body.classList.add("login");

    $('#btnRegisSubmit').click(function () {
        window.location = "index.php";
    });

    $('#btnLoginSubmit').click(function () {
        UserAuthen();
    });
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
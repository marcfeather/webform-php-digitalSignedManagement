
$(document).ready(function(){  

    var local_path = 'apk/dscn.apk';
    var server = 'www.dsm.coretera.co.th';
    var full_path = server + '/' + local_path;

    jQuery("#qrCodeApk").qrcode({
        width: 300,
        height: 300,
        text: full_path
    });

    $('#btnDownloadApk').click(function () {
        window.location.href = local_path;
    });

});
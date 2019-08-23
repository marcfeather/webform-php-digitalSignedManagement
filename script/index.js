
$(document).ready(function(){  
    //select menu  
    switch(parseInt(menu)) {
        case 31:
            menu31();
            break;
        default:
            menu11();
    }

    //detect error
    switch(parseInt(error)) {
        case 1:
            alert('Duplicate data !');
            break;
        default:
    }


    var uploadProcess = false;
    Dropzone.options.dropzoneFrom = {
        url: "controllers/image_upload.php",
        parallelUploads: 1,
        //maxFilesize: 1, // MB
        maxFiles: 100,
        autoProcessQueue: false,
        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
        //acceptedFiles:".jpg",
        addRemoveLinks: true,
        //dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
        dictInvalidFileType: "รูปแบบไฟล์ไม่ถูกต้อง !",
        dictRemoveFile: "ลบออก",
        dictDefaultMessage: "ลากรูปภาพที่ต้องการอัพโหลดใส่ลงในพื้นที่นี้ หรือคลิกที่นี่ เพื่อเลือกรูปภาพ",
        init: function () {
            myDropzone = this;
            var uploadButton = document.querySelector('#btnUpload');
            uploadButton.addEventListener("click", function(){
                if(myDropzone.getQueuedFiles().length > 0) {
                    uploadProcess = true;
                    myDropzone.processQueue();

                }else {
                    if (uploadProcess) {
                        alert("กรุณารอสักครู่..");
                    }else {
                        alert("กรุณาเลือกรูปภาพที่จะอัพโหลด !");
                    }
                }

                myDropzone.on("complete", function() {
                    //alert(myDropzone.getQueuedFiles().length.toString());
                    //alert(myDropzone.getUploadingFiles().length.toString());
                    //alert(myDropzone.getAcceptedFiles().length.toString());

                    if(myDropzone.getQueuedFiles().length === 0) {
                        setTimeout(
                            function() 
                            {
                                myDropzone.removeAllFiles(true) ;
                                uploadProcess = false;
                                menu1();
                            }, 2000);
                    }else {
                        setTimeout(
                            function() 
                            {
                                var i = myDropzone.getAcceptedFiles().length - myDropzone.getQueuedFiles().length;
                                myDropzone.processFile(myDropzone.getAcceptedFiles()[i]);
                            }, 1000);
                    }
                
                    // var fileNumber = myDropzone.getAcceptedFiles().length;
                    // var timer = (fileNumber * 1000) / 4;

                    // if(myDropzone.getQueuedFiles().length === 0 && myDropzone.getUploadingFiles().length === 0){
                    //     setTimeout(
                    //         function() 
                    //         {
                    //             myDropzone.removeAllFiles(true) ;
                    //             uploadProcess = false;
                    //             //reOrderContent();
                    //             menu1();
                    //         }, timer);
                    // }//else {
                    // //     if(myDropzone.getQueuedFiles().length > 0) {
                    // //         uploadProcess = true;
                    // //         myDropzone.processQueue();
                    // //     }
                    // // }
                });
            });
        }
    };
   
    $(document).on('click', '.remove_image', function(){
        var id = $(this).attr('id');
        var name = $(this).attr('value');
        $.ajax({
            url: "controllers/image_gallery.php",
            method:"POST",
            //data:{name:name,value:value},
            data:{id:id,name:name},
            success:function(data)
            {
                list_image();
            }
        })
    });
});

$("#menu11").click(function() {
    menu11();
});

$("#menu21").click(function() {
    menu21();
});
$("#menu22").click(function() {
    menu22();
});

$("#menu31").click(function() {
    menu31();
});
$("#menu32").click(function() {
    menu32();
});

$("#btnAddFile").click(function() {
    menu22();
});

function menu11(){
    $("#menu11").addClass("active");
    $("#menu21").removeClass("active");
    $("#menu22").removeClass("active");
    $("#menu31").removeClass("active");
    $("#menu32").removeClass("active");

    $("#panelMenu11").css("display", "block");
    $("#panelMenu21").css("display", "none");
    $("#panelMenu22").css("display", "none");
    $("#panelMenu31").css("display", "none");
    $("#panelMenu32").css("display", "none");
}

function menu21(){
    $("#menu11").removeClass("active");
    $("#menu21").addClass("active");
    $("#menu22").removeClass("active");
    $("#menu31").removeClass("active");
    $("#menu32").removeClass("active");

    $("#panelMenu11").css("display", "none");
    $("#panelMenu21").css("display", "block");
    $("#panelMenu22").css("display", "none");
    $("#panelMenu31").css("display", "none");
    $("#panelMenu32").css("display", "none");

    list_image();
}

function menu22(){
    $("#menu11").removeClass("active");
    $("#menu21").removeClass("active");
    $("#menu22").addClass("active");
    $("#menu31").removeClass("active");
    $("#menu32").removeClass("active");

    $("#panelMenu11").css("display", "none");
    $("#panelMenu21").css("display", "none");
    $("#panelMenu22").css("display", "block");
    $("#panelMenu31").css("display", "none");
    $("#panelMenu32").css("display", "none");
}

function menu31(){
    $("#menu11").removeClass("active");
    $("#menu21").removeClass("active");
    $("#menu22").removeClass("active");
    $("#menu31").addClass("active");
    $("#menu32").removeClass("active");

    $("#panelMenu11").css("display", "none");
    $("#panelMenu21").css("display", "none");
    $("#panelMenu22").css("display", "none");
    $("#panelMenu31").css("display", "block");
    $("#panelMenu32").css("display", "none");

    GetZipList();
}

function menu32(){
    $("#menu11").removeClass("active");
    $("#menu21").removeClass("active");
    $("#menu22").removeClass("active");
    $("#menu31").removeClass("active");
    $("#menu32").addClass("active");

    $("#panelMenu11").css("display", "none");
    $("#panelMenu21").css("display", "none");
    $("#panelMenu22").css("display", "none");
    $("#panelMenu31").css("display", "none");
    $("#panelMenu32").css("display", "block");
}

function list_image(){
    $.ajax({
        url: "controllers/image_gallery.php",
        success:function(data){
            $('#galleryView').html(data);
        }
    });
}

function Init_DataTables_Zip(data) {
    dtZipData = $('#datatable-zipList').DataTable({
        data: data,
        bDestroy: true,
        deferRender: true,
        searching: false,
        bLengthChange: false,
        bInfo: false,
        bPaginate: false,
        ordering: false,
        //lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        //"order": [[1, "asc"]],
        columns: [
            { width: '5%' },
            { width: '50%' },
            { width: '30%' },
            { width: '15%' }
        ],
        columnDefs: [
            {
                "targets": [0],
                "className": "text-center"
            }
        ],
        fixedHeader: true,
        scrollX: true//,
        //responsive: true
    });

    dtZipData.on('click', 'tbody tr td button', function () {
        if ($(this).val() == '') { return; }
        //$("#btnDelZipData").css("display", "block");
        id = $(this).val();

        GetZipData_byId(id);
    });
}

function GetZipList() {
    $.ajax({
        url: "controllers/zip_get_data.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
            if (data == null) { return; }
            var dataReturn = [];
            var i;
            for (i = 0; i < data.length; i++) {
                dataReturn.push([
                    data[i].rowNum,
                    data[i].content_name,
                    data[i].content_datetime,
                    '<div style="text-align:center;"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-user-modal-lg" id="getEdit" value="' + data[i].content_id + '">'
                    + '<span class="glyphicon glyphicon-pencil" style="margin-right:5px" aria-hidden="true">'
                    + '</span>Edit</button></div>'
                ]);
            }

            Init_DataTables_Zip(dataReturn);
        }
    });
}

function GetZipData_byId(_id) {
    $.ajax({
        url: "controllers/zip_get_data.php",
        type: "POST",
        dataType: "json",
        data:{id:_id},
        success: function (data) {
            alert(data);
            if (data == null) { return; }
            // var dataReturn = [];
            // var i;
            // for (i = 0; i < data.length; i++) {
            //     dataReturn.push([
            //         data[i].rowNum,
            //         data[i].content_name,
            //         data[i].content_datetime,
            //         '<div style="text-align:center;"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-user-modal-lg" id="getEdit" value="' + data[i].content_id + '">'
            //         + '<span class="glyphicon glyphicon-pencil" style="margin-right:5px" aria-hidden="true">'
            //         + '</span>Edit</button></div>'
            //     ]);
            // }
        }
    });
}
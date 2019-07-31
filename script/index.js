
$(document).ready(function(){

    menu1();
    //clear_temp();

    var uploadProcess = false;
    Dropzone.options.dropzoneFrom = {
        url: "upload.php",
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
            url:"gallery.php",
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

$("#menu1").click(function() {
    menu1();
});

$("#menu2").click(function() {
    menu2();
});

$("#btnAddFile").click(function() {
    menu2();
});

function menu1(){
    $("#menu1").addClass("active");
    $("#menu2").removeClass("active");

    $("#panelMenu1").css("display", "block");
    $("#panelMenu2").css("display", "none");

    list_image();
}

function menu2(){
    $("#menu1").removeClass("active");
    $("#menu2").addClass("active");

    $("#panelMenu1").css("display", "none");
    $("#panelMenu2").css("display", "block");
}

function list_image(){
    $.ajax({
        url:"gallery.php",
        success:function(data){
            $('#galleryView').html(data);
        }
    });
}
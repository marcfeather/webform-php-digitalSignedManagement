
$(document).ready(function(){

    menu1();
    //clear_temp();

    var uploadProcess = false;
    Dropzone.options.dropzoneFrom = {
        url: "upload.php",
        parallelUploads: 100,
        //maxFilesize: 1, // MB
        maxFiles: 100,
        autoProcessQueue: false,
        //acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
        acceptedFiles:".jpg",
        addRemoveLinks: true,
        //dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
        dictInvalidFileType: "Invalid File Type",
        dictRemoveFile: "ลบรูปนี้",
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

                    var fileNumber = myDropzone.getAcceptedFiles().length;
                    var timer = (fileNumber * 1000) / 4;

                    if(myDropzone.getUploadingFiles().length == 0) {
                        setTimeout(
                            function() 
                            {
                                myDropzone.removeAllFiles(true) ;
                                uploadProcess = false;
                                //insertDB();

                                

                                menu1();
                            }, timer);
                    }
                });
            });
        }
    };

    // Dropzone.options.dropzoneFrom = {
    //     parallelUploads: 1, // Uploads one (1) file at a time, change to whatever you like.
    //     autoProcessQueue: false,
    //     init: function () {
    //         var startUpload = document.getElementById("#btnUpload");
    //         myDropzone = this;
    //         startUpload.addEventListener("click", function () {
    //             alert("hi");
    //             //myDropzone.processQueue();
    //         });
    //         this.on("success", function() {
    //            myDropzone.options.autoProcessQueue = true; 
    //         });
    //     }
    // };

    // Dropzone.autoDiscover = false;
    // var myDropzone = new Dropzone("#dropzoneFrom", { 
    //     url: "upload.php", 
    //     paramName: "file_upload",
    //     maxFilesize: 1024, 
    //     maxFiles: 200,
    //     autoProcessQueue: false
    // });

    // function startUpload(){
    //     for (var i = 0; i < myDropzone.getAcceptedFiles().length; i++) {
    //         myDropzone.processFile(myDropzone.getAcceptedFiles()[i]);
    //     }
    // }

    // myDropzone.on('success', function(file, result) {
    //     try {
    //         result = JSON.parse(result)
    //         if (!result.error) {
    //             if(myDropzone.getQueuedFiles().length === 0 && myDropzone.getUploadingFiles().length === 0){
    //                 $("#uploadModal"). modal('hide');
    //                 myDropzone.removeAllFiles(true) ;
    //             }
    //         }
    //         //TODO - 
    //     } catch (e) {
    //         //TODO -
    //     }
    // });

    // Dropzone.options.myDropzone = {
    //     autoProcessQueue: true,
    //     parallelUploads: 1,
    //     addRemoveLinks:true,
    //     init: function () {
    //         var submitButton = document.querySelector("#btnUpload");
    //         myDropzone = this; // closure
    //         submitButton.addEventListener("click", function () {
    //             if(myDropzone.getQueuedFiles().length === 0)
    //             {
    //                 alert("Please drop or select file to upload !!!");
    //             }
    //             else{
    //                myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    //             } 
    //         });
    //     },
    //     url: "upload.php"
    // };

 
    // Dropzone.options.dropzoneFrom = {
    //  autoProcessQueue: false,
    //  //acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
    //  acceptedFiles:".jpg",
    //  init: function(){
    //   var submitButton = document.querySelector('#btnUpload');
    //   myDropzone = this;
    //   submitButton.addEventListener("click", function(){
    //    myDropzone.processQueue();
    //   });
    //   this.on("complete", function(){
    //    //if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    //    //if(this.getUploadingFiles().length == 0)
    //    //{
    //     var _this = this;
    //     _this.removeAllFiles();
    //    //}
    //    //list_image();
    //   });
    //  },
    // };

    // $(".dropzone").dropzone({
    //     renameFilename: function (filename) {
    //         return new Date().getTime() + '_' + filename;
    //     }
    // });

    // list_image();
   
    // function list_image()
    // {
    //  $.ajax({
    //   url:"gallery.php",
    //   success:function(data){
    //    $('#galleryView').html(data);
    //   }
    //  });
    // }
   
    $(document).on('click', '.remove_image', function(){
        var name = $(this).attr('id');
        $.ajax({
            url:"gallery.php",
            method:"POST",
            data:{name:name},
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

// function insertDB(){
//     $.ajax({
//         url:"insert.php",
//         method:"POST",
//         data:{name:name},
//         success:function(data){
            
//         }
//     });
// }
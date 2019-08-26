
$(document).ready(function(){  

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
   
});
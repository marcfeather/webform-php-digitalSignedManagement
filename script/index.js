
$("#menu1").click(function() {
    $("#panelMenu1").css("display", "block");
    $("#panelMenu2").css("display", "none");
});

$("#menu2").click(function() {
    $("#panelMenu1").css("display", "none");
    $("#panelMenu2").css("display", "block");
});

// $("#btnUpload").click(function() {
//     alert("hi");
// });

$(document).ready(function(){
    $("#panelMenu1").css("display", "block");
    $("#panelMenu2").css("display", "none");
    list_image();

    // Dropzone.options.dropzoneFrom = {
    //     init: function () {
    //         this.on("complete", function (file) {
    //             setTimeout(
    //             function() 
    //             {
    //                 //if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
    //                     var _this = this;
    //                     _this.removeAllFiles();
    //                     alert("ok");
    //                 //}
    //             }, 3000);
    //         });
    //     }
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

function list_image(){
    $.ajax({
        url:"gallery.php",
        success:function(data){
            $('#galleryView').html(data);
        }
    });
}
  

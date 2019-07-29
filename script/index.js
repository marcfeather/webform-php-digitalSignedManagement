
$(document).ready(function(){
    menu1();

    Dropzone.options.dropzoneFrom = {
        acceptedFiles:".jpg",
        init: function () {
            var refreshButton = document.querySelector('#btnRefresh');
            refreshButton.addEventListener("click", function(){
                var _this = this;
                _this.removeAllFiles();
            });
        }
    };
 
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

// $("#btnUpload").click(function() {
//     alert("hi");
// });

function menu1(){
    $("#panelMenu1").css("display", "block");
    $("#panelMenu2").css("display", "none");

    list_image();
}

function menu2(){
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
  

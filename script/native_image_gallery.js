
$(document).ready(function(){  
   
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

function list_image(){
    $.ajax({
        url: "controllers/image_gallery.php",
        success:function(data){
            $('#galleryView').html(data);
        }
    });
}
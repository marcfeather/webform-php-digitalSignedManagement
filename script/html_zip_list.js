
$(document).ready(function(){  
    //detect message
    if (message != '') {
        alert(message);
    }

    GetZipList();
});

function Init_DataTables_Zip(data) {
    dtZipData = $('#datatable-zipList').DataTable({
        data: data,
        bDestroy: true,
        deferRender: true,
        //searching: false,
        //bLengthChange: false,
        //bInfo: false,
        //bPaginate: false,
        //ordering: false,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "order": [[0, "asc"]],
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
            },
            {
                "targets": [3],
                "orderable": false
            }
        ],
        fixedHeader: true,
        scrollX: true,
        responsive: true
    });

    dtZipData.on('click', 'tbody tr td button', function () {
        if ($(this).val() == '') { return; }
        
        var r = confirm("Are you sure!");
        if (r == true) {
            id = $(this).val();

            //delete
            DeleteZipData_byId(id);
        } 
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
                    '<div style="text-align:center;"><button type="button" class="btn btn-danger btn-xs" value="' + data[i].content_id + '">'
                    + ' <span class="glyphicon glyphicon-trash" style="margin-right:5px" aria-hidden="true">'
                    + ' </span>Delete</button></div>'
                ]);
            }

            Init_DataTables_Zip(dataReturn);
        }
    });
}

function DeleteZipData_byId(_id) {
    $.ajax({
        url: "controllers/zip_del_data.php",
        type: "POST",
        dataType: "json",
        data:{id:_id},
        success: function (data) {
            if (data == null) { return; }

            if (data[0].result) {
                //get data
                GetZipList();
            }else {
                alert(data[0].error);
            }
        }
    });
}
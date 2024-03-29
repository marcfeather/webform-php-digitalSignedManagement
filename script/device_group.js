var id;

$(document).ready(function(){  
    GetDeviceGroupList();

    $('#btnAddDeviceGroup').click(function () {
        CheckPackage();
    });

    $('#btnSaveDeviceGroup').click(function () {
        var inputA = $('#inpGroupName');
        if (inputA.val() == '') {
            inputA.focus();
            return;
        }
        var inputB = $('#ddlContentData');
        if (inputB.val() == '0') {
            alert('กรุณาเลือกไฟล์ HTML(zip)');
            inputB.focus();
            return;
        }
        
        DeviceGroupSave(id);
    });

    $('#btnDelDeviceGroup').click(function () {
        var r = confirm("กรุณายืนยันการลบข้อมูล");
        if (r == true) {
            //delete
            DeleteDeviceGroupData_byId(id);
        }
    });

    $('#btnAddZipDirect').click(function () {
        $('#deviceGroupDetailModal').modal('toggle');
        window.location = "20.php";
    });
});

function Init_DataTables_DeviceGroup(data) {
    dtDeviceGroupData = $('#datatable-deviceGroup').DataTable({
        data: data,
        bDestroy: true,
        deferRender: true,
        //searching: false,
        //bLengthChange: false,
        //bInfo: false,
        //bPaginate: false,
        //ordering: false,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        dom: "Bfrtip",
        buttons: [
            {
                extend: "pageLength",
                className: "btn-sm"
            },
            {
                extend: "copy",
                className: "btn-sm"
            },
            {
                extend: "csv",
                className: "btn-sm"
            },
            {
                extend: "excel",
                className: "btn-sm"
            },
            {
                extend: "pdfHtml5",
                className: "btn-sm"
            },
            {
                extend: "print",
                className: "btn-sm"
            }
        ],
        "order": [[0, "asc"]],
        columns: [
            { width: '5%' },
            { width: '50%' },
            { width: '35%' },
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

    dtDeviceGroupData.on('click', 'tbody tr td button', function () {
        if ($(this).val() == '') { return; }
        $("#btnDelDeviceGroup").css("display", "block");
        id = $(this).val();

        GetDeviceGroupList_byId(id);
    });
}

function GetDeviceGroupList() {
    $.ajax({
        url: "controllers/deviceGroup_get_data.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
            if (data == null) { return; }
            var dataReturn = [];
            var i;
            for (i = 0; i < data.length; i++) {
                dataReturn.push([
                    data[i].rowNum,
                    data[i].device_group_name,
                    data[i].content_name,
                    '<div style="text-align:center;"><button type="button" class="btn btn-warning btn-xs"'
                    + ' data-toggle="modal" data-target="#deviceGroupDetailModal" id="getEdit" value="' + data[i].device_group_id + '">'
                    + ' <span class="glyphicon glyphicon-pencil" style="margin-right:5px" aria-hidden="true">'
                    + ' </span>แก้ไข</button></div>'
                ]);
            }

            Init_DataTables_DeviceGroup(dataReturn);
        }
    });
}

function GetDeviceGroupList_byId(_id) {
    $.ajax({
        url: "controllers/deviceGroup_get_data.php",
        type: "POST",
        data: { id: _id},
        dataType: "json",
        success: function (data) {
            if (data == null) { return; }
            $('#inpGroupName').val(data[0].device_group_name);

            GetContentDataList(data[0].device_group_content_id);
        }
    });
}

function DeleteDeviceGroupData_byId(_id) {
    $.ajax({
        url: "controllers/deviceGroup_del_data.php",
        type: "POST",
        dataType: "json",
        data:{id:_id},
        success: function (data) {
            if (data == null) { 
                alert("Return Null Value");
                return; 
            }
            
            if (data.result) {
                $('#deviceGroupDetailModal').modal('toggle');
                GetDeviceGroupList();
            }else {
                alert(data.error);
            }
        }
    });
}

function GetContentDataList(_value) {
    $.ajax({
        url: "controllers/zip_get_data.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
            try {
                if (data == null) { return; }

                $('#ddlContentData').empty();
                var div_data = "<option value='0'>Please Select</option>";
                $(div_data).appendTo('#ddlContentData');
                for (i = 0; i < data.length; i++) {
                    var div_data = "<option value=" + data[i].content_id + ">" + data[i].rowNum + '. ' + data[i].content_name + "</option>";
                    $(div_data).appendTo('#ddlContentData');
                }

                $("#ddlContentData").val(_value);
            }
            catch (err) {
                alert(err.message);
            }
        },
        error: function (jqXHR, exception) {
            handleError(jqXHR, exception);
        }
    });
};

function DeviceGroupSave(_id) {
    var _groupName = $('#inpGroupName').val();
    var _contentDataId = $('#ddlContentData').val();

    if (_id != '') {
        $.ajax({
            url: "controllers/deviceGroup_add_up_data.php",
            type: "POST",
            dataType: "json",
            data: { id: _id, groupName: _groupName, contentDataId: _contentDataId},
            success: function (data) {
                if (data == null) { 
                    alert("Return Null Value");
                    return;
                }
                if (data.result) {
                    $('#deviceGroupDetailModal').modal('toggle');
                    GetDeviceGroupList();
                }else {
                    alert(data.error);
                }
            }
        });

    } else {
        $.ajax({
            url: "controllers/deviceGroup_add_up_data.php",
            type: "POST",
            dataType: "json",
            data: { groupName: _groupName, contentDataId: _contentDataId },
            success: function (data) {
                if (data == null) { 
                    alert("Return Null Value");
                    return;
                }
                if (data.result) {
                    $('#deviceGroupDetailModal').modal('toggle');
                    GetDeviceGroupList();
                }else {
                    alert(data.error);
                }
            }
        });
    }
}

function CheckPackage() {
    var _moduleId = 121; //menu id 12 action menu 1
    $.ajax({
        url: "controllers/_package_check.php",
        type: "POST",
        dataType: "json",
        data: { moduleId: _moduleId },
        success: function (data) {
            if (data == null) { 
                alert("Return Null Value");
                return;
            }

            if (!data) {
                $('#priceUserModal').modal();
                return;
            }

            $("#deviceGroupDetailModal").modal();
            $("#btnDelDeviceGroup").css("display", "none");
            id = '';
            var inputA = $('#inpGroupName');
            //clear text
            inputA.val('');
            //delay 0.1 sec and focus text
            setTimeout(function () {
                inputA.focus();
            }, 500);
    
            GetContentDataList(0);
        }
    });
}
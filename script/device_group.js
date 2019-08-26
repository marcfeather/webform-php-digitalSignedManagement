var id;

$(document).ready(function(){  
    $('#btnAddDeviceGroup').click(function () {
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
    });

    $('#btnSaveDeviceGroup').click(function () {
        var inputA = $('#inpGroupName');
        if (inputA.val() == '') {
            inputA.focus();
            return;
        }
        var inputB = $('#ddlContentData');
        if (inputB.val() == '0') {
            inputB.focus();
            return;
        }
        
        DeviceGroupSave(id);
    });

    $('#btnDelDeviceGroup').click(function () {
        var r = confirm("Are you sure !");
        if (r == true) {
            //delete
            DeleteDeviceGroupData_byId(id);
        }
    });
});

function Init_DataTables_DeviceGroup(data) {
    dtDeviceGroupData = $('#datatable-deviceGroup').DataTable({
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
            { width: '35%' },
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
                    + ' </span>Edit</button></div>'
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
            if (data == null) { return; }
            if (data) {
                //get data
                GetDeviceGroupList();
                //close modal
                $('#deviceGroupDetailModal').modal('toggle');
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
                    var div_data = "<option value=" + data[i].content_id + ">" + data[i].content_order + '. ' + data[i].content_name + "</option>";
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

    // alert(_id);
    // alert(_groupName);
    // alert(_contentDataId);

    if (_id != '') {
        $.ajax({
            url: "controllers/deviceGroup_add_up_data.php",
            type: "POST",
            data: { id: _id, groupName: _groupName, contentDataId: _contentDataId},
            success: function (data) {
                if (!data) { return; }
                if (data) {
                    $('#deviceGroupDetailModal').modal('toggle');
                    GetDeviceGroupList();
                }else {
                    alert('Error!');
                }
            }
        });

    } else {
        $.ajax({
            url: "controllers/deviceGroup_add_up_data.php",
            type: "POST",
            data: { groupName: _groupName, contentDataId: _contentDataId },
            success: function (data) {
                if (!data) { return; }
                if (data) {
                    $('#deviceGroupDetailModal').modal('toggle');
                    GetDeviceGroupList();
                }else {
                    alert('Error!');
                }
            }
        });
    }
}
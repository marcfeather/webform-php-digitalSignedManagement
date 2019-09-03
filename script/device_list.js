var id;

$(document).ready(function(){  
    GetDeviceList();

    $('#btnAddDevice').click(function () {
        $("#btnDelDevice").css("display", "none");
        id = '';
        $('#inpDeviceImei').val('');
        var inputA = $('#inpDeviceName');
        //clear text
        inputA.val('');
        //delay 0.1 sec and focus text
        setTimeout(function () {
            inputA.focus();
        }, 500);

        GetDeviceGroupData(0);
    });

    $('#btnSaveDevice').click(function () {
        var inputA = $('#inpDeviceName');
        if (inputA.val() == '') {
            inputA.focus();
            return;
        }
        var inputB = $('#inpDeviceImei');
        if (inputB.val() == '') {
            inputB.focus();
            return;
        }
        var inputC = $('#ddlDeviceGroup');
        if (inputC.val() == '0') {
            inputC.focus();
            return;
        }
        
        DeviceSave(id);
    });

    $('#btnDelDevice').click(function () {
        var r = confirm("Are you sure !");
        if (r == true) {
            //delete
            DeleteDeviceListData_byId(id);
        }
    });

    $(".allownumericwithoutdecimal").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
});

function Init_DataTables_DeviceList(data) {
    dtDeviceListData = $('#datatable-deviceList').DataTable({
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
            { width: '15%' },
            { width: '25%' },
            { width: '20%' },
            { width: '10%' },
            { width: '15%' },
            { width: '10%' }
        ],
        columnDefs: [
            {
                "targets": [0],
                "className": "text-center"
            },
            {
                "targets": [4],
                "className": "text-center"
            },
            {
                "targets": [5],
                "className": "text-center"
            },
            {
                "targets": [6],
                "orderable": false
            }
        ],
        fixedHeader: true,
        scrollX: true,
        responsive: true
    });

    dtDeviceListData.on('click', 'tbody tr td button', function () {
        if ($(this).val() == '') { return; }
        $("#btnDelDevice").css("display", "block");
        id = $(this).val();

        GetDeviceList_byId(id);
    });
}

function GetDeviceList() {
    $.ajax({
        url: "controllers/device_get_data.php",
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
                    data[i].device_name,
                    data[i].device_imei,
                    data[i].device_status_name,
                    data[i].device_datetime,
                    '<div style="text-align:center;"><button type="button" class="btn btn-warning btn-xs"'
                    + ' data-toggle="modal" data-target="#deviceDetailModal" id="getEdit" value="' + data[i].device_id + '">'
                    + ' <span class="glyphicon glyphicon-pencil" style="margin-right:5px" aria-hidden="true">'
                    + ' </span>Edit</button></div>'
                ]);
            }

            Init_DataTables_DeviceList(dataReturn);
        }
    });
}

function GetDeviceList_byId(_id) {
    $.ajax({
        url: "controllers/device_get_data.php",
        type: "POST",
        data: { id: _id},
        dataType: "json",
        success: function (data) {
            if (data == null) { return; }
            $('#inpDeviceName').val(data[0].device_name);
            $('#inpDeviceImei').val(data[0].device_imei);

            GetDeviceGroupData(data[0].device_group_id);
        }
    });
}

function DeleteDeviceListData_byId(_id) {
    $.ajax({
        url: "controllers/device_del_data.php",
        type: "POST",
        dataType: "json",
        data:{id:_id},
        success: function (data) {
            if (data == null) { 
                alert("ajax return null");
                return;
            }
            if (data.result) {
                //close modal
                $('#deviceDetailModal').modal('toggle');
                //get data
                GetDeviceList();
            }else {
                alert(data.error);
            }
        }
    });
}

function GetDeviceGroupData(_value) {
    $.ajax({
        url: "controllers/deviceGroup_get_data.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
            try {
                if (data == null) { return; }

                $('#ddlDeviceGroup').empty();
                var div_data = "<option value='0'>Please Select</option>";
                $(div_data).appendTo('#ddlDeviceGroup');
                for (i = 0; i < data.length; i++) {
                    var div_data = "<option value=" + data[i].device_group_id + ">" + data[i].rowNum + '. ' + data[i].device_group_name + "</option>";
                    $(div_data).appendTo('#ddlDeviceGroup');
                }

                $("#ddlDeviceGroup").val(_value);
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

function DeviceSave(_id) {
    var _deviceName = $('#inpDeviceName').val();
    var _deviceImei = $('#inpDeviceImei').val();
    var _deviceGroupId = $('#ddlDeviceGroup').val();

    if (_id != '') {
        $.ajax({
            url: "controllers/device_add_up_data.php",
            type: "POST",
            dataType: "json",
            data: { id: _id, deviceName: _deviceName, deviceImei: _deviceImei, deviceGroupId: _deviceGroupId },
            success: function (data) {
                if (data == null) { 
                    alert("ajax return null");
                    return;
                }
                if (data.result) {
                    //close modal
                    $('#deviceDetailModal').modal('toggle');
                    //get data
                    GetDeviceList();
                }else {
                    alert(data.error);
                }
            }
        });

    } else {
        $.ajax({
            url: "controllers/device_add_up_data.php",
            type: "POST",
            dataType: "json",
            data: { deviceName: _deviceName, deviceImei: _deviceImei, deviceGroupId: _deviceGroupId },
            success: function (data) {
                if (data == null) { 
                    alert("ajax return null");
                    return;
                }
                if (data.result) {
                    //close modal
                    $('#deviceDetailModal').modal('toggle');
                    //get data
                    GetDeviceList();
                }else {
                    alert(data.error);
                }
            }
        });
    }
}
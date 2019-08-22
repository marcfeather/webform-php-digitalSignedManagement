<div class="">
    <div class="page-title">

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ข้อมูลรูปแบบ HTML</h2>

                <div class="nav navbar-right panel_toolbox">
                    <button id="btnAddZip" type="button" class="btn btn-dark" 
                        style="width:100px; height:40px;" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;เพิ่ม
                    </button>
                </div>

                <div class="container">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Select a zip file to upload</h4>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" method="post" action="controllers/zip_upload_code.php">
                                <label><input type="file" name="zip_file" required=""/></label>
                                <br/><br/>
                                <input type="submit" name="submit" class="modal-upload btn btn-dark" value="Upload" style="width:100%; height:40px;"/>
                            </form>
                        </div>        
                        </div>
                    </div>
                    </div>
                </div> 

                <div class="clearfix"></div>
                </div>
                <div class="x_content">

                <table id="datatable-zipList" class="table table-striped table-bordered" cellspacing="0" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">NO</th>
                            <th class="text-left" style="width: 50%">Name</th>
                            <th class="text-left" style="width: 30%">Date</th>
                            <th class="text-center" style="width: 15%">Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
        </div>
    </div>
</div>
<div class="">
  <div class="page-title">
    
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>อัพโหลดไฟล์ zip</h2>

          <div class="nav navbar-right panel_toolbox">
            <button id="btnUploadZip" type="button" class="btn btn-dark" 
                style="width:100px; height:40px;">
                <i class="fa fa-arrow-circle-up"></i>&nbsp;&nbsp;อัพโหลด
            </button>
          </div>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          
          <button data-toggle="modal" data-target="#myModal">Upload zip file</button>
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
                      <form enctype="multipart/form-data" method="post" action="zip_upload_code.php">
                          <label><input type="file" name="zip_file" required="" /></label>
                          <br />
                          <input type="submit" name="submit" class="modal-upload" value="Upload" />
                      </form>
                  </div>        
                </div>
              </div>
            </div>
          </div>          

        </div>
      </div>
    </div>
  </div>
</div>
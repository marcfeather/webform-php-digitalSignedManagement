<?php

$folder_name = 'content/';

if(isset($_POST["name"]))
{
    $filename = $folder_name.$_POST["name"];
    unlink($filename);

    include("mysqli_connect.php"); 
    $value = $_POST["value"];
    $sql = "DELETE FROM contents WHERE content_name = '".$value."'";
    $conn->query($sql);
    $conn->close();
}

//$result = array();

//$files = scandir('content');

$output = '<div class="row">';

$files = array();
$dir = opendir('content'); // open the cwd..also do an err check.

while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..") and ($file != "index.php")) {
                $files[] = $file; // put in array.
        }   
}

//natsort($files); // sort.

if(false !== $files)
{
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
    $name = pathinfo($folder_name.$file, PATHINFO_FILENAME);
   $output .= '
   <div class="col-md-55">
    <div class="thumbnail">
        <div class="image view view-first">
            <img style="width: 100%; display: block;" src="'.$folder_name.$file.'" alt="image" />
        </div>
        <div class="caption">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6" align="left">
                    <p>'.$name.'</p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6" align="right">
                    <button type="button" class="btn btn-danger btn-xs remove_image" id="'.$file.'" value="'.$name.'">
                        <i class="fa fa-close"></i> ลบ
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>
   ';
  }
 }
}
$output .= '</div>';
echo $output;

?>
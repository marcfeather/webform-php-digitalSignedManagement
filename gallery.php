<?php

$folder_name = 'content/';

if(isset($_POST["name"]))
{
 $filename = $folder_name.$_POST["name"];
 unlink($filename);
}

$result = array();

$files = scandir('content');

$output = '<div class="row">';

if(false !== $files)
{
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
   $output .= '
   <div class="col-md-55">
    <div class="thumbnail">
        <div class="image view view-first">
            <img style="width: 100%; display: block;" src="'.$folder_name.$file.'" alt="image" />
            <div class="mask">
                <p>'.$file.'</p>
                <div class="tools tools-bottom">
                    <a href="#"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
        <div class="caption">
            
            <button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</button>
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
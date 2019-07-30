<?php

$folder_name = 'content/';
$fileType = ".jpg";

if(!empty($_FILES))
{
    //Check if the directory already exists.
    if(!is_dir($folder_name)){
        //Directory does not exist, so lets create it.
        mkdir($folder_name, 0777, true);
    }

    $target_file = $folder_name . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $status = 1;

        // // Get array of all source files
        // $files = scandir($folder_name);
        // $count = -2;
        // // Cycle through all source files
        // foreach ($files as $file) {
        //     $count++;
        //     rename($folder_name . $file, $folder_name . $count . $fileType);
        // }

        // //$files = array();
        // $count = 0;
        // $dir = opendir('content'); // open the cwd..also do an err check.
        // while(false != ($file = readdir($dir))) {
        //     if(($file != ".") and ($file != "..") and ($file != "index.php")) {
        //             //$files[] = $file; // put in array.
        //             $count++;
        //             rename($folder_name . $file, $folder_name . $count . $fileType);
        //     }   
        // }

    }
}

// //$ds = $folder_name;  //1
// //$storeFolder = 'files/tmp';   //2
// if (!empty($_FILES)) {
//     $tempFile = $_FILES['file']['tmp_name'];      
//     $targetPath = $folder_name; //dirname( __FILE__ ) . $ds. $storeFolder . $ds;
//     $path_parts = pathinfo($_FILES["file"]["name"]);
//     $extension = $path_parts["extension"];

//     //$name = time();

//     //$targetFile = $targetPath . $name . '.' . $extension;

//     $targetFile = $targetPath . basename($_FILES["file"]["name"]);

//     move_uploaded_file($tempFile, $targetFile);
// }

// if(isset($_POST["name"]))
// {
//  $filename = $folder_name.$_POST["name"];
//  unlink($filename);
// }

// $result = array();

// $files = scandir('content');

// $output = '<div class="row">';

// if(false !== $files)
// {
//  foreach($files as $file)
//  {
//   if('.' !=  $file && '..' != $file)
//   {
//    $output .= '
//    <div class="col-md-2">
//     <img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
//     <button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</button>
//    </div>
//    ';
//   }
//  }
// }
// $output .= '</div>';
// echo $output;

?>
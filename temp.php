<?php
$type = $_POST['type'];

// Identify directories
$source = "temp/";
$destination = "content/";
$fileType = ".jpg";

if ($type == 1) {
    //Check if the directory already exists.
    if(!is_dir($destination)){
        //Directory does not exist, so lets create it.
        mkdir($destination, 0777, true);
    }

}else if ($type == 2) {
    $countTempFile = 0;
}

// Get array of all source files
$files = scandir($source);

// Cycle through all source files
foreach ($files as $file) {
    if (in_array($file, array(".",".."))) continue;

    if ($type == 1) {
        // //create file name destination
        // $fileDes = glob($destination . '*' . $fileType);
        // $countFile = 0;
        // if ($fileDes != false){
        //     $countFile = count($fileDes); //11
        // }
        // $countFile++; //12
        // $target_file = $destination . strval($countFile) . $fileType;

        $target_file = $destination . $file;

        // If we copied this successfully, mark it for deletion
        if (copy($source.$file, $target_file)) {
            // Get array of all source files
            $filesDes = scandir($destination);
            $count = -2;
            // Cycle through all source files
            foreach ($filesDes as $fileDes) {
                $count++;
                rename($destination . $fileDes, $destination . $count . $fileType);
            }

            $delete[] = $source.$file;
        }

    }else if ($type == 2) {
        $delete[] = $source.$file;
        $countTempFile++;
    } 
}

if ($type == 2 && $countTempFile > 0){
    // Delete all successfully-copied files
    foreach ($delete as $file) {
        unlink($file);
    }
}

echo true;



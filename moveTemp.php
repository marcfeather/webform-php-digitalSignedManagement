<?php
// Identify directories
$source = "content/temp/";
$destination = "content/";
$fileType = ".jpg";

// Get array of all source files
$files = scandir($source);

$countTempFile = 0;
// Cycle through all source files
foreach ($files as $file) {
    if (in_array($file, array(".",".."))) continue;

    //create file name destination
    $fileDes = glob($destination . '*' . $fileType);
    $countFile = 0;
    if ($fileDes != false){
        $countFile = count($fileDes);
    }
    $countFile++;
    $target_file = $destination . strval($countFile) . $fileType;

    // If we copied this successfully, mark it for deletion
    if (copy($source.$file, $target_file)) {
        $delete[] = $source.$file;
    }

    $countTempFile++;
}

if ($countTempFile == 0){
    /* Redirect browser */
    header('Location: media_upload.php'); 
    exit();

}else {
    // Delete all successfully-copied files
    foreach ($delete as $file) {
        unlink($file);
    }

    /* Redirect browser */
    header('Location: index.php'); 
    exit();
}




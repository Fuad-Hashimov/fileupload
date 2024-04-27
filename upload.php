<?php

if (isset($_POST['btnUpload']) && $_POST['btnUpload'] == "Upload") {
 
    $fileTempPath = $_FILES['fileToUpload']['tmp_name'];
    $fileName = $_FILES['fileToUpload']['name'];

    $uploadFolder = "./files/";
    $destPatch = $uploadFolder . $fileName;

    if (move_uploaded_file($fileTempPath, $destPatch)) {
        echo "File Yuklendi";
    } else {
        echo "File yuklenmedi error";
    }
}

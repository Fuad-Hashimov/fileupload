<?php

if (isset($_POST['btnUpload']) && $_POST['btnUpload'] == "Upload") {

    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        $uploadOk = 1;
        $fileTempPath = $_FILES['fileToUpload']['tmp_name'];
        $fileName = $_FILES['fileToUpload']['name'];
        $fileTypes = array('jpeg', 'png', 'jpg');


        //File Choose
        if (empty($fileName)) {
            echo "file secilmedi" . "<br>";
            $uploadOk = 0;
        }

        //File Size
        $fileSize = $_FILES['fileToUpload']['size'];
        if ($fileSize > 2000000) { // == 500000kb  500kb 
            echo "File size error max size is 1mb" . "<br>";
            $uploadOk = 0;
        }

        //File Type Kontrol jpeg png gif
        $fileNameArr = explode('.', $fileName);
        $fileName_isArr = $fileNameArr[0];
        $fileNameType = $fileNameArr[1];

        if (!in_array($fileNameType, $fileTypes)) {
            echo "File Type Error" . "<br>";
            echo "File Types " . implode(",", $fileTypes);
            $uploadOk = 0;
        }

        //New File Name
        $newFileName = md5(time() . $fileName_isArr) . '.' . $fileNameType;


        $uploadFolder = "./files/";
        $destPatch = $uploadFolder . $newFileName;

        if ($uploadOk == 0) {
            echo " Upload Ok error = 0";
        } else {
            if (move_uploaded_file($fileTempPath, $destPatch)) {
                echo "File Yuklendi";
            } else {
                echo "File yuklenmedi error";
            }
        }
    } else {
        echo "Error file  " . $_FILES['fileToUpload']['error'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="file" name="fileToUpload">
        </div>
        <div>
            <input type="submit" value="Upload" name="btnUpload">
        </div>
    </form>
</body>

</html>
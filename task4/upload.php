<?php


if(isset($_POST['fu'])){
        $file = $_FILES['f1'];
        $filesName = $file['name'];
        $fileSize = $file['size'];
        $fileTemp = $file['tmp_name'];
        $fileE = $file['error'];
        $fileExt = explode( '.', $filesName);
        $fileRe = strtolower(end($fileExt));
        $allow_format = array('jpg','jpeg','pdf','png');
       // print_r($file);
        
        if(in_array($fileRe, $allow_format)){
            if(!$fileE){
                if ($fileSize < 100000000){
                    $fileDestination = 'upload/'.$filesName;
                    move_uploaded_file($fileTemp, $fileDestination);
                    header('Loaction:index.php?UploadSuccess');
                } else {
                    echo "files are too large to upload";
                }
            
            }else{
                echo "errors occured in uploading";
            }
        } else {
            echo "the format is not supported";
        }
        
       
}else {
    

    echo "input error";
}
 


?>
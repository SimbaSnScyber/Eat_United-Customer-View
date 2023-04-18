<?php
     
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    
function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
}

require __DIR__.'/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();
$date = "";
$prodID = "";
$restID = "";
$folderPath = "/var/www/html/uploads/";
error_reporting(E_ERROR | E_PARSE);
if(isset($_GET['prodID'])){
    $prodID = $_GET['prodID'];

    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
    $file = $folderPath . $prodID . '.'.$file_ext;
    $tempName = 'http://197.234.75.240/uploads/' . $prodID . '.'.$file_ext;
    move_uploaded_file($file_tmp, $file);
    $date = $_SERVER['REQUEST_TIME'];

    $insert_query = "UPDATE products SET image = :image WHERE id = :id";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':image', $tempName,PDO::PARAM_STR);
                $insert_stmt->bindValue(':id', $prodID,PDO::PARAM_STR);

                $insert_stmt->execute();

                $returnData = msg(1,201,'Image added succesfully.');
    
    echo json_encode($returnData);
}
else if(isset($_GET['restID'])){
    $restID = $_GET['restID'];
    
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
    $file = $folderPath . $restID . '.'.$file_ext;
    $tempName = 'http://197.234.75.240/uploads/' . $restID . '.'.$file_ext;
    move_uploaded_file($file_tmp, $file);
    $date = $_SERVER['REQUEST_TIME'];

    $insert_query = "UPDATE restaraunt SET image = :image WHERE id = :id";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':image', $tempName,PDO::PARAM_STR);
                $insert_stmt->bindValue(':id', $restID,PDO::PARAM_STR);

                $insert_stmt->execute();

                $returnData = msg(1,201,'Image added succesfully.');
    
    echo json_encode($returnData);
}
else{
    $uniqueID = uniqid();
    
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
    $file = $folderPath . $uniqueID . '.'.$file_ext;
    $tempName = 'http://197.234.75.240/uploads/' . $uniqueID . '.'.$file_ext;
    move_uploaded_file($file_tmp, $file);
    $date = $_SERVER['REQUEST_TIME'];
    $id = 0;

    $insert_query = "INSERT INTO `images`(`id`,`path`,`date_uploaded`) VALUES (:id,:path,:date_uploaded)";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':path', $tempName,PDO::PARAM_STR);
                $insert_stmt->bindValue(':date_uploaded', $date,PDO::PARAM_STR);
                $insert_stmt->bindValue(':id', $id,PDO::PARAM_STR);

                $insert_stmt->execute();

                $returnData = msg(1,201,'Image added succesfully.');
    
    echo json_encode($returnData);
}   
?>
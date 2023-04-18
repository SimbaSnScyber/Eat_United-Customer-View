<?php
header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
}

// INCLUDING DATABASE AND MAKING OBJECT
require __DIR__.'/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));
$returnData = [];
$image = "";

if(!isset($_GET["id"])){
    // IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] != "POST"):
    $returnData = msg(0,404,'Page Not Found!');

// CHECKING EMPTY FIELDS
elseif(!isset($data->name) 
    || !isset($data->price) 
    || !isset($data->quantity)
    || !isset($data->category)
    || !isset($data->description)
    || !isset($data->extra)
    || !isset($data->code)
    || !isset($data->restID)
    || empty(trim($data->name))
    || empty(trim($data->price))
    || empty(trim($data->quantity))
    || empty(trim($data->category))
    || empty(trim($data->description))
    || empty(trim($data->extra))
    || empty(trim($data->code))
    || empty(trim($data->restID))
    ):

    $fields = ['fields' => ['name','price','quantity','category','description','extra','code','restID']];
    $returnData = msg(0,422,'Please fill in all Required Fields!',$fields);

// IF THERE ARE NO EMPTY FIELDS THEN-

            else:
              $name = trim($data->name);
              $price = trim($data->price);
              $quantity = trim($data->quantity);
              $category = trim($data->category);
              $description = trim($data->description);
              $extra = trim($data->extra);
              $extra1 = trim($data->extra1);
              $extra2 = trim($data->extra2);
              $extra3 = trim($data->extra3);
              $code = trim($data->code);
              $restID = trim($data->restID);

                $insert_query = "INSERT INTO `products`(`name`,`price`,`quantity`,`category`,`description`,`code`,`restID`,`image`,`extra`,`extra1`,`extra2`,`extra3`) VALUES (:name,:price,:quantity,:category,:description,:code,:restID,:image,:extra,:extra1,:extra2,:extra3)";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
                $insert_stmt->bindValue(':name', $name,PDO::PARAM_STR);
                $insert_stmt->bindValue(':price', $price,PDO::PARAM_STR);
                $insert_stmt->bindValue(':quantity', $quantity,PDO::PARAM_STR);
                $insert_stmt->bindValue(':category', $category,PDO::PARAM_STR);
                $insert_stmt->bindValue(':description', $description,PDO::PARAM_STR);
                $insert_stmt->bindValue(':code', $code,PDO::PARAM_STR);
                $insert_stmt->bindValue(':restID', $restID,PDO::PARAM_STR);
                $insert_stmt->bindValue(':image', $image,PDO::PARAM_STR);
                $insert_stmt->bindValue(':extra', $extra,PDO::PARAM_STR);
                $insert_stmt->bindValue(':extra1', $extra1,PDO::PARAM_STR);
                $insert_stmt->bindValue(':extra2', $extra2,PDO::PARAM_STR);
                $insert_stmt->bindValue(':extra3', $extra3,PDO::PARAM_STR);

                $insert_stmt->execute();

                $returnData = msg(1,201,'Product added succesfully.'); 

            endif;
}

else{
    $id = $_GET["id"];
           
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        $returnData = msg(0,404,'Page Not Found!');
    }
    else{
        if(!isset($data->name)){
            $field = "name";
        }
        else{
            $name = trim($data->name);
            $name_query = "UPDATE products SET name = :name WHERE id = :id";
            $name_stmt = $conn->prepare($name_query); 
            $name_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $name_stmt->bindValue(':name', $name,PDO::PARAM_STR);
            $name_stmt->execute();
        }

        if(!isset($data->price)){
            $field2 = "price";
        }
        else{
            $price = trim($data->price);
            $price_query = "UPDATE products SET price = :price WHERE id = :id";
            $price_stmt = $conn->prepare($price_query); 
            $price_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $price_stmt->bindValue(':price', $price,PDO::PARAM_STR);
            $price_stmt->execute();
        }

        if(!isset($data->quantity)){
            $field3 = "quantity";
        }
        else{
            $quantity = trim($data->quantity);
            $quantity_query = "UPDATE products SET quantity = :quantity WHERE id = :id";
            $quantity_stmt = $conn->prepare($quantity_query); 
            $quantity_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $quantity_stmt->bindValue(':quantity', $quantity,PDO::PARAM_STR);
            $quantity_stmt->execute();
        }

        if(!isset($data->category)){
            $field4 = "category";
        }
        else{
            $category = trim($data->category);
            $category_query = "UPDATE products SET category = :category WHERE id = :id";
            $category_stmt = $conn->prepare($category_query); 
            $category_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $category_stmt->bindValue(':category', $category,PDO::PARAM_STR);
            $category_stmt->execute();
        }

        if(!isset($data->description)){
            $field6 = "description";
        }
        else{
            $description = trim($data->description);
            $description_query = "UPDATE products SET description = :description WHERE id = :id";
            $description_stmt = $conn->prepare($description_query); 
            $description_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $description_stmt->bindValue(':description', $description,PDO::PARAM_STR);
            $description_stmt->execute();
        }

        if(!isset($data->code)){
            $field7 = "code";
        }
        else{
            $code = trim($data->code);
            $code_query = "UPDATE products SET code = :code WHERE id = :id";
            $code_stmt = $conn->prepare($code_query); 
            $code_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $code_stmt->bindValue(':code', $code,PDO::PARAM_STR);
            $code_stmt->execute();
        }

        if(!isset($data->restID)){
            $field8 = "restID";
        }
        else{
            $restID = trim($data->restID);
            $restID_query = "UPDATE products SET restID = :restID WHERE id = :id";
            $restID_stmt = $conn->prepare($restID_query); 
            $restID_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $restID_stmt->bindValue(':restID', $restID,PDO::PARAM_STR);
            $restID_stmt->execute();
        }

        if(!isset($data->extra)){
            $field9 = "extra";
        }
        else{
            $extra = trim($data->extra);
            $extra_query = "UPDATE products SET extra = :extra WHERE id = :id";
            $extra_stmt = $conn->prepare($extra_query); 
            $extra_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $extra_stmt->bindValue(':extra', $extra,PDO::PARAM_STR);
            $extra_stmt->execute();
        }

        if(!isset($data->extra1)){
            $field10 = "extra1";
        }
        else{
            $extra1 = trim($data->extra1);
            $extra1_query = "UPDATE products SET extra1 = :extra1 WHERE id = :id";
            $extra1_stmt = $conn->prepare($extra1_query); 
            $extra1_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $extra1_stmt->bindValue(':extra1', $extra1,PDO::PARAM_STR);
            $extra1_stmt->execute();
        }

        if(!isset($data->extra2)){
            $field11 = "extra2";
        }
        else{
            $extra2 = trim($data->extra2);
            $extra2_query = "UPDATE products SET extra2 = :extra2 WHERE id = :id";
            $extra2_stmt = $conn->prepare($extra2_query); 
            $extra2_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $extra2_stmt->bindValue(':extra2', $extra2,PDO::PARAM_STR);
            $extra2_stmt->execute();
        }

        if(!isset($data->extra3)){
            $field12 = "extra3";
        }
        else{
            $extra3 = trim($data->extra3);
            $extra3_query = "UPDATE products SET extra3 = :extra3 WHERE id = :id";
            $extra3_stmt = $conn->prepare($extra3_query); 
            $extra3_stmt->bindValue(':id', $id,PDO::PARAM_STR);
            $extra3_stmt->bindValue(':extra3', $extra3,PDO::PARAM_STR);
            $extra3_stmt->execute();
        }

        $returnData = msg(1,201,'Product updated succesfully.');
    }
}    

echo json_encode($returnData);
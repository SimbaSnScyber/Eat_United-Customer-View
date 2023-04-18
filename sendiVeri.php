

<?php

 error_reporting(E_ALL); 
 ini_set('display_errors', '1');

include("dbconn.php");
include("css.php");
$url = 'https://portal.nedsecure.co.za/api/transactions';

$merchRef = uniqid();
$merchTrace = uniqid();

$Card = $_POST["payment_type"];
$addressc = $_POST["address"];
$id = $_POST["userID"];

if (!empty($_POST["payment_type"])){

  if (!empty($_POST["Amount"])){
    $ok = 1;

     if(empty ($_POST["address"]) || empty($_POST["phone"]) || empty($_POST["email"])){
       $ok =0;
     } 

    if($ok == 1){

        if (isset($_POST['addressc'])) {
            $conn->query("UPDATE users SET address = '$addressc' WHERE id= '$id'");
        }   

      if(!empty($_POST["card_number"]) && $Card == "Card") {

          //Initiate cURL.
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_HEADER, 1);

          $merchRef = uniqid();

          $merchTrace = uniqid();

          $amt = $_POST['Amount'];

          $seccode = $_POST['ccv'];

          $cnumber = $_POST['card_number'];

          $expire_year = $_POST['expire_year'];
          $code = "0";
          if($code == "0"){

            if(isset($_POST['orderPost'])){
                                
                  $Amount = $_POST['amount1'];
                  $orderItem = $_POST['name'];
                  $items = $_POST['total_quantity'];
                  $address = $_POST['address'];
                  $cname = $_POST['cname'];
                  $type = $_POST['type'];
                  $rest = $_POST['rest'];
                  $restID = $_POST['restID'];
                  $prodID = $_POST['prodID'];
                  $prodPrice = $_POST['prodPrice'];
                  $phone = $_POST['phone'];
                  $payment = $_POST['payment_type'];
                  $email = $_POST['email'];
                  $orderRef = rand ( 10000 , 99999 );
                  $day = $_POST['day'];
                  $time = $_POST['time'];
                  $delivery = $_POST['delivery'];

                
                 
                    $ok = 1; 
                  
                  
                  if ($ok == 1) {
                    

                    

                 
                    $CertificateID = "{C94F458D-5263-4D13-B231-BED2AC901BEB}";
                    
                    // Divert the payment to right ID  {D0E3E803-1CA4-433C-9706-C99DF59E08EC} 
          
                    if ($rest == 'Furstenhof Restaurant & Bar'){
                      $appId =  "{7cf521b1-dec4-4044-9767-4c060685c1f0}";
                      } 
                      elseif ($rest == 'Top Restaurant and Bar'){
                        $appId =  "{7af7f8c9-3c66-4369-9f17-f8c2001f59fc}";
                       
                        } 
                      elseif ($rest == 'Neptunes Coffee Shop'){
                        $appId =  "{B8BD6AB5-3563-41D6-B20C-0326CAF9EFD8}";
                        } 
                      elseif ($rest == 'Tafule Yaka Restaurant & Bar'){
                        $appId =  "{7af7f8c9-3c66-4369-9f17-f8c2001f59fc}";
                        } 
                      elseif ($rest == 'Cresta Pandu Restaurant & Bar'){
                        $appId =  "9f3f2028-b009-4170-b1fb-e5c90f8549f4}";
                        }
                        else{
                          $appId =  "{d5a9c5d7-187b-470d-97fd-3b3c4243e335}";
                        }
                        //die($appId);
                         // Add the admin address
                   

                      
                    if($ok == 1){

                      
                    $jsonData = array(
                      "CertificateID" => $CertificateID,
                      "Transaction" => array(
                      "ApplicationID" => $appId,

                      "Command" => "ThreeDSecureCheckEnrollment",
                      "Mode" => "Live",
                      "MerchantReference"=> "{$merchRef}",
                      "Currency"=> "NAD",
                        "Amount" => $amt,
                        "ExpiryDate" => $expire_year,
                        
                        "PAN" => $cnumber)
                      );




                    //Encode the array into JSON.
                    $jsonDataEncoded = json_encode($jsonData);
                   

                    //Tell cURL that we want to send a POST request.


                    //Attach our encoded JSON string to the POST fields.
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                    //Set the content type to application/json 076 944 1053
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 


                    $result = curl_exec($ch);
                    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                    $header = substr($result, 0, $header_size);
                    $body = substr($result, $header_size);
                    $returned = json_decode($body,true);
                    $status_code = $returned["Enquiry"]["Result"]["Status"];
                    $error =$returned["Enquiry"]["Result"]["Description"];
                    //die($body);
                    if ($status_code == "0"){

                      if(isset($returned["Enquiry"]["ThreeDSecure_PAReq"])){

                        $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, restID, prodID, payment_type, orderRef, userID, phone, email)
                        VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$restID', '$prodID','$payment', '$orderRef', '$id', '$phone', '$email')";
                     
                          mysqli_query($conn, $sql);

                          $Pareq = $returned["Enquiry"]["ThreeDSecure_PAReq"];
                          include("headersimple.php");
                          $user_id = "";
                          
                          if(isset($_SESSION['id'])){
                              $user_id = $_SESSION['id'];
                          }
                          else{
                            die("You didn't login");
                          }
                          $TermUrl = "https://www.eatatunited.com.na/main/test1.php?merchRef=$merchRef&merchTrace=$merchTrace&PAN=$cnumber&atm=$amt&code=$seccode&ex=$expire_year&appid=$appId&cert=$CertificateID&name=$cname&item=$items&orderRef=$orderRef&day=$day&time=$time&deliver=$delivery&prodPrice=$prodPrice&type=$type&id=$user_id";
                          $ThreeDSecure_ACS_URL = $returned["Enquiry"]["ThreeDSecure_ACS_URL"];
                         
                         
                          $MD = $returned["Enquiry"]["ThreeDSecure_RequestID"];

                          //echo $Pareq."<br>"; echo $TermUrl."<br>"; echo $MD."<br>"; echo $ThreeDSecure_ACS_URL;
                          
                          echo "
                            <body onload=\"document.getElementById('PAEnrollForm').submit();\">
                            <form id=\"PAEnrollForm\" action=\"$ThreeDSecure_ACS_URL\" method=\"post\" target=\"paInlineFrame\">
                              
                            <input type=\"hidden\" name=\"PaReq\" value=\"$Pareq\" />
                            <input type=\"hidden\" name=\"TermUrl\" value=\"$TermUrl\" />
                            <input type=\"hidden\" name=\"MD\" value=\"$MD\" />
                            </form>
                            <div style='text-align:center;'>
                            <h2>Processing Order Payment</h2>
                            <p style=\"color:red;\">Please wait while we process your request. Do not click the Back button or refresh the page</p>
                            </div>
                            
                          <iframe name=\"paInlineFrame\" height=\"450px\" class='paInlineFrame'>
                          </iframe>

                            </body>
                            ";
                            
                          echo "

                          <style>
                          @media only screen and (min-width:600px){

                              .paInlineFrame{
                                  position:relative;
                                width:50%;
                                left:25%;
                              }
                              h2 {
                                  font-size:2.5em;
                              }

                          }

                          @media only screen and (max-width:600px){

                              .paInlineFrame{
                                  position:relative;
                                width:95%;
                                left:2.5%;
                              }
                              h2 {
                                  font-size:1.5em;
                              }

                          }
                          </style>

                          ";

                      }

                      elseif(isset($returned["Enquiry"]["ElectronicCommerceIndicator"])){


                        if($returned["Enquiry"]["ElectronicCommerceIndicator"]=="SecureChannel"){
                        
                          $error .= "Your card is not enrolled, ElectronicCommerceIndicator = ".$returned["Enquiry"]["ElectronicCommerceIndicator"];

                          header('location: Failed.php?messageF='.$error.'');

                        }
                      
                        else{
                          
                          $error .= "Your card is not enrolled, ElectronicCommerceIndicator = ".$returned["Enquiry"]["ElectronicCommerceIndicator"];
                          header('location: Failed.php?messageF='.$error.'');

                        }

                        
                        if(isset($returned["Enquiry"]["CardHolderAuthenticationID"])){

                          $CardHolderAuthenticationID = $returned["Enquiry"]["CardHolderAuthenticationID"];
                          $CardHolderAuthenticationData = $returned["Enquiry"]["CardHolderAuthenticationData"];
                          $ElectronicCommerceIndicator = $returned["Enquiry"]["ElectronicCommerceIndicator"];

                          $TermUrl = "https://www.eatatunited.com.na/main/test1.php?merchRef=$merchRef&merchTrace=$merchTrace&PAN=$cnumber&atm=$amt&code=$seccode&ex=$expire_year&appid=$appId&cert=$CertificateID&chai=$CardHolderAuthenticationID&chad=$CardHolderAuthenticationData&eci=$ElectronicCommerceIndicator";
                          header("location: ".$TermUrl."");
                        }
                        
                      }

                      else{
                        $error .= "Your card is not recognized";
                        header('location: Failed.php?messageF='.$error.'');

                      }
                    
                      


                    }
                    else{
                      
                        header('location: Failed.php?messageF='.$error.'');
                    
                    }

                    }
                    else{
                      echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                   
                    

                  
                   

                  } 
                  else {

                          echo "Error: " . $sql . "

                    " . mysqli_error($conn);

                        }

                        mysqli_close($conn);

                }
            }
            else{
              $reason = "Failed to send email";
              header('location: Failed.php?messageF='.$reason.'');
                }

            } 

        if ($Card == "EFT" || $Card == "Cash"){

                if(isset($_POST['orderPost'])){
                  $Amount = $_POST['amount1'];
                  $orderItem = $_POST['name'];
                  $items = $_POST['total_quantity'];
                  $address = $_POST['address'];
                  $cname = $_POST['cname'];
                  $type = $_POST['type'];
                  $rest = $_POST['rest'];
                  $restID = $_POST['restID'];
                  $prodID = $_POST['prodID'];
                  $prodPrice = $_POST['prodPrice'];
                  $phone = $_POST['phone'];
                  $payment = $_POST['payment_type'];
                  $email = "belmiromohlala34@gmail.com"; //$_POST['email'];
                  $orderRef = rand ( 10000 , 99999 );
                  $day = $_POST['day'];
                  $time = $_POST['time'];
                  $delivery = $_POST['delivery'];
                  $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, restID, prodID, payment_type, orderRef, userID, phone, email)
                  VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$restID', '$prodID','$payment', '$orderRef', '$id', '$phone', '$email')";
                  

                  if (mysqli_query($conn, $sql)) {
                    $pieces = explode("\n", $orderItem);
                    $pieces2 = explode("\n", $prodPrice);
                    $length = count($pieces) - 1;
                    
                    $output='<h2>Hi '.$cname.' Your Order is on the way!</h2>';
                    $output.='<p>You have scheduled an order for '.$day.' at '.$time.'</p>';
                    $output.='<p>This is what you have ordered:</p>';
                    $output.='<table style="width:100%; border: 1px solid black;" >';
                    $output.='<tr style="border: 1px solid black;">';
                    $output.='<th style="border: 1px solid black;">Order Reference</th>';
                    $output.='<th style="border: 1px solid black;">Items</th>';
                    $output.='<th style="border: 1px solid black;">Total Quantity</th>';
                    $output.='<th style="border: 1px solid black;">Delivery Fee: N$</th>';
                    $output.='<th style="border: 1px solid black;">Price: N$</th>';
                    $output.='<th style="border: 1px solid black;">Total: N$</th>';
                    $output.='<th style="border: 1px solid black;">Restaurant</th>';   
                    $output.='</tr>';
                    for ($i = 0; $i < $length; $i++) {
                    $output.='<tr style="border: 1px solid black; text-align:center;">';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$pieces[$i].'</td>';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$pieces2[$i].'.00</td>';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='</tr>';
                    }              
                    $output.='<tr style="border: 1px solid black; text-align:center;">';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$delivery.'</td>';
                    $output.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
                    $output.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
                    $output.='</tr>';
                    $output.='</table>';


                    $output.='<p><a href="https://eatatnited.com.na/main/"><img src="http://eatatnited.com.na/main/img/logo_sticky.png"></a></p>';
                          
                    $output.='<p>Thanks and enjoy,</p>';
                    $output.='<p>Eat@United Orders Team</p>';
                    $body = $output; 
                    $subject = "Order Confirmed! - Eat@United";


                    $subject2 = "New Order!";
                    
                    $output2 =  '<h2>We have a new order!</h2>';
                    $output2.='<p>This is what has been ordered:</p>';
                    $output2.='<table style="width:100%; border: 1px solid black;" >';
                    $output2.='<tr style="border: 1px solid black;">';
                    $output2.='<th style="border: 1px solid black;">Order Reference</th>';
                    $output2.='<th style="border: 1px solid black;">Items</th>';
                    $output2.='<th style="border: 1px solid black;">Total Quantity</th>';
                    $output2.='<th style="border: 1px solid black;">Delivery Fee: N$</th>';   
                    $output2.='<th style="border: 1px solid black;">Price: N$</th>';
                    $output2.='<th style="border: 1px solid black;">Total: N$</th>';
                    $output2.='<th style="border: 1px solid black;">Restaurant</th>'; 
                    $output2.='<th style="border: 1px solid black;">Customer Name</th>';
                    $output2.='<th style="border: 1px solid black;">Customer Address</th>';
                    $output2.='<th style="border: 1px solid black;">Customer Number</th>';
                    $output2.='<th style="border: 1px solid black;">Day</th>';  
                    $output2.='<th style="border: 1px solid black;">Time</th>';  
                    $output2.='<th style="border: 1px solid black;">Payment Type</th>';  
                    $output2.='<th style="border: 1px solid black;">Order Type </th>';  
                    $output2.='</tr>'; 

                  for ($i = 0; $i < $length; $i++) {
                    $output2.='<tr style="border: 1px solid black; text-align:center;">';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$pieces[$i].'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$pieces2[$i].'.00</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='</tr>';
                    }              
                    $output2.='<tr style="border: 1px solid black; text-align:center;">';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$delivery.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;"></td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$cname.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$address.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$phone.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$_POST['day'].'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$_POST['time'].'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$payment.'</td>';
                    $output2.='<td style="border: 1px solid black; text-align:center;">'.$type.'</td>';
                    $output2.='</tr>';
                    $output2.='</table>';
              
                    $output2.='<p><a href="https://eatatnited.com.na/main/"><img src="http://eatatnited.com.na/main/img/logo_sticky.png"></a></p>';


                    $output2.='<p>Eat@United Orders Team</p>';

                            
                    $email_to = $email;
                    $cresta = "orders@eatatunited.com.na";
                    $fromserver = "orders@eatatunited.com.na"; 
                    require("PHPMailer/PHPMailerAutoload.php");
                    $mail = new PHPMailer();
                   //$mail->IsSMTP();
                    $mail->Host = "eatatunited.com.na"; // Enter your host here
                    $mail->SMTPAuth = true;
                    $mail->Username = "orders@eatatunited.com.na"; // Enter your email here
                    $mail->Password = "$)?LrSC,Pz8I"; //Enter your password here
                    $mail->Port = 000003e1;
                    $mail->IsHTML(true);
                    $mail->From = "orders@eatatunited.com.na";
                    $mail->FromName = "Eat@United Orders";
                    $mail->Sender = $fromserver; // indicates ReturnPath header
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->AddAddress($email_to);
                   
                    

                    //message for admin 

                    // Remove previous recipients
                    $mail->ClearAllRecipients();
                    // alternative in this case (only addresses, no cc, bcc): 
                    // $mail->ClearAddresses();

                    $mail->Body = $output2;
                    //$adminemail = $generalsettings[0]["admin_email"]; 

                    // Add the admin address
                    if ($rest == 'Furstenhof Restaurant & Bar'){
                    $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
                    $mail->AddAddress('cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
                    $mail->AddAddress('furstenhof@proteahotels.com.na', 'Furstenhof Reception');
                    $mail->AddAddress('banq.furstenhof@proteahotels.com.na', 'banq.furstenhof');
                    $mail->Send();
                    } 
                    elseif ($rest == 'Top Restaurant and Bar'){
                      $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
                    $mail->AddAddress('cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
                    $mail->AddAddress('FNB.Thuringerhof@united.com.na', 'FNB Thuringerhof');
                    $mail->AddAddress('Meseret@proteahotels.com.na', 'Meseret Desta');
                    $mail->Send();
                      } 
                    elseif ($rest == 'Neptunes Coffee Shop'){
                      $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
                      $mail->AddAddress('cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
                      $mail->AddAddress('re.pelicanbay@proteahotels.com.na', 'Pelicanbay Reception');
                      $mail->AddAddress('fom.pelicanbay@proteahotels.com.na', 'Front Office Pelicanbay');
                      $mail->AddAddress('gm.pelicanbay@proteahotels.com.na', 'General Manager Pelicanbay');
                      $mail->Send();
                      } 
                    elseif ($rest == 'Tafule Yaka Restaurant & Bar'){
                      $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
                      $mail->AddAddress('cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
                      $mail->AddAddress('fom.zambezi@proteahotels.com.na', 'Sarah  Diergaart (FOM account)');
                      $mail->AddAddress('fb.zambezi@proteahotels.com.na', 'Ben Shimukwenga');
                      $mail->Send();
                      } 
                    elseif ($rest == 'Cresta Pandu Restaurant & Bar'){
                      $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
                      $mail->AddAddress('cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
                      $mail->AddAddress('gm.ondangwa@proteahotels.com.na', 'GM Ondangwa');
                      $mail->AddAddress('fom.ondangwa@proteahotels.com.na', 'Front Office Manager (Ondangwa)');
                      $mail->Send();
                      }

                    if(!$mail->Send()){
                      echo "Mailer Error: " . $mail->ErrorInfo;
                      }
                    else{
                      
                            header("Location: confirm.php?action=empty");
                        }

                    } else {

                      echo "Error: " . $sql . "

              " . mysqli_error($conn);

                    }

                    mysqli_close($conn);

              }

              // You can also use header('Location: thank_you.php'); to redirect to another page.
        

        }

    }

    
    else {
      header('location: order.php?message1=Please enter all the delivery details!');
    }

  } 
  
  else{
    header('location: order.php?message=Please Have items in your cart!');
  }

} 

else{
  header('location: order.php?message=Please Select a payment type!');
}

?>


<!-- COMMON SCRIPTS -->
<script src="js/common_scripts.min.js"></script>
  <script src="js/common_func.js"></script>
  <script src="assets/validate.js"></script>
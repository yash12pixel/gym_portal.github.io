<html>
    <head>
        <title>Transaction</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css_view_gym/bootstrap.min.css">
    <link rel="stylesheet" href="css_view_gym/magnific-popup.css">
    <link rel="stylesheet" href="css_view_gym/jquery-ui.css">
    <link rel="stylesheet" href="css_view_gym/owl.carousel.min.css">
    <link rel="stylesheet" href="css_view_gym/owl.theme.default.min.css">
    <link rel="stylesheet" href="css_view_gym/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css_view_gym/animate.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css_view_gym/aos.css">

    <link rel="stylesheet" href="css_view_gym/style.css">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

<?php
session_start();
include '../connection.php';
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("config_paytm_1.php");
require_once("encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

//getting session data
$customer_id=$_SESSION['customer_id'];
$gym_id=$_SESSION['gym_id'];
$plan_id=$_SESSION['plan_id'];
$membership_start_date=$_SESSION['start_date'];
$membership_end_date=$_SESSION['end_date'];

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	//echo "<b>Transaction status is success</b>" . "<br/>";      
	
        if(isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT']) && isset($_POST['CURRENCY']) && isset($_POST['TXNDATE']) &&isset($_POST['TXNID']) && isset($_POST['BANKNAME']))
        {
            $ORDER_ID=$_POST['ORDERID'];
            $trans_amt=$_POST['TXNAMOUNT'];
            $currency=$_POST['CURRENCY'];
            $trans_date=date($_POST['TXNDATE']);
           // echo "date ".$trans_date;
            $trans_id=$_POST['TXNID'];
            $bank_name=$_POST['BANKNAME'];
            
            
            //getting customer data for email
            $Cust_SQL= mysqli_query($con, "select * from customer where customer_id=$customer_id");
            $customer_data= mysqli_fetch_array($Cust_SQL);
            $fname=$customer_data['fname'];
            $lname=$customer_data['lname'];
            $email=$customer_data['email'];
            
            
           //getting gym name
             $Gym_SQL= mysqli_query($con, "select * from gyms where gym_id=$gym_id");
            $Gym_data= mysqli_fetch_array($Gym_SQL);
            $gym_name=$Gym_data['gym_name'];
    ?>    
        
        
        
<div class="card-body">
            <br>
            
            <h2 class="text-center">Transaction Successful</h2>
      <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover table-responsive-lg " width="100%" cellspacing="0" style="background-color: white;">
          <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                          <th class="text-center">ORDERID</th>
                          <th class="text-center">TXNAMOUNT</th>
                          <th class="text-center">CURRENCY</th>
                          <th class="text-center">TXNDATE</th>
                          <th class="text-center">TXNID</th>
                          <th class="text-center">BANKNAME</th>
                        </tr>
                      </thead>

                      <tbody>
                    <?php

                          ?>
                      <tr class="text-center">
                      <td><?php echo $_POST['ORDERID']; ?></td>
                      <td><?php echo $_POST['TXNAMOUNT']; ?></td>
                      <td><?php echo $_POST['CURRENCY']; ?></td>
                      <td><?php echo $_POST['TXNDATE']; ?></td>
                      <td><?php echo $_POST['TXNID']; ?></td>
                      <td><?php echo $_POST['BANKNAME']; ?></td>
                      
                      
                    </tr>

                  </tbody>

      </table>
          <center>
              <?php
              $_SESSION['purchased']=true;            
              ?>
              <a href="../view_gym.php?id=<?php echo $gym_id; ?>" class="btn btn-primary" >Done</a>
          </center>

      </div>

  </body>
</html>
      
        
<?php	
        
        
               //Successful registration E-mail sending
            require '../PHPMailerAutoload.php';
        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'jeetnaik12@gmail.com';                 // SMTP username
        $mail->Password = 'TonyStark88';                // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('jeetnaik12@gmail.com', 'GYM Portal');
        $mail->addAddress("$email");     // Add a recipient
               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Membership purchased successfully';
      /*  $mail->Body = '<div style="border:2px solid Black;">Dear <b>Yash kothari</b>,'
                . 'You have Successfully Completed the Registration process and can now proceed with adding gym details to your profile'
                . '<br><b>Best Regards,<br>'
                . 'GYM PORTAL</b></div>.';
        */
        $mail->Body ="<body style='width:100%;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'> 
  <div class='es-wrapper-color' style='background-color:#F4F4F4;'> 
   <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;'> 
     <tr class='gmail-fix' height='0' style='border-collapse:collapse;'> 
      <td style='padding:0;Margin:0;'> 
       <table width='600' cellspacing='0' cellpadding='0' border='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
         <tr style='border-collapse:collapse;'> 
          <td cellpadding='0' cellspacing='0' border='0' style='padding:0;Margin:0;line-height:1px;min-width:600px;' height='0'><img src='https://esputnik.com/repository/applications/images/blank.gif' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;max-height:0px;min-height:0px;min-width:600px;width:600px;' alt width='600' height='1'></td> 
         </tr> 
       </table></td> 
     </tr> 
     <tr style='border-collapse:collapse;'> 
      <td valign='top' style='padding:0;Margin:0;'> 
       <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> 
         <tr style='border-collapse:collapse;'> 
          <td align='center' style='padding:0;Margin:0;'> 
           <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' align='center'> 
             <tr style='border-collapse:collapse;'> 
              <td align='left' style='Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px;'> 
               <!--[if mso]><table width='580' cellpadding='0' cellspacing='0'><tr><td width='282' valign='top'><![endif]--> 
               <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td width='282' align='left' style='padding:0;Margin:0;'> 
                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                     <tr style='border-collapse:collapse;'> 
                      <td class='es-infoblock es-m-txt-c' align='left' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;'><br></p></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td><td width='20'></td><td width='278' valign='top'><![endif]--> 
               <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td width='278' align='left' style='padding:0;Margin:0;'> 
                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                     <tr style='border-collapse:collapse;'> 
                      <td align='right' class='es-infoblock es-m-txt-c' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:14px;color:#CCCCCC;'><a href='https://viewstripo.email' class='view' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC;'></a></p></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td></tr></table><![endif]--></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class='es-header' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#FFA73B;background-repeat:repeat;background-position:center top;'> 
         <tr style='border-collapse:collapse;'> 
          <td align='center' style='padding:0;Margin:0;'> 
           <table class='es-header-body' width='600' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;'> 
             <tr style='border-collapse:collapse;'> 
              <td align='left' style='Margin:0;padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;'> 
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td width='580' valign='top' align='center' style='padding:0;Margin:0;'> 
                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                     <tr style='border-collapse:collapse;'> 
                      <td align='center' style='Margin:0;padding-left:10px;padding-right:10px;padding-top:25px;padding-bottom:25px;'><img src='https://ejtgku.stripocdn.email/content/guids/CABINET_3df254a10a99df5e44cb27b842c2c69e/images/7331519201751184.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' width='40'></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> 
         <tr style='border-collapse:collapse;'> 
          <td style='padding:0;Margin:0;background-color:#FFA73B;' bgcolor='#ffa73b' align='center'> 
           <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' align='center'> 
             <tr style='border-collapse:collapse;'> 
              <td align='left' style='padding:0;Margin:0;'> 
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td width='600' valign='top' align='center' style='padding:0;Margin:0;'> 
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#FFFFFF;border-radius:4px;' width='100%' cellspacing='0' cellpadding='0' bgcolor='#ffffff' role='presentation'> 
                     <tr style='border-collapse:collapse;'> 
                      <td align='center' style='Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px;'><h1 style='Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:48px;font-style:normal;font-weight:normal;color:#111111;'>Congratulations!</h1></td> 
                     </tr> 
                     <tr style='border-collapse:collapse;'> 
                      <td bgcolor='#ffffff' align='center' style='Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;'> 
                       <table width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                         <tr style='border-collapse:collapse;'> 
                          <td style='padding:0;Margin:0px;border-bottom:1px solid #FFFFFF;background:rgba(0, 0, 0, 0) none repeat scroll 0% 0%;height:1px;width:100%;margin:0px;'></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> 
         <tr style='border-collapse:collapse;'> 
          <td align='center' style='padding:0;Margin:0;'> 
           <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' align='center'> 
             <tr style='border-collapse:collapse;'> 
              <td align='left' style='padding:0;Margin:0;'> 
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td width='600' valign='top' align='center' style='padding:0;Margin:0;'> 
                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#FFFFFF;' width='100%' cellspacing='0' cellpadding='0' bgcolor='#ffffff' role='presentation'> 
                     <tr style='border-collapse:collapse;'> 
                      <td class='es-m-txt-l' bgcolor='#ffffff' align='left' style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;'>Dear <b>".$fname." ".$lname.",</b><br>You have successfully purchased the membership of <b>$gym_name</b> on date <b>$trans_date</b>, Your transaction id is <b>$trans_id</b> and amount is <b>$trans_amt</b></p><br/><p>Your membership expires on date : <b>$membership_end_date</b></p></td> 
                     </tr>   
                     <tr style='border-collapse:collapse;'> 
                      <td class='es-m-txt-l' align='left' style='Margin:0;padding-top:20px;padding-left:30px;padding-right:30px;padding-bottom:40px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;'>Best Regards,</p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;'>GYM PORTAL</p></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
      
             </tr> 
           </table></td> 
         </tr> 
       </table></td> 
     </tr> 
   </table> 
  </div>  ";            
        $mail->AltBody = 'Your registration to GYM portal is successful, please log in and provide further information about your gym ';
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }   
            
        
        //end email
    
        
         //storing data
        $sql1="insert into customer_membership(`customer_id`, `gym_id`, `membership_start_date`, `membership_end_date`, `plan_id`) values($customer_id,$gym_id,'$membership_start_date','$membership_end_date',$plan_id)";
        $res2 = mysqli_query($con, $sql1);
        
       $TransSQL="insert into customer_gym_transaction(`Transaction_id`, `Order_id`, `Currency`, `Transaction_date`, `Bank_name`, `Transaction_amount`, `gym_id`, `customer_id`) values('$trans_id','$ORDER_ID','$currency','$trans_date','$bank_name',$trans_amt,$gym_id,$customer_id)";
        $TransRes = mysqli_query($con, $TransSQL);
        if(!$TransRes)
        {
            echo "Error : ".mysqli_error($con);
        }
       
        //Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
        }
	}
	else {
		echo "<center><b>Transaction status is failure</b>" . "<br/><a href='../view_gym.php?id= $gym_id&purchased=false' class='btn btn-primary' >Back</a></ceneter>";
	}

//	if (isset($_POST) && count($_POST)>0 )
//	{ 
//		foreach($_POST as $paramName => $paramValue) {
//				echo "<br/>" . $paramName . " = " . $paramValue;
//		}
//	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
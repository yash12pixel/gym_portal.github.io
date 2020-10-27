<?php
  include('connection.php');
  //include ('security.php');
  if(isset($_POST['accept']))
  {
       $tmp_gym_id = $_POST['tmp_gym_id'];
       $query = "select * from temp_gym WHERE tmp_gym_id='$tmp_gym_id'";
       $query_run=mysqli_query($con,$query);
       if(!$query_run)
       {
           echo "error : ".mysqli_error($con);
       }
       $row = mysqli_fetch_array($query_run);
       $gym_name= $row['gym_name'];
       $fname=$row['fname'];
       $lname=$row['lname'];
       $username=$row['username'];
       $password=$row['password'];
       $email=$row['email'];
       $address=$row['address'];
       $contactno=$row['contactno'];
       
       //Inserting data into gyms and gym_owner tables
       $sql="insert into gym_owner(fname,lname,username,password,email,contactno)values('".$fname."', '".$lname."', '".$username."', '".$password."','".$email."','".$contactno."')";
       $res=mysqli_query($con,$sql); 
       $sql1="insert into gyms(gym_name,gym_owner_id,address) values('".$gym_name."',(select gym_owner_id from gym_owner where username='$username'),'".$address."')";
       $res2= mysqli_query($con,$sql1);
       if ($res && $res2)
    {
        //Successful registration E-mail sending
            require 'PHPMailerAutoload.php';
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

        $mail->Subject = 'Registration completed successfully';
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
                      <td align='center' style='Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px;'><h1 style='Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:48px;font-style:normal;font-weight:normal;color:#111111;'>Welcome!</h1></td> 
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
                      <td class='es-m-txt-l' bgcolor='#ffffff' align='left' style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;'>Welcome <b>".$fname." ".$lname."</b><br>You have Successfully Completed the Registration process and can now proceed with adding gym details to your profile. We're excited to have you get started.</p></td> 
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
        } else {
             $query = "delete from temp_gym WHERE tmp_gym_id='$tmp_gym_id'";
             $query_run=mysqli_query($con,$query);
            if($query_run)
            {
                echo "Deleted Successfully";
                 header("location:Gym_requests.php?registered=true");
            }     
            
        }
        //end email
       
    }
    else
    {
        echo "<script type=\"text/javascript\">".
        "alert('There was some problem while inserting record');".
        "</script>";
    }
      
  }

   if(isset($_POST['reject']))
    {
        $tmp_gym_id = $_POST['tmp_gym_id'];

        $query = "DELETE FROM temp_gym WHERE tmp_gym_id='$tmp_gym_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            echo '<script> alert("Data Deleted");</script> ';
            header('location:Gym_requests.php');
        }
        else
        {
            echo '<script> alert("Data not Deleted");</script> ';
        }
    }

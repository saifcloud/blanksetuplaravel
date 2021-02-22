<?php

namespace App\Helpers;

use View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use DB;

Class Helper {



  public static function sendMail($email_content,$template,$template_content)
  {
      // echo "working";
      // die;

        // DB::table('password_resets')->insert([
        //     'email' =>$email_content['receipent_email'],
        //     'token' => md5(uniqid(rand(), true)), //change 60 to any length you want
        //     'created_at' => \Carbon\Carbon::now()
        // ]);
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;


        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        $html  = str_replace('[name]', $email_content['name'], $html);
        $link = 'token='.base64_encode($email_content['receipent_email']).'&type='.base64_encode($email_content['user_type']);
        $html  = str_replace('[link]', $link, $html);
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       =  $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarms.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "PhreshFarms");
            // $admin = DB::table('admins')->where('is_deleted',0)->get();

            // foreach ($admin as $key => $value) {
            //     # code...
            //     $mail->addAddress($value->email,"PhreshFarms"); 
            // }
            
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }




  }


  public static function sendMailOtp($email_content,$template,$template_content){
        
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;


        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        $html  = str_replace('[name]', $email_content['name'], $html);
        // $link = 'token='.base64_encode($email_content['receipent_email']).'&type='.base64_encode($email_content['user_type']);
        $otp   = $email_content['otp'];
        $html  = str_replace('[code]', $otp, $html);
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       = $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarm.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "PhreshFarm");
            //  $admin = DB::table('admins')->where('is_deleted',0)->get();

            // foreach ($admin as $key => $value) {
            //     # code...
            //     $mail->addAddress($value->email,"PhreshFarms"); 
            // }
            // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }
  }
  
  


//forget password

    public static function sendResetPassword($email_content,$template,$template_content){
        
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;


        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        $html  = str_replace('[name]', $email_content['name'], $html);
        // $link = 'token='.base64_encode($email_content['receipent_email']).'&type='.base64_encode($email_content['user_type']);
        $otp   = $email_content['otp'];
        $html  = str_replace('[code]', $otp, $html);
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       = $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarm.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "PhreshFarm");
            //  $admin = DB::table('admins')->where('is_deleted',0)->get();

            // foreach ($admin as $key => $value) {
            //     # code...
            //     $mail->addAddress($value->email,"PhreshFarms"); 
            // }
            // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }
  }
  


// send notification


  public static function sendNotification($email_content,$template,$template_content){
        
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;


        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        $html  = str_replace('[name]', $email_content['name'], $html);
        
        $amount   = $email_content['amount'];
        $html  = str_replace('[amount]', $amount, $html);

        $balance   = $email_content['balance'];
        $html  = str_replace('[balance]', $balance, $html);
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       = $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarm.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "PhreshFarm");
            // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }
  }
  
  
  
  
  
  
  
  
  // agent subscription plan

public static function AgentSubscription($email_content,$template,$template_content){
    
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;


        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        $html  = str_replace('[name]', $email_content['name'], $html);
        
        $amount   = $email_content['amount'];
        $html  = str_replace('[amount]', $amount, $html);

     
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       = $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarm.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "PhreshFarm");
            // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }
  }
  
  


// purchase plan

  public static function PurchasePlanNotification($email_content,$template,$template_content){
        
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;


        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        // $html  = str_replace('[name]', $email_content['name'], $html);
        
        // $amount   = $email_content['amount'];
        // $html  = str_replace('[amount]', $amount, $html);

        // $balance   = $email_content['balance'];
        // $html  = str_replace('[balance]', $balance, $html);




        $html  = str_replace('[welcome]', 'Hi, '.$email_content['name'], $html);

        $html  = str_replace('[heading_one]', "You have purchased ".$email_content['planName']." successfully", $html);
        $html  = str_replace('[heading_two]',  "Pack Name: ".$email_content['planName'], $html);
        $html  = str_replace('[heading_three]',"Amount: N".$email_content['planAmount'], $html);
        $html  = str_replace('[heading_four]', "", $html);
        $html  = str_replace('[heading_five]', "", $html);
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       = $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarm.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($email_content['receipent_email'], "PhreshFarm");
            // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }
  }
  


  // send notification on new user 


  public static function NewUserSendNotification($email_content,$template,$template_content){
        
        $mail_host = DB::table('settings')->where('field_key','HOST')->first();
        $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
        $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

        // echo $mail_user->field_value;
        //  echo $mail_pass->field_value;
        //  die;

        $admin = DB::table('admins')->where('is_deleted',0)->get();

        foreach ($admin as $key => $value) {
            # code...
        

        $mail  = new PHPMailer;
        $html  = View::make('emails.'.$template,['data' => $template_content]);
        // $html  = str_replace('[username]', $email_content['username'], $html);
        
        // $user_email   = $email_content['receipent_email'];
        // $html  = str_replace('[user_email]', $user_email, $html);

        
        $html  = str_replace('[welcome]', $value->username, $html);

        $html  = str_replace('[heading_one]', $email_content['message'], $html);
        $html  = str_replace('[heading_two]',  $email_content['name'], $html);
        $html  = str_replace('[heading_three]',$email_content['receipent_email'], $html);
        $html  = str_replace('[heading_four]', ($email_content['heading_four']), $html);
        $html  = str_replace('[heading_five]', $email_content['heading_five'], $html);
        // print_r($link); die;
        // $html  = $html->render(); 

        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
             

            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPDebug = 3;
            $mail->Host       = $mail_host->field_value; // sets the SMTP server
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
            $mail->Username   = $mail_user->field_value; // SMTP account username
            $mail->Password   = $mail_pass->field_value; 

            $mail->setFrom("info@phreshfarms.ng", "phreshfarm.com");
            $mail->Subject = $email_content['subject'];
            $mail->MsgHTML($html);
            $mail->addAddress($value->email, "PhreshFarm");
            // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
            // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
            //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->SMTPOptions= array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );

            $mail->send();
             // echo "success";
             // print_r($mail->ErrorInfo);
             //  die;
            } catch (phpmailerException $e) {
             
            } catch (Exception $e) {
              // print_r($mail->ErrorInfo);
              // die;
            }




        }
  }
  
  
  
  
  
  
  
//   public static function sendMailOtp($email_content,$template,$template_content){

//         $mail_user = DB::table('settings')->where('field_key','MAIL_USERNAME')->first();
//         $mail_pass =DB::table('settings')->where('field_key','MAIL_PASSWORD')->first();

//         // echo $mail_user->field_value;
//         //  echo $mail_pass->field_value;
//         //  die;


//         $mail  = new PHPMailer;
//         $html  = View::make('emails.'.$template,['data' => $template_content]);
//         $html  = str_replace('[name]', $email_content['name'], $html);
//         // $link = 'token='.base64_encode($email_content['receipent_email']).'&type='.base64_encode($email_content['user_type']);
//         $otp   = $email_content['otp'];
//         $html  = str_replace('[code]', $otp, $html);
//         // print_r($link); die;
//         // $html  = $html->render(); 

//         try {
//             $mail->isSMTP(); // tell to use smtp
//             $mail->CharSet = "utf-8"; // set charset to utf8
             

//             $mail->SMTPAuth   = true;                  // enable SMTP authentication
//             // $mail->SMTPDebug = 3;
//             $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
//             $mail->Port       = 587;   
//             $mail->SMTPSecure = 'false';                 // set the SMTP port for the GMAIL server
//             $mail->Username   = $mail_user->field_value; // SMTP account username
//             $mail->Password   = $mail_pass->field_value; 

//             $mail->setFrom("admin@phreshfarm.com", "phreshfarm.com");
//             $mail->Subject = $email_content['subject'];
//             $mail->MsgHTML($html);
//             $mail->addAddress($email_content['receipent_email'], "PhreshFarm");
//             // $mail->addAddress("kroy.iips@gmail.com","guruhomeshops"); 
//             // $mail->addAddress("guruhomeshop1983@gmail.com","guruhomeshop");
//             //$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
//             //$mail->addBCC(‘examle@examle.net’);
//             //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
//             $mail->SMTPOptions= array(
//             'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//             'allow_self_signed' => true
//             )
//             );

//             $mail->send();
//              // echo "success";
//              // print_r($mail->ErrorInfo);
//              //  die;
//             } catch (phpmailerException $e) {
             
//             } catch (Exception $e) {
//               // print_r($mail->ErrorInfo);
//               // die;
//             }
//   }


} 



?>
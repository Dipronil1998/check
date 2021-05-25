<?php
session_start();
include("config.php");

if (isset($_POST['register'])) {
    $cv=$_FILES['cv']['name'];
    $proforma=$_FILES['proforma']['name'];
    if(!empty($cv))
    {
        $file_type=$_FILES['cv']['type'];
        print_r($file_type);
        if ($file_type=="application/pdf")
        {
            $cv_loc=$_FILES['cv']['tmp_name'];
			$cv1="cv/".$cv;
			move_uploaded_file($cv_loc,$cv1);
        }else{
            echo "<script>alert('Plz select a pdf');location.href='index.php'</script>";
        }
    }else{
        echo "<script>alert('Plz select your cv pdf format');location.href='index.php'</script>";
    }
    if(!empty($proforma))
    {
        $file_type=$_FILES['proforma']['type'];
        if ($file_type=="application/pdf")
        {
            $proforma_loc=$_FILES['proforma']['tmp_name'];
			$proforma1="proforma/".$proforma;
			move_uploaded_file($proforma_loc,$proforma1);
        }else{
            echo "<script>alert('Plz select a pdf');location.href='index.php'</script>";
        }
    }else{
        echo "<script>alert('Plz select your proforma pdf format');location.href='index.php'</script>";
    }

    $otp=rand(1111,9999);
    $_SESSION['otp'] = $otp;
    $mailHtml="Username: $_POST[email] \n <br>".
                    
                   "OTP is: $otp.\n";
        
    $result = smtp_mailer($_POST['email'],'Account Verification',$mailHtml);

    if($result==1)
    {

        $_SESSION['name']=$_POST['name'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['phone']=$_POST['phone'];
        $_SESSION['cv']=$cv1;
        $_SESSION['proforma']=$proforma1;

        echo "<script>window.location = 'otp.php';</script>";
    }
}



if(isset($_POST['otp'])){


$obj= new Database;

if($_POST['otp1'] == $_SESSION['otp']){
    $res = $obj->register($_SESSION['name'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['cv'],$_SESSION['proforma'],$_POST['otp1']);
    //$res=$obj->sendotp($_POST['email']);
        if($res==1)
        {
          echo "
          <script>
          alert('Email Verified successfully');
          window.location='index.php';
          </script>
          ";
        }
        if($res==0)
        {
          echo "
          <script>
          alert('Try Again');
          window.location='server.php';
          </script>
          ";
        }
        
    
}

}

function smtp_mailer($to,$subject,$msg){    
    require("class/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";// IP address or domain name
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";

    $mail->Port = 587;  //Email Port
    $mail->Username = "dipronildas8961228208@gmail.com";// Email address of your server
    $mail->Password = "13#12#2**6";// Email password

    $mail->From = "dipronildas8961228208@gmail.com"; //email address
    // $mail->FromName = "your username email";
    $mail->AddAddress($to);
    //$mail->AddReplyTo("mail@mail.com");

    $mail->IsHTML(true);

                                    // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $msg;
    
    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    if(!$mail->send()){
        return 0;
    }
    else
    {
        return 1;
    }
}


/* */
?>
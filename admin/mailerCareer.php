<?php 

include("includes/connection.php");

//$company_email=APP_EMAIL;
$company_name=APP_NAME;
$company_website=APP_WEBSITE;

$qry="SELECT * FROM tbl_settings where id=1";
$result=mysqli_query($mysqli,$qry);
$settings_row=mysqli_fetch_assoc($result);
$client_msg=$settings_row['client_msg']; 
$company_email=$settings_row['mail_from']; 


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_FILES['upload_file']['name']) && isset($_POST['message']) ) {
    //send email
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$resume = $_FILES['upload_file']['name'];
    $msg = $_POST['message'];
	
	
	$resume=rand(0,99999)."_".$_FILES['upload_file']['name'];
	$tpath1='images/resume/'.$resume; 			 
	move_uploaded_file($_FILES["upload_file"]["tmp_name"],$tpath1);

		
    $subject = "Job Career @ ".$company_name." Enquiry";
	
	$mail_message ='<html><head><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><style>body {font-family: Helvetica,Arial,sans-serif; }.row{ background:#fff;}.row #col1 {padding:5px;} table tr td{background:#fff;max-width:806px;min-hieght:20px;;overflow:auto;font-size:12px;font-family: Helvetica,Arial,sans-serif; font-size: 14px; color: #333; line-height: 24px;padding-right:10px;}</style></head><body style="background:#fff">
	<div style="background: #f3f3f3;width:806px;hieght:140px;border: 2px solid #f3f3f3;	border-top-left-radius: 5px;border-top-right-radius: 5px;padding:10px;"><div align="center"><span style="color:#333;text-align: left; font-family: Helvetica,Arial,sans-serif;font-size:25px;font-weight:bold;">You Have Received An Enquiry for Current Job Openings</span></div></div><div style="background:#fff;width:806px;hieght:140px;padding:10px;border: 2px solid #f3f3f3;"><P style="text-align: left; font-family: Helvetica,Arial,sans-serif; font-size: 14px; font-weight: bold; color: #333; line-height: 24px;"></P><div class="row"><div id="col1"><table><tr><td style="color:#333; font-weight: bold;">Name</td><td>';
	$mail_message .=  $name;
	$mail_message .= '</td></tr><tr><td style="color:#333; font-weight: bold;">Email Id</td><td>';
	$mail_message .= $email;
	$mail_message .= '</td></tr><tr><td style="color:#333; font-weight: bold;">Phone</td><td>';
	$mail_message .= $phone;
	$mail_message .= '</td></tr><tr><td style="color:#333; font-weight: bold;">Latest Resume</td><td>';
	$mail_message .= $resume;
	$mail_message .= "<a href='http://www.rndtechnosoft.com/admin/images/resume/$resume' download>Download Resume</a>";
	$mail_message .= '</td></tr><tr><td style="color:#333; font-weight: bold;">Message</td><td>';
	$mail_message .=$msg;
	$mail_message .= '</td></tr></table></div></div>							
	
	</div>		
	<P style="text-align: left; width:820px; font-size: 12px; color: #333; text-align: justify; line-height: 18px;">Disclaimer: This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.</p>		
	</body></html>';
	
	
    
    $message_email = "Hey $name<br><br>";
    $message_email .= $client_msg;
    /* $message_email = "Hey $name<br><br>Thank you for contacting ".$company_name.". We will be calling you soon."; */
	 
	 
	$headers1 = "From: $name <$email>" . "\r\n";
    //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers1 .= "MIME-Version: 1.0\r\n";
    $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$headers2 = "From: $company_name <$company_email>" . "\r\n";
    //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	
	//To Website OWNER
    if(mail("<$company_email>", $subject, $mail_message, $headers1,"$email")){
	//echo "OWNER Send";
	}
	
	// to Website CLIENT
	if(mail("<$email>", $subject, $message_email, $headers2,"$company_email")){
	//echo "SENDER Send";
	}	
	
	//echo $mail_message ;
		
	
	echo '<script type="text/javascript">
		alert("Thank you for instrusting to being a part of '; 
	echo $company_name;
	echo '. We will be calling you soon!");
		window.location="';
	echo $company_website;
	echo '";</script>';
 
}
 

?>

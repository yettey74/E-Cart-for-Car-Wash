<?php
include ('conn.php');
include ('functions.php');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
 
  $date = $_POST['date'];
  $time = $_POST['time'];
  $vehicle = $_POST['vehicle'];
  $service = $_POST['service'];
  $question = $_POST['question'];
  
  $email_from = 'sparkleandshine01@gmail.com';

  $email_subject = "Reservation";

  $email_body = "You have received a new message from $name.\n".
  				"Email : $email \n".
				"Telephone : $telephone \n".
				"Date : $date \n".
				"Time : $time \n";
  $email_body .= "Vehicle : $vehicle \n".
				"service(s) : $service \n".				
                "Question :\n $question";
                
  $customerMessage = "Thankyou for your reservation.\n".
                     "Email : $email \n".
				     "Telephone : $telephone \n".
				     "Date : $date \n".
				     "Time : $time \n".
				     "Vehicle : $vehicle \n".
					 "service(s) : $service \n".				
                	 "Question :\n $question";
  
  $to = "sparkleandshine01@gmail.com";
  
  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $email \r\n";

/*  mail($to,$email_subject,$email_body,$headers);
  mail($email,$email_subject,$customerMessage,$headers);  */
 
 //insert into db
/*$insertReservationQ = "INSERT INTO reservation(resID, name, email, telephone, session, date, time, geusts, question) 
					   VALUES('', '$name', '$email', '$telephone','$sess','$date', '$time', '$geusts', '$question')";
  $res1 = mysqli_query($db,$insertReservationQ);*/
  ?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Sparkle and Shine, golden grove, car wash.">
    <meta name="keywords" content="Sparkle and Shine, golden grove, car wash">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="placement.css">
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="animations.js"></script>
    
    <style type="text/css">
		table 
		{
    	width: auto;
    	margin-left: auto;
    	margin-right: auto;
		}
	</style>
  </head>
  <body id="mail">    
    <?php include ("header.php");?>
    <div id="pageWrap">
      <div id="page">
        <?php include ("menubar.php");?>
          <!-- end nav --> 
      </div>
        <!-- end navCont -->
        <?php
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
  echo 'Your email has been sent with the following details.<br/>';
  echo 'Name : ' . $name . '<br/>';
  echo 'Email : ' .$email . '<br/>';
  echo ' Telephone : ' . $telephone . '<br/>';
  echo 'Date : ' .$date . '<br/>';
  echo 'Time : ' .$time . '<br/>';
  echo 'Vehicle : ' .$vehicle . '<br/>';
  echo 'Service : ' .$service . '<br/>';
  echo 'Question : ' .$question . '<br/>';
 echo '</div>';
 include ("footer.php");?>
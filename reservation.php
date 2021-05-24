<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Sparkle and Shine car wash.">
    <meta name="keywords" content="Sparkle and Shine, golden grove, car wash">
    
    <meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
	/>

    <title>Reservation</title>
    
    <link rel="stylesheet" type="text/css" href="placement.css">
    
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="animations.js"></script>

  </head>
  
  <body id="reservation">    
    <?php include ("header.php");?>    
        <div id="content"> 
        <?php include ("slideshow.php");?> 
        	<h1 style="color: #006EB5"; align="center">Reservation</h1>
            <h3 style="color: #006EB5">Please fill in the form to submit your request</h3>
            <h3 style="color: #006EB5">and we will contact you.</h3>
          <form method="post" name="emailform" action="form-to-email.php">
              <table style="width:100%">                 
                  <tr>
                    <td align="center" style="color: #006EB5">Name</td>
                  </tr>
                    <tr>
                    <td align="center">
                        <input type="text" name="name" id="name" required>
                    </td>
                  </tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="color: #006EB5">Telephone</td>
                  </tr>
                  <tr>
                    <td align="center">
                        <input type="text" name="telephone" id="telephone" autocomplete required>
                    </td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td align="center" style="color: #006EB5">Date</td>
                  </tr>
                  <tr>
                    <td align="center">
                        <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required/>
                    </td>
                  </tr>
                  </tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="color: #006EB5">Time</td>
                  </tr>                
                  <tr>
                    <td align="center">
                        <input type="time" name="time" id="time" min="08:30" max="17:30" placeholder="08:30 AM" step="900">
                    </td>                    
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="color: #006EB5">Email</td>
                  </tr>
                  <tr>
                    <td align="center">
                        <input type="email" name="email" id="email" autocomplete>
                    </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
             </table>
             <table style="width:100%">
                  <tr>
                    <td><h2 style="color: #006EB5">Vehicle</h2></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="vehicle" value="1">SEDAN</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="radio" name="vehicle" value="2">WAGON SUV 4WD</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="radio" name="vehicle" value="=3">VAN 7 SEATER</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><h2 style="color: #006EB5">Service</h2></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="service" value="1">BASIC</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="radio" name="service" value="2">SUPERIOR</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="radio" name="service" value="3">DELUXE</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>                  
                    <td><input type="radio" name="service" value="4">ULTIMATE </td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="radio" name="service" value="5">PREMIUM</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="radio" name="service" value="6">FULL DETAIL</td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>                  
                  <tr>
                    <td style="color: #006EB5">Question</td>
                  </tr>
                  <tr>
                    <td>
                        <textarea name="question" id="question"></textarea>
                    </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                  	<td colspan="2"><button type="submit">Submit Now</button></td>
                  </tr>
            </table>
       </form>
        </div>
<?php include ("footer.php");?>


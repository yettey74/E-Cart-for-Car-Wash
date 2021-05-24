<?php 
	include('conn.php');
	include('functions.php');
if (isset($_SESSION['CustomerID']) && $_SESSION['CustomerID'] = 1){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Indian Brassiere Golden Grove's finest
      Indian restaurant.">
    <meta name="keywords" content="Indian Brassiere restaurant, golden grove, indian">
    <title>Indian Brassiere Restaurant</title>
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
  <body id="cms">   
    <?php include ("header.php");?>
    <div id="pageWrap">
      <div id="page">
        <?php include ("menubar.php");?>
          <!-- end nav --> 
      </div>
        
      <div id="content">
           Content Management System<br/>
           <h1>Send a text</h1>
           <form action="aussiesms_sendsms.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <table width="600" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td width="57">To</td>
                  <td width="527"><input type="text" name="to" id="to" /></td>
                </tr>
                <tr>
                  <td>Message</td>
                  <td><textarea name="message" cols="50" rows="3" id="message"></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="button" id="button" value="Send " /></td>
                </tr>
              </table>
            </form>
      </div>
          
    <div>
    	&nbsp;
    </div>
    
    <div id="content">
    	<table>
            <tr>
                <td>Total Customers</td>
            </tr>
            <tr>
                <td><?php echo customerCount($db)?></td>
            </tr>            
        </table>
        <table>
            <tr>
                <td>Total Reservations</td>
            </tr>
            <tr>
                <td><?php echo reservationCount($db)?></td>
            </tr>            
        </table>
    </div>
    
    <div>
    	&nbsp;
    </div>
    
    <div id="content">
    	<table>            
            <?php
			// get distinct dates
			$dateQ = "SELECT DISTINCT(date) FROM reservation";
			if ($dateR = mysqli_query($db,$dateQ)){				
							echo '<thead>';
								echo '<th>Name</th>';
								echo '<th>Email</th>';
								echo '<th>Telephone</th>';
								echo '<th>Session</th>';
								echo '<th>Time</th>';
								echo '<th>Guests</th>';
								echo '<th>Question</th>';
							echo '</thead>';
							echo  '<tr><td>&nbsp</td></tr>';
					while($dateA =  mysqli_fetch_assoc($dateR)){
						$date = $dateA['date'];
						$displayDate = date("d-m-Y", strtotime($date));
						//echo $displayDate;
						//echo '<br/>';					
						$reservationQ = "SELECT * FROM reservation WHERE date = '$date'";
						if ($reservationR = mysqli_query($db,$reservationQ)){	
							while($a = mysqli_fetch_assoc($reservationR)){
								echo '<tr>';
									echo '<td align="center"><h2>' . $displayDate . '</h2></td>';
								echo '</tr>';
								echo  '<tr><td>&nbsp</td></tr>';
									echo '<tr>';
										echo '<td width="150px">' . $a['name'] . '</td>';
										echo '<td align="left" width="200px">' . $a['email'] . '</td>';
										echo '<td>' . $a['telephone'] . '</td>';
										echo '<td>' . $a['session'] . '</td>';
										echo '<td>' . $a['time'] . '</td>';
										echo '<td>' . $a['geusts'] . '</td>';
										echo '<td>' . $a['question'] . '</td>';
									echo '<tr/>';
									echo  '<tr><td>&nbsp</td></tr>';						
							}
						} else {
							echo 'No reservations';
						}					
					}	
					echo 'No reservations';			
				}
			echo '</table>';				
			?>
    	</table>
    </div>    
    </div>
	<?php include ("footer.php");
    } else {
		header("Location: http://www.indianbrasserie.com.au/index.php");
		die();
	}
    
        


<?php
function emailValid($email, $db){
	$emailError = FALSE;
 // check email exist or not
	$email_sql = mysqli_query($db,"SELECT CustomerEmail FROM customer WHERE CustomerEmail='$email'");  	
	if(mysqli_num_rows($email_sql)){
	   $emailError = TRUE;
	   
   	}	
  return $emailError;
}

function isMember($UserID){
	$userError = FALSE;
	// check if already in member table
	$memberQ = mysqli_query($db,"SELECT UserID FROM member WHERE UserID='$UserID'");  	
	if(mysqli_num_rows($memberQ)){
	   $userError = TRUE;
   	}
	return $userError;	
}

function useridCheck($userid){
	$useridError = FALSE;
	if (empty($userid)) {
   		$useridError = TRUE;
  	} else if (strlen($userid) < 3) {
   		$useridError = TRUE;
  	} else if (strpos($userid,'/') !== FALSE) {
   		$useridError = TRUE;
  	} else if (strpos($userid,'.') !== FALSE) {
   		$useridError = TRUE;
  	} else if (strpos($userid,'%') !== FALSE) {
   		$useridError = TRUE;
  	} else if (strpos($userid,'\\') !== FALSE) {
   		$useridError = TRUE;
  	} else if (strpos($userid,'@') !== FALSE) {
   		$useridError = TRUE;
  	} else if (strpos($userid,'?') !== FALSE) {
   		$useridError = TRUE;
  	}	
	return $useridError;	
}

function fNameCheck($fname){
	$fnameError = FALSE;
	if (empty($fname)) {
   		$fnameError = TRUE;
  	} else if (strlen($fname) < 3) {
   		$fnameError = TRUE;
  	} 	
	return $fnameError;
}

function lNameCheck($lname){
	$lnameError = FALSE;
	if (empty($lname)) {
   		$lnameError = TRUE;
  	} else if (strlen($lname) < 3) {
   		$lnameError = TRUE;
  	} else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
   		$lnameError = TRUE;
  	}	
	return $lnameError;
}

function addressCheck($address){
	$addressError = FALSE;
	if (empty($address)){
   		$addressError = TRUE;
 	} 
	return $addressError;
}

function stateCheck($state){
	$stateError = FALSE;
	if (empty($state)) {
   		$stateError = TRUE;
  	} 
	return $stateError;
}
function suburbCheck($suburb){
	$suburbError = FALSE;
	if (empty($suburb)) {
   		$suburbError = TRUE;
  	} 
	return $suburbError;
}

function postcodeCheck($postcode){
	$postcodeError = FALSE;
	if (empty($postcode)) {
   		$postcodeError = TRUE;
  	} 
	return $postcodeError;	
}

function countryCheck($country){
	$countryError = FALSE;
	if (empty($country)) {
   		$countryError = TRUE;
  	} 
	return $countryError;
}

function phoneCheck($phone){
	$phoneError = FALSE;
	if (empty($phone)) {
   		$phoneError = TRUE;
  	} 
	return $phoneError;
}

function passwordCheck($password){
	$passwordError = FALSE;
	if (empty($password)){
   		$passwordError = TRUE;
 	} else if(strlen($password) < 6) {
   		$passwordError = TRUE;
  	} else if(!preg_match('/^[a-zA-Z0-9 .\/]+$/i', $password)){
		$passwordError = TRUE;
	}
	return $passwordError;
}

function salty($password){
	$salt = 'abcdefghijklmnopqrstuvwx';
	$cost = 10;
	$hash = '$2y$' . $cost . '$' . $salt;
	$password = crypt($password, "$hash");
	return $password;	
}

function redirectURL($url, $statusCode = 303){
	// example of use redirect('http://example.com/',false) 
	header('location: ' . $url, true, $statusCode);
	exit();		
}

function cleanString($string){
	$string = trim($string);
  	$string = strip_tags($string);
  	$string = htmlspecialchars($string);
	return $string;
}

function checkOrder($db,$customerID){
//check to see if order already created
  $checkcountQ = "SELECT COUNT('CustomerID') as count
				  FROM orders 
				  WHERE CustomerID = '$customerID'";
  if($checkcountR = mysqli_query($db,$checkcountQ)){
	while ($checkcountA = mysqli_fetch_assoc($checkcountR)) {
		return $count = $checkcountA['count'];		
	}
  }  
}

function countProduct($db, $orderID, $pidSub){
//check to see if order already created
  $checkcountQ = "SELECT COUNT('ProductID') as count
				  FROM orderline 
				  WHERE ProductID = '$pidSub'
				  && OrderID = '$orderID'";
  if($checkcountR = mysqli_query($db,$checkcountQ)){
	while ($checkcountA = mysqli_fetch_assoc($checkcountR)) {
		return $count = $checkcountA['count'];		
	}
  }  
}

function getLastMemberID($db){
	$checkMemQ = "SELECT CustomerID
				  FROM member 
				  order by CustomerID desc
				  LIMIT 1";
  	if($checkMemR = mysqli_query($db,$checkMemQ)){
		while ($checkMemA = mysqli_fetch_assoc($checkMemR)) {
			return $orderID = $checkMemA['CustomerID'];		
		}
  	}		
}
function getOrderID($db,$customerID){
  $checkOrderQ = "SELECT OrderID
				  FROM orders 
				  WHERE CustomerID ='$customerID'";
  if($checkOrderR = mysqli_query($db,$checkOrderQ)){
	while ($checkOrderA = mysqli_fetch_assoc($checkOrderR)) {
		return $orderID = $checkOrderA['OrderID'];		
	}
  }	
}

// BASKET MANAGEMENT
// Customer Basket
// Customer Basket
 function totalBasket($db,$customerID,$orderID){
	 $total = '0';
	 $ProductPrice;
	 $OrderQuantity;
	 $basketQ = "SELECT p.ProductPrice, ol.OrderQuantity
	 			 FROM orders o, orderline ol, product p
			  	 WHERE o.CustomerID = '$customerID'
			  	 && ol.OrderID = '$orderID'
			  	 && o.OrderID = ol.OrderID
			  	 && ol.ProductID = p.ProductID	  			  
			  	 ORDER BY o.OrderDate ASC";
			  
	if ($basketR = mysqli_query($db, $basketQ)) {			
	  /* fetch associative array */
		while ($basketA = mysqli_fetch_assoc($basketR)) {
		  $ProductPrice = $basketA['ProductPrice'];
		  $OrderQuantity = $basketA['OrderQuantity'];
		  $total += $ProductPrice * $OrderQuantity;
		}
		return $total;
	}
 }
 
 function totalBasketPrice($db,$customerID,$orderID){
	 
	 $total = '0';
	 $ProductPrice = '0';
	 $OrderQuantity = '0';
	 $basketQ = "SELECT p.ProductPrice, ol.OrderQuantity
	 			 FROM orders o, orderline ol, product p
			  	 WHERE o.CustomerID = '$customerID'
			  	 && ol.OrderID = '$orderID'
			  	 && o.OrderID = ol.OrderID
			  	 && ol.ProductID = p.ProductID	  			  
			  	 ORDER BY o.OrderDate ASC";
			  
	if ($basketR = mysqli_query($db, $basketQ)) {			
	  /* fetch associative array */
		while ($basketA = mysqli_fetch_assoc($basketR)) {
		  $ProductPrice = $basketA['ProductPrice'];
		  $OrderQuantity = $basketA['OrderQuantity'];
		  $total += $ProductPrice * $OrderQuantity;
		}
		return $total;
	}
 }
 
 //Total products
 function totalBasketbyProduct($db,$customerID,$orderID){
	 $total = '0';
	 $basketQ = "SELECT COUNT(*) AS count
	 			 FROM orders o, orderline ol, product p
			  	 WHERE o.CustomerID = '$customerID'
			  	 && ol.OrderID = '$orderID'
			  	 && o.OrderID = ol.OrderID
			  	 && ol.ProductID = p.ProductID";
			  
	if ($basketR = mysqli_query($db, $basketQ)) {			
	  /* fetch associative array */
		while ($basketA = mysqli_fetch_assoc($basketR)) {
		  return $total = $basketA['count'];
		}
	} else {
		return $total = '0';	
	}
 }
 
 function totalBasketbyItem($db,$OrderID){
	 $quantity = '0';
	 $basketQ = "SELECT OrderQuantity
	 			 FROM orderline
			  	 WHERE OrderID = '$OrderID'";
			  
	if ($basketR = mysqli_query($db, $basketQ)) {			
	  /* fetch associative array */
		while ($basketA = mysqli_fetch_assoc($basketR)) {
			echo $quantity . '<br/>';
			$quantity += $quantity + $basketA['OrderQuantity'];
		}
		
		return $quantity;
		
	} else {
		
		return $quantity = '0';	
		
	}
 }
 
 // Product Management
 
 //DELETE BASKET TOTALLY
  function deleteBasket($db,$customerID,$orderID){
	$delItemsQ="DELETE FROM orderline 
			   WHERE OrderID='$orderID'";
	$delItemsR=mysqli_query($db,$delItemsQ);
	$delorderQ="DELETE FROM orders 
			    WHERE OrderID='$orderID'
			   	&& CustomerID='$customerID'";
	$delorderR=mysqli_query($db,$delorderQ);
	return; 
  }
  
  //DELETE BASKET PRODUCT LINE ALL
  function deleteBasketProductAll($db,$orderID, $pid){
	$delItemQ="DELETE FROM orderline 
			   WHERE OrderID='$orderID'
			   && ProductID = '$pid'";
	$delItemR=mysqli_query($db,$delItemQ);
	return; 
  }
  
  //DELETE BASKET PRODUCT 
  function deleteBasketProductSingle($db,$orderID, $pid){
	$delItemQ="UPDATE `orderline` SET `OrderQuantity` = `OrderQuantity` - '1'
			   WHERE `OrderID` = '$orderID' AND `ProductID` = '$pid'";
	$delItemR=mysqli_query($db,$delItemQ);
	return; 
  }
  
  //ADD BASKET PRODUCT 
  function createOrder($db, $customerID){
	  $date = date('Y-m-d');
	  $addItemQ = "INSERT INTO `orders` (OrderID, CustomerID, OrderDate)
		   		   VALUES (NULL, '$customerID', '$date')";					
      $addItemR = mysqli_query($db,$addItemQ);
	  echo '<br/>New Order created<br/>';
	  return;
  }
  
  function  addItem($db, $orderID, $product, $quantity){	 	  
	  // insert into orderline table
	  $addItemQ2 = "INSERT INTO `orderline` (OrderID, ProductID, OrderQuantity)
		   			VALUES ('$orderID', '$product', '$quantity')";					
      $addItemR2 = mysqli_query($db,$addItemQ2);	  
      echo '<br/>New item has been added<br/>';
	  return; 
  }
  
  //UPDATE BASKET PRODUCT 
  function updateOrder($db, $orderID, $product, $quantity){
	  $updateItemQ = "UPDATE `orderline` SET `OrderQuantity` = `OrderQuantity` + '$quantity'
				   	  WHERE `OrderID` = '$orderID' 
				   	  && `ProductID` = '$product'";
	  $updateItemR = mysqli_query($db,$updateItemQ);
	  echo '<br/>item has been updated<br/>';
	  return;
  }
  
  function get_value($db, $sql) {
    $result = $db->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
  }
  
  function is_itemRow($db, $orderID, $product){
	  $total = '0';
	 $Q = "SELECT COUNT(*) AS count
	 			 FROM orderline ol
			  	 WHERE ProductID = '$product'
			  	 && OrderID = '$orderID'";
			  
	if ($R = mysqli_query($db, $Q)) {			
	  /* fetch associative array */
		while ($A = mysqli_fetch_assoc($R)) {
		  return $total = $A['count'];
		}
	} else {
		return $total = '0';	
	}
  }
  
  function customerCount($db){
	$Q = "SELECT COUNT(*) AS count
	 	  FROM customer";
			  
	if ($R = mysqli_query($db, $Q)) {			
	  /* fetch associative array */
		while ($A = mysqli_fetch_assoc($R)) {
		  return $total = $A['count'];
  		}
	}
  } 
  
  function reservationCount($db){
	$Q = "SELECT COUNT(*) AS count
	 	  FROM reservation";
			  
	if ($R = mysqli_query($db, $Q)) {			
	  /* fetch associative array */
		while ($A = mysqli_fetch_assoc($R)) {
		  return $total = $A['count'];
  		}
	}
  } 
<?php
/* +-----------------------------------------------------------------------+
 * | AussieSMS PHP HTTP API                                                |
 * +-----------------------------------------------------------------------+
 * | Copyright (c) 2008 Tafadzwa Brandon Tapera - AussieSMS Chief Engineer |
 * +-----------------------------------------------------------------------+
 * | Authors: Tafadzwa Brandon Tapera <support.aussiesms.com.au>           |
 * +-----------------------------------------------------------------------+
 */

//sample code

$mobileID = "61411563330";
$password = "indianbrasseire";
$baseurl ="http://api.aussiesms.com.au/";
$text = urlencode($_POST["message"]);
$to = $_POST["to"];

// auth call
$url = "$baseurl?sendsms&mobileID=$mobileID&password=$password&to=$to&text=$text&from=$mobileID&msg_type=SMS_TEXT";
// do auth call
$ret = file($url);

// split our response. return string is on first line of the data returned
$sess = split(":",$ret[0]);
if ($sess[0] == "MessageID") 
{
	$mess_id = trim($sess[1]); // remove any whitespace
	$url = "$baseurl?querymessage&mobileID=$mobileID&password=$password&msgid=$mess_id";
	// do sendmsg call
	$ret = file($url);
	$send = split(":",$ret[0]);
	if ($send[0] > 0)
	echo "Message Status: ".$send[0]." - ".$send[1];
	else
	echo "send message failed";
} 
else 
{
	echo "Authentication failure: ". $ret[0];
	exit();
}
?> 

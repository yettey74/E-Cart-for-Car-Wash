<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Test Message - AussieSMS</title>
</head>

<body>
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
</body>
</html>

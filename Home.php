<?php
session_start();
//check user login status
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: /login.html');
    ob_end_flush();
    die();
}
//***echo $cval = $_COOKIE['Name'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!--Required javascript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/token_request.js"></script>
    <title>Home</title>
  </head>
  <!--Invoking a javascript function to get CSRF token and set it in the hidden field of form -->
  <body onload="tokenRequest('<?php echo $_COOKIE['Session'];?>')">
  <div class="wrapper">
    <form name="loginForm" action="Token_Validation.php"  method="post">
      <input type="text" required="required" class="input-group mb-3" name="u_name" placeholder="Enter your Name">
      <br>
      <input type="text" required="required" name="p_number" placeholder="Enter your phone number">
      <br>
      <input type="hidden" id="MyToken" name="MyToken" value="" />
      <input type="hidden" id="CSRFcookie" name="CSRFcookie" value="" />
      <input type="submit"  class="btn btn-submit"value="Submit">
    </form>
  </div>
  </body>
</html>

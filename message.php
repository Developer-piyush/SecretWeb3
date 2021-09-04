<?php

session_start();
$_SESSION['name'] = $_GET['name'];

?>






<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Send Secret Message to <?php echo htmlspecialchars($_SESSION['name']);   ?></title>
    <script data-ad-client="ca-pub-8741419835942329" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  </head>
  <body>
  <div class="row">
<div class="card col-12 col-sm-8 col-md-7  col-lg-5 col-xl-4 m-auto p-2 border-0 card-2">
  <div class="alert alert-success text-center" role="alert">
   
  <label>
  <h6 class="animate__fadeIn" style="margin: 10px 0 25px 0; font-weight: 500;">Send <span class="name">message to your friend <b><?php echo htmlspecialchars($_SESSION['name']);   ?></b></span> Secretly 😉, He/She will never know who messaged them.😅</h6>
  </label>
</div>


<div class="container mt-3">

    <form action="thanks.php" method="POST">
    

  

    <div class="form-group">
        <textarea class="form-control" required="" name="message" id="desc" cols="30" rows="7"></textarea> 
    </div>
    <div class="row">
<div class="col-12">
<input type="checkbox" name="agree" id="agree" required="" checked="">
<label for="agree">You agree to <a href="/privacy-policy.php">Privacy Policy</a> and <a href="/terms.php">Terms and condition</a> of our website.</label>
</div>
</div>
    <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
</div>
  </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
  </body>
</html>


<?php
      if(isset($_COOKIE['userid'])){
        header("location: process.php");
      }
      session_start();
      if(isset( $_SESSION['sent'] )){
        echo ' <button id="btn-logout" style="background-color:lightgreen;margin-left:auto;margin-right:auto;display:block;"><h3>Message sent successfully!</h3></button>';
        session_unset();
        session_destroy();
      }
      else{
        session_unset();
        session_destroy();
      }
?>



<style>
.container {
  height: 200px;
  position: relative;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>


<div class="container">
<h2 style="background-color:yellow;margin-left:auto;margin-right:auto;display:block;">Get anonymous feedback from your friends, coworkers and Fans.</h2>
  <div class="center">
    <button id="btn-login"><h1>Sign in with metamask</h1></button>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
<script src="https://npmcdn.com/moralis@0.0.6/dist/moralis.js"></script>
<script>
      // connect to Moralis server
      Moralis.initialize("R91e5OpThQgZ4ESKWmv4LSQ8imSH2DtEJXTbNEQU");
      Moralis.serverURL = "https://cco6pqxe8zev.bigmoralis.com:2053/server";


        function launch(){
        let user = Moralis.User.current();
        if (!user) {
          console.log("PLEASE LOG IN WITH METAMASK!!")
        }
        else{
          console.log(user.get("ethAddress") + " " + "logged in")
          var userf = user.get("ethAddress");
          document.cookie = "userid="+userf+"; max-age=86400; path=/;";
        }

      }

      launch();
        

      // add from here down
      async function login() {
        let user = Moralis.User.current();
        if (!user) {
          user = await Moralis.Web3.authenticate();
          launch()
        }
        console.log("logged in user:", user);
        location.reload();
      }

      document.getElementById("btn-login").onclick = login;

</script>

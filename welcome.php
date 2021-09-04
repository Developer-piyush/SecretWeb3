<?php
      $dom = $_ENV['dom'];
      session_start();
      if(isset( $_SESSION['userid'] )){
          $usern = $_SESSION['userid'];
      }
?>

<?php
require "partials/dbconnect.php";

if(!isset($_COOKIE['userid'])){
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `usershostf` WHERE `id` = $sno";
    $result = mysqli_query($conn, $sql);
  }

?>



<html>
  <head>

    <title>Web3 Secret Message</title>
	<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://npmcdn.com/moralis@0.0.6/dist/moralis.js"></script>
    <script src="//cdn.jsdelivr.net/npm/phaser@3.55.2/dist/phaser.min.js"></script>

  </head>

  <body>

    <button id="btn-logout" style="background-color:red;margin-left:auto;margin-right:auto;display:block;"><h3>Logout</h3></button>

    <script>
      // connect to Moralis server
      Moralis.initialize("R91e5OpThQgZ4ESKWmv4LSQ8imSH2DtEJXTbNEQU");
      Moralis.serverURL = "https://cco6pqxe8zev.bigmoralis.com:2053/server";


        

      async function logOut() {
        await Moralis.User.logOut();
        console.log("logged out");
        window.location = "logout.php";
      }


      document.getElementById("btn-logout").onclick = logOut;

    </script>
  </body>
</html>




<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="http://www.secretprank.com/favicon.ico"/>
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="style1.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha512-k78e1fbYs09TQTqG79SpJdV4yXq8dX6ocfP0bzQHReQSbEghnS6AQHE2BbZKns962YaqgQL16l7PkiiAHZYvXQ==" crossorigin="anonymous">
      
      
      <style>
      
            .clink{
            background-color:  	 #9133FF;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;}
        
            #secretprank {
    	    background-color: white:
            }
          

            table {
              border-collapse: collapse;
              border-spacing: 0;
              width: 100%;
              border: 1px solid #ddd;
            }
            
            th, td {
              text-align: left;
              padding: 8px;
            }
            
            tr:nth-child(even){background-color: #f2f2f2}

      </style>
      

      <title>Welcome - <?php echo htmlspecialchars($usern); ?> </title>
    </head>
    

   <body class="welbg">

      <!-- outermost cantainer -->
        <div class="card card-2 col-12 col-sm-8 col-md-7  col-lg-5 col-xl-4 p-2 m-auto tatu">
            <!-- WELCOME ALERT  -->
            <div class="container my-4">
                <div class="alert alert-success" role="alert">
                    <h6 class="alert-heading">Welcome - <?php echo htmlspecialchars($usern); ?></h6>
                    <p>Hey! how are you doing. You are now logged in as <b><?php echo htmlspecialchars($usern); ?></b>.</p> 
                </div>
            </div>

            <div class="container text-center ">
                <h6 class="card-title mt-2">
                    Share this link <wbr>with your friends and collect <wbr>Anonymous Messages<br>😻
                </h6>
                <hr>

                <!-- copy link -->   
                <div class="row">
                    <div id="share_tray" class="list-group mx-auto my-1">
                        <input type="text" class="list-group-ite text-center p-1 border-dark"  id="myInput" value="<?php echo $dom."/message.php?name=".htmlspecialchars($usern);     ?>">
                        <div class="list-group-item list-group-item-action p-1 text-center border-dark clink" id="copy" style="background-color:#F46DF6;">
                            <i class="fa fa-copy">
                                <button  onclick="copy()" >Copy link</button><br>
                            </i>
                        </div>
                    </div>
                </div>

                 <!-- The button used to share on whatsApp and twitter -->
                <div class="row">
                    <div class="share mx-auto my-1">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="whatsapp share_btn p-1 rounded">
                                    <a class="abc" href="whatsapp://send?text=%E2%9C%89%EF%B8%8F%F0%9F%92%AC%F0%9F%92%8C%0D%0ASend+Secret+Message+to+<?php echo htmlspecialchars($usern);   ?>+I+will+never+know+who+sent+me+which+message+%F0%9F%A4%94%0D%0AIt%27s+fun%2C+Try+here+%F0%9F%91%89+<?php echo $dom.'/message.php?name='.htmlspecialchars($usern);?>" data-action="share/whatsapp/share">
                                        <i class="fa fa-whatsapp fa-spin abc" style="font-size:30px"></i>
                                        <br><hr>
                                        WhatsApp Story
                                    </a>
                                </div>
                            </div>
           
                            <div class="col-6 ">
                                <div class="p-1 rounded twitter share_btn ">
                                    <a class="abc" href="https://twitter.com/intent/tweet?hashtags=SecretPrank&amp;related=Piyush%2CSecretPrank&amp;text=%E2%9C%89%EF%B8%8F%F0%9F%92%AC%F0%9F%92%8C%0D%0ASend+Secret+Message+to+<?php echo htmlspecialchars($usern);   ?>+I+will+never+know+who+sent+me+which+message+%F0%9F%A4%94%0D%0AIt%27s+fun%2C+Try+here+%F0%9F%91%89+&amp;url=<?php echo $dom.'/message.php?name='.htmlspecialchars($usern);?>&amp;via=PrankSecret">
                                        <i class="fa fa-twitter fa-spin abc" style="font-size:30px" style="color:white"></i>
                                        <br><hr>
                                        Twitter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- main div closed -->
        <br>

        <div class="card card-2 col-12 col-sm-8 col-md-7  col-lg-5 col-xl-4 p-2 m-auto tatu">
            <div class="container my-4">
                <div style="overflow-x:auto; table-responsive" id="secretprank">
                    <table class="table" id="secretprank">
                        <thead>
                            <tr>
                              <!-- <th scope="col">S.NO</th> -->
                              <th scope="col">Message</th>
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            $user = $usern;
                            require "partials/dbconnect.php";
            
                            $sql = "SELECT * FROM `usershostf` WHERE username='$user'";
                            $res=mysqli_query($conn, $sql);
            
                            //find no. of rows
                            $num = mysqli_num_rows($res);
                            if($num>0){
                                $sno = 0;
                                while($row = mysqli_fetch_assoc($res)){
                                  $sno = $sno + 1;
                                    echo"<tr>
                                    <td>".htmlspecialchars($row['mssg'])."</td>
                                    <td><button class='delete btn btn-sm btn-primary' id=d".htmlspecialchars($row['id']).">Delete</button></td>
                                  </tr>";
                                
                                }
                                
                            }
                        //  <th scope='row'>".$sno."</th>
                            ?>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
        


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        
        <script>
            $(document).ready( function () {
            $('#myTable').DataTable();
            } );
        </script>


        <script>
            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element) => {
              element.addEventListener("click", (e) => {
                console.log("edit ");
                id = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this note!")) {
                  console.log("yes");
                  window.location = `/../welcome.php?delete=${id}`;
                  // TODO: Create a form and use post request to submit a form
                }
                else {
                  console.log("no");
                }
              })
            })
        </script>

    
        <script>
        
          function copy() {
          /* Get the text field */
          var copyText = document.getElementById("myInput");

          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /*For mobile devices*/

          /* Copy the text inside the text field */
          document.execCommand("copy");

          /* Alert the copied text */
          alert("Copied the text: " + copyText.value);
          }

        </script>

    </body>
</html>
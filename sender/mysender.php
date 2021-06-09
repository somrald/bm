<!DOCTYPE <!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon2.png" type="image/x-icon">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="index.js"></script>

  </head>
<style>
    #bigdiv{
       height:80%;
       width:90%;
       background-color:white;
       margin-left:5%;
       margin-top:3%;
    }
    #background{
       background-image:url("ultimateSenderAssets/images/201805222125274722.jpg");
       margin-bottom:0px;

      }
      #columns{
        height:100% !important;
        background-color:grey !important;
      }
      #subjectinput{
         margin-top:10px;
         width:100%;
         height:30px;
      } 
      #emailsinput{
         margin-top:6px;
         width:100%;
         height:80%;
      }
      #label{
         margin-top:20px;
         width:100%;
         text-shadow:0.5px 0.5px;
         color:brown;

      }
      #send{
         margin-top:10px;
         width:30%;
         height:30px;
         margin-left:0px;
         color:gold;
         background-color:green;
      } 
      #body{
      margin-left:60px;
      margin-top:80px;
    }
    #second{
      margin-left:60px;
      margin-top:25px;
    }
    #third{
      margin-left:60px;
      margin-top:10px;
    }
    #fourth{
      margin-left:60px;
      margin-top:30px;
    }
      
</style>
<body id = "background">
  <marquee scrollamount="10" direction="right" behavior="scroll" style = "margin-top:20px; color:gold; font-size:25px">
      <span style ="color:brown">ULTIMATE SEN</span><span style = "color:silver">DER:</span> GODWIN'S TECHNOLOGY
  </marquee>
    <div id = "bigdiv">
    <div class="container-fluid">
        <div class="row" >
          <form action = "send.php" method = "post">
            <div class="col-sm-3" id = "columns">
                <div class="form-group">
                <label for="comment" id = "label"><i class="fa fa-envelope" aria-hidden="true"></i><span style ="margin-left:10px">Message Subject</span></label>
                <input type= "text" placeholder="Message Subject" id = "subjectinput" value = "" name = "subject">
                <label for="comment" id = "label"><i class="fa fa-envelope" aria-hidden="true"></i><span style ="margin-left:10px">Sender's email</span></label>
                <input type= "text" placeholder="Sender's email" id = "subjectinput" value = "" name = "from" >
                <label for="comment" id = "label"><i class="fa fa-user" aria-hidden="true"></i><span style ="margin-left:10px">Sender's Name</span></label>
                <input type= "text" placeholder="Sender's Name" id = "subjectinput" value = "" name = "name">
                <label for="comment" id = "label"><i class="fa fa-user" aria-hidden="true"></i><span style ="margin-left:10px">Reply To</span></label>
                <input type= "text" placeholder="Reply-To" id = "subjectinput" value = "" name = "reply">
                <label for="comment" id = "label"><i class="fa fa-user" aria-hidden="true"></i><span style ="margin-left:10px">Return Mailer Daemon</span></label>
                <input type= "text" placeholder="Daemon" id = "subjectinput" value = "" name = "bounce">
                <button type = "submit" style id ="send">SEND</button>
                </div>
            </div>
            <div class="col-sm-3" id = "columns">
               <div class="form-group">
                  <label for="comment" id = "label"><i class="fa fa-envelope" aria-hidden="true"></i><span style ="margin-left:10px">Email list</label>
                  <textarea class="form-control" rows="5" id = "emailsinput" value = "" name = "emails"></textarea>
               </div>
            </div>
            <div class="col-sm-6" id = "columns">
              <div class="form-group">
                  <label for="comment" id = "label" style="margin-left:10px">Body Message</label>
                      <textarea class="form-control" rows="5" id = "emailsinput2" value = "" name = "message"></textarea>
            </div>
          </form>
        </div>
    </div> 
    </div>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
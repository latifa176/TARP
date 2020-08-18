<?php
$sender = 'sakuranbo123.s3@gmail.com';
$headers = 'From:' . $sender;

if(isset($_POST['submit']) AND !empty($_POST['complaint'])){
  if(mail("sakuranbo123.s3@gmail.com", "Complaint Message", $_POST['complaint'], $headers)) echo "Email sent successfully";
  else echo "Email not sent";
}
?>
<DOCTYPE!>
<html lang="en">
<head>
    <title>Complaints page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/normlize.css"/>

    <script type="text/javascript">
        function ReplaceForm(){
          var IDofform="form-3";
          var IDofDivWithform= "box1";
          var IDforReplacement="for_replacement"
          
          document.getElementById(IDofform).submit();
          document.getElementById(IDofDivWithform).innerHTML=document.getElementById(IDforReplacement).innerHTML;
        }
    </script>
    </head>
    <body>
        <div>
            <img style=" width: 230px;
              ; margin : 200px 150px 20px 150px;  float: left;" src="css/IT.png" alt="it logo"/>
          </div>
          <div id="box1">
            <form  id="form-3" style=" padding: 10px 50px 10px 100px ;
            margin: 0px 0px 0px 0px ;
            float: right; background-color: #222020; opacity: 0.7; "
            method="POST" 
            action=""
            >
                <div class="inside">
                    
                    <div class="">
                        <div class=""> 
                          <input class="input-field" type="text" id="complaint" name="complaint" placeholder="Write down your complaints here..">
                        </div>
    
                         <div class="">
                            <div style="text-align: center;">                     
                                <button class="btnS" type="submit" onclick="ReplaceForm()" name="submit">SUBMIT</button>
                                 <a href="https://www.itshieldsec.com/" target="_blank"> <button class="btnS" type="button">CANCEL </button></a>
                             </div>           
                        </div>
                      </div>
    
    
                    </form>
    
                    <script type="text/javascript">
                      document.getElementById("box1").style.display = "block";
                      </script>
    
            </div>
          <div id="for_replacement" style="background-color: #707070; align-content: center; display: none;">
            <p>
            <b>THANK YOU </b>
          </p>
          <br>WE HAVE RECEIVED YOUR COMPLAINT MESSAGE. WE WILL USE IT TO MAKE THE NECESSARY IMPROVEMENTS ON OUR PART. 
          </div>
    </body>
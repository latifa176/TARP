<DOCTYPE!>
  <html lang="en">
    <head>

  </head>
  <body>
  <?php include 'submittedformpage.html';
$name = test_input($_POST["name"]);
$nationality = test_input($_POST["nationality"]);
$university = test_input($_POST["university"]);
$major = test_input($_POST["major"]);
$year = test_input($_POST["year"]);
$mobile = test_input($_POST["mobile"]);
$program = test_input($_POST["program"]);
$gender = test_input($_POST["gender"]);
$residence = test_input($_POST["residence"]);

if(empty($_POST["currentLevel"])) $currentLevel="";
else $currentLevel = test_input($_POST["currentLevel"]);

$grad = test_input($_POST["grad"]);
$email = test_input($_POST["email"]);
$program = test_input($_POST["program"]);

function OpenCon()
 {
   //Change database host, user and password down here 
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "l44443333";
 $db = "trainingrequests";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(!empty($name)){
    //name is not empty
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){echo "<script>alert('Please enter your name. No numbers allowed'); window.location.href='formpage.html'; </script>"; exit("Please enter your name. No numbers allowed");}
    if(!empty($nationality)){
      //nationality is not empty
      if(!preg_match("/^[a-zA-Z ]*$/",$nationality)){echo "<script>alert('Please enter your nationality. No numbers allowed'); window.location.href='formpage.html'; </script>"; exit("Please enter your nationality. No numbers allowed");}
      if(!empty($residence)){
        //residence is not empty
        if(!empty($gender)){
          //gender is not empty
          if(!empty($university)){
            //university is not empty
            if(!empty($major)){
              //major is not empty
              if(!empty($grad)){
                //grad is not empty
                if($grad=="no" AND empty($currentLevel)){echo "<script>alert('Please enter your current level. Or select Yes from GRADUATE'); window.location.href='formpage.html'; </script>"; exit("Please enter your current level");}
                if(!empty($year)){
                  //year is not empty
                  if(!empty($email)){
                    //email is not empty
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){echo "<script>alert('Incorrect email format. Please enter a correct email'); window.location.href='formpage.html'; </script>"; exit("Please enter a correct email");}
                    if(!empty($mobile)){
                      //mobile is not empty
                      if(!preg_match("/^[0-9 ]*$/",$mobile OR strlen($mobile)<10)){echo "<script>alert('Please enter your mobile number. Only numbers allowed'); window.location.href='formpage.html'; </script>"; exit("Please enter your mobile number. Only numbers allowed");}
                      if(!empty($program)){
                        //program code is not empty
                        $conn = OpenCon();
                        //echo "Connected Successfully";
                        if($grad=="no") $grad=0; else $grad=1;
                        $sql="INSERT INTO applicants (name,nationality,placeOfResidence,gender,university,major,isGraduate,currentLevel,yearOfGraduation,contactInfo,program) 
                        VALUES ('$name','$nationality','$residence','$gender','$university','$major','$grad','$currentLevel','$year','$email/$mobile','$program')";
                        if (mysqli_query($conn, $sql)) {
                            //echo "New record created successfully";
                      } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                        //mysql_close();
                        CloseCon($conn);
                      } else { echo '<script>alert("Please enter the type of the program for which you would like to apply"); window.location.href="formpage.html";</script>';}
                    } else { echo '<script>alert("Please enter your mobile number"); window.location.href="formpage.html";</script>';}
                  } else { echo '<script>alert("Please enter your email"); window.location.href="formpage.html";</script>';}
                } else { echo '<script>alert("Please enter the year of your graduation"); window.location.href="formpage.html";</script>';}
              } else { echo '<script>alert("Please select whether you are a graduate or not"); window.location.href="formpage.html";</script>';}
            } else { echo '<script>alert("Please enter your major"); window.location.href="formpage.html";</script>';}
          } else { echo '<script>alert("Please enter your university"); window.location.href="formpage.html";</script>';}
        } else { echo '<script>alert("Please select your gender"); window.location.href="formpage.html";</script>';}
      } else { echo '<script>alert("Please enter your place of residence"); window.location.href="formpage.html";</script>';}
    } else { echo '<script>alert("Please enter your nationality"); window.location.href="formpage.html";</script>';}
  } else { echo '<script>alert("Please enter your name"); window.location.href="formpage.html";</script>';}

 }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  
</body>
    
 
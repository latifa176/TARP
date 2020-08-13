<DOCTYPE!>
  <html lang="en">
    <head>

  </head>
  <body>
  <?php include 'submittedformpage.html';
// define variables and set to empty values
$nameErr = $emailErr =$nationalityErr=$universityErr=$majorErr= $mobileErr=$genderErr =$programErr= $yearErr =$gradErr = "";
$name = $email = $gender = $university= $nationality=$comment =$mobile=$major=$program=$year =$grad= "";
$name = test_input($_POST["name"]);
$nationality = test_input($_POST["nationality"]);
$university = test_input($_POST["university"]);
$major = test_input($_POST["major"]);
$year = test_input($_POST["year"]);
$mobile = test_input($_POST["mobile"]);
$program = test_input($_POST["program"]);
$gender = test_input($_POST["gender"]);
$residence = test_input($_POST["residence"]);
$currentLevel = test_input($_POST["currentLevel"]);

$grad = test_input($_POST["grad"]);
if($grad=="no") $grad=0;
else $grad=1;

$email = test_input($_POST["email"]);

function OpenCon()
 {
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

  if(!empty($name) AND preg_match("/^[a-zA-Z ]*$/",$name)){
    //name is not empty
    if(!empty($nationality) AND preg_match("/^[a-zA-Z ]*$/",$nationality)){
      //nationality is not empty
      if(!empty($university)){
        //university is not empty
        if(!empty($major)){
          //major is not empty
          if(!empty($year)){
            //year is not empty
            if(!empty($mobile) AND preg_match("/^[0-9 ]*$/",$mobile)){
              //mobile is not empty
              if(!empty($gender)){
                //gender is not empty
                if(!empty($residence)){
                  //residence is not empty
                  if(!empty($grad)){
                    //grad is not empty
                    if($grad==0 && empty($currentLevel)){ header("Location: formpage.html"); echo '<script>alert("Please enter your current level or select Yes from Graduate")</script>';}
                    if(!empty($email) AND filter_var($email, FILTER_VALIDATE_EMAIL)){
                      //email is not empty
                      $conn = OpenCon();
                      //echo "Connected Successfully";
                      $sql="INSERT INTO applicants (name,nationality,placeOfResidence,gender,university,major,isGraduate,currentLevel,yearOfGraduation,contactInfo) 
                      VALUES ('$name','$nationality','$residence','$gender','$university','$major','$grad','$currentLevel','$year','$email/$mobile')";
                      if (mysqli_query($conn, $sql)) {
                          //echo "New record created successfully";
                    } else {
                          //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                      //mysql_close();
                      CloseCon($conn);
                    } else { header("Location: formpage.html"); echo '<script>alert("Please enter your email")</script>';}
                  } else { header("Location: formpage.html"); echo '<script>alert("Please select whether you are a graduate or not")</script>';}
                } else { header("Location: formpage.html"); echo '<script>alert("Please enter your place of residence")</script>';}
              } else { header("Location: formpage.html"); echo '<script>alert("Please select your gender")</script>';}
            } else { header("Location: formpage.html"); echo '<script>alert("Please enter your mobile number")</script>';}
          } else { header("Location: formpage.html"); echo '<script>alert("Please enter the year of your graduation")</script>';}
        } else { header("Location: formpage.html"); echo '<script>alert("Please enter your major")</script>';}
      } else { header("Location: formpage.html"); echo '<script>alert("Please enter your university")</script>';}
    } else { header("Location: formpage.html"); echo '<script>alert("Please enter your nationality")</script>';}
  } else { header("Location: formpage.html"); echo '<script>alert("Please enter your name")</script>';}

 }
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";

  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["nationality"])) {
    $nationalityErr = "nationality is required";
  } else {
    $nationality = test_input($_POST["nationality"]);
    // check if nationality address is well-formed
    if (!preg_match("/^[a-zA-Z ]*$/",$nationality)) {
        $nationalityErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["university"])) {
    $universityErr = "university is required";
  } else {
    $university = test_input($_POST["university"]);
    // check if university only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$university)) {
      $universityErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["major"])) {
    $majorErr = "major is required";
  } else {
    $university = test_input($_POST["major"]);
    // check if major only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$major)) {
      $majorErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["year"])) {
    $yearErr = "year is required";
  } else {
    $year = test_input($_POST["year"]);
    // check if year only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$year)) {
      $yearErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["mobile"])) {
    $mobileErr = "mobile is required";
  } else {
    $mobile = test_input($_POST["mobile"]);
    // check if year only contains letters and whitespace
    if (!preg_match("/^[0-9 ]*$/",$mobile)) {
      $mobileErr = "Only number allowed";
    }
  }


  if (empty($_POST["program"])) {
    $programErr = "program is required";
  } else {
    $program = test_input($_POST["program"]);
    // check if year only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$program)) {
      $programErr = "Only  letters and white space allowed";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


if (empty($_POST["grad"])) {
    $gradErr = "grad is required";
  } else {
    $grad = test_input($_POST["grad"]);
  }


  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }*/

  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  
</body>
    
 
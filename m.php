<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
// Here variables and set to empty values
$nameErr = $emailErr = $dateofbirthErr= $genderErr = $degreeErr= $bloodgroupErr =" ";
$name = $email = $dateofbirth = $gender = $degree= $bloodgroup="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // for name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"] );
    // for e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  

  if (empty($_POST["dateofbirth"])) {
    $dateofbirthErr = "Cannot be Empty";
  } else {
    $dateofbirth = test_input($_POST["dateofbirth"]);
 }
  
  

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


if (empty($_POST["degree"])) {
    $degreeErr = "At least Select two";
  }
  else {
    $degree = test_input($_POST["degree"]);
  }


  if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "At least Select one is required";
  } else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h1>Assesssment Task</h1>
<form method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  <div>
	<fieldset>
	<legend>NAME:</legend>	<input type="text" name="name" Placeholder="type your name here">
  <span class="error">* <?php echo $nameErr;?></span>
  
	</fieldset>
</div>

  <br>
  
<div>
	<fieldset>
	<legend> E-MAIL:</legend> <input type="text" name="email"placeholder="example@gmail.com">
  <span class="error">* <?php echo $emailErr;?></span>
	</fieldset>
</div>

 
  <br>

<div>
	<fieldset>
	<legend>DATE OF BIRTH :</legend>	<label for="dateofbirth"></label>
		 <input type="date" id="dateofbirth" name="dateofbirth">
         <span class="error">* <?php echo $dateofbirthErr;?></span>
	</fieldset>
</div>
 
		 <br>

<div>
	<fieldset>
	<legend>GENDER::</legend> <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>	
	</fieldset>
</div>		 
  
  
  <br>

<div>
	<fieldset>
	<legend>DEGREE:</legend> <input type="Checkbox" id="degree" name="degree" value="SSC">SSC
  <input type="Checkbox" id="degree" name="degree" value="HSC">HSC
  <input type="Checkbox" id="degree" name="degree" value="BSc">BSc
  <input type="Checkbox"id="degree" name="degree" value="MSc">MSc
  <span class="error">* <?php echo $degreeErr;?></span>	
	</fieldset>
</div>
 
 <br>

<div>
	<fieldset>
	<legend>BLOOD GROUP :</legend>	<select name="bloodgroup"> <option id="bloodgroup" name="bloodgroup" value="">Select Your Blood Group</option>
  <option id="bloodgroup" name="bloodgroup" value="A+">A+</option>
  <option id="bloodgroup" name="bloodgroup" value="A-">A-</option>
  <option id="bloodgroup" name="bloodgroup" value="B+">B+</option>
  <option id="bloodgroup" name="bloodgroup" value="B-">B-</option>
  <option id="bloodgroup" name="bloodgroup" value="AB+">AB+</option>
  <option id="bloodgroup" name="bloodgroup" value="AB-">AB-</option>
  <option id="bloodgroup" name="bloodgroup" value="O+">O+</option>
  <option id="bloodgroup" name="bloodgroup" value="O-">O-</option>
  <select/>
 <span class="error">* <?php echo $bloodgroupErr;?></span>
	</fieldset>
</div>
  
<br>
  <input type="submit" name="submit" value="Submit" >  
</form>
<?php



echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $gender;
echo"<br>";
echo $degree;
echo "<br>";
echo $bloodgroup;
echo "<br>";
?>

</body>
</html>
<?php
 include("DB_Ops.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registeration form</title>
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
<?php 
$nameErr = $emailErr = $user_nameErr = $birthErr = $addressErr = $phoneErr = $passErr = $confirmPassErr = $imageErr = "";
$name = $email = $user_name = $birthdate = $address = $phone = $password = $confirm_password = $image = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = $_POST["name"];
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }
    if (empty($_POST["user_name"])) {
        $user_nameErr = "User name is required";
    } else {
        $user_name = $_POST["user_name"];
        
    } 
    if (empty($_POST["birthdate"])) {
        $birthErr = "Birthdate is required";
    } else {
        $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
        $age = date_diff(date_create($birthdate), date_create('now'))->y;
        if ($age <= 13) {
            $birthErr = "You are not eligible to register";
        }
    }
    
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = $_POST["phone"];
        if(!preg_match("/^[0-9]{11}$/",$phone)){
            $phoneErr = "invalid phone number";
        }
    }
      
      if (empty($_POST["address"])) {
          $addressErr = "Address is required";
      } else {
          $address = $_POST["address"];
          
      }
  
      
  
      if (empty($_POST["password"])) {
          $passErr = "Password is required";
      } else {
          $password = $_POST["password"];
          if(!preg_match("/[0-9]+/",$password)){
              $passErr = "at least one number";
          }
          if(!preg_match("/[#?!@$%^&*-+]+/",$password)){
              $passErr .= " at least one special character";
          }
          if(!preg_match("/^.{8,}$/",$password)){
              $passErr .= " Minimum eight characters";
          }    
      }
      if (empty($_POST["confirm_password"])) {
          $confirmPassErr = "Confirm password is required";
      } else {
          $confirm_password = $_POST["confirm_password"];
          if($password != $confirm_password){
              $confirmPassErr = "Password not matched";
          }
      }
  
      if (empty($_POST["image"])) {
          $imageErr = "Image is required";
      } else {
          $image = $_POST["image"];
          
      }
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      if(isset($_POST['submit'])){
          if($nameErr == "" && $emailErr == "" && $user_nameErr == "" && $birthErr == "" && $addressErr == "" && $phoneErr == "" && $passErr == "" && $confirmPassErr == "" && $imageErr == ""){
              echo "Registration Successful";
              
          }
          else{
              echo "Registration Failed";
          }
        
  }
  }
?>
<?php include 'header.php';?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <!-- value: save input after submit  -->
        Name: <input type="text" name="name" placeholder="Enter your name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
       
        User Name: <input type="text" name="user_name" placeholder="Enter your user name" value="<?php echo $user_name;?>">
        <span class="error">* <?php echo $user_nameErr;?></span>
        <br><br>
        Birthdate: <input type="date" name="birthdate" placeholder="Enter your birthdate" value="<?php echo $birthdate;?>">
        <span class="error">* <?php echo $birthErr;?></span>
        <br><br>
        Phone: <input type="text" name="phone" placeholder="Enter your phone" value="<?php echo $phone;?>">
        <span class="error">* <?php echo $phoneErr;?></span>
        <br><br>
        Address: <input type="text" name="address" placeholder="Enter your address" value="<?php echo $address;?>">
        <span class="error">* <?php echo $addressErr;?></span>
        <br><br>
        Password: <input type="password" name="password" placeholder="Enter your password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passErr;?></span>
        <br><br>
        Confirm Password: <input type="password" name="confirm_password" placeholder="Confirm your password" value="<?php echo $confirm_password;?>">
        <span class="error">* <?php echo $confirmPassErr;?></span>
        <br><br>
        Image: <input type="file" name="image" placeholder="Enter your image" value="<?php echo $image;?>">
        <span class="error">* <?php echo $imageErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" placeholder="Enter your email" (required) value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php include ('footer.php');?>

    
</body>
</html>
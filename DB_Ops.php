<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="registration_db";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect");
}


if($_SERVER['REQUEST_METHOD']=="POST")
{
   
    $full_name = $_POST['name'];
    $username = $_POST['user_name'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $phone= $_POST["phone"];
    $password = $_POST['password'];
    $confirm_password= $_POST['confirm_password'];
    $user_image=$_POST['image'];
    $email = $_POST['email'];

    $query1 = "SELECT user_name FROM users WHERE user_name='".$username."'";


    $result=mysqli_query($con,$query1);
    //serverside validation if username already exist 
   if (mysqli_num_rows($result) != 0)
   {
     echo "Username already exists";
    }

    else
   {
    $query ="insert into users(full_name,user_name,birthdate,phone,address,password,confirm_password,user_image,email) VALUES ('$full_name','$username','$birthdate', '$phone','$address','$password','$confirm_password','$user_image', '$email');";
    mysqli_query($con,$query);
    echo "added sufulley";
    }
    
    

}


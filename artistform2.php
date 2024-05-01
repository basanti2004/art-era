<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtERA</title>
    <link href="./index.css" rel="stylesheet"></a>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Caveat&family=Mooli&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<style>
* {
    background-color: black;
}
#SignUp .data {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    font-family: 'Alkatra', cursive;
    font-family: 'Caveat', cursive;
    font-family: 'Mooli', sans-serif;
}
#SignUp .data .image img {
    position: relative;
    width: 120%;
    height: 700px;
}
#SignUp .data .collectInfo {
   margin: 3.5rem;
   padding: 3.5rem;
}
#SignUp .data .collectInfo h1 {
  font-size: 45px;
  padding-bottom: 2rem;
  color: rgb(32, 190, 196);
}
#SignUp .data .collectInfo h2 {
    padding-top: 1rem;
    font-size: 30px;
    letter-spacing: 2px;
    color: grey;
    font-weight: 500;
    
}
#SignUp .data .collectInfo input {
 outline: none;
 border: none;
 font-weight: 400;
 font-size: 28px;
color: white;
}
#SignUp .data .collectInfo select {
    color: white;
    border: none;
    border-bottom: 1px solid white;
    font-size: 28px;
    font-weight: 400;
}
#SignUp .data .collectInfo .btn input {
    position: absolute;
    text-decoration: none;
    margin-top: 2rem;
    margin-left: 4rem;
    font-size: 25px;
    color: white;
    background-color: rgb(15, 94, 94);
    padding: 10px 20px;
    border-radius: 4px;
}
</style>
<body>
   <section id="SignUp">
    <div class="data">
        <div class="image">
        <img src="./images/oilArt.jpg" alt="">
        </div>
        <div class="collectInfo">
            <form  action="" method="POST">
            <h1>Fill the Below Info </h1>
            <hr>
             <h2>Full Name:  <input type="text" name="name" required></h2>
             <h2>Mobile No.:  <input type="text" name="number" required></h2>  
             <h2>Email :  <input type="email" name="email" required></h2>
             <h2>Password:  <input type="password" name="password" required></h2>  
             <h2>LogIn Type:  <select name="usertype" required>
                <option selected></option>
                <option value="SignUp as General">General</option>
             </select></h2> 
             <div class="btn">
               <input type="submit" name="submit" value="Submit">
             </div>
            </form>
        </div>
    </div>
   </section> 
</body>
</html>


<?php

include 'connection.php';
 
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $number = $_POST['number'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $usertype = $_POST['usertype'];

  $insertquery = " insert into logindata(name,number,email,password,usertype) values('$name','$number','$email'
  ,'$password','$usertype') ";

  $res = mysqli_query($con,$insertquery);

  if($res){
    header("location: index.html");
  }else{
    ?>
    <script>
        alert("data not inserted successfully");
    </script>
    <?php
  }
}
?>



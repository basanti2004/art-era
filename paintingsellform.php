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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>    



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
    width: 100%;
    height: 650px;
}
#SignUp .data .collectInfo {
   margin: 3.5rem;
   padding: 3rem;
   border: 2px solid black;

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
 font-size: 27px;
color: black;
}
#SignUp .data .collectInfo .file input {
  margin-top: 10px;
}

#SignUp .data .collectInfo .btn input {
    position: absolute;
    text-decoration: none;
    margin-top: 1rem;
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
        
         <img src="images/blankimg.jpg" alt=""> 
      
        </div>
       
            <form  action="" method="post">
            <h1>Enter Your Details </h1>
            <hr>
             <h2> <input type="hidden" name="name" required id="name"></h2>
             <h2><input type="hidden" name="number" required id="number"></h2>  
             <h2>  <input type="hidden" name="email" required id="email"></h2>
            
            
                <input type="hidden"  name="submit" value="submit">
           
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


  $insertquery = " insert into paintingselldetail(name,number,email) values('$name','$number','$email') ";

  $res = mysqli_query($con,$insertquery);

  if($res){
    ?>
     <script>
      swal({
      title: "Order Successful",
      text: "You Will Get Your Order With in 5-10 days!",
      icon: "success",
     });
     
   </script> 
   <?php
  }else{
    ?>
    <script>
        alert("data not inserted successfully");
    </script>
    <?php
  }
}
?>



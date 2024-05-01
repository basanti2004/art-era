<?php

$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'artera');
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$education=$_POST['education'];
$age=$_POST['age'];
$query= "insert into  courseregister (name,number,email,education,age)
values ('$name','$number','$email','$education','$age')";

 $res = mysqli_query($con,$query);
 if($res) {
    if($con){
        header("location: index.html");
    }else{
        echo "no connection";
    }
 }

?>


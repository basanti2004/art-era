<?php

session_start();
$con = mysqli_connect("localhost","root","","artera");

if(mysqli_connect_error())
{
    echo"cannot connect to database";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   if(isset($_POST['purchase']))
   {
     $query1 = "INSERT INTO `order_manager`( `Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
     if(mysqli_query($con,$query1))
     {
       $Order_Id = mysqli_insert_id($con);
       $query2 = "INSERT INTO `order`(`Order_Id`, `Item_Name`, `Price`, `Type`, `Quantity`) VALUES (?,?,?,?,?)";
       $stmt = mysqli_prepare($con,$query2);
       if($stmt)
       {
        mysqli_stmt_bind_param($stmt,"sssss",$Order_Id, $Item_Name, $Price, $Type, $Quantity);
          foreach($_SESSION['cart'] as $key => $values)
          {
            $Item_Name = $values['Item_Name'];
            $Price = $values['Price'];
            $Type = $values['Type'];
            $Quantity = $values['Quantity'];
            mysqli_stmt_execute($stmt);
          }
          unset($_SESSION['cart']);
          echo"<script>
          alert('Order Successful');
          window.location.href='mycart.php';
       </script>";
       }
       else
       {
        echo"<script>
            alert('Sql Query Prepared Error');
            window.location.href='mycart.php';
         </script>";
       }
     }
     else
     {
        echo"<script>
          alert('sql error');
          window.location.href='mycart.php';
        </script>";
     }
   }
}
?>
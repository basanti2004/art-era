<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>artERA</title>
   
    <style>
        .container .row .heading h1 {
      text-align: center;
        }
        .container .row .table-data .table {
            margin-top: 5rem;
            margin-left: 5rem;
        }
        .container .row .table-data .table th {
            padding: 10px;
            padding-left:3rem;
            font-size: 25px;
            border-bottom:1px solid black;
            padding-right: 3rem;
        }
        .container .row .table-data .table tr td {
            padding: 10px;
            font-size: 25px;
            padding-left:3rem;
            border-bottom:1px solid black;
            padding-right: 3rem;
            text-align: center;
        }
        .container .row .table-data .table tr td .submit {
            border: none;
            text-align: center;
            
        }
        .container .row .table-data .table tr td button {
            color: red;
            padding:10px 20px;
            font-size:20px;
        }
        .container .total form button {
            background-color: brown;
             color: white;
             text-decoration: none;
             font-size: 23px;
             padding: 10px 20px;
             border: none;    
             margin-top: 10px;
        }
        .container .total {
          
            padding:20px 20px; 
            margin-right: 3rem; 
            background-color: lightgrey;
        }
        .container .total .form-check label {
            font-size: 20px;
            font-weight: 500;
        }
        .container .total .form-group {
          padding: 0.5rem;
        }
        .container .total .form-group label {
          font-size:18px;
        }
        .container .total .form-group input {
          font-size: 20px;
          padding: 10px;
        
        }

    
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>MY CART</h1>
            </div>
           <div class="table-data">
<table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Painting Name</th>
      <th scope="col">Price</th>
      <th scope="col">Painting Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total = 0;
    if(isset($_SESSION['cart']))
    {
     foreach($_SESSION['cart'] as $key => $value)
     {
        $sr = $key+1;
        $total = $total + $value['Price'];

        echo"
        <tr>
        <td>$sr</td>
        <td>$value[Item_Name]</td>
        <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
        <td>$value[Type]</td>
        <td>
        <form action='manage_cart.php' method='POST'>
          <input type='number' name='Mod_Quantity' onchange='this.form.submit();' class='iquantity' value='$value[Quantity]' min='1' max='10'></td>
          <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
          </form>
        <td class='itotal'>$value[Price]</td>
        <td>
          <form action='manage_cart.php' method='POST'>
             <button name='Remove_Item' class='btn btn-outline-danger'>Remove</button>
             <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
          </form>
        </td>
         ";

     }
    }
    ?>
    
   
  </tbody>
</table>

   <div class="total" style="margin-left: 60rem;margin-top: 3rem;">
    <h1>Total: <?php echo $total ?></h1>
    <hr>
    <?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
    {
    ?>
  
   <form action="purchase.php" method="POST">
    <div class="form-group">
       <label>Full Name</label>
       <input type="text" name="full_name" class="form-control" required>
    </div>
    <div class="form-group">
       <label>Mobile Number</label>
       <input type="text" name="phone_no" class="form-control" required>
    </div>
    <div class="form-group">
       <label>Address</label><br>
       <input type="text" name="address" class="form-control" required>
    </div>
   
<div class="form-check">
  <input class="form-check-input" type="radio" name="pay_mode" value="COD" required>
  <label>
    Cash On Dilevery
  </label>
</div>
  <br>
  
   <button class="submit" type="submit" name="purchase">make purchase</button>
   
    </form>
   
    <?php
    }
    ?>
   
   
   </div>

           </div>
        </div>
    </div>
    <script>
      $sr=0;
      var iprice=document.getElementByClassName('iprice');
      var iquantity=document.getElementByClassName('iquantity');
      var itotal=document.getElementByClassName('itotal');

      function subTotal()
      {
        for(i=0;i<iprice.length;i++)
        {
          itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        }
      }

      subTotal();
    </script>
</body>
</html>

<?php
session_start(); 
 
/*

file:   shop 
author: ryan Hall
purpose: cart,shop checkout

with the help of 
ismjudoka
https://www.youtube.com/watch?v=cNoG10A9IAQ

*/

//define products

require ("products.php");
require ("layout.php");


//iniitalize cart
if(!isset($_SESSION['shopping_cart'])){
	$_SESSION['shopping_cart']= array();

}

if(isset($_GET['empty_cart'])){
	$_SESSION['shopping_cart'] = array();   

}

//add product to cart
if(isset($_POST['add_to_cart'])){
	$product_id = $_POST['product_id'];

	if(isset($_SESSION['shopping_cart'][$product_id])){
		echo "item already in cart!<br!>";

}else{
//otherwise add to cart
 

    $_SESSION['shopping_cart'][$product_id]['product_id']= $_POST['product_id'];
    $_SESSION['shopping_cart'][$product_id]['quantity']= $_POST['quantity'];
    echo "item has been added";
	}
}
 
//update cart
if(isset($_POST['update_cart'])){
	$quantities = $_POST['quantity'];
	foreach($quantities as $id => $quantity){
		$_SESSION['shopping_cart'][$id]['quantity']= $quantity;
		echo "ID: $id - $Quantity: $quantity< br /> ";   

	}
}

echo $header;

"<h2> TheShop </h2>
<a href='./shop.php?view_cart=1'>Cart</a>";


 
//viewing product
if(isset($_GET['view_product'])) {
     $product_id = $_GET['view_product'] ;
    
     //display links
     echo "<p><a href='./index.php'>TheShop</a> &gt; <a href='shop.php'>". $products[$product_id]['category'] ."</a></P>";

     // display products
   echo "  <div>
     <span style ='font-weight:bold;'> ". $products[$product_id]['name'] . "</span><br />

	 	<span>$" .$products[$product_id]['price'] . "</span><br />
		<span>"  .$products[$product_id]['category'] . "</span><br />
	 	 <span>"  .$products[$product_id]['description'] . "</span><br />
	 	 <p>
         <form action = ./shop.php?view_product=$product_id ' method= 'post'>
	         <select name ='quantity'>
		         <option vaule ='1'>1</option>
		          <option vaule ='2'>2</option>
		           <option vaule ='3'>3</option>
		 	 </select>
		 	 <input type='hidden' name='product_id' value='$product_id' />
		 	 <input type='submit' name='add_to_cart' value='add to cart'/>

		 </form>
		 </div>

	 	</p>";
	} 
	//view cart
 else if(isset( $_GET['view_cart'])){


  echo "<p><a href='./index.php'>TheShop</a></p>";

   echo "
 	<div>
   <h3>your cart</h3>
   <a href='./shop.php?empty_cart=1'>Empty Cart</a><br />
   </div>
   ";
    	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";

    }

    else{
	echo "<table style='width:500px;' cellspacing='0'>";
	echo "<tr>
		<th style='border-bottom:1px solid #000000;'>Name</th>
		<th style='border-bottom:1px solid #000000;'>Price</th>
		<th style='border-bottom:1px solid #000000;'>Category</th>
		<th style='border-bottom:1px solid #000000;'>Quantity</th>
	</tr>";

    	 foreach($_SESSION['shopping_cart'] as $id => $product){
    	 	$product_id = $product['product_id'];

			  echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./shop.php?view_product=$id'>" 
						  . $products[$product_id]['name'] . "</a></td>
						<td style='border-bottom:1px solid #000000;'>$" . $products[$product_id]['price'] . "</td> 
						<td style='border-bottom:1px solid #000000;'>" . $products[$product_id]['category'] . "</td>
						<td style='border-bottom:1px solid #000000;'>
						<input type='text' name='quantity[$product_id]' value='" . $product['product_id']['quantity'] . "'</td>
					</tr>";

				echo "</table>

				<input type='submit' name='update_cart' value='update' />

				</form>


               <div class ='checkout'>
				<a href='./shop.php?checkout=1'>checkout</a>
				</div>
				";


    	 }
    }

}
//checkout
else if(isset($_GET['checkout'])) {
	// Display site links
	echo "<p>
		<a href='./index.php'>DropShop</a></p>";
	
	echo "<h3>Checkout</h3>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";
	}
	
	else {
		echo "<form action='./index.php?checkout=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
				<tr>
					<th style='border-bottom:1px solid #000000;'>Name</th>
					<th style='border-bottom:1px solid #000000;'>Item Price</th>
					<th style='border-bottom:1px solid #000000;'>Quantity</th>
					<th style='border-bottom:1px solid #000000;'>Cost</th>
				</tr>";
				
				$total_price = 0;
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					
					$total_price += $products[$product_id]['price'] * $product['quantity'];
					echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></td>
						<td style='border-bottom:1px solid #000000;'>$" . $products[$product_id]['price'] . "</td> 
						<td style='border-bottom:1px solid #000000;'>" . $product['quantity'] . "</td>
						<td style='border-bottom:1px solid #000000;'>$" . ($products[$product_id]['price'] * $product['quantity']) . "</td>
					</tr>";
				}
			echo "</table>
			<p>Total price: $" . $total_price . "</p>";
		
	}
}

	//view all products


else{

echo "<h3>our products </h3>";

  echo "<p><a href='./index.php'>TheShop</a></p>";



//loop display products
foreach($products as $id => $product){
	echo "<li id='products'>
		<span style = 'font-weight:bold;'> <a href ='./shop.php?view_product=$id'>". $product['name'] . "</a></span><br />" .
	 	" Price: $" . $product['price'] . "<br/> ".
	 	" Category: " . $product['category'] . "<br/> ".
	 	 $product['description'] .
	 	 "</li id='products'>";
	 
 	}

}
?>
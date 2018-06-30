<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if(!isset($_SESSION['customer_email'])){
	echo "<script>alert('Kindly Register or Login')</script>";
	echo "<script>window.open('../index.php','_self')</script>";

}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css"	media="all"/>

</head>

<body>
	
	<!--Main Container Start-->
	<div class="main_wrapper">
	
	
		
		<!--Header starts-->
		<div class="header_wrapper">
			<a href="../index.php"><img src="../images/logo.gif" style="float:left"></a>
			<img src="../images/ad_banner.gif" style="float: right">
		</div>
		<!--Header Ends-->
		
		<!--Navigation Bar start-->
		<div id="navbar">
			
			<ul id="menu">
				<li><a href="../index.php">Home</a> </li>
				<li><a href="../all_products.php">All Product</a> </li>
				<li><a href="my_account.php">My Account</a> </li>
				<?php 
				if(isset($_SESSION['customer_email'])){
					echo "<span style='display:none;'><li><a href='../user_register.php'>Sign Up</a></li></span>";
				}else{
					echo "<li><a href='../user_register.php'>Sign Up</a></li>";
				}
				?>
				<li><a href="../cart.php">Shopping Cart</a> </li>
				<li><a href="../contact.php">Contact Us</a> </li>
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"/>
					<input type="submit" name="search" value="Search"/>
				</form>
			</div>
		
		</div>
		<!--Navigation Bar end-->
		
		
		<div class="content_wrapper">
		
			<div id="left_sidebar">
				
				<div id="sidebar_title">Manage Account:</div>
				<ul id="cats">
					<?php
					$customer_session=$_SESSION['customer_email'];
					$get_customer_pic = "select * from customers where customer_email='$customer_session'";
					$run_customer = mysqli_query($con,$get_customer_pic);
					$row_customer = mysqli_fetch_array($run_customer);
					$customer_pic = $row_customer['customer_image'];
					echo "<img src='customer_photos/$customer_pic' width='150' height = '150'>";
					?>
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
				
			
			</div>
			
			<div id="right_content">
				
				<?php cart(); ?>
				
				<div id="headline">
					<div id="headline_content">
						<?php
						if(isset($_SESSION['customer_email'])){
							echo "<b>Welcome:"."</b>&nbsp;". "<b style='color:yellow;'>".$_SESSION['customer_email']."</b>";
						}
						?>
						<?php 
						if(!isset($_SESSION['customer_email'])){
						echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
						}else{
							echo "<a href='logout.php' style='color:#F93;'>Logout</a>";
						}
						?>
						</span>
					</div>
				</div>
				
				
				<div>
					<h2 style="background: black; color: #FC9; padding: 20px; text-align: center;border-top: 2px solid white;">Manage Your Account Here</h2>
					<?php getDefault() ?>
					<?php
						if(isset($_GET['my_orders'])){
							include("my_orders.php");	
						}
						if(isset($_GET['edit_account'])){
							include("edit_account.php");	
						}
						if(isset($_GET['change_pass'])){
							include("change_pass.php");	
						}
						if(isset($_GET['delete_account'])){
							include("delete_account.php");	
						}
					?>
				</div>
			</div>
			
		
		</div>
		
		
		<div class="footer">
			<h1 style="color: black; padding-top: 30px; text-align: center;">&copy; 2018 - By www.myshoponlinestore.com</h1>
			
		</div>

	
	</div>
	<!--Main Container End-->
		
	
</body>
</html>
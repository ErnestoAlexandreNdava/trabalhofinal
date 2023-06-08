<?php
include 'includes/config.php';
$currency_format = array('GBP' => 'MZN', 'USD' => 'MZN', 'EURO' => ' MZN');
$page_name = basename($_SERVER['PHP_SELF']);
$sqlS = "SELECT * FROM settings LIMIT 1";
$resultS = $conn->query($sqlS);
$rowS = $resultS->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Delivery</title>
	<!-- For Icon Css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<div class="main-container">
		<header>
			<div class="logo">
				<img src="img/logo.png" alt="">
			</div>


			<?php
$nav_links = array(
    'admin' => array(
        array('href' => 'admin-food.php', 'text' => 'Food Menu'),
        array('href' => 'admin-food-cat.php', 'text' => 'Food Category'),
        array('href' => 'admin-order.php', 'text' => 'Orders'),
        array('href' => 'users.php', 'text' => 'Users'),
        array('href' => 'settings.php', 'text' => 'Settings'),
        array('href' => 'logout.php', 'text' => 'Logout'),
    ),
    'end-user' => array(
        array('href' => 'account.php', 'text' => 'My Account'),
        array('href' => 'order.php', 'text' => 'My Order'),
        array('href' => 'logout.php', 'text' => 'Logout'),
    ),
    'no-login' => array(
        array('href' => 'login.php', 'text' => 'Login'),
        array('href' => 'register.php', 'text' => 'Register'),

    ),
);

if (isset($_SESSION['logged_in_type']) && $_SESSION['logged_in_type'] == 'admin') {
    $links = $nav_links['admin'];
} elseif (isset($_SESSION['logged_in_type']) && $_SESSION['logged_in_type'] == 'user') {
    $links = $nav_links['end-user'];
} else {
    $links = $nav_links['no-login'];
}
?>

			<div class="nav-bar">
				<div class="nav" id="myTopnav">
					<a href="index.php" <?php if ($page_name == "index.php") {?>class="active" <?php }?>>Home</a>
					<a href="menu.php" <?php if ($page_name == "menu.php") {?>class="active" <?php }?>>Menu</a>
					<?php foreach ($links as $link) {?>
						<a href="<?php echo $link['href']; ?>" <?php if ($page_name == $link['href']) {?>class="active" <?php }?>><?php echo $link['text']; ?></a>
					<?php }?>
					<?php if (!empty($_SESSION["cart_item"]) && !(isset($_SESSION['logged_in_type']) && $_SESSION['logged_in_type'] == 'admin')) {?>
						<a href="cart.php" class="cart-menu" <?php if ($page_name == "cart.php") {?>class="active" <?php }?>><i class="fa fa-shopping-cart" aria-hidden="true"></i> (<?php echo count($_SESSION["cart_item"]); ?>)</a>
					<?php } else {?>
						<?php if (!(isset($_SESSION['logged_in_type']) && $_SESSION['logged_in_type'] == 'admin')) {?>
							<a href="cart.php" class="cart-menu" <?php if ($page_name == "cart.php") {?>class="active" <?php }?>><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
						<?php }?>
					<?php }?>
					<a href="javascript:void(0);" class="icon" onclick="responsiveMenu()">
						<i class="fa fa-bars"></i>
					</a>
				</div>

			</div>



			<div class="clear-fix"></div>
		</header>
		<!-- End Header -->
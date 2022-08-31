<? 
	if ($_COOKIE['is_logged_in'] == 1) {
		include("header-login.php"); 	
	} else {
		include("header-logout.php"); 	
	}
?>

<?php include 'cover.php'; ?>

<?php include 'about.php'; ?>

<?php include 'experience.php'; ?>

<?php include 'contact.php'; ?>

<?php include 'gallery.php'; ?>

<?php include 'footer.php'; ?>
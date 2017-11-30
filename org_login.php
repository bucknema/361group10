<?php # Script 18.8 - login.php
// This is the login page for the site.
require ('includes/config.inc.php'); 
$page_title = 'Organization Login';
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);
	
	// Validate the email address:
	if (!empty($_POST['email'])) {
		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
	} else {
		$e = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}
	
	// Validate the password:
	if (!empty($_POST['pass'])) {
		$p = mysqli_real_escape_string ($dbc, $_POST['pass']);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	
	if ($e && $p) { // If everything's OK.

		// Query the database:
		$q = "SELECT user_id FROM users WHERE (email='$e' AND pass=SHA1('$p'))";		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (@mysqli_num_rows($r) == 1) { // A match was made.
			// Redirect the user to home page:
			// This is clearly not functional yet. See html below - clicking
			// submit will redirect the user to the default home page for demo
				
		} else { // No match was made.
			echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
		}
		
	} else { // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
	}
	
	mysqli_close($dbc);

} // End of SUBMIT conditional.
?>

<h1>Login</h1>
<form action="login.php" method="post">
	<fieldset>
	<p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="60" /></p>
	<p><b>Password:</b> <input type="password" name="pass" size="20" maxlength="20" /></p>
	<div align="center"><input type="button" onclick="location.href='orghome.php';" value="Submit"></input></div>
	</fieldset>
</form>

<?php include ('includes/footer.html'); ?>

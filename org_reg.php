<?php # Script 18.6 - org_register.php
// This is the registration page for organizations.
require ('includes/config.inc.php');
$page_title = 'Organization Registration';
include ('includes/header.html');
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	// Assume invalid values:
	$on = $un = $e = $p = FALSE;
	
	// Check for an organization name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['org_name'])) {
		$on = mysqli_real_escape_string ($dbc, $trimmed['org_name']);
	} else {
		echo '<p class="error">Please enter a valid organization name! No special characters please.</p>';
	}
	
	// Check for a user name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['user_name'])) {
		$un = mysqli_real_escape_string ($dbc, $trimmed['user_name']);
	} else {
		echo '<p class="error">Please enter a user name!</p>';
	}
	
	// Check for an email address:
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $trimmed['email']);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}
	// Check for a password and match against the confirmed password:
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = mysqli_real_escape_string ($dbc, $trimmed['password1']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	
	if ($on && $un && $e && $p) { // If everything's OK...
		// Make sure the email address is available:
		$q = "SELECT id FROM organization WHERE email='$e'";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		//Make sure the username is available:
		$q = "SELECT id FROM organization WHERE username='$un'";
		$s = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: ". mysqli_error($dbc));		
	
		if (mysqli_num_rows($r) == 0 && mysqli_num_rows($s) == 0) { // Available.
			// Create the activation code:
			$a = md5(uniqid(rand(), true));
			// Add the user to the database:
			$q = "INSERT INTO organization (org_name, email, password, username, active) VALUES ('$on','$e', SHA1('$p'), '$un', '$a')";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
				// Send the email:
				$body = "Thank you for registering at <whatever site>. To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'org_activate.php?x=' . urlencode($e) . "&y=$a";
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: admin@sitename.com');
				
				// Finish the page:
				echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
				include ('includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			
		}
		elseif (mysqli_num_rows($s) != 0){ //The username is taken
			echo '<p class="error">The user name you have selected is already taken.</p>';
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
		}
		
	} else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($dbc);
} // End of the main Submit conditional.
?>
	
<h1>Organization Registration</h1>
<form action="org_reg.php" method="post">
	<fieldset>
	
	<p><b>Organization Name:</b> <input type="text" name="org_name" size="20" maxlength="40" value="<?php if (isset($trimmed['org_name'])) echo $trimmed['org_name']; ?>" /></p>

	<p><b>User Name:</b> <input type="text" name="user_name" size="20" maxlength="40" value="<?php if (isset($trimmed['user_name'])) echo $trimmed['user_name']; ?>" /></p>
		
	<p><b>Email Address:</b> <input type="text" name="email" size="30" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" /> </p>
		
	<p><b>Password:</b> <input type="password" name="password1" size="20" maxlength="20" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" /> <small>Use only letters, numbers, and the underscore. Must be between 4 and 20 characters long.</small></p>

	<p><b>Confirm Password:</b> <input type="password" name="password2" size="20" maxlength="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>" /></p>
	</fieldset>
	
	<div align="center"><input type="submit" name="submit" value="Register" /></div>

</form>

<?php include ('includes/footer.html'); ?>

<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'E-Commerce and Philanthropy Home';
include ('includes/header.html');

// Welcome the user (by name if they are logged in):
echo '<h1>Welcome!</h1>';
?>
<p>Donate to Organizations and Charities, or set up
a need page for an Organization.</p>
<p>Please use the navigation on the right-side of the
page to get started!</p>

<?php include ('includes/footer.html'); ?>

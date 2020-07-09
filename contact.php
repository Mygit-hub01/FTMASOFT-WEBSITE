<?php
include ('include/header.html');
?>
   <div class="row text-center">
	 <h2 class="header2">CONTACT US</h2>
 <hr>
</div>
     <div class="container">
    <div class="row pad2">
<p>Do you need a new website or re-design your existing one?<br>Do you need a customized software for your business either a Mobile Application or Desktop Application?
  	<br> We believe you have your specific needs in software applications, web applications or even mobile application. Please contact us today to discuss about them.</p>
        <form action="contact.php" method="post">
                      	<fieldset>
                      		<legend>Contact Form</legend>
                        <div class="row pad3">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"  maxlength="40" required="required"  value="<?php
	if (isset($_POST['name']))
		echo $_POST['name'];
 ?>" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email"  maxlength="60" required="required" value="<?php
	if (isset($_POST['email']))
		echo $_POST['email'];
 ?>" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" name="number"  required="required"  value="<?php
	if (isset($_POST['number']))
		echo $_POST['number'];
 ?>" />
                            </div>
                                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Send us a message. Let us know your needs.</label>
                                <textarea class="form-control" name="message" rows="6"  maxlength="100" required="required"  ><?php
	if (isset($_POST['message']))
		echo $_POST['message'];
?></textarea>
                            </div>

                            	<input type="submit" class="btn btn-primary btn-lg" name="submitted" value="Send Message">


                        </div>
                        </fieldset>

                    </form>
                      <?php //To check if the form is submitted
if (isset($_POST['submitted'])) {

	//This fuction check for any likely indication of spam
	function spam_scrubber($value) {

		// List of very bad values that might be entered into text box
		$very_bad = array('to:', 'cc:', 'bcc:', 'content-type:', 'mime-version:', 'multipart-mixed:', 'content-transfer-encoding:');

		//return an empty string if any of the  bad strings are submitted
		foreach ($very_bad as $v) {
			if (stripos($value, $v) !== false)
				return '';
		}

		// Replacing  any newline characters with spaces.
		$value = str_replace(array("\r", "\n", "%0a", "%0d"), ' ', $value);

		// Return the value:
		return trim($value);

	}// End of spam_scrubber() function.

	// Clean the form data
	$scrubbed = array_map('spam_scrubber', $_POST);

	//  form validation
	if (!empty($scrubbed['name']) && !empty($scrubbed['email']) && !empty($scrubbed['number']) && !empty($scrubbed['message'])) {

		// Create the body:
		$body = "Name: {$scrubbed['name']}\n\n Address: {$scrubbed['address']}\n\n E-mail: {$scrubbed['email']}\n\n Phone Number: {$scrubbed['number']}\n\n Message: {$scrubbed['message']}";
		$body = wordwrap($body, 70);
		$to = "support@ftmasoft.com";

		// Send the email:
		mail($to, 'Message from FTMASoft Website', $body, "From: {$scrubbed['email']}");

		// Print a message:
		echo '<p>Thank you for contacting us.</p>';
		// Clear $_POST  so that the form's not sticky.
		$_POST = array( );

	} else {
		echo '<p style="font-weight: bold;  color:#FF0000">Please fill out the form completely.</p>';
	}

}
?>
                   </div> </div>
<?php
include ('include/footer.html');
?>